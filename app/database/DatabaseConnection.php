<?php

class Connection {

	public static function create($databaseConfig) {

		try {
			return new PDO(
				$databaseConfig['connection'] . ';dbname=' . $databaseConfig['name'],
				$databaseConfig['username'],
				$databaseConfig['password']
			);
		}

		catch (PDOEXCEPTION $exception) {
			die($exception->getMessage());
		}

	}
}
