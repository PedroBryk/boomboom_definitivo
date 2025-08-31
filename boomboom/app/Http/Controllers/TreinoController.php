<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TreinoController extends Controller
{
    public function index()

    {
        return view('treinos.index');
    }
}
