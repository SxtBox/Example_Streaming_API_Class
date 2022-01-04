<?php

class Streaming_API {
    private $_username, $_password;

    public function __construct($username, $password) {
        $this->_username = $username;
        $this->_password = $password;
    }

    /*
     * AUTH Methods
     */
    public function __call($method, $params) {
        $params = array_merge(array($this->_username, $this->_password), $params);
        //$request = xmlrpc_encode_request($method, $params); // xmlrpc_encode_request OUT IN PHP8
        $request = json_encode(array($method, $params)); // EXTRA
        return $this->get_data($request);
    }

    /*
     * Get XML/JSON/ANY DATA https://www.php.net/manual/en/function.stream-context-create.php
     */
    private function get_data($url) {
        $context = stream_context_create(array(
		"http" => array(
		"method" => "POST", // GET/POST
		"header" => "Content-Type: application/json",
		"content" => $url
		)));
		$get_data = file_get_contents("euro_dance.json", false, $context);
        $data = json_decode($get_data); // for foreach
        //$data = xmlrpc_decode($get_data); // xmlrpc OUT IN PHP8
        return $data;
    }
}