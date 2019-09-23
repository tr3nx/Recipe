<?php

namespace Core\Database;

class QueryBuilder {
	private $table;
	private $fields = [];
	private $wheres = [];
	private $orderby = 'id';
	private $sort = 'DESC';
	private $limit = 10;
	private $offset = 0;

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

	public function orderby($field = 'id') {
		$this->orderby = $field;
		return $this;
	}

	public function sort($direction = 'DESC') {
		$this->sort = $direction;
		return $this;
	}

	public function offset($amount = 0) {
		$this->offset = $amount;
		return $this;
	}

	public function limit($amount = 1) {
		$this->limit = $amount;
		return $this;
	}

	public function toSql() {
		$sql = "SELECT {$this->fields} FROM {$this->table} ";

		if (count($this->wheres)) {
			$wheres = 'WHERE ';
			foreach($this->wheres as $where) {
				$wheres .= "{$where[0]} = {$where[1]} AND ";
			}
			$sql .= substr($wheres, 0, -4);
		}

		if (isset($this->orderby)) {
			$this->sort === 'DESC' ? 'DESC' : 'ASC';
			$sql .= "ORDER BY {$this->orderby} {$this->sort} ";
		}

		if (isset($this->limit)) {
			$sql .= "LIMIT {$this->limit}";
		}

		if (isset($this->offset)) {
			$sql .= "OFFSET {$this->offset}";
		}

		return $sql;
	}
}
