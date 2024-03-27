<?php 

namespace Classes\DB;

class Sql {

	const HOSTNAME = "172.30.0.3";
	const PORT = "5432";
	const USERNAME = "postgres";
	const PASSWORD = "P@ssw0rd";
	const DBNAME = "soft_expert";

	private $conn;

	public function __construct()
	{

		$this->conn = new \PDO(
			"pgsql:host=".Sql::HOSTNAME.";port=".Sql::PORT.";dbname=".Sql::DBNAME, 
			Sql::USERNAME,
			Sql::PASSWORD
		);

	}


	private function setParams($statement, $parameters = array())
	{

		foreach ($parameters as $key => $value) {
			
			$this->bindParam($statement, $key, $value);

		}

	}

	private function bindParam($statement, $key, $value)
	{

		$statement->bindParam($key, $value);

	}

	public function query($rawQuery, $params = array())
	{

		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

	}

	public function select($rawQuery, $params = array()):array
	{

		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);

	}

}

 ?>