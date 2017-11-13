<?php

namespace CRUDSystem\Http\Controllers;

use Illuminate\Http\Request;
use CRUDSystem\Produto;
use CRUDSystem\Categoria;

class PesquisaController extends Controller
{
    public function pesquisa(Request $req){
        $registro = array();
        $registro['produtos'] = Produto::search($req->termo)->get(); // recebe o termo selecionado na searchbox e
        // retorna uma collection deles
        $registro['categorias'] = Categoria::search($req->termo)->get();
    return view('pesquisa', compact('registro')); // retorna um array com o resultado
        // da pesquisa e envia para a view
    }
}
