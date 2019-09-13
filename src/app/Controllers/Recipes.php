<?php

namespace App\Controllers;

use App\Models\Recipe;

class Recipes {
	private $recipes;

	function __construct() {
		$this->recipes = [];
	}

	public function index() {
		return print_r((new Recipe)->find(1)->first(), true);
	}

	public function single($request, $response) {
	}
}
