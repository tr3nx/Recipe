<?php

namespace Core\Database;

abstract class Model {
	protected $table;

	public function first() {}
	public function find() {}
	public function count() {}

	public function create() {}
	public function update() {}
	public function delete() {}
}
