<?php

namespace Core\Support;

class Facade {
	public static function __callStatic($method, $args) {
		return (static::getInstance())->$method(...$args);
	}
}
