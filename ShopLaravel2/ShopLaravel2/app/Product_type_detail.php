<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_type_detail extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_type_detail';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['product_id', 'type_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['date_order', 'create_at', 'update_at'];

}