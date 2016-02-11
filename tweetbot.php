#!/usr/bin/env php
<?
date_default_timezone_set("America/New_York");
require_once("twitter-connect.php");

$wait_seconds = rand(0, 59);
echo $wait_seconds."\n";
sleep($wait_seconds);

// filename
$time = date("h.i.s");
$file = "/usr/www/users/reinfurt/tweetbot/clocks/1x1/".$time.".gif";
$can_tweet = true;

// convert file via imagemagick
$cropped = "/usr/www/users/reinfurt/tweetbot/clocks/16x9/".$time.".gif";
$border = "380x0"; // file needs to be extended by 380 pixels on both sides
shell_exec("convert $file -bordercolor White -border $border $cropped");

$v = ($argv[1] == "verbose" or $argv[1] == "v");
if($v)
{
	// should build this url programmatically from return JSON
	$tweet_url = "https://twitter.com/O_R_G_now/status/";
}

if($connection && $can_tweet)
{
	$media = $connection->upload('media/upload', ['media' => $cropped]);
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