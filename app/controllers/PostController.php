<?php

class PostController {

	public function store() {

		$response = DIContainer::get('database')->insert('car', $_POST);
		Helper::view('index', ['response' => Helper::encode($response)]);

	}

}
