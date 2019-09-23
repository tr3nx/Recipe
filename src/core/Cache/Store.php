<?php

namespace Core\Cache;

use Core\Support\Singleton;

class Store extends Singleton {
	private $cache = [];

	public function set($key, $data, $expires = 0) {
		$this->cache[$key] = [
			'expires' => time() + ($expires) ?: 9999999,
			'data' => $data
		];
	}

	public function get($key) {
		return $this->has($key) ? $this->cache[$key] : null;
	}

	public function has($key) {
		return array_key_exists($key, $this->cache);
	}

	public function delete($key) {
		if ( ! $this->has($key)) return false;
		unset($this->cache[$key]);
		return $this->has($key);
	}

	private function isExpired($key) {
		return (time() - $this->cache[$key]['expires']) <= 0;
	}
}
