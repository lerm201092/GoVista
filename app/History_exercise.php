<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History_exercise extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'history_exercises';

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
    protected $fillable = ['id_history', 'id_exercise', 'observation', 'duration', 'session', 'session_ok', 'frequency', 'screen',
        'screen_left', 'screen_right','size', 'status', 'created_user','updated_user'];

}
