<?php

namespace Core;

use Core\Database\Database;
use Core\Http\Router;
use Core\Log\Logger;
use Core\Cache\Store as Cache;
use Core\Support\Singleton;

class App extends Singleton {
	private $config;
	private $db;
	private $router;
	private $logger;
	private $cache;

	function __construct() {
		$this->config = require_once '../config.php';
	}

	public function initialize() {
		$this->db     = Database::getInstance($this);
		$this->router = Router::getInstance($this);
		$this->logger = Logger::getInstance($this);
		$this->cache  = Cache::getInstance($this);

		$this->db->connect();
	}

	public function config($keypath) {
		$keyparts = explode(".", $keypath);

		$_config = $this->config;

		foreach ($keyparts as $part) {
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
