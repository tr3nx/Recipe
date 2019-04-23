<?php

namespace Core\Http;

use App\Controllers;

class Router {
	private $routes;

	function __construct($_routes) {
		$this->routes = $_routes ?: [];
	}

	public function get($url, $fn, $name = "") {
		$this->routes[$url] = [$fn, $name];
	}

	public function post($url, $fn, $name = "") {
		$this->routes[$url] = [$fn, $name];
	}

	public function execute() {
		$request = new Request();

		$route = $this->routes[$request->url];
		if (!isset($route)) {
			return;
		}

		$rps = explode("::", $route[0]);
		$controller = $rps[0];
		$method = $rps[1];

		$response = new Response();
		return $response->respond(
			(new $controller())->{$method}([&$request, &$response])
		);
	}
}
