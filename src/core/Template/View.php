<?php

namespace Core\Template;

use Core\App;

class View {
	public static function render($templateName, $data=[]) {
		$app = App::getInstance();

		$viewPath = $app->config('paths.root') . $app->config('paths.views') . '/';
		$templatePath = $viewPath . $templateName . '.php';

		if ( ! file_exists($templatePath)) { return false; }
		if (is_dir($templatePath)) { return false; }

		$data = [
			'site' => [
				'sitename' => $app->config('sitename'),
				'body' => self::renderTemplate($templatePath, $data),
			]
		];

		return self::renderTemplate($viewPath . 'base.php', $data);
	}

	private static function renderTemplate($_path, $data = []) {
		ob_start();
		extract($data);
		include $_path;
		$tmp = ob_get_contents();
		ob_end_clean();
		return $tmp;
	}
}
