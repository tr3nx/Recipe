<?php

namespace Core\Database\Driver;

class Memory {
	private $db;

	function __construct($config) {
		$this->db = [];
	}

	public function connect() {}
	public function disconnect() {}

	public function execute() {}
}
