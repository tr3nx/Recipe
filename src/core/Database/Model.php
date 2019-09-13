<?php

namespace Core\Database;

abstract class Model {
	private $db;
	private $query;

	protected $table;

	public static function __callStatic($method, $parameters) {
		var_dump(true);
		return (new static)->$method(...$parameters);
	}

	public function newInstance($attrs = []) {
		return new static((array) $attrs);
	}

	public function newQueryBuilder() {
		return new QueryBuilder();
	}

	public function newQuery() {
		return $this->newQueryBuilder()->select(implode(', ', $this->fields))->from($this->table);
	}

	public function first() {
		return Database::getInstance()->executeQuery($this->query->limit(1)->toSql());
	}

	public function get() {
		return Database::getInstance()->executeQuery($this->query->toSql());
	}

	protected function find($id) {
		$this->query = $this->newQuery()->where('id', $id);
		return $this;
	}

	public function where($field, $value) {
		$this->query = $this->newQuery()->where($field, $value);
		return $this;
	}

	public function count() {
		return $this->query->execute()->rows ?: 0;
	}

	// public function create() {}

	// public function update() {}

	// public function delete() {}

	// public function toJson() {
	// 	$json = json_encode($this);
	// 	return (json_last_error() !== JSON_ERROR_NONE)
	// 		? "{}"
	// 		: $json;
	// }
}
