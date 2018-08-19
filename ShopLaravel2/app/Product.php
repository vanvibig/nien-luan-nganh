<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Product
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $id_type
 * @property string|null $description
 * @property float|null $unit_price
 * @property float|null $promotion_price
 * @property string|null $image
 * @property string|null $unit
 * @property int|null $new
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereIdType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereNew($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePromotionPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Bill_detail[] $bill_detail
 * @property-read \App\Type_product|null $product_type
 */
class Product extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'id_type', 'description', 'amount', 'unit_price', 'promotion_price', 'image', 'unit', 'new', 'view_count', 'amount'];

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
//'field' => 'array'

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['date_order', 'create_at', 'update_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product_type()
    {
        return $this->belongsTo('App\Type_product', 'id_type', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bill_detail()
    {
        return $this->hasMany('App\Bill_detail', 'id_product', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function type_detail()
    {
        return $this->belongsToMany('App\Type_detail', 'product_type_detail', 'product_id', 'type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function author()
    {
        return $this->belongsToMany('App\Author', 'product_author', 'product_id', 'author_id');
    }

}
