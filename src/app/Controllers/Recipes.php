<?php

namespace App\Controllers;

use App\Models\Recipe;

class Recipes {
	public function index() {
		return (new Recipe)->get();
	}

	public function single($request, $response) {
		return (new Recipe)->find($request->get('id'));
	}
}
