<?php

namespace App\Models\Cat;

use Eloquent as Model;



/**
 * Class Categories
 * @package App\Models\Cat
 * @version May 3, 2024, 5:40 am UTC
 *
 * @property string $nom
 * @property number $pu
 */
class Categories extends Model
{


    public $table = 'categories';
    



    public $fillable = [
        'nom',
        'pu'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nom' => 'string',
        'pu' => 'double',
        'id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
