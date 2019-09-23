<?php

namespace Core\Support;

abstract class Singleton {
	private static $instances = [];

	private function __construct() {}
	private function __clone() {}

	public function __wakeup() {
		throw new Exception('Cannot unserialize singleton class.');
	}

	public static function getInstance($data = null) {
		$class = static::class;
		if ( ! isset(self::$instances[$class])) {
			self::$instances[$class] = new static($data);
		}
		return self::$instances[$class];
	}
}
