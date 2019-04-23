<?php

namespace App\Controllers;

class Recipes {
	protected $recipes = [];

	function __construct() {
		array_push($this->recipes, new \App\Models\Recipe(
			"My amazing recipe",
			[
				"eggs" => 2,
				"bread" => 3,
				"bacon" => 5,
				"butter" => 1,
				"hot sauce" => 4,
			],
			[
				"season your food",
				"cut your carrots",
				"grill your shit",
				"eat it",
			]
		));
	}

	public function index() {
		return json_encode($this->recipes[0]);
	}

	// public function single($id) {
	// 	return $this->recipes[$id];
	// }
}
