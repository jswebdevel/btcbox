<head>
<style>
img {
width:100%;
max-width:400px;
}
</style>
</head>

<?php
session_start();

require_once 'medoo.min.php'; //DB connector
$database = new medoo(); //Create new db object

//Debug: display the results

/*
1 Satoshi 	= 0.00000001 ฿
10 Satoshi 	= 0.00000010 ฿
100 Satoshi 	= 0.00000100 ฿
1,000 Satoshi 	= 0.00001000 ฿
10,000 Satoshi 	= 0.00010000 ฿
100,000 Satoshi 	= 0.00100000 ฿
1,000,000 Satoshi 	= 0.01000000 ฿
10,000,000 Satoshi 	= 0.10000000 ฿
100,000,000 Satoshi 	= 1.00000000 ฿
*/


include 'btc_functions.php';

//ALL IN SATOSHI (int)
$num_coins = $address_info->total_received;
//$num_coins = 5000; //Testing
$final_balance = $address_info->final_balance;
$total_received = $address_info->total_received;
//$total_received = 5000; //Testing


echo "Number of Satoshis received: " . $total_received . "<br /><br />";

if ($num_coins == 0) {
	echo "You didn't send any Bitcoin at all :( <br />";
	echo "<img src=/btcbox/images/1413427652607s.jpg>";
} else if ($num_coins <= 5000) {
	echo "Thanks buddy, you're cool!<br />";

		$img_datas = $database->select("images", ["id","filepath"], ["id[==]" => 1]);
		foreach($img_datas as $img_data)
		{
		echo "<img src=/btcbox/images/".$img_data["filepath"].">";
		}
} else if ($num_coins <= 100000) {
	echo "Wow, you're awesome! Feast your eyes on this cute thing!<br />";

		$img_datas = $database->select("images", ["id","filepath"], ["id[==]" => 3]);
		foreach($img_datas as $img_data)
		{
		echo "<img src=/btcbox/images/".$img_data["filepath"].">";
		}
} else if ($num_coins <= 250000) {
	echo "MAXMIMUM LEVEL ACHIEVED! YOU RULE!! Here's some sage advice I'll share with you: <br />";

		$img_datas = $database->select("images", ["id","filepath"], ["id[==]" => 4]);
		foreach($img_datas as $img_data)
		{
		echo "<img src=/btcbox/images/".$img_data["filepath"].">";
		}
}
?>

<form action="/btcbox/index.php" method="post">
<br /><input type="submit" value="Give me another chance!">
</form>
