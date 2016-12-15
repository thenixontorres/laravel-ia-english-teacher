<?php

namespace App\Repositories;

use App\Models\regla;
use InfyOm\Generator\Common\BaseRepository;

class reglaRepository extends BaseRepository
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
        return regla::class;
    }
}
