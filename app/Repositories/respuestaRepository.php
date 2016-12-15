<?php

namespace App\Repositories;

use App\Models\respuesta;
use InfyOm\Generator\Common\BaseRepository;

class respuestaRepository extends BaseRepository
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
        return respuesta::class;
    }
}
