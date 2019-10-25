<?php

if ( ! function_exists('dd')) {
	function dd($var) {
		echo '<pre>';
		print_r($var);
		echo '</pre>';
		die();
	}
}

if ( ! function_exists('env')) {
	function env($key, $default = null) {
		return getenv($key) ?: $default;
	}
}

if ( ! function_exists('toJson')) {
	function toJson($data) {
		return ($json = json_encode($data)) ?: '{}';
	}
}

if ( ! function_exists('isJson')) {
	function isJson($json) {
		if ( ! substr($json, 0, 1) == '{') { return false; }
		json_decode($json);
		return (json_last_error() == JSON_ERROR_NONE);
	}
}

if ( ! function_exists('pather')) {
	function pather($paths, $relative = false) {
		if ( ! is_array($paths)) { return $paths; }
		$path = implode('/', array_map(function($item) { return trim($item, '/'); }, $paths));
		return $relative ? $path : '/' . $path;
	}
}
