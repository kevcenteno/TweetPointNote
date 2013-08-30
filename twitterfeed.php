<?php
session_start();
require_once("twitteroauth/twitteroauth.php"); //Path to twitteroauth library
 
$search = "%23[SOME HASH TAG]";
$notweets = 2;
$consumerkey = "[YOUR KEY]";
$consumersecret = "[YOUR SECRET]";
$accesstoken = "[YOUR TOKEN]";
$accesstokensecret = "[YOUR TOKEN SECRET]";
 
function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}
 
$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
  
$tweets = $connection->get("https://api.twitter.com/1.1/search/tweets.json?q=".$search."&count=".$notweets);
  
echo json_encode($tweets);
?>