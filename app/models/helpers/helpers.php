<?php

/*
*	@params $paramaters
*	//helper function to filter $_POST values
*/
function filter($paramaters) {

	$items = [];

	foreach ($paramaters as $post => $value) {
		if (is_array($value)) {
			$items[$post] = json_encode($value);
		}
		else {
			$items[$post] = $value;
		}
	}

	return $items;

}
