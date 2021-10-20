<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    protected $fillable = ['user_id', 'photo_id', 'comment'];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function reviews()
    {
        return $this->belongsTo(photo::class);
    }


}

