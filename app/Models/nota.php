<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="nota",
 *      required={nota, evaluacion_id, estudiante_id},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nota",
 *          description="nota",
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
 *          property="estudiante_id",
 *          description="estudiante_id",
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
class nota extends Model
{
    use SoftDeletes;

    public $table = 'notas';
    

    protected $dates = ['deleted_at'];

    //BelongsTo----------------------------------
    public function evaluacion()
    {
        return $this->BelongsTo('App\Models\evaluacion');
    }
    public function estudiante()
    {
        return $this->BelongsTo('App\Models\estudiante');
    }

    public $fillable = [
        'nota',
        'evaluacion_id',
        'estudiante_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nota' => 'integer',
        'evaluacion_id' => 'integer',
        'estudiante_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nota' => 'required|numeric',
        'evaluacion_id' => 'required',
        'estudiante_id' => 'required'
    ];
}
