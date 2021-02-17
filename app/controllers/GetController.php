<?php

namespace App\controllers;

use App\core\DIContainer;

use App\models\Helper;

class GetController {

	public function retrieve() {

		$response = DIContainer::retrieve('database')->search('car', Helper::filterQuery($_SERVER['QUERY_STRING']));

		Helper::view('index', ['response' => Helper::jsonOutput($response)]);

	}

}
