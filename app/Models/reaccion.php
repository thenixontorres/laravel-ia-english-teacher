<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="reaccion",
 *      required={reaccion, cliente_id},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="reaccion",
 *          description="reaccion",
 *          type="string"
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
class reaccion extends Model
{
    use SoftDeletes;

    public $table = 'reaccions';
    

    protected $dates = ['deleted_at'];

    //hasMany----------------------------------
    public function respuestas()
    {
        return $this->hasMany('App\Models\respuesta');
    }

    public $fillable = [
        'reaccion',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'reaccion' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'reaccion' => 'required',
    ];
}
