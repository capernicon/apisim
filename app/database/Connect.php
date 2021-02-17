<?php

namespace App\database;

use PDO;

class Connect {

	public static function create($databaseConfig) {

		try {

			return new PDO(
				$databaseConfig['connection'] . ';dbname=' . $databaseConfig['name'],
				$databaseConfig['username'],
				$databaseConfig['password']
			);

		}

		catch (DatabaseConnection $e) {

			echo $e;

		}

	}

}
