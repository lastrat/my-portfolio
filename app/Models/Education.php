<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = ['year', 'title', 'company', 'description', 'location', 'lat', 'lng'];
}
