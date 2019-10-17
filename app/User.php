<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','username', 'email', 'password', 'nombres', 'apellidos', 'roluser','address','tipodoc','numdoc','movil','id_area','updated_user','estado','token', 'profile_image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];
	
	/* This method is important */
	public function getImageAttribute() { return $this->profile_image; }
	
}
