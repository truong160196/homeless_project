/**
 *Submitted for verification at Etherscan.io on 2019-25-12
*/

pragma solidity ^0.4.24;
pragma experimental ABIEncoderV2;

contract Token {

    /// @return total amount of tokens
    function totalSupply() constant returns (uint256 supply) {}

    /// @param _owner The address from which the balance will be retrieved
    /// @return The balance
    function balanceOf(address _owner) constant returns (uint256 balance) {}

    /// @notice send `_value` token to `_to` from `_from` on the condition it is approved by `_from`
    /// @param _from The address of the sender
    /// @param _to The address of the recipient
    /// @param _value The amount of token to be transferred
    /// @return Whether the transfer was successful or not
    function transferFrom(address _from, address _to, uint256 _value) returns (bool success) {}

    /// @notice `msg.sender` approves `_addr` to spend `_value` tokens
    /// @param _spender The address of the account able to transfer the tokens
    /// @param _value The amount of wei to be approved for transfer
    /// @return Whether the approval was successful or not
    function approve(address _spender, uint256 _value) returns (bool success) {}

    /// @param _owner The address of the account owning tokens
    /// @param _spender The address of the account able to transfer the tokens
    /// @return Amount of remaining tokens allowed to spent
    function allowance(address _owner, address _spender) constant returns (uint256 remaining) {}

    /// @notice send `_value` token to `_to` from `msg.sender`
    /// @param _to The address of the recipient
    /// @param _value The amount of token to be transferred
    /// @return Whether the transfer was successful or not
    function transfer(address _to, uint256 _value) returns (bool success) {}

    event Transfer(address indexed _from, address indexed _to, uint256 _value);
    event Approval(address indexed _owner, address indexed _spender, uint256 _value);
    event UpdateAccount(address indexed _address, string user_name, address _homeless_address);
    event PaymentStore(address indexed _address, address _to_address, uint256 total);
    event UpdateCharity(address indexed _address, uint256 goal, uint256 raised);
    event PaymentAuction(address indexed _address, uint256 item, uint256 goal, uint256 raised);
}


contract StandardToken is Token {
     struct Account {
          string user_name;
          address _address;
          uint256 spending_limit;
     }

    struct Charity  {
          uint256 goal;
          uint256 raised;
     }

    struct Auction {
          string item;
          uint256 goal;
          uint256 raised;
     }

    function transfer(address _to, uint256 _value) returns (bool success) {
        //Default assumes totalSupply can't be over max (2^256 - 1).
        //If your token leaves out totalSupply and can issue more tokens as time goes on, you need to check if it doesn't wrap.
        //Replace the if with this one instead.
        //if (balances[msg.sender] >= _value && balances[_to] + _value > balances[_to]) {
        if (balances[msg.sender] >= _value && _value > 0) {
            balances[msg.sender] -= _value;
            balances[_to] += _value;
            Transfer(msg.sender, _to, _value);
            return true;
        } else { return false; }
    }

    function transferFrom(address _from, address _to, uint256 _value) returns (bool success) {
        //same as above. Replace this line with the following if you want to protect against wrapping uints.
        //if (balances[_from] >= _value && allowed[_from][msg.sender] >= _value && balances[_to] + _value > balances[_to]) {
        if (balances[_from] >= _value && allowed[_from][msg.sender] >= _value && _value > 0) {
            balances[_to] += _value;
            balances[_from] -= _value;
            allowed[_from][msg.sender] -= _value;
            Transfer(_from, _to, _value);
            return true;
        } else { return false; }
    }


    function balanceOf(address _owner) constant returns (uint256 balance) {
        return balances[_owner];
    }

    function approve(address _spender, uint256 _value) returns (bool success) {
        allowed[msg.sender][_spender] = _value;
        Approval(msg.sender, _spender, _value);
        return true;
    }

    function allowance(address _owner, address _spender) constant returns (uint256 remaining) {
      return allowed[_owner][_spender];
    }


    function getAddressHomeless (address _address_homeless, address _address) returns (uint idex, bool status){
      for (uint i; i < accounts[_address_homeless].length; i++){
          if (accounts[_address_homeless][i]._address == _address)
          return (i, true);
      }

      return (0, false);
    }

    function updateAccount(address _address, address _homeless_address, string _user_name, uint256 spending_limit) returns (bool success) {
        Account memory account = Account(_user_name, _address, spending_limit);

        (uint idCheck, bool status) = getAddressHomeless(_homeless_address, _address);

        if (status == true && idCheck >= 0) {
            accounts[_homeless_address].push(account);

            UpdateAccount(_address, _user_name, _homeless_address);
            return true;
        } else {
           return false;
        }
    }

    function getAccount(address _address) public view returns (Account[]) {
        return accounts[_address];
    }

    function paymentStore(address _address_homeless, address _to_address, uint256 total) returns (bool success) {
        uint256 valueTranfer = total;
        require(balances[_address_homeless] >= valueTranfer, "Not enough money sent.");
        if (balances[_address_homeless] >= valueTranfer && valueTranfer > 0) {
             (uint idCheck, bool status) = getAddressHomeless(_address_homeless, msg.sender);
            if (status == true && idCheck >= 0) {
                uint256 limitSpending =  accounts[_address_homeless][idCheck].spending_limit;

                if (limitSpending >= valueTranfer) {
                    PaymentStore(_address_homeless, _to_address, valueTranfer);
                    transferFrom(_address_homeless, _to_address, valueTranfer);
                    return true;
                } else {
                    return false;
                }
            } else {
               return false;
            }
        } else {
            return false;
        }
    }

    function donate(address _address_homeless, uint256 value) returns (bool success) {
        uint256 valueTranfer = value;
        require(balances[msg.sender] >= valueTranfer, "Not enough money sent.");
        if (balances[msg.sender] >= valueTranfer && valueTranfer > 0) {
           charitys[_address_homeless].raised += valueTranfer;
           transfer(_address_homeless, valueTranfer);
            return true;
        } else {
            return false;
        }
    }

    function updateCharity(address _homeless_address, uint256 goal, uint256 raised) returns (bool success) {
        Charity memory charity = Charity(goal, raised);

        charitys[_homeless_address] = charity;

        UpdateCharity(_homeless_address, goal, raised);
    }

    function getCharity(address _homeless_address) public view returns (Charity) {
        return charitys[_homeless_address];
    }

    function auction(address _address_homeless, uint256 value, uint256 _id) returns (bool success) {
        uint256 valueTranfer = value;
        require(balances[msg.sender] >= valueTranfer, "Not enough money sent.");
        if (balances[msg.sender] >= valueTranfer && valueTranfer > 0) {
            auctions[_address_homeless].raised += valueTranfer;
            transfer(_address_homeless, valueTranfer);
        } else {
            return false;
        }
    }

    function updateAuction(address _homeless_address, string item, uint256 goal, uint256 raised) returns (bool success) {
        Auction memory auction = Auction(item, goal, raised);

        auctions[_homeless_address] = auction;

        updateAuction(_homeless_address, item, goal, raised);
    }

    function getAuction(address _homeless_address) public view returns (Auction) {
        return auctions[_homeless_address];
    }

    mapping (address => uint256) balances;
    mapping (address => mapping (address => uint256)) allowed;
    mapping (address => Account[]) accounts;
    mapping (address => Charity) charitys;
    mapping (address => Auction) auctions;
    uint256 public totalSupply;
    address public owner;
}


