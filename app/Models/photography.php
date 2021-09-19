<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class photography extends Model
{
    use HasFactory;

    protected $table = 'photographies';

    protected $primaryKey = 'id';

    // protected $timestamps = true;

    // protected $dateFormat = 'h:m:s';
}
