<?php

namespace Core\Database;

class QueryBuilder {
	private $table;
	private $fields;
	private $wheres;
	private $groupby;
	private $sort;
	private $limit;
	private $offset;
	private $sql;

	protected $db;

	function __construct($db) {
		$this->db = $db;
	}

	public function select($fields) {
		$this->fields = $fields;
		return $this;
	}

	public function from($table) {
		$this->table = $table;
		return $this;
	}

	public function where($field, $value) {
		$this->wheres[] = [$field, $value];
		return $this;
	}

	public function orderby($field) {
		$this->orderby = $field;
		return $this;
	}

	public function sort($direction) {
		$this->sort = $direction;
		return $this;
	}

	public function limit($count) {
		$this->limit = $count;
		return $this;
	}

	public function execute() {
		return $this->db->query($this->generateSql());
	}

	public function raw() {
		return $this->generateSql();
	}

	private function generateSql() {
		$this->sql = "SELECT {$this->fields} FROM {$this->table} ";

		if (count($this->wheres) > 0) {
			$wheres = "WHERE ";
			foreach($this->wheres as $where) {
				$wheres .= "{$where[0]} = {$where[1]} AND ";
			}
			$this->sql .= substr($wheres, 0, -4);
		}

		if (isset($this->orderby)) {
			$this->sort === "DESC" ? "DESC" : "ASC";
			$this->sql .= "ORDER BY {$this->orderby} {$this->sort} ";
		}

		if (isset($this->limit)) {
			$this->sql .= "LIMIT {$this->limit}";
		}

		return $this->sql;
	}
}
