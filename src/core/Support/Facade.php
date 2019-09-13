<?php

namespace Core\Support;

trait Facade {
	public static function __callStatic($method, $args) {
		return (static::getInstance())->$method(...$args);
	}
}
