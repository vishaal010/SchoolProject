<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\photography
 *
 * @property int $id
 * @property string $name
 * @property string $location
 * @property string $tag
 * @property string $description
 * @method static \Illuminate\Database\Eloquent\Builder|photography newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|photography newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|photography query()
 * @method static \Illuminate\Database\Eloquent\Builder|photography whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|photography whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|photography whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|photography whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|photography whereTag($value)
 * @mixin \Eloquent
 */
class photography extends Model
{
    use HasFactory;

    protected $table = 'photographies';

    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo(user::class);
    }


    // protected $timestamps = true;

    // protected $dateFormat = 'h:m:s';
}
