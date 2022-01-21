<?php
@session_start();

require get_template_directory() .  "/lib/Keccak/Keccak.php";
require get_template_directory() .  "/lib/Elliptic/EC.php";
require get_template_directory() .  "/lib/Elliptic/Curves.php";
require get_template_directory() .  "/lib/JWT/jwt_helper.php";
$GLOBALS['JWT_secret'] = '4Eac8AS2cw84easd65araADX';

use Elliptic\EC;
use kornrunner\Keccak;

// -- config --
if (!defined('LOAD_DB_CONNECT_MM')) {
    define('LOAD_DB_CONNECT_MM', 1); //comment because have problem with WP debug (Already defined in metamask-functions.php)
}
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/legends/custom/store/store-settings.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/legends/custom/metamask/metamask-db-connect.php');
// -- config --

$data = json_decode(file_get_contents("php://input"));
$request = $data->request;

// Create a standard of eth address by lowercasing them
// Some wallets send address with upper and lower case characters
if (!empty($data->address)) {
    $data->address = strtolower($data->address);
}

if ($request == "account_date_update") {
    $value = $data->value;
    $type = $data->type;
    $address = $data->address;
    require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/legends/custom/popup/update_profile.php');
    exit;
}
if ($request == "login") {
    $address = $data->address;

    // Prepared statement to protect against SQL injections
    $stmt = $conn->prepare("SELECT nonce FROM $tablename WHERE address = ?");
    $stmt->bindParam(1, $address);
    $stmt->execute();
    $nonce = $stmt->fetchColumn();

    if ($nonce) {
        // If user exists, return message to sign
        echo ("Sign this message to validate that you are the owner of the account. Random string: " . $nonce);
    } else {
        // If user doesn't exist, register new user with generated nonce, then return message to sign
        $nonce = uniqid();

        // Prepared statement to protect against SQL injections
        $stmt = $conn->prepare("INSERT INTO $tablename (address, nonce) VALUES (?, ?)");
        $stmt->bindParam(1, $address);
        $stmt->bindParam(2, $nonce);
        $stmt->execute();

        // START 09/11/2021: insert user to new table where we keep affiliates
        if (2 == 2) {
            //get userid
            if ($stmt = $conn->prepare("SELECT ID FROM $tablename WHERE address = ?")) {
                $stmt->bindParam(1, $address);
                $stmt->execute();
                $userid = $stmt->fetchColumn();
            } else {
                $conn->errorInfo();
            }
            //check if the affiliate ID or affiliate NICKNAME is set in the session
            $aff_id = NULL;
            if (strlen($_SESSION['aff_code']) > 0) {
                if (is_numeric($_SESSION['aff_code'])) {
                    $aff_id = $_SESSION['aff_code'];
                    //check if the affiliate ID is actually an existing user
                    if ($stmt = $conn->prepare("SELECT ID FROM $tablename WHERE ID = ?")) {
                        $stmt->bindParam(1, $aff_id);
                        $stmt->execute();
                        $check_aff_id = $stmt->fetchColumn();
                        if (is_numeric($check_aff_id)) {
                            //all OK
                        } else {
                            $aff_id = NULL;
                        }
                    } else {
                        $conn->errorInfo();
                    }
                } elseif (preg_match('/^[A-Za-z0-9._-]+$/', $_SESSION['aff_code'])) { //make sure the affiliate code is alphanumeric with hypen/dot/underscore				
                    //get aff_id based on username
                    if ($stmt = $conn->prepare("SELECT ID FROM $tablename WHERE publicName = ?")) {
                        $stmt->bindParam(1, $_SESSION['aff_code']);
                        $stmt->execute();
                        $aff_id = $stmt->fetchColumn();
                    } else {
                        $conn->errorInfo();
                    }
                }
            }
            //$_SESSION['userid'] = $userid; - this is not needed, because we set it in login
            if ($aff_id > 0) {
                $sql = "UPDATE $tablename SET aff_id = '" . $aff_id . "' WHERE address = '" . $address . "'";
                $conn->query($sql);
            }
            // Prepared statement to protect against SQL injections
            $ref_website = $_SESSION['user_data']['ref_website'];
            if (strlen($ref_website) > 5) {
                if ($stmt = $conn->prepare("INSERT INTO `metamaskDB_marketing` (ID, ref_website) VALUES (?, ?)")) {
                    $stmt->bindParam(1, $userid);
                    $stmt->bindParam(2, $ref_website);
                    $stmt->execute();
                } else {
                    $conn->errorInfo();
                }
            }
        }
        // END 09/11/2021: insert user to new table where we keep affiliates

        //if ($stmt->execute() === TRUE) {
        echo ("Sign this message to validate that you are the owner of the account. Random string: " . $nonce);
        //} else {
        //    echo "Error" . $stmt->error;
        //}

        $conn = null;
    }

    exit;
}

