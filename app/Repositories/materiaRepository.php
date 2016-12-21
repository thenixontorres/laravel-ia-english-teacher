<?php

namespace App\Repositories;

use App\Models\materia;
use InfyOm\Generator\Common\BaseRepository;

class materiaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return materia::class;
    }
}
