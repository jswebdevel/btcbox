<?php
//Thanks to everyone in this thread: https://bitcointalk.org/index.php?topic=115060.0
//This is a function that queries Blockchain's API to see what is going on at a particular address:
        function get_address_info($address, $debug = false)
        {
                $url = 'http://blockchain.info/address/' . $address . '?format=json';

                if ($debug)
                {
                        echo 'Fetching URL: '.$url.'<br/>';
                }

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_TIMEOUT, 10);
                $response = curl_exec($ch);
                curl_close($ch);

                if ($debug)
                {
                        echo '<pre>Curl Response: ';
                        print_r($response);
                        echo '</pre>';
                }

                return json_decode($response);
        }

$address = $_SESSION['pub_key'];
$address_info = get_address_info($address, false);


/*
Debug - dump data
echo "<pre>";
print_r($address_info);
echo "</pre>";
echo "<br>";
echo "<pre>";

Outputs:
hash160
address
n_tx
total_received
total_sent
final_balance
txs
*/

?>
