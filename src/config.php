<?php

return [
	'hostname' => 'recipePHP',
	'url' => 'https://recipe.localhost/',
	'routing' => [
		'/recipes/{id}' => ['\App\Controllers\Recipes::single', 'Recipe'],
		'/recipes'      => ['\App\Controllers\Recipes::index', 'Recipes'],
		'/home'         => ['\App\Controllers\Home::index', 'home'],
		'/'             => ['\App\Controllers\Home::index', '/'],
	],
	'db' => [
		'driver'     => 'postgres',
		'host'       => 'localhost:5432',
		'database'   => 'recipe',
		'username'   => 'recipe-user',
		'password'   => 'mypass123',
	],
	'paths' => [
		'root'    => __DIR__,
		'app'     => '/app',
		'views'   => '/views',
		'storage' => '/storage',
		'logs'    => '/storage/logs',
	],
	'logging' => [
		'fileformat' => 'm-d-Y',
	],
	'caching' => [
		'driver'     => 'memory',
		'bustchance' => 2,
	],
];
