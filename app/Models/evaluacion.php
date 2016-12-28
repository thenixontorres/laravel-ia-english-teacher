<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="evaluacion",
 *      required={nombre, tipo, materia_id, estado_id},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nombre",
 *          description="nombre",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tipo",
 *          description="tipo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="materia_id",
 *          description="materia_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="estado_id",
 *          description="estado_id",
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
class evaluacion extends Model
{
    use SoftDeletes;

    public $table = 'evaluacions';
    

    protected $dates = ['deleted_at'];

    //hasMany----------------------------------
   
    public function casos()
    {
        return $this->hasMany('App\Models\caso');
    }
    public function notas()
    {
        return $this->hasMany('App\Models\nota');
    }

    //BelongsTo----------------------------------
    public function materia()
    {
        return $this->BelongsTo('App\Models\materia');
    }

    public $fillable = [
        'titulo',
        'descripcion',
        'tipo',
        'materia_id',
        'estado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'titulo' => 'string',
        'descripcion' => 'string',
        'tipo' => 'string',
        'materia_id' => 'integer',
        'estado' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'titulo' => 'required|max:30',
        'descripcion' => 'required',
        'tipo' => 'required',
        'materia_id' => 'required',
        'estado' => 'required'
    ];
}
