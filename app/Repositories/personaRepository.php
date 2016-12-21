<?php

namespace App\Repositories;

use App\Models\persona;
use InfyOm\Generator\Common\BaseRepository;

class personaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'apellido',
        'cedula'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return persona::class;
    }
}
