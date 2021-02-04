<?php

class Helper {

	/*
	*	@params $paramaters
	*	//helper function to filter $_POST values
	*/
	public static function filter($paramaters) {

		$items = [];

		foreach ($paramaters as $post => $value) {
			if (is_array($value)) {
				$items[$post] = json_encode($value);
			}
			else {
				$items[$post] = $value;
			}
		}

		return $items;

	}


	public static function view($page, $data = []) {

		extract($data);

    	return require __DIR__ . "/../views/home/{$page}.view.php";

	}


	public static function httpResponse($code, $data = []) {

		http_response_code($code);

		return $data;

	}


	public static function encode($response) {

		return json_encode($response, JSON_PRETTY_PRINT);

	}

}
