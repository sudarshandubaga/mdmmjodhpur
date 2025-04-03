<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infrastructure extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'banner_image',
        'excerpt',
        'description',
        'seo_title',
        'seo_keywords',
        'seo_description',
    ];

    public function getImageAttribute($image)
    {
        return $image ? asset('storage/' . $image) : null;
    }

    public function getBannerImageAttribute($image)
    {
        return $image ? asset('storage/' . $image) : null;
    }
}
