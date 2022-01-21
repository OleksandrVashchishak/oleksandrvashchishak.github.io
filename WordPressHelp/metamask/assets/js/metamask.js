let userLoginData = {
    state: "loggedOut",
    ethAddress: "",
    buttonText: "Log in",
    publicName: "",
    JWT: "",
    config: {
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        }
    }
}

// ---start variables---
const ACCOUNT_CONNECT = 'accountConnect'
const disconnectedBtn = document.querySelector('.metamask__disconect-btn')
const shortAccountNumOutput = document.querySelector('.metamask__btn-output')
const walletOutput = document.querySelector('.metamask__wallet-output')
const walletStore = document.querySelector('.store_form__balance_eth_wallet')
const maticIcon = document.querySelector('.matic_icon__balance')
const metamaskMenuWrapper = document.querySelector('.metamask__wrapper')
const getWalletTabBtn = document.querySelector('.metamask__wallet-btn')
const headerConnectBtn = document.querySelector('.conection-metamsk-btn');
const connectTab = document.querySelector('.metamask__сonnect-tab');
const connectBtn = document.querySelector('.metamask__conect-btn');
const walletTab = document.querySelector('.metamask__wallet-tab')
const metamaskMenuDrobdown = document.querySelector('.metamask__dropdown')
const copyBtn = document.querySelector('.metamask__wallet-address-copy')
const copyText = document.querySelector('.metamask__wallet-address')
const disconectWallet = document.querySelector('.metamask__wallet-diconect')
// ---end variables--

// -- start disconect -- 
const disconectAccount = () => {
    disconnectedBtn.classList.add('disable')
    let data = {
        'action': 'getdisconnect',
    }
    jQuery(function ($) {
        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            data: data,
            type: 'POST',
            success: function (data) {
                if (data && data == 'ok') {
                    sessionStorage.removeItem(ACCOUNT_CONNECT)
                    shortAccountNumOutput.textContent = ' '
                    walletOutput.textContent = ' '
                    if (document.querySelector('.store_form__balance_eth_wallet')) {
                        walletStore.textContent = '-'
                        maticIcon.style.display = 'none'
                    }
                    metamaskMenuWrapper.style.display = 'none'
                    headerConnectBtn.style.display = 'block'
                    walletTab.classList.remove('active')
                    userLogout()
                    disconnectedBtn.classList.remove('disable')
                    if (document.querySelector('.store-affiliate-dynamic-wrapper')) {
                        updateAffiliateSection()
                    }
                } else {
                    disconnectedBtn.classList.remove('disable')
                    console.log('error');
                }
            }
        });
    })
}
// -- end disconect -- 

// -- start check localStarage connect metamask -- 
const getCheckMetamaskStarage = () => {
    if (sessionStorage.getItem(ACCOUNT_CONNECT) == 'true') {
        // -- start get disconect account --
        disconnectedBtn.addEventListener('click', () => disconectAccount())
        disconectWallet.addEventListener('click', () => {
            disconectAccount()
            walletTab.classList.remove('active')
        })

        // -- end get disconect account --
        headerConnectBtn.style.display = 'none'
        metamaskMenuWrapper.style.display = 'block'
        setTimeout(() => {
            getAccount()
            getBalance()
        }, 500)
    } else {
        metamaskMenuWrapper.style.display = 'none'
        headerConnectBtn.style.display = 'block'
    }
}
// -- end check localStarage connect metamask -- 

// -- start get balance -- 
const getBalance = async () => {
    const chainId = await web3.eth.getChainId();
    if (chainId != 137) {
        alert("Please switch to POLYGON Network");
        walletOutput.innerHTML = '-'
        if (document.querySelector('.store_form__balance_eth_wallet')) {
            walletStore.innerHTML = '-';
            maticIcon.style.display = '-';
        }
    }
    else {
        let address, wei, balance
        const accounts = await ethereum.request({
            method: 'eth_requestAccounts'
        });
        address = accounts[0];
        try {
            web3.eth.getBalance(address, function (error, wei) {
                if (!error) {
                    const balance = web3.utils.fromWei(wei, 'ether');
                    const balanceNumber = parseFloat(balance);
                    walletOutput.innerHTML = balanceNumber.toFixed(4) + " MATIC";
                    if (document.querySelector('.store_form__balance_eth_wallet')) {
                        walletStore.innerHTML = balanceNumber.toFixed(4) + " MATIC";
                        maticIcon.style.display = 'inline-block';
                    }

                }
            });
        } catch (err) {
            walletOutput.innerHTML = err;
            walletStore.innerHTML = err;
        }
    }
}
// -- end get balance --

