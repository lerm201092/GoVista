<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'medicos';

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
    protected $fillable = ['id', 'name', 'address', 'specialty', 'phone', 'email', 'id_empresa', 'id_area', 'estado','created_user','updated_user'];

    
}
