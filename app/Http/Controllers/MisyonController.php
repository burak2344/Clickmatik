<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MisyonController extends Controller
{
    public function index(){
        return view('menüelements/misyon');
    }
}
