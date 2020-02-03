<?php

namespace App\Controllers;

use App\Models\Recipe;

class Recipes {
	public function index() {
		$recipe = new Recipe;
		$rs = $recipe->get();
		d($rs->data['title']);
		dd($rs);
	}

	public function single($request, $response) {
		return (new Recipe)->where($request->get('id'))->first();
	}
}
