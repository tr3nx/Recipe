<?php

return [
	'paths' => [
		'root' => __DIR__,
		'app' => '/app',
		'views' => '/views',
	],
	'routes' => [
		'/' => ['\App\Controllers\Home::index', '/'],
		'/home' => ['\App\Controllers\Home::index', 'home'],
		'/recipes' => ['\App\Controllers\Recipes::index', 'Recipes'],
		// '/recipes/{id}' => ['\App\Controllers\Recipes::index', 'Recipe'],
	],
];