// --  start get account --
const getAccount = async () => {
    const accounts = await ethereum.request({
        method: 'eth_requestAccounts'
    });

    try {
        const account = accounts[0];
        const accountShort = `${account[0]}${account[1]}${account[2]}${account[3]}...${account[account.length - 4]}${account[account.length - 3]}${account[account.length - 2]}${account[account.length - 1]}`;
        shortAccountNumOutput.innerHTML = accountShort
        document.querySelector('.metamask__wallet-address').innerHTML = account
    } catch {
        console.log('Error with conection');
    }
}
// -- end get account --

// -- start get connect --
connectBtn.addEventListener('click', () => {
    // userLogin()
    switchNetwork()
    connectTab.classList.remove('active')
});
// -- end get connect --

// -- start check conected --
const isConnected = async () => {
    const accounts = await ethereum.request({
        method: 'eth_accounts'
    })
    if (accounts.length !== 0) {
        sessionStorage.setItem(ACCOUNT_CONNECT, true)
        getCheckMetamaskStarage()
    }
}
// -- end check conected -- 

// -- start check on enable metamsk --
window.addEventListener('load', function () {
    if (typeof web3 !== 'undefined') {
        window.web3 = new Web3(web3.currentProvider);


        getCheckMetamaskStarage()

        // -- start on account change
        ethereum.on('accountsChanged', function (accounts) {
            if (accounts[0]) {
                // getSignuture()
            } else {
                sessionStorage.setItem(ACCOUNT_CONNECT, false)
                getCheckMetamaskStarage()
            }
        });
        // -- end on account change --

        // -- start on change chain
        ethereum.on('chainChanged', (chainId) => {
            if (chainId != '0x89') {
                alert("Please switch to POLYGON Network");
                walletOutput.innerHTML = '-'
                if (document.querySelector('.store_form__balance_eth_wallet')) {
                    walletStore.innerHTML = '-';
                    maticIcon.style.display = '-';
                }
            } else {
                getBalance()
            }
        })
        // -- end on change chain

    } else {
        window.web3 = new Web3(new Web3.providers.HttpProvider("https://mainnet.infura.io/<APIKEY>"));
        metamaskMenuWrapper.style.display = 'none'
        document.querySelector('.error-message-matamask').textContent = 'No provider was found'
    }
})
// -- end check on enable metamsk --

// -- start get wallet tab --
getWalletTabBtn.addEventListener('click', () => {
    walletTab.classList.toggle('active')
})

document.querySelector('.metamask__close-icon').addEventListener('click', () => {
    walletTab.classList.toggle('active')
})
// -- end get wallet tab --

// -- start get connect popup --
headerConnectBtn.addEventListener('click', () => {
    connectTab.classList.toggle('active')
})

const getConnectStore = () => {
    connectTab.classList.toggle('active')
}

document.querySelector('.metamask__close-сonnect-icon').addEventListener('click', () => {
    connectTab.classList.remove('active')
})
// -- end get connect popup --

// -- start copy text -- 
copyBtn.addEventListener('click', () => {
    copy(copyText.textContent)
})

const copy = text => {
    const input = document.createElement('input');
    input.setAttribute('value', text);
    document.body.appendChild(input);
    input.select();
    const result = document.execCommand('copy');
    document.body.removeChild(input);
    return result;
}
// -- end copy text -- 

