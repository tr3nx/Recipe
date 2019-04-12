<?php

namespace Core\Http;

class Request {
	public $data;
	public $url;
	public $method;
	public $query;
	public $ip;
	public $agent;
	public $referer;

	function __construct() {
		$this->data = [
			'post' => self::sanitize($_POST),
			'get' => $this->get = self::sanitize($_GET),
			'server' => $this->server = self::sanitize($_SERVER)
		];
		$this->url = $this->data['server']['REQUEST_URI'] ?: "";
		$this->method = $this->data['server']['REQUEST_METHOD'] ?: "";
		$this->query = $this->data['server']['QUERY_STRING'] ?: "";
		$this->ip = $this->data['server']['REMOTE_ADDR'] ?: "";
		$this->agent = $this->data['server']['HTTP_USER_AGENT'] ?: "";
		$this->referer = $this->data['server']['HTTP_REFERER'] ?: "";
	}

	private static function sanitize($opts, $allowed = []) {
		return $opts;
	}

	public function get($key) {
		return $this->data['post'][$key] ?: false;
	}

	public function post($key) {
		return $this->data['post'][$key] ?: false;
	}

	public function server($key) {
		return $this->data['server'][$key] ?: false;
	}
}
