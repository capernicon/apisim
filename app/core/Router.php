<?php

class Router {

	public $routes = [
		'POST' => [],
		'GET' => []
	];


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
			return $this->action(
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


	protected function action($controller, $action) {

		$controller = new $controller;

		if (!method_exists($controller, $action)) {

			throw GeneralHandler::ControllerActionFailure($controller, $action);

		}

		return $controller->$action();
	}

}
