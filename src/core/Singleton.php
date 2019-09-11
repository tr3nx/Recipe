<?php

namespace Core;

abstract class Singleton {
	private static $instances = [];

	protected function __construct() {}
	protected function __clone() {}
	public function __wakeup() {
		throw new Exception("Cannot unserialize singleton class.");
	}

	public static function getInstance($data=null) {
		$class = static::class;
		if (!isset(self::$instances[$class])) {
			self::$instances[$class] = new static($data);
		}
		return self::$instances[$class];
	}
}
