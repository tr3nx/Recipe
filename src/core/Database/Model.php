<?php

namespace Core\Database;

abstract class Model {
	protected $table;
	protected $fields = [];

	private $query;

	function __construct() {
		$this->query = $this->newQuery();
	}

	public function get($limit = 0) {
		if ($limit > 0) {
			$this->query->limit($limit);
		}
		return $this->execute($this->query->toSql());
	}

	public function find($id) {
		return $this->execute($this->query->where('id', $id)->limit(1)->toSql());
	}

	public function where($field, $value) {
		$this->query = $this->query->where($field, $value);
		return $this;
	}

	private function newQuery() {
		$table = ($this->table) ?: array_pop(explode('\\', static::class)) . 's';
		$fields = (count($this->fields)) ? implode(', ', $this->fields) : '*';
		return (new QueryBuilder)->select($fields)->from($table);
	}

	private function execute($sql) {
		$ex = Database::getInstance()->executeQuery($sql);
		if ( ! array_key_exists('data', $ex)) {
			return $ex;
		}
		return $ex->data;
	}
}
