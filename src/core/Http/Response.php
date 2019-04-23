<?php

namespace Core\Http;

class Response {
	private $data;
	private $headers;
	private $status;

	function __construct($_headers = []) {
		$this->headers = $_headers;
		$this->status = [200, "OK"];
	}

	public function respond($buffer) {
		if (self::isJson($buffer)) {
			$this->setJsonHeader();
		} else {
			$this->setHtmlHeader();
		}

		$this->applyHeaders();
		$this->applyStatus();

		return $buffer;
	}

	public function withHeader($header, $value) {
		$this->headers[$header] = $value;
		return $this;
	}

	private function applyHeaders() {
		foreach ($this->headers as $key => $value) {
			header(sprintf("%s: %s", $key, $value));
		}
		return $this;
	}

	private function setJsonHeader() {
		$this->withHeader("Content-Type", "application/json; charset=utf-8");
	}

	private function setHtmlHeader() {
		$this->withHeader("Content-Type", "text/html; charset=utf-8");
	}

	private static function isJson($str) {
		if (!substr($str, 0, 1) === "{") {
			return false;
		}
		json_decode($str);
		return (json_last_error() == JSON_ERROR_NONE);
	}

	public function withStatus($code, $reason = '') {
		$this->status = [$code, $reason];
	}

	private function applyStatus() {
		http_response_code($this->status[0]);
	}
}
