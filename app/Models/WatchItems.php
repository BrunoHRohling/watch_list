<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WatchItems extends Model
{
    protected $fillable = ['title', 'type', 'year', 'status', 'rating', 'poster_url', 'notes'];
    
}
