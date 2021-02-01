<?php

//The router should handle ($_GET, $_POST) requests from the user THEN proceed to controller to be actioned.

class Router {
	//post = form to db, get = retreive from db
	public $routes = ['POST' => [], 'GET' => []];


    public static function load($file) {

		$router = new self;

    	require $file;

		return $router;
	}


	public function define($routes) {

		$this->routes = $routes;

	}


	public static function uri() {

		return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

	}


	public function direct($uri, $request) {

		if (array_key_exists($uri, $this->routes[$request])) {
			return $this->callAction(
			  ...explode('/', $this->routes[$request][$uri])
			);
		}

	}


	public static function method() {

		return $_SERVER['REQUEST_METHOD']; //return GET OR POST

	}


	public function post($uri, $controller) {

		$this->routes['POST'][$uri] = $controller;

	}


	public function get($uri, $controller) {

		$this->routes['GET'][$uri] = $controller;

	}


	protected function callAction($controller, $action) {

		$controller = new $controller;

		if (!method_exists($controller, $action)) {
			throw new Exception("{$controller} does not respond to {$action} action.");
		}

		return $controller->$action();
	}

}
