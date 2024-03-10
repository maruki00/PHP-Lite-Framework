<?php

namespace App\Persistence\Models;

use Core\DB\Model;

class Main extends Model
{
    protected $table = 'mains';
    protected $fillable = ['name'];
}