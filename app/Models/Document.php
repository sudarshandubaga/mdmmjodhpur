<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasUuids;

    public function getFileAttribute($file)
    {
        return $file ? asset('storage/' . $file) : null;
    }
}
