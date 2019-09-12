<?php

namespace Core\Database;

class QueryBuilder {
	private $table;
	private $fields;
	private $wheres;
	private $groupby;
	private $limit;
	private $offset;
	private $sql;

	protected $db;

	function __construct($db) {
		$this->db = $db;
	}

	public function select() {}
	public function from() {}
	public function where() {}
	public function orderby() {}
	public function sort() {}
	public function limit() {}

	public function execute() {
		return $this->generateSql();
	}

	private function generateSql() {}
}
