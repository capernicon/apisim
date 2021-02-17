<?php

namespace App\controllers;

use App\core\DIContainer;

use App\models\Helper;

class PostController {

	public function store() {

		$response = DIContainer::retrieve('database')->insert('car', $_POST);

		Helper::view('index', ['response' => Helper::jsonOutput($response)]);

	}

}
