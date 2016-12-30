<?php

namespace App\Repositories;

use App\Models\entrada;
use InfyOm\Generator\Common\BaseRepository;

class entradaRepository extends BaseRepository
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
        return entrada::class;
    }
}
