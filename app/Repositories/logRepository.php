<?php

namespace App\Repositories;

use App\Models\log;
use InfyOm\Generator\Common\BaseRepository;

class logRepository extends BaseRepository
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
        return log::class;
    }
}
