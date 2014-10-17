btcbox
======

A very simple Bitcoin merchant solution. 

To get started you need:

MySQL
PHP (v5.X)
Medoo (www.medoo.in)

To get started, create a large number of Bitcoin public and private keys, which can be easily generated here:
www.bitaddress.org

Upload the complete .csv file to a MySQL database table. Keep it secure and offline.
Duplicate the MySQL table, and delete the private keys. This is what you'll upload to your server.

Visitors to the site visit "payment.php" where they are prompted to make a BTC payment and are given a specific amount of time to do so. The BTC public address displayed is pulled at random from a pool of (in this case) 400 addresses. 

Special thanks to:
medoo (db connector)
bitaddress.org (btc keypair generator)
blockchain.info (API for determining if payment has been received)
/u/ WorldOfBitcoin on bitcointalk.org
/u/ payb.tc on bitcointalk.org
http://www.btcsatoshi.com/



