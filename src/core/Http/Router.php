<?php

namespace Core\Http;

use App\Controllers;

class Router {
	private $routes;

	function __construct($_routes) {
		$this->routes = $_routes ?: [];
	}

	public function add($url, $fn, $name = "") {
		$this->routes[$url] = [$fn, $name];
	}

	public function execute() {
		$request = new Request();

		$route = $this->routes[$request->url];
		if (!isset($route)) {
			return;
		}

		$response = new Response();
		$response->respond(call_user_func($route[0], [&$request, &$response]));
	}
}
