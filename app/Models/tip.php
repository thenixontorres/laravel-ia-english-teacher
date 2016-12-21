<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="tip",
 *      required={tip, contexto_id},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="tip",
 *          description="tip",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="contexto_id",
 *          description="contexto_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class tip extends Model
{
    use SoftDeletes;

    public $table = 'tips';
    

    protected $dates = ['deleted_at'];

    //BelongsTo----------------------------------
    public function contexto()
    {
        return $this->BelongsTo('App\Models\contexto');
    }

    public $fillable = [
        'tip',
        'contexto_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'tip' => 'string',
        'contexto_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tip' => 'required',
        'contexto_id' => 'required'
    ];
}
