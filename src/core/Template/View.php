<?php

namespace Core\Template;

use Core\App;

class View {
	public static function render($templateName, $incoming=[]) {
		$app = App::getInstance();

		$data['site'] = [
			'title' => $app->config('sitename'),
			'header' => '',
			'footer' => '',
		];
		$data['data'] = $incoming;

		$viewPath = $app->config('paths.root') . $app->config('paths.views') . '/';
		$templatePath = $viewPath . $templateName . '.php';

		if ( ! file_exists($templatePath)) return false;
		if (is_dir($templatePath)) return false;

		extract($data);

		ob_start();
		include $templatePath;
		include $viewPath . 'default.php';
		$content = ob_get_contents();
		ob_end_clean();

		return $content;
	}
}
