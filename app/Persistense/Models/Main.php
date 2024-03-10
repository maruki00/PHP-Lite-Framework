<?php


namespace App\Persistence\Models;

dd(__FILE__);

use Core\DB\Model;

class Main extends Model
{
    
    protected $table = 'mains';
    protected $fillable = ['name'];
}