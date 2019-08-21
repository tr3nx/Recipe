<?php

namespace Core\Http;

class Router {
	private $routes;

	function __construct($_routes) {
		$this->routes = $_routes ?: [];
	}

	public function get($url, $fn, $name = "") {
		$this->routes[$url] = [$fn, $name];
	}

	public function execute() {
		$request = new Request();

		$route = $this->routes[$request->url];
		if (!isset($route)) {
			return;
		}

		[$controller, $method] = explode("::", $route[0]);

		$response = new Response();
		return $response->respond((new $controller())->{$method}([&$request, &$response]));
	}
}
