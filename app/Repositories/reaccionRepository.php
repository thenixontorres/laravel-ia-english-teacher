<?php

namespace App\Repositories;

use App\Models\reaccion;
use InfyOm\Generator\Common\BaseRepository;

class reaccionRepository extends BaseRepository
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
        return reaccion::class;
    }
}
