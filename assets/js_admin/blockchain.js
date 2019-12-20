
var urlBase = 'https://ropsten.infura.io/v3/cde205b23d7d4a998f4ee02f652355b0';
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
                const web3Url = new Web3.providers.HttpProvider(urlBase);

                web3Provider = new Web3(web3Url);

                const options = {
                    gasPrice: 3000000,
                };

                abi = await loadJSON();

                contract = new web3Provider.eth.Contract(abi, contractAddress, options);
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
            var url = base_ajax + '/utils/account';
            $.ajax({
                url: url,
                type: "GET",
                success: function (response) {
                    if (response.code === 200) {
                        resolve(response.data);

                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error('can not get user from server!!!');
                    reject('can not get user from server!!!');
                }
            });
        });
    };

    blockchain = {
        createAddress: createAddress,
        getAccount: getAccount,
    };
})(jQuery);