<?php

//soley a dependency injection container class

class DIContainer {

	protected static $keys = [];

	public static function bind($key, $val) {

		static::$keys[$key] = $val;

	}


	public static function get($key) {

		if (!array_key_exists($key, static::$keys)) {
			throw new Exception($key . "is not bound to the container.");
		}

		return static::$keys[$key];

	}
}
