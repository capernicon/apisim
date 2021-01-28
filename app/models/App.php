<?php

class App {

	protected static $register = [];

	public static function bind($keyVal, $val) {

		static::$register[$keyVal] = $val;

	}


	public static function get($keyVal) {

		if (!array_key_exists($keyVal, static::$register)) {
			throw new Exception($keyVal . "not bound to the container.");
		}

		return static::$register[$keyVal];

	}
}
