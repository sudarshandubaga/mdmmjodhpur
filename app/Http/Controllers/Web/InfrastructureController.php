<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Infrastructure;
use Illuminate\Http\Request;

class InfrastructureController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(Infrastructure $infrastructure)
    {
        return view('web.screens.infrastructure_detail', ['page' => $infrastructure]);
    }
}
