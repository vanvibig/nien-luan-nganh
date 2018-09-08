<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Customer
 *
 * @property int $id
 * @property string $name
 * @property string $gender
 * @property string $email
 * @property string $address
 * @property string $phone_number
 * @property string $note
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Bill[] $bill
 */
class Customer extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'customer';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'gender', 'email', 'address', 'phone_number', 'note'];

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

    public function bill(){
        return $this->hasMany('App\Bill', 'id_customer', 'id');
    }

}
