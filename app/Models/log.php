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
    public function respuesta()
    {
        return $this->BelongsTo('App\Models\respuesta');
    }
    public function entrada()
    {
        return $this->BelongsTo('App\Models\entrada');
    }
    public function estudiante()
    {
        return $this->BelongsTo('App\Models\estudiante');
    }
    public function caso()
    {
        return $this->BelongsTo('App\Models\caso');
    }


    public $fillable = [
        'entrada_id',
        'puntos',
        'estudiante_id',
        'respuesta_id',
        'caso_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'entrada_id' => 'integer',
        'puntos' => 'string',
        'estudiante_id' => 'integer',
        'respuesta_id' => 'integer',
        'caso_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */

    public static $rules = [
        'caso_id' => 'required'
    ];
}
