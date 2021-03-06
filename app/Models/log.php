<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="registro",
 *      required={mensaje, puntos, estudiante_id, respuesta_id, evaluacion_id},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="mensaje",
 *          description="mensaje",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="puntos",
 *          description="puntos",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="estudiante_id",
 *          description="estudiante_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="respuesta_id",
 *          description="respuesta_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="evaluacion_id",
 *          description="evaluacion_id",
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
class log extends Model
{
    use SoftDeletes;

    public $table = 'logs';
    

    protected $dates = ['deleted_at'];


    //BelongsTo----------------------------------
    
    public function estudiante()
    {
        return $this->BelongsTo('App\Models\estudiante');
    }
    public function caso()
    {
        return $this->BelongsTo('App\Models\caso');
    }


    public $fillable = [
        'entrada',
        'puntos',
        'estudiante_id',
        'respuesta',
        'caso_id',
        'coherencia',
        'final'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'entrada' => 'string',
        'puntos' => 'string',
        'estudiante_id' => 'integer',
        'respuesta' => 'string',
        'caso_id' => 'integer',
        'coherencia' => 'string',
        'final' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */

    public static $rules = [
        'caso_id' => 'required',
    ];
}
