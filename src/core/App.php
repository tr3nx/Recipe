<?php

namespace Core;

use Core\Http\Router;
use Core\Database\Database;
use Core\Log\Logger;
use Core\Cache\Store as Cache;

class App extends Singleton {
	private $_config;
	private $router;
	private $db;
	private $logger;
	private $cache;

	function __construct() {
		$this->_config = require_once '../config.php';

		// init outside App
		$this->router = new Router($this->config('routing'));
		$this->db     = new Database($this->config('database'));
		// $this->logger = new Logger($this->config('logging'));
		$this->cache  = new Cache($this->config('caching'));
	}

	public function config($keypath) {
		$keyparts = explode(".", $keypath);

		$_config = $this->_config;

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
