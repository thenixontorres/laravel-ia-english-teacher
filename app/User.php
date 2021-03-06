<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    use SoftDeletes;

    protected $table = 'users';

    //hasOne----------------------------------
    public function persona()
    {
        return $this->hasOne('App\Models\persona');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 
        'password',
        'tipo',
        'estado'
    ];

    /**
     * The attributes that should be casted to native types.
     * AGREGADO
     * @var array
     */

    protected $casts = [
        'email' => 'string',
        'password' => 'string',
        'tipo' => 'string',
        'estado' => 'string'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];

    /**
     * Validation rules
     *AGREGADO
     * @var array
     */
    public static $rules = [
        'email' => 'nullable',
        'password' => 'required',
        'tipo' => 'required',
        'estado' => 'required'
    ];
}
