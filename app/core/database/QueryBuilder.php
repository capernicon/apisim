<?php

class QueryBuilder {
	
	protected $pdo;


	//initialise a new PDO
	public function __construct($pdo) {

		$this->pdo = $pdo;

	}


	public function selectAll($databaseTable) {

		$statement = $this->pdo->prepare("select * from " . $databaseTable);

		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS);

	}


	public function insert($databaseTable, $paramaters) {

		//sprintf is a C language function that allows values to be passed in in place of the data type placeholder
		$sql = sprintf('insert into %s (%s) values %s', $databaseTable, implode(', ', array_keys($paramaters)), ':' . implode(', :', array_keys($paramaters)));

		//atempt to make the query to database. Throw exception otherwise
		try {

			$statement = $this->pdo->prepare($sql);

			$statement->execute($paramaters);

		}
		catch(Exception $exception) {

			die($exception->getMessage());

		}
	}

}
