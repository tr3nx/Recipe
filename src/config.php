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
		'dsn' => env('DATABASE_PATH', 'postgres:dsn'),
	],
	'paths' => [
		'root'    => __DIR__,
		'app'     => '/app',
		'views'   => '/views',
		'storage' => '/storage'
	]
];
