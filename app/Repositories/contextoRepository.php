<?php

namespace App\Repositories;

use App\Models\contexto;
use InfyOm\Generator\Common\BaseRepository;

class contextoRepository extends BaseRepository
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
        return contexto::class;
    }
}