// -- start switch network --
const switchNetwork = async () => {
    try {
        await window.ethereum.request({
            method: 'wallet_switchEthereumChain',
            params: [{ chainId: '0x89' }],
        });
        userLogin()
    } catch (error) {
        disconectAccount()
        if (error.code === 4902) {
            try {
                const testSwith = await window.ethereum.request({
                    method: 'wallet_addEthereumChain',
                    params: [{
                        chainId: '0x89',
                        chainName: 'Polygon MainNet',
                        nativeCurrency: {
                            symbol: 'MATIC',
                            decimals: 18
                        },
                        rpcUrls: ['https://rpc-mainnet.maticvigil.com/'],
                        blockExplorerUrls: ['https://explorer.matic.network/']
                    }],
                });

                console.log(testSwith);
            } catch (addError) {
                console.error(addError);
            }
        }
    }
}
// -- end switch nework --

// -- start get signature --
const getSignuture = async () => {
    const accounts = await ethereum.request({
        method: 'eth_requestAccounts'
    });

    const msg = web3.utils.sha3("test")
    const from = accounts[0]
    const params = [msg, from]
    const method = 'personal_sign'

    web3.currentProvider.sendAsync({
        method,
        params,
        from,
    }, function (err, result) {
        if (err) {
            disconectAccount()
            return console.error(err)
        }
        if (result.error) {
            disconectAccount()
            return console.error(result.error)
        }
        sessionStorage.setItem(ACCOUNT_CONNECT, true)
        isConnected()
        getAccount()
        getBalance()
        getCheckMetamaskStarage()
        console.log('PERSONAL SIGNED:' + JSON.stringify(result.result))

        let data = {
            'action': 'getsignature',
            'signer': JSON.stringify(result.result),
        }
        jQuery(function ($) {
            $.ajax({
                url: '/wp-admin/admin-ajax.php',
                data: data,
                type: 'POST',
                success: function (data) {
                    if (data) {
                        console.log(data);
                    } else {
                        console.log('error');
                    }
                }
            });
        })

    });

}
// -- end get signature --

// -- start update affiliate --
const updateAffiliateSection = () => {
    let data = {
        'action': 'getaffiliate',
    }
    jQuery(function ($) {
        $.ajax({
            url: '/wp-content/themes/legends/custom/store/store-affiliate-dynamic.php',
            data: data,
            type: 'POST',
            success: function (data) {
                if (data) {
                    document.querySelector('.store-affiliate-dynamic-wrapper').innerHTML = data;
                    setTimeout(function () {
                        if (data.indexOf('affiliate_copy') >= 0) {
                            document.getElementById("affiliate_copy").addEventListener("focus", function () {
                                this.setSelectionRange(0, this.value.length)
                            });
                            document.getElementById("affiliate_copy").setAttribute("readonly", true);
                        }
                    }, 1000);
                } else {
                    console.log('error');
                }
            }
        });
    })
}
// -- end update affiliate --

if (window.web3) {
    ethereum.on('accountsChanged', (_chainId) => ethNetworkUpdate());

    async function ethNetworkUpdate() {
        let accountsOnEnable = await web3.eth.getAccounts();
        let address = accountsOnEnable[0];
        address = address.toLowerCase();
        if (userLoginData.ethAddress != address) {
            userLoginData.ethAddress = address;
            showAddress();
            if (userLoginData.state == "loggedIn") {
                userLoginData.JWT = "";
                userLoginData.state = "loggedOut";
                userLoginData.buttonText = "Log in";
            }
        }
        if (userLoginData.ethAddress != null && userLoginData.state == "needLogInToMetaMask") {
            userLoginData.state = "loggedOut";
        }
    }
}

// -- start Show current address -- 
function showAddress() {
}
// -- end Show current address -- 

// -- start user logout -- 
async function userLoginOut() {
    if (userLoginData.state == "loggedOut") {
        await onConnectLoadWeb3Modal();
    }
    if (web3ModalProv) {
        window.web3 = web3ModalProv;
        try {
            userLogin();
        } catch (error) {
            console.log(error);
            userLoginData.state = 'needLogInToMetaMask';
            return;
        }
    } else {
        userLoginData.state = 'needMetamask';
        return;
    }
}

const userLogout = () => {
    userLoginData.state = "loggedOut";
    userLoginData.JWT = "";
    userLoginData.buttonText = "Log in";
    return;
}
// -- end user logout -- 

