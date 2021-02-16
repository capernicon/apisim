<?php

class Connect {

	public static function create($databaseConfig) {

		try {

			return new PDO(
				$databaseConfig['connection'] . ';dbname=' . $databaseConfig['name'],
				$databaseConfig['username'],
				$databaseConfig['password']
			);

		}

		catch (DatabaseConnection $exception) {

			echo $exception;

		}

	}

}
