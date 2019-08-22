<?php

namespace Core\Database;

use Core\Database\Driver\Postgres;

class Database {
	private $driver;
	private $host;
	private $database;
	private $username;
	private $password;

	function __construct($app) {
		$this->driver   = self::loadDriver($app->config('driver'));
		$this->host     = $app->config('host');
		$this->database = $app->config('database');
		$this->username = $app->config('username');
		$this->password = $app->config('password');
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
