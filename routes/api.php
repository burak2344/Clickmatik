<?php

use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get("/kullanicibilgileri","ApiController@bigilerim");
Route::post("/kullanicibilgileri/ekle","ApiController@bilgiekle");
Route::delete("/kullanicibilgileri/sil/{id}","ApiController@bilgisil");
Route::post("/kullanicibilgileri/guncelle/{id}","ApiController@bilgiguncelle");
Route::get("/detay","ApiController@detay");
Route::get("/tumkullanicilar","ApiController@tumkullanici");
Route::post("/mesaj/ekle","İletisimeGecController@iletisim");
Route::post("/kampanya/ekle","KampanyaController@kampanyaekle");
Route::post("/kampanya/guncelle/{id}","KampanyaController@kampanyaguncelle");
Route::delete("/kampanya/sil/{id}","KampanyaController@kampanyasil");

