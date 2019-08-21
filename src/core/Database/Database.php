<?php

namespace Core\Database;

use Core\Database\Driver\Postgres;

class Database {
	private $driver;
	private $host;
	private $database;
	private $username;
	private $password;

	function __construct($_config) {
		$this->driver   = self::loadDriver($_config['driver']);
		$this->host     = $_config['host'];
		$this->database = $_config['database'];
		$this->username = $_config['username'];
		$this->password = $_config['password'];
	}

	public function loadDriver($driver) {
		if ($driver === "postgres") {
			return new Postgres();
		}
		// 
	}

	public function connection() {
		// create db connection
	}
}
