<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop_order extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'shop_orders';

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
    protected $fillable = ['id_user', 'description', 'state_pol', 'transaction_date', 'reference_code', 'reference_pol', 'signature', 'value', 'cus', 'pse_bank', 'transaction_id', 'total_sessiones'];

}

