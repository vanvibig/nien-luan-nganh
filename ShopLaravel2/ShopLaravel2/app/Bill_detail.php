<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Bill_detail
 *
 * @property int $id
 * @property int $id_bill
 * @property int $id_product
 * @property int $quantity số lượng
 * @property float $unit_price
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bill_detail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bill_detail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bill_detail whereIdBill($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bill_detail whereIdProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bill_detail whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bill_detail whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bill_detail whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Bill $bill
 * @property-read \App\Product $product
 */
class Bill_detail extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bill_details';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_bill', 'id_product', 'quantity', 'unit_price'];

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
    protected $dates = [];


    public function product(){
        return $this->belongsTo('App\Product', 'id_product', 'id');
    }

    public function bill(){
        return $this->belongsTo('App\Bill', 'id_bill', 'id');
    }

}
