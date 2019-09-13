<?php

namespace Core\Database;

use Core\Singleton;

abstract class Model extends QueryBuilder, Singleton {
	private $db;
	private $model;
	private $query;

	function __construct($db, $model) {
		$this->db = $db;
		$this->model = $model;
	}

	public function first() {
		return $this->query->limit(1)->execute();
	}

	public function get() {
		return $this->query->execute();
	}

	public function find($id) {
		$this->query = $this->select('*')->from($model->table)->where('id', $id);
		return $this;
	}

	public function count() {
		return $this->query->execute()->rows ?: 0;
	}

	// public function create() {}

	// public function update() {}

	// public function delete() {}
}
