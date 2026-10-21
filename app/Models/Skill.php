<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ['title', 'title_fr', 'title_en', 'company', 'description', 'description_fr', 'description_en', 'location', 'lat', 'lng'];
}
