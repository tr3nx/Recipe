<?php

namespace Core\Filesystem;

class Filesystem {
	public static function exists($path) {
		return file_exists($path);
	}

	public static function isFile($path) {
		return is_file($path);
	}

	public static function isDir($path) {
		return is_dir($path);
	}

	public static function isWritable($path) {
		return is_writable($path);
	}

	public static function isReadable($path) {
		return is_readable($path);
	}

	public static function type($path) {
		return filetype($path);
	}

	public static function size($path) {
		return filesize($path);
	}

	public static function ext($path) {
		return pathinfo($path, PATHINFO_EXTENSION);
	}

	public static function mime($path) {
		return finfo_file(finfo_open(FILEINFO_MIME_TYPE), $path);
	}

	public static function basename($path) {
		return pathinfo($path, PATHINFO_BASENAME);
	}

	public static function filename($path) {
		return pathinfo($path, PATHINFO_FILENAME);
	}

	public static function lastModified($path) {
		return filemtime($path);
	}

	public static function hash($path) {
		return md5_file($path);
	}

	public static function move($src, $dst) {
		return rename($src, $dst);
	}

	public static function copy($src, $dst) {
		return copy($src, $dst);
	}

	public static function delete($path) {
		try {
			if (@unlink($path)) {
				return true;
			}
		} catch (ErrorException $e) {
			return false;
		}
		return false;
	}

	public static function chmod($path, $mode = null) {
		if ($mode) {
			return chmod($path, $mode);
		}
		return substr(sprintf('%o', fileperms($path)), -4);
	}

	public static function get($path) {
		return file_get_contents($path);
	}

	public static function put($path, $contents = '', $flags = 0) {
		return file_put_contents($path, $contents, $flags);
	}

	public static function append($path, $data) {
		return static::put($path, $data, FILE_APPEND);
	}

	public static function prepend($path, $data) {
		if (static::exists($path)) {
			return static::put($path, $data . static::get($path));
		}
		return static::put($path, $data);
	}
}
