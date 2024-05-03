<?php

namespace App\Repositories;

use App\Models\Categories;
use App\Repositories\BaseRepository;

class CategoriesRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nom'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Categories::class;
    }
}
