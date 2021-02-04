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


	public function selectAll($databaseTable) {

	    $statement = $this->pdo->prepare("select * from {$databaseTable}");

		//execute to fetch sql
		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS);

	}


	/*
	* @params $databaseTable
	* @params $paramaters
	*/
	public function search($databaseTable, $paramaters) {

		//implement query search logic

	}


	/*
	*  @params $databaseTable
	*  @params $parameters
	*/
	public function insert($databaseTable, $parameters) {

		$sql = sprintf('insert into %s (%s) values (%s)', $databaseTable, implode(',', array_keys($parameters)), ':' . implode(', :', array_keys($parameters)));

		$items = Helper::filter($parameters);

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
