<?php

namespace App;

class App {
	public function Run() {
		$recipe = new Recipe(
			"My amazing recipe",
			[
				"eggs" => 2,
				"bread" => 3,
				"bacon" => 5,
				"butter" => 1,
				"hot sauce" => 4
			],
			[
				"season your food",
				"cut your carrots",
				"grill your shit",
				"eat it"
			]
		);

		return $recipe->title;
	}
}