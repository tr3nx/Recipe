<?php

namespace Core\Database;

class QueryBuilder {
	private $table;
	private $fields = [];
	private $wheres = [];
	private $orderby;
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

	public function orderby($field) {
		$this->orderby = $field;
		return $this;
	}

	public function sort($direction) {
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
		$sql = "SELECT {$this->fields} FROM {$this->table}";

		if (count($this->wheres)) {
			$wheres = ' WHERE ';
			foreach($this->wheres as $where) {
				$wheres .= "{$where[0]} = {$where[1]} AND";
			}
			$sql .= substr($wheres, 0, -3);
		}

		if (isset($this->orderby)) {
			$this->sort === 'DESC' ? 'DESC' : 'ASC';
			$sql .= " ORDER BY {$this->orderby} {$this->sort}";
		}

		if ($this->limit > 0) {
			$sql .= " LIMIT {$this->limit}";
		}

		if ($this->offset > 0) {
			$sql .= " OFFSET {$this->offset}";
		}

		return $sql;
	}
}
