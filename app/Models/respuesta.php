<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="respuesta",
 *      required={respuesta, regla_id},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="respuesta",
 *          description="respuesta",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="regla_id",
 *          description="regla_id",
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
class respuesta extends Model
{
    use SoftDeletes;

    public $table = 'respuestas';
    

    protected $dates = ['deleted_at'];

    //hasMany----------------------------------
    public function logs()
    {
        return $this->hasMany('App\Models\log');
    }
     //BelongsTo----------------------------------
    public function regla()
    {
        return $this->BelongsTo('App\Models\regla');
    }
    public function reaccion()
    {
        return $this->BelongsTo('App\Models\reaccion');
    }

    public $fillable = [
        'respuesta',
        'regla_id',
        'reaccion_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'respuesta' => 'string',
        'regla_id' => 'integer',
        'reaccion_id' => 'integer'   
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'respuesta' => 'required',
        'regla_id' => 'required',
        'reaccion_id' => 'required'
    ];
}
