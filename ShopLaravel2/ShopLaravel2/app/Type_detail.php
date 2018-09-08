<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_detail extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'type_details';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'image'];

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


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function product(){
        return $this->belongsToMany('App\Product', 'product_type_detail', 'type_id',  'product_id');
    }



}