<?php

namespace App\Repositories;

use App\Models\nota;
use InfyOm\Generator\Common\BaseRepository;

class notaRepository extends BaseRepository
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
        return nota::class;
    }
}
