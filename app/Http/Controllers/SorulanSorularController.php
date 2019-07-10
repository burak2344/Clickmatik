<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class SorulanSorularController extends Controller
{
    public function index()
    {
        return view('menüelements/sorulansorular');
    }
}
