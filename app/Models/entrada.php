<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="tip",
 *      required={tip, contexto_id},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="tip",
 *          description="tip",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="contexto_id",
 *          description="contexto_id",
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
class entrada extends Model
{
    use SoftDeletes;

    public $table = 'entradas';
    

    protected $dates = ['deleted_at'];


    //BelongsTo----------------------------------
    public function regla()
    {
        return $this->BelongsTo('App\Models\regla');
    }

    public $fillable = [
        'entrada',
        'regla_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'entrada' => 'string',
        'regla_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'regla_id' => 'required'
    ];
}
