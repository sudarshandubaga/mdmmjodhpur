<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasUuids;

    public $incrementing = false; // 👈 Disable auto-increment
    protected $keyType = 'string'; // 👈 Set key type to string

    protected $guarded = [];


    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getImageAttribute($image)
    {
        return $image ? asset('storage/' . $image) : null;
    }
}
