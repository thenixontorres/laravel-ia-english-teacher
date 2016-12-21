<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="contexto",
 *      required={problema_id, contexto},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="problema_id",
 *          description="problema_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="contexto",
 *          description="contexto",
 *          type="string"
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
class contexto extends Model
{
    use SoftDeletes;

    public $table = 'contextos';
    

    protected $dates = ['deleted_at'];

    //hasMany----------------------------------
    public function tips()
    {
        return $this->hasMany('App\Models\tip');
    }
    public function reglas()
    {
        return $this->hasMany('App\Models\regla');
    }
    public function apuntadors()
    {
        return $this->hasMany('App\Models\regla');
    }
    //BelongsTo----------------------------------
    public function caso()
    {
        return $this->BelongsTo('App\Models\caso');
    }

    public $fillable = [
        'caso_id',
        'contexto'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'caso_id' => 'integer',
        'contexto' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'caso_id' => 'required',
        'contexto' => 'required'
    ];
}
