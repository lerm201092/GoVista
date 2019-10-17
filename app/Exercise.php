<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'exercises';

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
    protected $fillable = ['id', 'description', 'observation', 'state' ,'created_user','updated_user'];

    
}
