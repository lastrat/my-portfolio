<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = ['year', 'title', 'title_fr', 'title_en', 'company', 'description', 'description_fr', 'description_en'];
}
