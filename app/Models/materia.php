<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="materia",
 *      required={nombre, seccion_id, persona_id},
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
 *          property="seccion_id",
 *          description="seccion_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="persona_id",
 *          description="persona_id",
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
class materia extends Model
{
    use SoftDeletes;

    public $table = 'materias';
    

    protected $dates = ['deleted_at'];

    //hasMany----------------------------------
    public function estudiantes()
    {
        return $this->hasMany('App\Models\estudiante');
    }
    public function evaluacions()
    {
        return $this->hasMany('App\Models\evaluacion');
    }

    //BelongsTo----------------------------------
    public function seccion()
    {
        return $this->BelongsTo('App\Models\seccion');
    }
    public function persona()
    {
        return $this->BelongsTo('App\Models\persona');
    }

    public $fillable = [
        'materia',
        'seccion_id',
        'persona_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'materia' => 'string',
        'seccion_id' => 'integer',
        'persona_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'materia' => 'required',
        'seccion_id' => 'required',
        'persona_id' => 'required'
    ];
}
