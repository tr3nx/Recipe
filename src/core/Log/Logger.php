<?php

namespace Core\Log;

class Logger extends Singleton {
	private $logpath;

	function __construct($app) {
		$this->logpath = $app->config('paths.logs')
					   . date($app->config('logging.fileformat'))
					   . '.log';
	}

	private function write($data) {}

	public function error($msg) {}
	public function warn($msg) {}
	public function info($msg) {}
	public function success($msg) {}
}
