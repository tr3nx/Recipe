<?php

namespace Core\Http;

class Response {
	public $data;
	public $headers;

	function __construct($_headers = []) {
		$this->headers = $_headers;
	}

	function withHeader($header, $value) {
		$this->headers[$header] = $value;
		return $this;
	}

	function applyHeaders() {
		foreach ($this->headers as $key => $value) {
			header(sprintf("%s: %s", $k, $v));
		}
		return $this;
	}

	function respond($buffer = "") {
		echo $this->respondHtml($buffer);
	}

	function respondJson($buffer) {
		$this->withHeader("Content-Type", "application/json; charset=utf-8")->applyHeaders();
		return json_encode($buffer);
	}

	function respondHtml($buffer) {
		$this->withHeader("Content-Type", "text/html; charset=utf-8")->applyHeaders();
		return (string)$buffer;
	}

	function getStatusCode() {}

	function withStatus($code, $reason = '') {}

	function getReasonPhrase() {}
}
