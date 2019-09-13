<?php

namespace Core\Log;

use Core\Support\Singleton;

class Logger extends Singleton {
	private $logpath;
	private $fileformat;

	function __construct($app) {
		$this->fileformat = $app->config('logging.fileformat');
		$this->logpath = $app->config('paths.logs')
					   . date($this->fileformat)
					   . '.log';
	}

	private function write($data) {}

	public function error($msg) {}
	public function warn($msg) {}
	public function info($msg) {}
	public function success($msg) {}
}
