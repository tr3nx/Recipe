<?php

namespace Core\Http;

class Response {
	private $headers = [];
	private $status = [];

	function __construct($headers = []) {
		$this->headers = $headers;
		$this->status = [200, 'OK'];
	}

	public function respond($buffer) {
		if (isJson($buffer)) {
			$this->setJsonHeader();
		} else {
			$this->setHtmlHeader();
		}

		$this->applyHeaders();
		$this->applyStatus();

		return $buffer;
	}

	public function withStatus($code, $reason = '') {
		$this->status = [$code, $reason];
		return $this;
	}

	public function withHeader($header, $value) {
		$this->headers[$header] = $value;
		return $this;
	}

	private function applyHeaders() {
		foreach ($this->headers as $key => $value) {
			header(sprintf('%s: %s', $key, $value));
		}
		return $this;
	}

	private function applyStatus() {
		http_response_code($this->status[0]);
		return $this;
	}

	private function setJsonHeader() {
		$this->withHeader('Content-Type', 'application/json; charset=utf-8');
		return $this;
	}

	private function setHtmlHeader() {
		$this->withHeader('Content-Type', 'text/html; charset=utf-8');
		return $this;
	}
}
