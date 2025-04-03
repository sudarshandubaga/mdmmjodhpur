<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasUuids;

    public function getImageAttribute($image)
    {
        return $image ? asset('storage/' . $image) : null;
    }
}
