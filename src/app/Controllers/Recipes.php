<?php

namespace App\Controllers;

use App\Models\Recipe;

class Recipes {
	protected $recipes = [];

	function __construct() {
		
	}

	public function index() {
	}

	public function single($request, $response) {
		return Recipe::find($request->get('id'))->first()
	}
}
