<?php

namespace Core;

use Core\Http\Router;
use Core\Support\Singleton;
use Core\Database\Database;
use Core\Logger\Log;

include 'Support/helpers.php';

class App extends Singleton {
	private $config = [];
	private $db;
	private $router;

	function __construct() {
		$this->config = include '../config.php';
	}

	public function boot() {
		Log::getInstance($this);
		Log::debug('Init');

		$this->db = Database::getInstance($this->config('db.dsn'));
		$this->db->connect();

		$this->router = Router::getInstance($this->config('routing'));
	}

	public function config($keypath) {
		$keyparts = explode('.', $keypath);
		$config = $this->config;
		foreach ($keyparts as $part) {
			if (array_key_exists($part, $config)) {
				$config = $config[$part];
			}
		}
		return $config;
	}

	public function run() {
		return $this->router->execute();
	}
}
