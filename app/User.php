<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    protected $table = "sisam_users";
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name',
        'user_first_name',
        'user_last_name',
        'user_ci',
        'email',
        'password',
        'role_id',
        'user_types_id',
        'user_state',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [
            'id' => $this->id,
            'user_name' => $this->user_name,
            'user_first_name' => $this->user_first_name,
            'user_last_name' => $this->user_last_name,
            'user_ci' => $this->user_ci,
            'email' => $this->email,
            'role_id' => $this->role_id,
            'user_types_id' => $this->user_type_id,
            'user_state' => $this->user_state,
            'foo' => 'bar'
        ];
    }
}


