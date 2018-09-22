<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    //
    protected $fillable = ['name', 'description', 'slug', 'release_date', 'rating', 'ticket_price', 'country', 'genre', 'photo'];
    public $timestamps = true;
}
