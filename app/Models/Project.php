<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = ['title', 'description', 'role', 'year', 'client', 'tech', 'image', 'slug'];
    protected $casts = ['tech' => 'array'];

    public function getImageUrlAttribute()
    {
        $image = $this->image;

        if (empty($image)) {
            return null;
        }

        if (Str::startsWith($image, ['http://', 'https://'])) {
            return $image;
        }

        $path = Str::startsWith($image, 'storage/')
            ? Str::after($image, 'storage/')
            : $image;

        if (Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->url($path);
        }

        return asset($path);
    }
}
