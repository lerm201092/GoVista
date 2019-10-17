<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History_exercises_detail extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'history_exercises_details';

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
    protected $fillable = ['id', 'duracion', 'coin', 'star', 'failure', 'progress', 'status'];

    
}