// -- start user login -- 
async function userLogin() {
    if (userLoginData.state == "loggedIn") {
        userLoginData.state = "loggedOut";
        userLoginData.JWT = "";
        userLoginData.buttonText = "Log in";
        return;
    }
    if (typeof window.web3 === "undefined") {
        userLoginData.state = "needMetamask";
        return;
    }
    let accountsOnEnable = await web3.eth.getAccounts();
    let address = accountsOnEnable[0];
    if (!address) {
        const accounts = await ethereum.request({
            method: 'eth_requestAccounts'
        });
        address = accounts[0];
    }

    address = address.toLowerCase();
    if (address == null) {
        userLoginData.state = "needLogInToMetaMask";
        return;
    }
    userLoginData.state = "signTheMessage";

    axios.post(
        "server/ajax.php", {
        request: "login",
        address: address
    },
        userLoginData.config
    )
        .then(function (response) {
            if (response.data.substring(0, 5) != "Error") {
                let message = response.data;
                let publicAddress = address;
                handleSignMessage(message, publicAddress).then(handleAuthenticate);

                function handleSignMessage(message, publicAddress) {
                    return new Promise((resolve, reject) =>
                        web3.eth.personal.sign(
                            web3.utils.utf8ToHex(message),
                            publicAddress,
                            (err, signature) => {
                                if (err) {
                                    userLoginData.state = "loggedOut";
                                    console.log(userLoginData.state);
                                }
                                return resolve({
                                    publicAddress,
                                    signature
                                });
                            }
                        )
                    );
                }

                function handleAuthenticate({
                    publicAddress,
                    signature
                }) {
                    axios
                        .post(
                            "server/ajax.php", {
                            request: "auth",
                            address: arguments[0].publicAddress,
                            signature: arguments[0].signature
                        },
                            userLoginData.config
                        )
                        .then(function (response) {
                            if (response.data[0] == "Success") {
                                switchNetwork()
                                userLoginData.state = "loggedIn";
                                showAddress();
                                userLoginData.publicName = response.data[1];
                                userLoginData.JWT = response.data[2];
                                sessionStorage.clear();
                                sessionStorage.setItem(ACCOUNT_CONNECT, true)
                                getCheckMetamaskStarage()
                                if (document.querySelector('.store-affiliate-dynamic-wrapper')) {
                                    updateAffiliateSection()
                                }

                                let walletData = {
                                    'action': 'getwalletdata',
                                }
                                jQuery(function ($) {
                                    $.ajax({
                                        url: '/wp-admin/admin-ajax.php',
                                        data: walletData,
                                        type: 'POST',
                                        success: function (data) {
                                            if (data) {
                                                document.querySelector('.metamask__wallet-data').innerHTML = data
                                            } else {
                                                console.log('error');
                                            }
                                        }
                                    });
                                })

                            }
                        })
                        .catch(function (error) {
                            console.error(error);
                        });
                }
            } else {
                console.log("Error: " + response.data);
            }
        })
        .catch(function (error) {
            console.error(error);
        });
}
// -- end user login -- 

// -- end common function connect -- 
const Web3Modal = window.Web3Modal.default;
const WalletConnectProvider = window.WalletConnectProvider.default;

let web3Modal
let provider;
let selectedAccount;
let web3ModalProv;

function web3ModalInit() {
    // Tell Web3modal what providers we have available.
    // Built-in web browser provider (only one can exist as a time)
    // like MetaMask, Brave or Opera is added automatically by Web3modal
    const providerOptions = {
        walletconnect: {
            package: WalletConnectProvider,
            options: {
                // Mikko's test key - don't copy as your mileage may vary
                infuraId: "8043bb2cf99347b1bfadfb233c5325c0",
            }
        },
    };

    web3Modal = new Web3Modal({
        cacheProvider: false, // optional
        providerOptions, // required
        disableInjectedProvider: false, // optional. For MetaMask / Brave / Opera.
    });
}

async function fetchAccountData() {
    web3ModalProv = new Web3(provider);

    // Subscribe to accounts change
    provider.on("accountsChanged", (accounts) => {
        console.log(accounts);
    });

    // Subscribe to chainId change
    provider.on("chainChanged", (chainId) => {
        console.log(chainId);
    });

    // Subscribe to session disconnection
    provider.on("disconnect", (code, reason) => {
        console.log(code, reason);
    });
}

async function refreshAccountData() {
    await fetchAccountData(provider);
}

