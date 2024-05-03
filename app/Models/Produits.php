<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Produits
 * @package App\Models
 * @version May 3, 2024, 6:16 am UTC
 *
 * @property string $nom
 * @property number $prix
 * @property integer $categorie_id
 */
class Produits extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'produits';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
        'prix',
        'categorie_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nom' => 'string',
        'prix' => 'double',
        'categorie_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'required',
        'prix' => 'required',
        'categorie_id' => 'required'
    ];

    
}
