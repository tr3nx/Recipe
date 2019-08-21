<?php

namespace Core\Log;

class Logger {
	private $logpath;

	function __construct($_config) {
		die(var_dump(\Core\App::getInstance()));
		// $this->logpath = \Core\App::getInstance()->config('paths.storage')
		// 			   . $_config['path']
		// 			   . date($_config['fileformat'])
		// 			   . '.log';
	}

	private function write($data) {}

	public function error($msg) {}
	public function warn($msg) {}
	public function info($msg) {}
	public function success($msg) {}
}
