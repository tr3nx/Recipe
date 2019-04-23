<?php

namespace Core;

use Core\Http\Router;

class App extends Singleton {
	private $router;
	private $config;

	function __construct() {
		$this->config = require_once '../config.php';
		$this->router = new Router($this->config('routes'));
	}

	public function config($keypath) {
		$keyparts = explode(".", $keypath);

		$_config = $this->config;

		foreach($keyparts as $part) {
			if (array_key_exists($part, $_config)) {
				$_config = $_config[$part];
			}
		}

		return $_config;
	}

	public function run() {
		return $this->router->execute();
	}
}
