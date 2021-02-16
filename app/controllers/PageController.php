<?php

class PageController {

	public static $url = "APISim.online/car/";

	public function index() {

		$example = DIContainer::retrieve('database')->select('example');

		Helper::view('index', ['exampleResponse' => Helper::jsonOutput($example)]);

	}

}
