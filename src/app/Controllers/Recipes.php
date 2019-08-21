<?php

namespace App\Controllers;

class Recipes {
	protected $recipes = [];

	function __construct() {
		foreach(range(0, 5) as $n) {
			array_push($this->recipes, static::generateRecipe());
		}
	}

	private static function generateRecipe() {
		return new \App\Models\Recipe(
			"My amazing recipe " . rand(1, 50),
			[
				"eggs" => rand(1, 6),
				"bread" => rand(1, 8),
				"bacon" => rand(1, 10),
				"butter" => rand(1, 2),
				"hot sauce" => rand(1, 6),
			],
			[
				"season your food",
				"cut your carrots",
				"grill your shit",
				"eat it",
			]
		);
	}

	public function index() {
		return json_encode($this->recipes[0]);
	}

	public function single($data) {
		var_dump($data);
		return $this->recipes[5];
	}
}
