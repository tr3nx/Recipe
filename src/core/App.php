<?php

namespace Core;

use Core\Http\Router;

class App {
	private $router;
	private $http;
	public $config;

	function __construct($_rootpath) {
		$this->config = [
			'paths' => [
				'root' => $_rootpath,
				'app' => '/app',
				'views' => '/views'
			],
			'routes' => [
				'/' => ['\App\Controllers\Home::index', 'home']
			]
		];
		$this->router = new Router($this->config['routes']);
	}

	public function path($key) {
		$p = $this->config['paths']['root'];
		if (array_key_exists($key, $this->config['paths'])) {
			$p .= $this->config['paths'][$key];
		}
		return $p;
	} 

	public function serve() {
		$this->router->execute();
	}
}
