<?php

namespace App;

use IlluminateDatabaseEloquentModel;

class Reference_list extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reference_lists';

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
    protected $fillable = ['id','father','description','codelist','value','state','order','addcoduser','modcoduser','created_at','updated_at','deleted_at'];
}
