<?php

namespace App\Repositories;

use App\Models\Produits;
use App\Repositories\BaseRepository;

/**
 * Class ProduitsRepository
 * @package App\Repositories
 * @version May 3, 2024, 6:16 am UTC
*/

class ProduitsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'prix',
        'categorie_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Produits::class;
    }
}
