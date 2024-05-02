<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vegetable extends Model
{
    use HasFactory;

    protected $table = 'vegetable';
    public $timestamps = false;
    public $primaryKey = 'id_vegetable';

    protected $fillable = ['vegetable_name'];
}
