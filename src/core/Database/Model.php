<?php

namespace Core\Database;

class Model extends QueryBuilder {
	protected $table;

	function __construct($classname) {
		$this->table = $classname;

		parent::__construct();
	}

	public function first() {}
	public function find() {}
	public function count() {}

	public function create() {}
	public function update() {}
	public function delete() {}
}
