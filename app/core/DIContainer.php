<?php

namespace App\core;

use App\exceptionHandler;

//soley a dependency injection container class

class DIContainer {

	protected static $keys = [];


	public static function bind($key, $val) {

		static::$keys[$key] = $val;

	}


	public static function retrieve($key) {

		if (!array_key_exists($key, static::$keys)) {

			throw GeneralHandler::DIContainerRetrieveKeyFailure($key);

		}

		return static::$keys[$key];

	}
}
