<?php

namespace Core\Database\Driver;

class Postgres implements Driver {
	private $database;
	private $host;
	private $username;
	private $password;

	function __construct($config) {
		$this->database = $config['database'];
		$this->host     = $config['host'];
		$this->username = $config['username'];
		$this->password = $config['password'];
	}

	public function connect() {}
	public function disconnect() {}

	public function execute() {}
}
