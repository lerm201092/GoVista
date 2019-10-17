<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'appointments';

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
    protected $fillable = ['id', 'id_patient', 'title', 'body', 'id_medico', 'id_empresa', 'fullday', 'start', 'end', 'color', 'state', 'created_user', 'updated_user'];

    
}
