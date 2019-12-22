
var urlBase = 'wss://ropsten.infura.io/ws/v3/cde205b23d7d4a998f4ee02f652355b0';
var contractAddress = '0xb527FdE93d1dcC4F192E3eE42B219C0D81789F67';
var accountHolder = '0xaC8832ae0C56f638bC07822f90b24A4f8d721B2D';
var privateKeyHolder = '9ECC93FB52B849DE0F2010CC08BF1284DF4F5A8A899F6074D894FC44D017977A';
var web3Provider = null;
var contract = null;
var abi = null;
var blockchain = {};

(function ($) {
    "use strict";

    $(document).ready(function () {
        connect();
    });

    var connect = function () {
        return new Promise(async(resolve, reject) => {
            if (!web3Provider) {
                const web3Url = new Web3.providers.WebsocketProvider(urlBase);

                web3Provider = new Web3(web3Url);

                const options = {
                    gasPrice: 3000000,
                };

                abi = await loadJSON();

                contract = new web3Provider.eth.Contract(abi, contractAddress, options);

                await getAccount();
            }

            resolve();
        }).catch((err) => {
            throw new Error(err);
        })
    };

    var loadJSON = function () {
        return new Promise(async(resolve, reject) => {
            var urlFile = base_url + '/assets/json/contract.json';
            var xobj = new XMLHttpRequest();
            xobj.overrideMimeType("application/json");
            xobj.open('GET', urlFile, true); // Replace 'my_data' with the path to your file
            xobj.onreadystatechange = function () {
                if (xobj.readyState === 4 && xobj.status === 200) {
                    resolve(JSON.parse(xobj.responseText));
                }
            };
            xobj.send(null);
        });
    };

    var formatCurrency = function(number, digit = 4) {
        return new Intl.NumberFormat('en-IN', { maximumFractionDigits: digit }).format(number)
    };

    var getGasPrice = function () {
        return new Promise((resolve, reject) => {
            web3Provider.eth.getGasPrice((error, result) => {
                if(!error) {
                    resolve(result.toString(10));
                }
                else {
                    reject(error);
                }
            });
        }).catch((err) => {
            throw new Error(err);
        });
    };

    var createAddress = function () {
        // var wallet = new ethereumjs.Wallet.generate();

        // return {
        //     address: wallet.getAddressString(),
        //     privateKey: wallet.getPrivateKeyString(),
        //     publicKey: wallet.getPublicKeyString()
        // }

        return {
            address: '0x35a7bbce80d11350de693716da6a4b25baa15c99',
            privateKey: '0x9218212624e1f8a368eafcb6b60bbbebfa78a8addcc8345a6cc3bd6026d3c97c',
            publicKey: '0x0171fba45252827d8470541a6e45767fe23d41149bd7368bc014c32cba670aac106570a1a6a122604bbe7814aa860849eca88631ac8a439a1778c92ae1edf329',
        }
    };

    var getAccount = function () {
        return new Promise(async(resolve, reject) => {
            const url = base_ajax + '/utils/account';
            $.ajax({
                url: url,
                type: "GET",
                success: function (response) {
                    const userData = response;

                    if (userData && userData.wallet && userData.wallet.pk) {
                        web3Provider.eth.accounts.wallet.add(userData.wallet.pk);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error('can not get user from server!!!');
                    reject('can not get user from server!!!');
                }
            });
        });
    };

    var getWallet = function() {
        if (web3Provider.eth.accounts.wallet[0]) {
            return web3Provider.eth.accounts.wallet[0].address;
        }
        return null;
    };

    var accountCurrent = function() {
        return new Promise(async(resolve, reject) => {
            const result = await web3Provider.eth.accounts.wallet[0];
            if (result) {
                resolve(result);
            } else {
                resolve(null);
            }
        }).catch((err) => {
            throw new Error(err);
        });

    };

    var getBalanceEth = function () {
        return new Promise(async(resolve, reject) => {
            const account = await accountCurrent();

            if (!account) {
                resolve(null);
            } else{
                let balance = await web3Provider.eth.getBalance(account.address);

                const result = await web3Provider.utils.fromWei(balance, 'ether');

                resolve(formatCurrency(result));
            }
        }).catch((err) => {
            throw new Error(err);
        })
    };

    var getBalanceDonate = function() {
        return new Promise(async(resolve, reject) => {
            const account = await accountCurrent();
            if (!account) {
                resolve(null);
            } else{
                let balance = await contract.methods.balanceOf(account.address).call();

                const result = await web3Provider.utils.fromWei(balance, 'wei');

                resolve(formatCurrency(result));
            }
        }).catch((err) => {
            throw new Error(err);
        })
    }

    var getTransactionReceipt =  function(txHash) {
        return new Promise(async(resolve, reject) => {
            const transactionReceipt = await web3Provider.eth.getTransactionReceipt(txHash)

            resolve({status: true, message: transactionReceipt});
        }).catch((err) => {
            throw new Error(err);
        });
    };

    var withdrawEth = function(toAddress, amount) {
        return new Promise(async(resolve, reject) => {
            const validAddress = web3Provider.utils.isAddress(toAddress);

            if (validAddress === true) {
                const account = await accountCurrent();

                if (account) {
                    const address = account.address;
                    const privateKey = account.privateKey.replace('0x','');

                    const balanceEth = await getBalanceEth();

                    if (amount > balanceEth) {
                        console.error('have enough balance!!!');
                        resolve({ status: false, message: 'You don not have enough balance to cover this transaction' })
                        return;
                    }

                    const gasPrice = await getGasPrice();

                    const valueSend = web3Provider.utils.toWei(amount, "ether");

                    web3Provider.eth.getTransactionCount(address, (err, txCount) => {
                        const txData = {
                            to: toAddress,
                            value: valueSend,
                            gasPrice: web3Provider.utils.toHex(gasPrice),
                            nonce:    web3Provider.utils.toHex(txCount),
                        };

                        web3Provider.eth.estimateGas(txData, function (error, gas) {
                            const privateKeyBuffer = new ethereumjs.Buffer.Buffer(privateKey, 'hex');
                            txData.gas = gas;

                            const tx = new ethereumjs.Tx(txData, { chain: 'ropsten', hardfork: 'petersburg' });

                            tx.sign(privateKeyBuffer)

                            const serializedTx = tx.serialize()
                            const raw = '0x' + serializedTx.toString('hex')

                            web3Provider.eth.sendSignedTransaction(raw, (err, txHash) => {
                                if (err) {
                                    console.error(err);
                                    resolve({status: false, message: err});
                                }
                                resolve({status: true, message: txHash});
                            });
                        })
                    });
                } else {
                    resolve({ status: false, message: 'Can not get account' });
                }
            } else {
                resolve({ status: false, message: 'Invalid address' });
            }

        }).catch((err) => {
            throw new Error(err);
        });
    };

    var sendTransactionDonate = function (toAddress, amount) {
        return new Promise(async(resolve, reject) => {
            try {
                const validAddress = web3Provider.utils.isAddress(toAddress);

                if (validAddress === true) {
                    const account = await accountCurrent();

                    if (account) {
                        const address = account.address;
                        const privateKey = account.privateKey.replace('0x','');

                        const balanceDonate = await getBalanceDonate();

                        if (amount > balanceDonate) {
                            console.error('have enough balance!!!');
                            resolve({ status: false, message: 'You don not have enough balance to cover this transaction' })
                            return;
                        }

                        const gasPrice = await getGasPrice();

                        const valueSend = await web3Provider.utils.toWei(amount, 'wei');

                        web3Provider.eth.getTransactionCount(address, (err, txCount) => {
                            const txData = {
                                to: contractAddress,
                                gasPrice: web3Provider.utils.toHex(gasPrice),
                                nonce:    web3Provider.utils.toHex(txCount),
                            };

                            contract.methods.transfer(
                                toAddress,
                                valueSend,
                            ).estimateGas({from: address})
                                .then((gasAmount) => {
                                    const dataInput =  contract.methods.transfer(
                                        toAddress,
                                        valueSend,
                                    ).encodeABI();

                                    txData.gasLimit = web3Provider.utils.toHex(gasAmount);
                                    txData.data = dataInput;

                                    const privateKeyBuffer = new ethereumjs.Buffer.Buffer(privateKey, 'hex');

                                    const tx = new ethereumjs.Tx(txData, { chain: 'ropsten', hardfork: 'petersburg' });

                                    tx.sign(privateKeyBuffer)

                                    const serializedTx = tx.serialize()
                                    const raw = '0x' + serializedTx.toString('hex')

                                    web3Provider.eth.sendSignedTransaction(raw, (err, txHash) => {
                                        if (err) {
                                            console.error(err);
                                            resolve({status: false, message: err});
                                        }
                                        resolve({status: true, message: txHash});
                                    });
                                })
                        });
                    } else {
                        resolve({ status: false, message: 'Can not get account' });
                    }
                } else {
                    resolve({ status: false, message: 'Invalid address' });
                }
            } catch (e) {
                resolve({ status: false, message: e.message });
            }


        }).catch((err) => {
            throw new Error(err);
        });
    };

    var subscriptionLog = function (callback) {
         const subscription = web3Provider.eth.subscribe('newBlockHeaders', (error, blockHeader) => {
            if (error) return console.error(error);

            callback(blockHeader);
        });
    };


    blockchain = {
        formatCurrency: formatCurrency,
        createAddress: createAddress,
        getWallet: getWallet,
        getBalanceEth: getBalanceEth,
        getBalanceDonate: getBalanceDonate,
        withdrawEth: withdrawEth,
        sendTransactionDonate: sendTransactionDonate,
        getTransactionReceipt: getTransactionReceipt,
        subscriptionLog: subscriptionLog,
    };
})(jQuery);