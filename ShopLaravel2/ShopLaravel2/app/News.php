<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\News
 *
 * @property int $id
 * @property string $title tiêu đề
 * @property string $content nội dung
 * @property string $image hình
 * @property \Carbon\Carbon $create_at
 * @property \Carbon\Carbon $update_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereCreateAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereUpdateAt($value)
 * @mixin \Eloquent
 */
class News extends Model  {

    public $timestamps = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'news';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'content', 'image', 'create_at', 'update_at'];

//    protected $fillable = ['title', 'content', 'image'];
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

//    public $timestamps = false;

}