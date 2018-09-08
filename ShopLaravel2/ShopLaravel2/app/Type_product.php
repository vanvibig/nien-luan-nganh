<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Type_product
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Type_product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Type_product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Type_product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Type_product whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Type_product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Type_product whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $product
 */
class Type_product extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'type_products';

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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product(){
        return $this->hasMany('App\Product','id_type', 'id');
    }

}
