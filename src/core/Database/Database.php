<?php

namespace Core\Database;

use Core\Singleton;

class Database extends Singleton {
	public $connection;

	function __construct($app) {
		$this->connection_string = $app->config('db.dsn');
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
		? (object) [
			'result'   => pg_fetch_assoc($result),
			'raw'      => $result,
			'status'   => pg_result_status($result),
			'fields'   => pg_num_fields($result),
			'rows'     => pg_num_rows($result),
			'affected' => pg_affected_rows($result)
		]
		: pg_last_error($this->connection);
	}
}
