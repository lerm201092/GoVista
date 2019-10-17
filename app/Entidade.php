<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entidade extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'entidades';

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
    protected $fillable = ['id', 'code', 'name', 'address', 'phone', 'email', 'id_area', 'contact', 'estado', 'tipo','created_user','updated_user'];

    
}
