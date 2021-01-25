<?php

require_once '../core/core.php';

class UserController {

	public function index() {

		$users = App::get('database')->selectAll('car');

		var_dump($users);

	}

}