//name this contract whatever you'd like
contract ERC20Token is StandardToken {

    function () {
        //if ether is sent to this address, send it back.
        throw;
    }

    /* Public variables of the token */

    /*
    NOTE:
    The following variables are OPTIONAL vanities. One does not have to include them.
    They allow one to customise the token contract & in no way influences the core functionality.
    Some wallets/interfaces might not even bother to look at this information.
    */
    string public name;                   //fancy name: eg Simon Bucks
    uint8 public decimals;                //How many decimals to show. ie. There could 1000 base units with 3 decimals. Meaning 0.980 SBX = 980 base units. It's like comparing 1 wei to 1 ether.
    string public symbol;                 //An identifier: eg SBX
    string public version = 'H1.0';       //human 0.1 standard. Just an arbitrary versioning scheme.
    address public owner;

//
// CHANGE THESE VALUES FOR YOUR TOKEN
//

//make sure this function name matches the contract name above. So if you're token is called TutorialToken, make sure the //contract name above is also TutorialToken instead of ERC20Token

    function ERC20Token(
        ) {
        balances[msg.sender] = 1000000000000 * (uint256(10) ** 2);               // Give the creator all initial tokens (100000 for example)
        totalSupply = 1000000000000 * (uint256(10) ** 2);                        // Update total supply (100000 for example)
        name = "Homeless Fund";                                   // Set the name for display purposes
        decimals = 2;                            // Amount of decimals for display purposes
        symbol = "USD";                            // Set the symbol for display purposes
        owner = msg.sender;
    }

    /* Approves and then calls the receiving contract */
    function approveAndCall(address _spender, uint256 _value, bytes _extraData) returns (bool success) {
        allowed[msg.sender][_spender] = _value;
        Approval(msg.sender, _spender, _value);

        //call the receiveApproval function on the contract you want to be notified. This crafts the function signature manually so one doesn't have to include a contract in here just for this.
        //receiveApproval(address _from, uint256 _value, address _tokenContract, bytes _extraData)
        //it is assumed that when does this that the call *should* succeed, otherwise one would use vanilla approve instead.
        if(!_spender.call(bytes4(bytes32(sha3("receiveApproval(address,uint256,address,bytes)"))), msg.sender, _value, this, _extraData)) { throw; }
        return true;
    }
}