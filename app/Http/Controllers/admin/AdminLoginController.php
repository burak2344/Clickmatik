<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminLoginController extends Controller
{
    public function oturumac(){

        if(request()->isMethod('POST'))
        {
         $this->validate(request(),[
             'email'=> 'required|email',
             'sifre'=>'required'
         ]);

         $credentials=[
             'email'=>request()->get('email'),
             'password'=>request()->get('sifre'),
             'admin_mi'=>1

         ];
         if(Auth::guard('admin')->attempt($credentials,request()->has('benihatirla')))
         {
             return redirect()->route('admin.adminanasayfa');
         }else
         {
             return back()->withInput()->withErrors(['email'=>'Giriş Hatalı!']);
         }


        }

        return view('admin/adminlogin');
    }

    public function oturumukapat()
    {
        Auth::guard('admin')->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route('admin.adminlogin');

    }
}
