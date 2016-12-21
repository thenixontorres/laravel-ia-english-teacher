<?php

namespace App\Repositories;

use App\Models\tip;
use InfyOm\Generator\Common\BaseRepository;

class tipRepository extends BaseRepository
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
        return tip::class;
    }
}
