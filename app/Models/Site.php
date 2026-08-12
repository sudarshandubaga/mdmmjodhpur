<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasUuids;

    protected $casts = [
        'social_links' => 'array',
    ];

    public function getLogoAttribute($image)
    {
        return $image ? asset('storage/' . $image) : null;
    }

    public function getFaviconAttribute($image)
    {
        return $image ? asset('storage/' . $image) : null;
    }
}
