<?php

namespace App;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;

class Patient extends Model
{
    use FormAccessible;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'patients';

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
    protected $fillable = ['id', 'tipodoc', 'numdoc', 'name1', 'name2', 'surname1', 'surname2', 'email', 'birthdate',
        'sex', 'id_eps', 'address', 'phone', 'id_area', 'zone', 'contact_names', 'contact_surnames', 'contact_phone',
        'contact_city', 'father_name', 'father_surname', 'father_phone', 'father_email', 'mother_name', 'mother_surname',
        'mother_phone', 'mother_email', 'id_empresa', 'id_user', 'state', 'coin', 'star', 'created_user','updated_user'];

    public function getBirthdateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    /**
     * Get the user's first name for forms.
     *
     * @param  string  $value
     * @return string
     */
    public function formBirthdateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    public function setBirthdateAttribute($value)
    {
        $this->attributes['birthdate'] = Carbon::createFromFormat('Y-m-d', $value);
    }
}
