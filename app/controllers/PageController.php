<?php

namespace App\controllers;

use App\core\DIContainer;

use App\models\Helper;

class PageController {

	public static $url = "APISim.online/car/";

	public function index() {

		$example = DIContainer::retrieve('database')->select('example');

		Helper::view('index', ['exampleResponse' => Helper::jsonOutput($example)]);

	}

}
