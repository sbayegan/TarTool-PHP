<?php

include('EpiCurl.php');
include('EpiOAuth.php');
include('EpiTwitter.php');
include('twittersecret.php');

$twitterObj = new EpiTwitter($consumer_key, $consumer_secret);

$authenticateUrl = $twitterObj->getAuthenticateUrl();

/* Redirect to the Twitter login page */
header('Location: '.$authenticateUrl.'');

?>
