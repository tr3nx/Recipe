<?php

namespace Core\Database;

abstract class Model {
	public $data;

	protected $table;
	protected $fields = [];

	private $query;

	function __construct() {
		$this->table  = ($this->table) ?: array_pop(explode('\\', static::class)) . 's';
		$this->fields = (count($this->fields))
					  ? implode(', ', $this->fields)
					  : '*';
		$this->query  = $this->newQuery();
		$this->data   = [];
	}

	public function get($limit = 0) {
		if ($limit > 0) { $this->query->limit($limit); }
		$this->data = $this->execute($this->query->toSql())->data;
		return $this->data;
	}

	public function first() {
		return $this->get(1);
	}

	public function where($field, $value) {
		$this->query = $this->query->where($field, $value);
		return $this;
	}

	public function save() {}

	public function update() {}

	private function newQuery() {
		return (new QueryBuilder)->select($this->fields)->from($this->table);
	}

	private function execute($sql) {
		return Database::getInstance()->executeQuery($sql);
	}
}
