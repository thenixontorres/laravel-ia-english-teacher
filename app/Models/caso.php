<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="problema",
 *      required={enunciado, evaluacion_id, cliente_id},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="enunciado",
 *          description="enunciado",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="evaluacion_id",
 *          description="evaluacion_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="cliente_id",
 *          description="cliente_id",
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
class caso extends Model
{
    use SoftDeletes;

    public $table = 'casos';
    

    protected $dates = ['deleted_at'];

    //hasMany----------------------------------
    public function contextos()
    {
        return $this->hasMany('App\Models\contexto');
    }
    public function logs()
    {
        return $this->hasMany('App\Models\log');
    }
    //BelongsTo----------------------------------
    public function evaluacion()
    {
        return $this->BelongsTo('App\Models\evaluacion');
    }

    public $fillable = [
        'enunciado',
        'evaluacion_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'enunciado' => 'string',
        'evaluacion_id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'enunciado' => 'required|max:255',
        'evaluacion_id' => 'required',
    ];
}
