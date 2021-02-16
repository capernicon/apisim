<?php

class QueryBuilder {

	protected $pdo;

	/*
	* @params $pdo
	*
	*/
	public function __construct(PDO $pdo) {

		$this->pdo = $pdo;

	}

	/*
	* @params $databaseTable
	*
	*/
	public function select($databaseTable) {

	  	$statement = $this->pdo->prepare("select * from {$databaseTable}");

		try {

			$statement->execute();

			$response = $statement->fetchAll(PDO::FETCH_CLASS);

		}

		catch (Exception $exception) {

			echo $exception;

		}

		return Helper::httpResponse(
			200,
			['status' => 'example',
			'data' => $response]
		);

	}


	/*
	* @params $databaseTable
	* @params $parameters
	*/
	public function search($databaseTable, $parameters) {

		define("MULTIPLE_INPUT", 1);

		$keys = array_keys($parameters);

		//add first key, value to the statement
		$sql = 'select * from ' . $databaseTable . ' where ' . $keys[0] . ' = ' . ':' . $parameters[$keys[0]];

		//more input so lets add it to the query
		if ((count($parameters)) > MULTIPLE_INPUT) {

			$sql .= QueryBuilder::buildUp($parameters, $keys, $sql);

		}

		try {

			$statement = $this->pdo->prepare($sql);

			//bind the passing in search
			foreach ($parameters as &$value) {

    			$statement->bindParam($value, $value);
			}

			$statement->execute();

			$response = $statement->fetchAll(PDO::FETCH_ASSOC);

		}

		catch (Exception $exception) {

			echo $exception;

		}

		return Helper::httpResponse(
			200,
			['status' => 'ok',
			'data' => $response]
		);

	}


	/*
	*  @params $databaseTable
	*  @params $parameters
	*/
	public function insert($databaseTable, $parameters) {

		$sql = sprintf('insert into %s (%s) values (%s)', $databaseTable, implode(',', array_keys($parameters)), ':' . implode(', :', array_keys($parameters)));

		$input = Helper::filterOptionsParameter($parameters);

		try {

			$statement = $this->pdo->prepare($sql);

			$statement->execute($input);

		}

		catch (Exception $exception) {

			echo $exception;

		}

		return Helper::httpResponse(
			201,
			['status' => 'created',
			'data' => $parameters]
		);

	}


	protected function buildUp($parameters, $keys) {

		$query = '';
		$string = '';

		for ($iterator = 1; $iterator < count($parameters); $iterator++) {

			$string = " and " . $keys[$iterator] . " = " . ':' . $parameters[$keys[$iterator]];

			$query .= $string;

		}

		return $query;

	}

}
