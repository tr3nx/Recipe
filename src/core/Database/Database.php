<?php

namespace Core\Database;

use Core\Support\Singleton;

class Database extends Singleton {
	protected $connection;

	private $dsn;

	function __construct($dsn) {
		$this->dsn = $dsn;
	}

	public function connect() {
		$this->connection = pg_connect($this->dsn);
		return $this->isConnected();
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

	public function executeQuery($query) {
		$result = pg_query($this->connection, $query);

		if ( ! $result) {
			return pg_last_error($this->connection);
		}

		$data = [];
		$rows = pg_num_rows($result);
		while ($rows > 0 && $row = pg_fetch_assoc($result)) {
			$data[] = $row;
		}

		return (object) [
			'data'   => $data,
			'raw'    => $result,
			'status' => pg_result_status($result),
			'counts' => [
				'rows'     => $rows,
				'fields'   => pg_num_fields($result),
				'affected' => pg_affected_rows($result)
			]
		];
	}
}
