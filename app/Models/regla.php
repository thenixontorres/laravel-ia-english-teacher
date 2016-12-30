<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="regla",
 *      required={regla, puntos, contexto_id, apuntador_id},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="regla",
 *          description="regla",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="puntos",
 *          description="puntos",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="contexto_id",
 *          description="contexto_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="apuntador_id",
 *          description="apuntador_id",
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
class regla extends Model
{
    use SoftDeletes;

    public $table = 'reglas';
    

    protected $dates = ['deleted_at'];

    //hasMany----------------------------------
    public function respuestas()
    {
        return $this->hasMany('App\Models\respuesta');
    }
    //BelongsTo----------------------------------
    public function contexto()
    {
        return $this->BelongsTo('App\Models\contexto');
    }
    public function apuntador()
    {
        return $this->BelongsTo('App\Models\contexto');
    }
    public function reaccion()
    {
        return $this->BelongsTo('App\Models\reaccion');
    }

    public $fillable = [
        'reaccion_id',
        'puntos',
        'contexto_id',
        'apuntador_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'reaccion_id' => 'integer',
        'puntos' => 'string',
        'contexto_id' => 'integer',
        'apuntador_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'reaccion_id' => 'required',
        'puntos' => 'required|numeric',
        'contexto_id' => 'required',
        'apuntador_id' => 'required'
    ];
}
