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

Route::resource('pais', 'PaisController');
Route::resource('estado', 'EstadoController');
Route::resource('cidade', 'CidadeController');

Route::resource('categoria', 'CategoriaController');
Route::resource('pontuacao', 'PontuacaoController');

Route::prefix('estado-civil')->group(function (){
    Route::get('/', 'EstadoCivilController@index');
    Route::get('{id}', 'EstadoCivilController@show');
});


Route::resource('pessoa',  'PessoaController');

Route::resource('endereco', 'EnderecoController');
Route::resource('contato',  'ContatoController');
