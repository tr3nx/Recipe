<?php

namespace App\Models;

use Core\Database\Model;

class Recipe extends Model {
	protected $table = 'recipes';
	protected $fields = ['id', 'username', 'email'];
}
