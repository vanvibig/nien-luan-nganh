<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\BillController
 *
 * @property int $id
 * @property int|null $id_customer
 * @property \Carbon\Carbon|null $date_order
 * @property float|null $total tổng tiền
 * @property string|null $payment hình thức thanh toán
 * @property string|null $note
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bill whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bill whereDateOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bill whereIdCustomer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bill whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bill wherePayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bill whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bill whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Bill_detail[] $bill_detail
 * @property-read \App\Customer|null $customer
 */
class Bill extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bills';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_customer', 'date_order', 'total', 'payment', 'note'];

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
    protected $dates = ['date_order'];


    public function bill_detail(){
        return $this->hasMany('App\Bill_detail', 'id_bill', 'id');
    }

    public function customer(){
        return $this->belongsTo('App\Customer', 'id_customer', 'id');
    }

}
