<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\photo
 *
 * @property int $id
 * @property string $name
 * @property string $location
 * @property string $tag
 * @property string $description
 * @method static \Illuminate\Database\Eloquent\Builder|photo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|photo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|photo query()
 * @method static \Illuminate\Database\Eloquent\Builder|photo whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|photo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|photo whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|photo whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|photo whereTag($value)
 * @mixin \Eloquent
 */
class photo extends Model
{
    use HasFactory;

    protected $table = 'photo';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'user_id', 'location', 'description', 'imagepath'];

    public $timestamps = false;



    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }


    // protected $timestamps = true;

    // protected $dateFormat = 'h:m:s';
}
