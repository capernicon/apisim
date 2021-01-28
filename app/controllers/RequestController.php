<?php

require_once __DIR__ . '/../core/bootstrap.php';

class RequestController {

	// pass the $_GET request to search for a match in database
	public function search() {

	}


	public function index() {

		// call to QueryBuilder to selectAll
		$users = App::get('database')->selectAll('car');

		return json_encode($users, JSON_PRETTY_PRINT);

	}

	//store the $_POST(form) into the DB
	/***
	public function store() {
		App::get('database')->insert('car', [ 	//calls QueryBuilder
		  'name' => $_POST['name'];
		]);

		return redirect(home);
	}
	***/

}
