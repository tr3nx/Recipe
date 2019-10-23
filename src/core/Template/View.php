<?php

namespace Core\Template;

use Core\App;

class View {
	public static function render($path, $data=[]) {
		if (strlen($path) <= 0) { return false; }

		$app = App::getInstance();

		$filepath = implode('/', [
			$app->config('paths.root'),
			$app->config('paths.views'),
			$path . '.php'
		]);

		if ( ! file_exists($filepath)) { return false; }

		if (is_dir($filepath)) { return false; }

		$tmp = file_get_contents($filepath);
		if (strlen($tmp) <= 0) { return false; }

		return $tmp;
	}
}
