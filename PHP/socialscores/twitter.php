<?php
$url = $_GET['URL'];
	if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {$url = "http://" . $url;}
$score = 0;
$counter = "http://free.sharedcount.com/url?apikey=cdf41646515ec58a3822dde01b7bb862b80cd8d8&url=".$url;
$response = file_get_contents($counter);
$decode = json_decode($response,true);
//$linkedin = $decode["LinkedIn"];
//$facebook = $decode["Facebook"]["share_count"];
$twitter =  $decode["Twitter"];
echo $twitter;
?>
