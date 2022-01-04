<?php
// https://www.php.net/manual/en/function.stream-context-create.php
function get_data($url) {
        $context = stream_context_create(array(
		"http" => array(
		"method" => "POST", // GET/POST
		"header" => "Content-Type: application/json",
		"content" => $url
		)));
        $get_data = file_get_contents("euro_dance.json", false, $context);
        $data = $get_data;
        //$data = json_decode($get_data); // for foreach
        return $data;
    }

$data = get_data(null);
echo $data;
//echo get_data(""); // or this