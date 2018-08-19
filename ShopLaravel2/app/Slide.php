<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Slide
 *
 * @property int $id
 * @property string $link
 * @property string $image
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Slide whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Slide whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Slide whereLink($value)
 * @mixin \Eloquent
 */
class Slide extends Model  {

    public $timestamps = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'slides';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['link', 'image'];

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