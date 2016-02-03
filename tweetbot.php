<?
require_once("twitter-connect.php");

// filename
$file = "time.png";
$can_tweet = true;

// should build this url programmatically from return JSON
$tweet_url = "https://twitter.com/org_clock/status/";

if($connection && $can_tweet)
{
	$media = $connection->upload('media/upload', ['media' => $file]);
	// to add text, use 'status' => 'TWEET TEXT'
	$parameters = [
		// 'status' => $time
		'media_ids' => implode(',', [$media->media_id_string]),
	];
	$result = $connection->post('statuses/update', $parameters);

	$can_tweet = false;
	echo $tweet_url.$result->id_str."\n";
}
else
	echo "tweet not sent.\n";

// delete generated image
unlink($file);
?>