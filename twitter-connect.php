<?
/*
 * this script connects the the twitter REST API for the 
 * account @org_clock and sets the variable $connection
 */
require "twitteroauth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

$num_tweets = 1;

$consumer_key = "LD4l6oW7wnEr9pYkHAh7Mo0Si";
$consumer_secret = "61hbY73neHGtZ6fEZst6r2aHVP2afs2wipExRveEtMoXhZEqcK";
$access_token = "4830426515-UlISOApGKR3qEJ75LyzWPnsesJ1C3jninqM9zT3";
$access_token_secret = "qHcWRYgTz9qgj4t4VXBngsq3903uW5kCOMRZkOMDz0QBS";

try {
	$connection = new TwitterOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);
}
catch(Exception $e) {
	$connection = false;
}
?>