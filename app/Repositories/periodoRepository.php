<?php

namespace App\Repositories;

use App\Models\periodo;
use InfyOm\Generator\Common\BaseRepository;

class periodoRepository extends BaseRepository
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
        return periodo::class;
    }
}
