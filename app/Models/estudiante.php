<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="estudiante",
 *      required={materia_id, persona_id, periodo_id},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="materia_id",
 *          description="materia_id",
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
 *          property="periodo_id",
 *          description="periodo_id",
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
class estudiante extends Model
{
    use SoftDeletes;

    public $table = 'estudiantes';
    

    protected $dates = ['deleted_at'];

    //hasMany----------------------------------
    public function logs()
    {
        return $this->hasMany('App\Models\log');
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
    public function persona()
    {
        return $this->BelongsTo('App\Models\persona');
    }
    public function periodo()
    {
        return $this->BelongsTo('App\Models\periodo');
    }
    
    public $fillable = [
        'materia_id',
        'persona_id',
        'periodo_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'materia_id' => 'integer',
        'persona_id' => 'integer',
        'periodo_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'materia_id' => 'required',
        'persona_id' => 'nullable',
        'periodo_id' => 'required'
    ];
}
