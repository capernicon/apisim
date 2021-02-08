<?php

class Helper {

	public static $url = "APISim.online/car/";


	/*
	*	@params $parameters
	*	//serialize options array
	*/
	public static function serialize($input) {

		foreach ($input as $post => $value) {
			if (is_array($value)) {
				$input[$post] = serialize($value);
			}
		}

		return $input;

	}


	public static function unserialize($response) {

		for ($iterator = 0; $iterator < count($response); $iterator++) {

			$response[$iterator]['options'] = unserialize($response[$iterator]['options']);

		}

		return $response;

	}


	public static function sanitize($response) {

		return json_encode($response, JSON_PRETTY_PRINT);

	}


	public static function query($parameters) {

		parse_str($parameters, $queries);

		foreach($queries as $string) {
			$substring = explode("&", $string);
		}

		$values = [];

		foreach($substring as $string) {
   	 		$strip = explode("=", $string);
    		$values[$strip[0]] = $strip[1];
		}

		return $values;

	}


	public static function view($page, $data = []) {

		extract($data);

    	return require __DIR__ . "/../views/home/{$page}.view.php";

	}


	public static function httpResponse($code, $data = []) {

		http_response_code($code);

		return $data;

	}

}
