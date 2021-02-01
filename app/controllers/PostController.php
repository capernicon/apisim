<?php

class PostController {

	public function store() {

		DIContainer::get('database')->insert('car', $_POST);

		Helper::view(index);
	}

}
