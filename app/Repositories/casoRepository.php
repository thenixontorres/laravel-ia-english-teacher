<?php

namespace App\Repositories;

use App\Models\caso;
use InfyOm\Generator\Common\BaseRepository;

class casoRepository extends BaseRepository
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
        return caso::class;
    }
}
