<?php

namespace App\Controllers;

use Core\Template\View;

class Home {
	public function index() {
		$data = [
			[
				'title' => 'index is working',
				'description' => 'index is working as expected even with a description.'
			]
		];
		return View::render('home/index', $data);
	}

	public function single() {
		dd('test');
		$data = [
			'title' => 'single is working'
		];
		return View::render('home/single', $data);
	}

	public function fourohfour() {
		$data = [
			'attempted_url' => $request->url
		];
		return View::render('error/404', $data);
	}
}
