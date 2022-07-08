<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $collection = 'books';

    protected $guarded = [];

    protected $dates = [
        "published_at"
    ];
}
