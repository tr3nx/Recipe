<?php

namespace Core;

use Core\Http\Router;

class App {
	private $router;
	private $http;
	public static $config = [
		'paths' => [
			'root' => __DIR__ . '/..',
			'app' => '/app',
			'views' => '/views'
		],
		'routes' => [
			'/' => ['\App\Controllers\Home::index', 'home']
		]
	];

	function __construct() {
		$this->router = new Router(self::$config);
	}

	public function config($keypath) {
		$keyparts = explode(".", $keypath);

		$_config = self::$config;

		foreach($keyparts as $part) {
			if (array_key_exists($part, $_config)) {
				$_config = $_config[$part];
			}
		}

		return $_config;
	}

	public function run() {
		$this->router->execute();
	}
}
