<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ['title', 'company', 'description', 'location', 'lat', 'lng'];
}
