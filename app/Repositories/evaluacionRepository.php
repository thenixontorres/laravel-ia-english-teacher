<?php

namespace App\Repositories;

use App\Models\evaluacion;
use InfyOm\Generator\Common\BaseRepository;

class evaluacionRepository extends BaseRepository
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
        return evaluacion::class;
    }
}
