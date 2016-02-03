#!/usr/bin/env php
<?
date_default_timezone_set("America/New_York");
require_once("twitter-connect.php");

// filename
$time = date("h.i.s");
$file = "clocks/".$time.".gif";
$can_tweet = true;

$v = ($argv[1] == "verbose" or $argv[1] == "v");
if($v)
{
	// should build this url programmatically from return JSON
	$tweet_url = "https://twitter.com/org_clock/status/";
}

if($connection && $can_tweet)
{
	$media = $connection->upload('media/upload', ['media' => $file]);
	// to add text, use 'status' => 'TWEET TEXT'
	$parameters = [
		// 'status' => $time
		'media_ids' => implode(',', [$media->media_id_string]),
	];
	$result = $connection->post('statuses/update', $parameters);
	
	if($v)
		echo $tweet_url.$result->id_str."\n";
}
else if($v)
	echo "tweet not sent.\n";
?>