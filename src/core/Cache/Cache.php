<?php

namespace Core\Cache;

class Cache {
	private $store;

	public function __construct() {
		$this->store = [];
	}

	public function store($key, $data, $expires = 0) {
		$this->store[$key] = [
			"expires" => $expires,
			"data" => $data
		];
	}

	public function has($key) {
		return (bool)array_key_exists($key, $this->store);
	}

	public function isExpired($key) {
		// $this->store[$key]
		return false;
	}

	public function delete($key) {
		unset($this->store[$key]);
		return $this->has($key);
	}
}
