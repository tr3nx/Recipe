<?php

namespace App\Models;

use Core\Database\Model;

class Recipe extends Model {
	protected $table = 'recipes';

	function __construct() {
		parent::__construct(self::class);
	}
}
