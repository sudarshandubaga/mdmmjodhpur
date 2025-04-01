<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class MenuLocation extends Model
{
    use HasUuids;

    public $incrementing = false; // 👈 Disable auto-increment
    protected $keyType = 'string'; // 👈 Set key type to string

    protected $guarded = [];
}
