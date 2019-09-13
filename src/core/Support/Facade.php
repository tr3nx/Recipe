<?php

namespace Core\Facade;

abstract class Facade {
	protected static $app;

	public static function getFacadeApplication() {
		return static::$app;
	}

	public static function setFacadeApplication($app) {
		static::$app = $app;
	}

	public static function __callStatic($method, $args) {
		$instance = static::getFacadeRoot();
		if (! $instance) {
			throw new RuntimeException('A facade root has not been set.');
		}
		return $instance->$method(...$args);
	}
}
