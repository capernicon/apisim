<?php

class GetController {

	public function retrieve() {

		$response = DIContainer::get('database')->search('car', Helper::query($_SERVER['QUERY_STRING']));
		Helper::view('index', ['response' => Helper::sanitize($response)]);

	}

}
