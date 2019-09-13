<?php

namespace Core\Http;

use Core\Support\Singleton;

class Router extends Singleton {
	private $routes;

	function __construct($app) {
		$this->routes = $app->config('routing') ?: [];
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
