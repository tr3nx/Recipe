<?php

namespace App\Controllers;

use App\Models\Recipe;

class Recipes {
	private $recipes;

	function __construct() {
		$this->recipes = [];
	}

	public function index() {
		return Recipe::find(1)->first();
	}

	public function single($request, $response) {
	}
}
