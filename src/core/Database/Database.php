<?php

namespace Core\Database;

use Core\Singleton;

class Database extends Singleton {
	private $host;
	private $port;
	private $dbname;
	private $username;
	private $password;

	public $connection;

	function __construct($app) {
		$this->host = $app->config('db.host');
		$this->port = $app->config('db.port');
		$this->dbname = $app->config('db.dbname');
		$this->username = $app->config('db.username');
		$this->password = $app->config('db.password');
		$this->connection_string = "host={$this->host} port={$this->port} dbname={$this->dbname} user={$this->username} password={$this->password}";
	}

	public function connect() {
		$this->connection = pg_connect($this->connection_string);
	}

	public function status() {
		return pg_connection_status($this->connection);
	}

	public function isConnected() {
		return pg_ping($this->connection);
	}

	public function disconnect() {
		return pg_close($this->connection);
	}

	public function reset() {
		return pg_flush($this->connection);
	}

	public function query($query) {
		$result = pg_query($this->connection, $query);
		return ($result)
			? pg_result_status($result)
			: pg_last_error($this->connection);
	}
}
