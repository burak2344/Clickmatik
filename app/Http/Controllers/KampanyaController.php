<?php

namespace App\Http\Controllers;

use App\Models\Kampanya;
use Illuminate\Http\Request;
use App\Models\Kategori;

class KampanyaController extends Controller
{
    public function index($slug_kampanya_adi){
        $kampanya = Kampanya::where('kampanya_adi', $slug_kampanya_adi )->firstorfail();
        return view('kampanya',compact('kampanya'));
    }
}
