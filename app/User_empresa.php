<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_empresa extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_empresas';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_user', 'id_empresa', 'state'];

    
}