if ($request == "auth") {
    $address = $data->address;
    $signature = $data->signature;

    // Prepared statement to protect against SQL injections
    if ($stmt = $conn->prepare("SELECT nonce FROM $tablename WHERE address = ?")) {
        $stmt->bindParam(1, $address);
        $stmt->execute();
        $nonce = $stmt->fetchColumn();

        $message = "Sign this message to validate that you are the owner of the account. Random string: " . $nonce;
    }

    // Check if the message was signed with the same private key to which the public address belongs
    function pubKeyToAddress($pubkey)
    {
        return "0x" . substr(Keccak::hash(substr(hex2bin($pubkey->encode("hex")), 1), 256), 24);
    }

    function verifySignature($message, $signature, $address)
    {
        $msglen = strlen($message);
        $hash   = Keccak::hash("\x19Ethereum Signed Message:\n{$msglen}{$message}", 256);
        $sign   = [
            "r" => substr($signature, 2, 64),
            "s" => substr($signature, 66, 64)
        ];
        $recid  = ord(hex2bin(substr($signature, 130, 2))) - 27;
        if ($recid != ($recid & 1))
            return false;

        $ec = new EC('secp256k1');
        $pubkey = $ec->recoverPubKey($hash, $sign, $recid);

        return $address == pubKeyToAddress($pubkey);
    }

    // If verification passed, authenticate user
    if (verifySignature($message, $signature, $address)) {

        $stmt = $conn->prepare("SELECT *,u.id AS id FROM {$tablename} u LEFT JOIN {$tablename}_marketing m ON u.id=m.id WHERE address = ?");
        $stmt->bindParam(1, $address);
        $stmt->execute();

        $metamask_db_data = $stmt->fetchAll();
        $_SESSION['publicName'] = htmlspecialchars($metamask_db_data[0]['publicName'], ENT_QUOTES, 'UTF-8');
        $_SESSION['email'] = htmlspecialchars($metamask_db_data[0]['email'], ENT_QUOTES, 'UTF-8');
        $_SESSION['userid'] = $metamask_db_data[0]['id'];
        $_SESSION['user_data'] = $metamask_db_data[0];

        // Create a new random nonce for the next login
        $nonce = uniqid();
        $sql = "UPDATE $tablename SET nonce = '" . $nonce . "', last_login_date=NOW() WHERE address = '" . $address . "'";
        $conn->query($sql);

        // add session
        $_SESSION['metamask_verified'] = 1;


        // Create JWT Token
        $token = array();
        $token['address'] = $address;
        $JWT = JWT::encode($token, $GLOBALS['JWT_secret']);

        echo (json_encode(["Success", $publicName, $JWT]));
    } else {
        unset($_SESSION['metamask_verified']);
        echo "Fail";
    }

    $conn = null;
    exit;
}



// start metamask get disconnect
function get_disconnect()
{
    session_destroy();
    echo 'ok';
    die;
}
add_action('wp_ajax_getdisconnect', 'get_disconnect');
add_action('wp_ajax_nopriv_getdisconnect', 'get_disconnect');
// end metamask get disconect

// start metamask get affiliate
function get_affiliate()
{
    get_template_part('/store-affiliate-dynamic');
    die;
}
add_action('wp_ajax_getaffiliate', 'get_affiliate');
add_action('wp_ajax_nopriv_getaffiliate', 'get_affiliate');
// end metamask get affiliate

// start get wallet data
function get_walletdata()
{
    get_template_part('/custom/popup/update_profile-template');
    die;
}
add_action('wp_ajax_getwalletdata', 'get_walletdata');
add_action('wp_ajax_nopriv_getwalletdata', 'get_walletdata');
// end get wallet data
