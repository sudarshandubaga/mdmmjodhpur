<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{
    use HasUuids;

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
