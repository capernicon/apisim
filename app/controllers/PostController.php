<?php

class PostController {

	public function store() {

		$response = DIContainer::retrieve('database')->insert('car', $_POST);

		Helper::view('index', ['response' => Helper::jsonOutput($response)]);

	}

}
