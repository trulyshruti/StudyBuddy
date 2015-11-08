<?php

class Hipchat {

	public $curl;
	public $authorization_token = "Bearer HZAhUTcb9qAXxE3HGHsMZCat8In9LfZajEaEPQqO";
	public $json = "application/json";

	public $base_url = "http://api.hipchat.com/v2";

	public function __construct() {
		// Initialize curl
		$this->curl = curl_init();

		// Set basic opts
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($this->curl, CURLOPT_USERAGENT, "StudyBuddy CURL Agent");

		// Headers
		$request_headers = array(
			"Authorization: ".$this->authorization_token,
			"Accept: ".$this->json,
			"Content-Type: ".$this->json
		);

		curl_setopt($this->curl, CURLOPT_HTTPHEADER, $request_headers);
	}


	public function get($url, array $data = [], array $extra_headers = []) {
		if (isset($extra_headers) && !empty($extra_headers))
			curl_setopt($this->curl, CURLOPT_HTTPHEADER, $extra_headers);

		// Build GET url
		if (isset($data) && !empty($data)) {
			$url .= "?";
			foreach ($data as $key=>$value)
				$url .= $key."=".$value."&";
		
			// Remove trailing &
			$url = rtrim($url, "&");
		}

		// Set the url
		curl_setopt($this->curl, CURLOPT_POST, 0);
		curl_setopt($this->curl, CURLOPT_URL, $this->base_url.$url);

		// Execute
		return curl_exec($this->curl);
	}

	public function post($url, array $data = [], array $extra_headers = []) {
		if (isset($extra_headers) && !empty($extra_headers))
			curl_setopt($this->curl, CURLOPT_HTTPHEADER, $extra_headers);

		// URL
		curl_setopt($this->curl, CURLOPT_POST, 1);
		curl_setopt($this->curl, CURLOPT_URL, $this->base_url.$url);

		// Append data
		curl_setopt($this->curl, CURLOPT_POSTFIELDS, json_encode($data));

		// Execute
		return curl_exec($this->curl);
	}

	public static $ROOM = "/room";

	public static function createRoom($roomName, $topic) {
		return ((new Hipchat())->post(Hipchat::$ROOM, [
			"name" => $roomName,
			"topic" => $topic
		]));
	}
}

?>