<?php

class QueryBuilder {

	protected $pdo;

	/*
	* @params $pdo
	*
	*/
	public function __construct($pdo) {

		$this->pdo = $pdo;

	}


	/*
	* @params $databaseTable
	* @params $parameters
	*/
	public function search($databaseTable, $parameters) {

		define("MULTIPLE_INPUT", 1);

		$keys = array_keys($parameters);

		$count = count($parameters);

		//add first key, value to the statement
		$sql = 'select * from ' . $databaseTable . ' where ' . $keys[0] . ' = ' . ':' . $parameters[$keys[0]];

		//more input so lets add it to the query
		for ($iterator = 1; $iterator < $count; $iterator++) {

			if ($count > MULTIPLE_INPUT) {

				$string = " and " . $keys[$iterator] . " = " . ':' . $parameters[$keys[$iterator]];

				$sql .= $string;

			}
		}

		try {

			$statement = $this->pdo->prepare($sql);

			//bind the passing in search
			foreach ($parameters as $value) {

				$statement->bindParam(':' . $value, $value);

			}

			$statement->execute();

			$query = $statement->fetchAll(PDO::FETCH_ASSOC);

		}

		catch (Exception $exception) {

			die("An error occured trying to perform this action.");

		}

		//unserialize the options array
		$response = Helper::unserialize($query);

		return Helper::httpResponse(
			200,
			['status' => 'ok',
			 'count' => count($response),
			'data' => $response]
		);

	}


	/*
	*  @params $databaseTable
	*  @params $parameters
	*/
	public function insert($databaseTable, $parameters) {

		$sql = sprintf('insert into %s (%s) values (%s)', $databaseTable, implode(',', array_keys($parameters)), ':' . implode(', :', array_keys($parameters)));

		$items = Helper::serialize($parameters);

		try {

			$statement = $this->pdo->prepare($sql);

			$statement->execute($items);

		}

		catch(Exception $exception) {

			die("An error occured trying to perform this action.");

		}

		return Helper::httpResponse(
			201,
			['status' => 'created',
			'data' => $parameters]
		);

	}

}
