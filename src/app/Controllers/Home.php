<?php

namespace App\Controllers;

use Core\Template\View;

class Home {
	public function index() {
		return View::render('home/index');
	}
}
