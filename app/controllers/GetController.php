<?php

class GetController {

	// pass the $_GET request to search for a match in database
	public function retrieve() {

		$cars = DIContainer::get('database')->selectAll('car');

		Helper::view('index', ['cars' => $cars]);

	}

}
