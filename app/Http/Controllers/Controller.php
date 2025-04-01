<?php

namespace App\Http\Controllers;

use App\Models\Site;

abstract class Controller
{
    public $site;
    public function __construct()
    {
        $this->site = Site::whereRaw('1=1')->first();

        view()->share(['site' => $this->site]);
    }
}
