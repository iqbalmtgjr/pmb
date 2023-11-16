<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index() 
    {
        // dd('ajdsas');
        return view('info.index');
    }
}