async function onConnectLoadWeb3Modal() {

    try {
        provider = await web3Modal.connect();
    } catch (e) {
        console.log("Could not get a wallet connection", e);
        return;
    }

    await refreshAccountData();
}

window.addEventListener('load', async () => {
    web3ModalInit();
});
// -- end common function provider --



// -- start get session refresh -- 
setInterval(() => {
    let data = {
        'action': 'get_session_refresh',
    }
    jQuery(function ($) {
        $.ajax({
            url: '/session_refresh.php',
            data: data,
            type: 'POST',
            success: function (data) {
                if (data) {
                } else {
                    console.log('error');
                }
            }
        });
    })
}, 15 * 1000 * 60)

setTimeout(() => {
    let data = {
        'action': 'get_session_refresh',
    }
    jQuery(function ($) {
        $.ajax({
            url: '/session_refresh.php',
            data: data,
            type: 'POST',
            success: function (data) {
                if (data) {
                } else {
                    console.log('error');
                }
            }
        });
    })
}, 1000);

// -- end get session refresh -- 
let oldValue
const getEditDateDb = (type) => {
    oldValue = document.querySelector(`.metamask__wallet-value-${type}`).value
    document.querySelectorAll(`.metamask_edit_icon`).forEach(e => {
        e.style.display = 'none'
    })
    document.querySelectorAll(`.metamask__wallet-${type} .edit-btn-prifile-date`).forEach(e => {
        e.classList.add('active')
    })
    document.querySelector(`.metamask__wallet-value-${type}`).removeAttribute("disabled");
    document.querySelector(`.metamask__wallet-value-${type}`).classList.add('edited')
    document.querySelector(`.metamask__wallet-value-${type}`).focus();
}

const closeUpdateDateDb = (type, status) => {
    document.querySelectorAll(`.metamask_edit_icon`).forEach(e => {
        e.style.display = 'inline-flex'
    })
    document.querySelectorAll(`.metamask__wallet-${type} .edit-btn-prifile-date`).forEach(e => {
        e.classList.remove('active')
    })
    if (status == 'reject') {
        document.querySelector(`.metamask__wallet-value-${type}`).value = oldValue;
    }
    document.querySelector(`.metamask__wallet-value-${type}`).setAttribute("disabled", "disabled");
    document.querySelector(`.metamask__wallet-value-${type}`).classList.remove('edited')
}

const getDataStatus = (type, errorField, msg, status) => {
    document.querySelector(`.metamask__wallet-error-${type}`).classList.remove('error')
    document.querySelector(`.metamask__wallet-error-${type}`).classList.remove('sucsses')
    document.querySelector(`.metamask__wallet-error-${type}`).classList.add(status)
    errorField.textContent = msg
}


const getUpdateDateDb = async (type) => {
    const result = document.querySelector(`.metamask__wallet-value-${type}`).value;
    const errorField = document.querySelector(`.metamask__wallet-error-${type}`)

    if (result.trim() == '') {
        getDataStatus(type, errorField, 'The value cannot be empty', 'error')
        return
    }
    const accountsOnEnable = await web3.eth.getAccounts();
    let address = accountsOnEnable[0];
    if (!address) {
        const accounts = await ethereum.request({
            method: 'eth_requestAccounts'
        });
        address = accounts[0];
    }

    address = address.toLowerCase();

    axios.post(
        "server/ajax.php", {
        request: "account_date_update",
        'type': type,
        'value': result,
        'address': address
    },
        userLoginData.config
    )
        .then(function (response) {
            if (response && response.data.status == 'ok') {
                console.log(response);
                console.log(response.data);
                document.querySelector(`.metamask__wallet-value-${type}`).textContent = response.data.value
                closeUpdateDateDb(type, 'done')
                getDataStatus(type, errorField, `Your ${type} has been changed`, 'sucsses')
            }
            else {
                console.log(response);
                closeUpdateDateDb(type, 'reject')
                getDataStatus(type, errorField, response.data.msg, 'error')
            }
        })
        .catch(function (error) {
            closeUpdateDateDb(type, 'reject')
            getDataStatus(type, errorField, response.data.msg, 'error')
            console.error(error);
        });
}
console.log(1);