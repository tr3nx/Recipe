<?php

namespace Core\Http;

use Core\Support\Singleton;

class Router extends Singleton {
	private $routes = [];

	function __construct($routes) {
		$this->routes = array_merge($routes, [
			'404' => ['\App\Controllers\Home::fourohfour', '404']
		]);
	}

	public function set($url, $fn, $name = '', $method='GET') {
		$this->routes[$url] = [$fn, $name, $method];
	}

	public function execute() {
		$request  = new Request();
		$response = new Response();

		$route = $this->routes[$request->url];

		if ( ! isset($route)) {
			return $response->error(404, $request->url)->redirect('404');
		}

		[$controller, $method] = explode('::', $route[0]);

		$buffer = (new $controller())->{$method}([&$request, &$response]);

		if (is_array($buffer)) {
			$buffer = toJson($buffer);
		}

		return $response->respond($buffer);
	}
}
