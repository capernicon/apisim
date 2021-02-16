<?php

class Helper {

	public static function jsonOutput($response) {

		return json_encode($response, JSON_PRETTY_PRINT);

	}


	public static function filterQuery($parameters) {

		define("SEARCH_QUERY", 0);

		define("SEARCH_VALUE", 1);

		parse_str($parameters, $queries);

		foreach($queries as $string) {

			$substring = explode("&", $string);

		}

		$values = [];

		foreach($substring as $string) {

   	 		$strip = explode("=", $string);

    		$values[$strip[SEARCH_QUERY]] = $strip[SEARCH_VALUE];

		}

		return $values;

	}


	/*
	*	@params $parameters
	*	//serialize options array
	*/
	public static function filterOptionsParameter($input) {

		foreach ($input as $post => $value) {

			if (is_array($value)) {

				$input[$post] = json_encode($value);

			}
		}

		return $input;

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
