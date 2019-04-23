<?php

namespace Core\Cache;

class Store {
	private $cache;

	public function __construct() {
		$this->cache = [];
	}

	public function set($key, $data, $expires = 0) {
		$this->cache[$key] = [
			"expires" => $expires,
			"data" => $data
		];
	}

	public function get($key) {
		return $this->has($key) ? $this->cache[$key] : null;
	}

	public function has($key) {
		return (bool)array_key_exists($key, $this->cache);
	}

	public function delete($key) {
		if (!$this->has($key)) {
			return false;
		}
		unset($this->cache[$key]);
		return $this->has($key);
	}

	private function isExpired($key) {
		// $this->cache[$key]
		return false;
	}
}
