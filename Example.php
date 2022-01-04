<?php

include_once("Streaming_API.class.php");
// for auth mode
//$api = new Streaming_API("<username>", "<password>");
$api = new Streaming_API("", "");

$streaming = $api->get_data();

echo '<h1>My Streams</h1>';
echo '<ul>';

foreach ($streaming->playlist as $item)
//foreach($streaming["playlist"] as $item)
{
    echo '<li>' . $item->title . '</li>';
	echo '<li>' . $item->tv_logo . '</li>';
}

echo '</ul>';
?>