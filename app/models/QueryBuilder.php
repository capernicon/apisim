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
	* @params $paramaters
	*/
	public function search($databaseTable, $paramaters) {

		//our logic will go here which searches database against $_GET result

	}

	/*
	*  @params $databaseTable
	*  @params $paramaters
	*/
	public function insert($databaseTable, $paramaters) {

		$sql = sprintf('insert into %s (%s) values %s', $databaseTable, implode(', ', array_keys($paramaters)), ':' . implode(', :', array_keys($paramaters)));

		try {

			$statement = $this->pdo->prepare($sql);
			$statement->execute($paramaters);

		}
		catch(Exception $exception) {

			die($exception->getMessage());

		}
	}

}
