<?php

class PageController {

	public function index() {

		$prefilled['status'] = "sample";
		$prefilled['data'] = $array = ["make" => "Ford", "type" => "Hatch", "colour" => "Red", "year" => "1990"];

		Helper::view('index', ['response' => Helper::sanitize($prefilled)]);

	}

}
