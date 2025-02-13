<?php

namespace App\Http\Controllers\Api;

use App\Models\Sede;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SedeController extends Controller
{
    public function index()
    {
        return response()->json(Sede::all());
    }
}
