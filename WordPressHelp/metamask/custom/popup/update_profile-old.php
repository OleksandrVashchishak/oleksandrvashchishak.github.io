<?php
@session_start();
if (!defined('LOAD_DB_CONNECT_MM')) {
    define('LOAD_DB_CONNECT_MM', 1); //comment because have problem with WP debug (Already defined in metamask-functions.php)
}
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/legends/custom/metamask/metamask-db-connect.php');

if (!isset($_SESSION['username'])) {
    echo json_encode(array('status' => 'error', 'msg' => 'You are not connected!'));
    exit;
}

function checkName($name)
{ //verifies if the string can be a valid name
    if (!preg_match('/^[A-Za-z][A-Za-z0-9]*(?:_[A-Za-z0-9]+)*$/', $name)) {
        return FALSE;
    } else {
        return TRUE;
    }
}

function checkEmail($email)
{ // check if email is valid
    // First, we check that there's one @ symbol, and that the lengths are right
    if (!preg_match("/^[^@]{1,64}@[^@]{1,255}$/", $email)) {
        // Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
        echo '1';
        return false;
    }
    // Split it into sections to make life easier
    $email_array = explode("@", $email);
    $local_array = explode(".", $email_array[0]);
    for ($i = 0; $i < sizeof($local_array); $i++) {
        if (!preg_match("/^(([A-Za-z0-9!#$%&'*+\/=?^_`{|}~-][A-Za-z0-9!#$%&'*+\/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$/", $local_array[$i])) {
            return false;
        }
    }
    if (!preg_match("/^\[?[0-9\.]+\]?$/", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
        $domain_array = explode(".", $email_array[1]);
        if (sizeof($domain_array) < 2) {
            return false; // Not enough parts to domain
        }
        for ($i = 0; $i < sizeof($domain_array); $i++) {
            if (!preg_match("/^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$/", $domain_array[$i])) {
                return false;
            }
        }
    }

    return true;
}

if ($_REQUEST['type'] == 'email') {
    //change email
    $email = $_REQUEST['value'];
    if (checkEmail($email)) {
        //check if name isn't already taken
        $stmt = $conn->prepare("SELECT * FROM {$tablename} WHERE email = ?");
        $stmt->bindParam(1, $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo json_encode(array('status' => 'error', 'msg' => 'Public name already taken'));
        } else {
            if ($stmt = $conn->prepare("UPDATE $tablename SET email='$email' WHERE ID = ?")) {
                $stmt->bindParam(1, $_SESSION['userid']);
                $stmt->execute();

                $count = $stmt->rowCount();
                if ($count > 0) {
                    echo json_encode(array('status' => 'ok'));
                } else {
                    echo json_encode(array('status' => 'error', 'msg' => 'Could not update'));
                }
            } else {
                echo json_encode(array('status' => 'error', 'msg' => 'Could not update'));
            }
        }
    } else {
        echo json_encode(array('status' => 'error', 'msg' => 'Invalid email'));
    }
}

if ($_REQUEST['type'] == 'publicname') {
    //change email
    $publicName = $_REQUEST['value'];
    if (checkName($publicName)) {
        //check if name isn't already taken
        $stmt = $conn->prepare("SELECT * FROM {$tablename} WHERE publicName = ?");
        $stmt->bindParam(1, $publicName);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo json_encode(array('status' => 'error', 'msg' => 'Public name already taken'));
        } else {
            if ($stmt = $conn->prepare("UPDATE $tablename SET publicName='$publicName' WHERE ID = ?")) {
                $stmt->bindParam(1, $_SESSION['userid']);
                $stmt->execute();

                $count = $stmt->rowCount();
                if ($count > 0) {
                    echo json_encode(array('status' => 'ok'));
                } else {
                    echo json_encode(array('status' => 'error', 'msg' => 'Could not update'));
                }
            } else {
                echo json_encode(array('status' => 'error', 'msg' => 'Could not update'));
            }
        }
    } else {
        echo json_encode(array('status' => 'error', 'msg' => 'Invalid public name'));
    }
}
