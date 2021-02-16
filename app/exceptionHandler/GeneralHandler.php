<?php

class GeneralHandler extends Exception {

	public static function DIContainerRetrieveKeyFailure($key) {

		return new static ($key . " is not bound to the container.");

	}


	public static function ControllerActionFailure($controller, $action) {

		return new static ($controller . "does not respond to" . $action);

	}


}
