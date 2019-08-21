<?php

namespace Core\Template;

class View {
	public static function render($path, $data=[]) {
		if (strlen($path) <= 0) {
			return "no path";
		}

		$file = \Core\App::getInstance()->config('paths.root')
			  . '/'
			  . \Core\App::getInstance()->config('paths.views')
			  . '/'
			  . $path
			  . '.php';

		if (strlen($file) <= 0) {
			return "no filename";
		}

		if (!file_exists($file)) {
			return "doesn't exist";
		}

		if (is_dir($file)) {
			return "is dir";
		}

		$tmp = (string)file_get_contents($file);
		if (strlen($tmp) <= 0) {
			return "no data";
		}

		return $tmp;
	}
}
