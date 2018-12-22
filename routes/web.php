<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ola', function () {
    return "<h1> Olá Visitante!</h1>";
});


#Parametros Via Get
Route::get('/ola/{param1}', function ($p1) {
    return "<h1> Olá $p1!</h1>";
});


#Parametros com regex
Route::get('/nomeregex/{param1}', function ($p1) {
    return "<h1> Olá $p1!</h1>";
})->where('param1',"[a-zA-Z]+");


#Parametros Opicionais
Route::get('/paramopicional/{param1?}', function ($p1 =null) {
    if(isset($p1)):
     return "<h1> Parâmetro $p1!</h1>";
    else:
     return "Você não passou nenhum parametro";
    endif;
});