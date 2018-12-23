<?php
use Illuminate\Http\Request;
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


#Agrupamento de rotas
/**
 * Ajuda na legibilidade do código
 */
Route::prefix('app')->group(function () {
    Route::get('/home', function () {
        return " Página Home";
    });
    Route::get('/profile', function () {
        return " Página Perfil";
    });
    Route::get('/about', function () {
        return " Página Sobre";
    });
});


#Redirecionamento de rotas
Route::redirect("app","app/home",301);

#Redirecionando para Views
Route::view("/hello", "hello"); // Modo abreviado

Route::view("/hellonome","viewnome",["nome"=>"Henrique", "sobrenome"=>"Gregorio"]);


Route::post("/rest/post/", function(Request $request){
    $nome = $request->input("nome");
    return "Hello $nome";
});