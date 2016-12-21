<?php

namespace App\Repositories;

use App\Models\estudiante;
use InfyOm\Generator\Common\BaseRepository;

class estudianteRepository extends BaseRepository
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
        return estudiante::class;
    }
}
