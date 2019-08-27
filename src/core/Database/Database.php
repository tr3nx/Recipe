<?php

namespace Core\Database;

use Core\Database\Driver\Postgres;
use Core\Database\Driver\Memory;

class Database {
	public $driver;
	public $connection;

	function __construct($app) {
		$this->driver = self::loadDriver($app->config('driver'));
	}

	public function loadDriver($driver) {
		switch ($driver) {
			case "postgres":
				return new Postgres($app->config('db'));
			break;

			default:
			case "memory":
				return new Memory($app->config('db'));
			break;
		}
	}
}
