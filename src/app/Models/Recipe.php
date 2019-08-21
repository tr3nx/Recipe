<?php

namespace App\Models;

use Core\Database\Model;

class Recipe extends Model {
	public $title;
	public $ingredients;
	public $instructions;

	function __construct(string $_title, array $_ingredients, array $_instructions) {
		$this->title = $_title;
		$this->ingredients = $_ingredients;
		$this->instructions = $_instructions;
	}
}
