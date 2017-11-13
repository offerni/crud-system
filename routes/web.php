<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/categorias', ['as' => 'categorias', 'uses' => 'Admin\CategoriaController@index']);
Route::get('/produtos', ['as' => 'produtos', 'uses' => 'Admin\ProdutoController@index']);
Route::get('/pesquisa', ['as' => 'pesquisa', 'uses' => 'PesquisaController@pesquisa']);



Route::group(['middleware'=>'auth'], function() {

    //CATEGORIAS

    Route::get('/admin/categorias', ['as' => 'admin.categorias', 'uses' => 'Admin\CategoriaController@index']);
    Route::get('/admin/categorias/adicionar', ['as' => 'admin.categorias.adicionar', 'uses' => 'Admin\CategoriaController@adicionar']);
    Route::post('/admin/categorias/salvar', ['as' => 'admin.categorias.salvar', 'uses' => 'Admin\CategoriaController@salvar']);
    Route::get('/admin/categorias/editar/{id}', ['as' => 'admin.categorias.editar', 'uses' => 'Admin\CategoriaController@editar']);
    Route::put('/admin/categorias/atualizar/{id}', ['as' => 'admin.categorias.atualizar', 'uses' => 'Admin\CategoriaController@atualizar']);
    Route::get('/admin/categorias/deletar/{id}', ['as' => 'admin.categorias.deletar', 'uses' => 'Admin\CategoriaController@deletar']);

    //PRODUTOS

    Route::get('/admin/produtos',['as'=>'admin.produtos','uses'=>'Admin\ProdutoController@index']); // Vai para o controller da página principal
    Route::get('/admin/produtos/adicionar',['as'=>'admin.produtos.adicionar','uses'=>'Admin\ProdutoController@adicionar']); // retorna controller para a view de adicionar
    Route::post('/admin/produtos/salvar',['as'=>'admin.produtos.salvar','uses'=>'Admin\ProdutoController@salvar']); // retorna controller para o botão salvar que insere os dados no BD
    Route::get('/admin/produtos/editar/{id}',['as'=>'admin.produtos.editar','uses'=>'Admin\ProdutoController@editar']); // retorna controller para a view de editar por ID
    Route::put('/admin/produtos/atualizar/{id}',['as'=>'admin.produtos.atualizar','uses'=>'Admin\ProdutoController@atualizar']); //retorna controller para atualizar o BD por ID
    Route::get('/admin/produtos/deletar/{id}',['as'=>'admin.produtos.deletar','uses'=>'Admin\ProdutoController@deletar']); // retorna controller para deletar o dado por ID

});

Auth::routes();
Route::get('/home',['as'=>'home','uses'=>'HomeController@index']);


