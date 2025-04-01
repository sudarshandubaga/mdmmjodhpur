<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasUuids;

    public $incrementing = false; // 👈 Disable auto-increment
    protected $keyType = 'string'; // 👈 Set key type to string

    protected $guarded = [];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
    public function menuLocation()
    {
        return $this->belongsTo(MenuLocation::class);
    }
}
