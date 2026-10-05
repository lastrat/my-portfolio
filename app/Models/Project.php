<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'description', 'role', 'year', 'client', 'tech', 'image', 'slug'];
    protected $casts = ['tech' => 'array'];
}
