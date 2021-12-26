from web3 import Web3
import config

#create file config.py input your private key

bsc = "https://bsc-dataseed.binance.org/"
web3 = Web3(Web3.HTTPProvider(bsc))

me = "0x82827"
toe = "0x90909"

balance = web3.eth.get_balance(me)
getBal = web3.fromWei(balance, 'ether')
print(f"Balance BNB: {getBal}")

nonce = web3.eth.getTransactionCount(me)
tx = {
    'nonce': nonce,
    'to': toe,
    'value': web3.toWei(0.0001, 'ether'),
    'gas': 21000,
    'gasPrice': web3.toWei('50', 'gwei')
}
signed_tx = web3.eth.account.signTransaction (tx, config.private_key)
tx_hash = web3.eth.sendRawTransaction(signed_tx.rawTransaction)
print(f"Transaction has been sent to {toe}")
#print("Trx Hash " + web3.toHex(tx_hash))
