<?php

namespace App\Controllers;

use Core\Template\View;

class Home {
	public function index() {
		return View::render('home/index');
	}

	public function home() {
		return View::render('home/index');
	}
}
