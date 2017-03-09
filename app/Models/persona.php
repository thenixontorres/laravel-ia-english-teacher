<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="persona",
 *      required={nombre, apellido, cedula, user_id},
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
 *          property="apellido",
 *          description="apellido",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="cedula",
 *          description="cedula",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="foto",
 *          description="foto",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="user_id",
 *          description="user_id",
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
class persona extends Model
{
    use SoftDeletes;

    public $table = 'personas';
    

    protected $dates = ['deleted_at'];

    //hasMany----------------------------------
    public function estudiantes()
    {
        return $this->hasMany('App\Models\estudiante');
    }
    public function materias()
    {
        return $this->hasMany('App\Models\materia');
    }
    //BelongsTo----------------------------------
    public function user()
    {
        return $this->BelongsTo('App\User');
    }

    public $fillable = [
        'nombre',
        'apellido',
        'cedula',
        'foto',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'apellido' => 'string',
        'cedula' => 'string',
        'foto' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|max:20',
        'apellido' => 'required|max:20',
        'cedula' => 'required|numeric',
        'user_id' => 'nullable'
    ];
}
