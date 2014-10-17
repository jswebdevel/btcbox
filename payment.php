<?php
//The user visits this page and receives a "pay to" address. If they don't pay, they are redirected automatically.
//If they do pay, they click the button saying so and the payment is verified (or denied) on the following page.

session_start(); //Start session
require_once 'medoo.min.php'; //DB connector
$database = new medoo(); //Create new db object
$temp_rand = mt_rand(1, 400); //Adjust upper limit according to number of BTC addresses available

//Query the db and display the public key of the random number
$datas = $database->select("btc", [
"id",
"public_key"
], [
"id[==]" => $temp_rand
]);

//Debug: display the results
foreach($datas as $data)
{
echo "Want to see something cool? <br /><br />Send a few Satoshis to this address: " . $data["public_key"] . "<br/>";
echo "<br />Now wait a second or two and then click this button:<br />";
}

$_SESSION['pub_key'] = $data["public_key"];
$_SESSION['temp_rand_num'] = $temp_rand;
?>

<!--Lets user override the timer after paying-->
<form action="result.php" method="post">
<input type="submit" value="BTC sent, show me something!">
</form>

<!--Timer-->
<div>Time remaining to pay:</div><div id="countdown"></div>
<script src="timer.js"></script>

<!--Public Key to pay to-->
<?php //echo $_SESSION['pub_key']; ?>

<!--Redirects after a 60 second pause-->
<meta http-equiv="refresh" content="60;url=/btcbox/index.php">
