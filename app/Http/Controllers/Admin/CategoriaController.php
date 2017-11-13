<?php

namespace CRUDSystem\Http\Controllers\Admin;

use CRUDSystem\Categoria;
use Illuminate\Http\Request;
use CRUDSystem\Http\Controllers\Controller;

class CategoriaController extends Controller
{
    public function index(){
        $registros = Categoria::all(); // recebe os dados do banco e retorna para a view
        return view('admin.categorias.index',compact('registros'));
    }

    public function adicionar(){
        return view('admin.categorias.adicionar');

    }

    public function salvar(Request $req){
        $dados = $req->all();

        if($req->hasFile('img_url')){ // Tratamento de imagem
            $imagem = $req->file('img_url');
            $num = rand(1111, 9999);
            $dir = "img/categorias";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "image_url_".$num.".".$ex;
            $imagem->move($dir, $nomeImagem);
            $dados['img_url'] = $dir."/".$nomeImagem;
        }

        Categoria::create($dados);

        return redirect()->route('admin.categorias');
    }

    public function editar($id){ // busca a categoria pelo id e retorna para a view de edição
        $registro = Categoria::find($id);
        return view('admin.categorias.editar', compact('registro'));
    }

    public function atualizar(Request $req, $id){

        $dados = $req->all(); // recebe um array com os dados do form

        if($req->hasFile('img_url')){ // Tratamento de imagem
            $imagem = $req->file('img_url');
            $num = rand(1111, 9999);
            $dir = "img/categorias";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "image_url_".$num.".".$ex;
            $imagem->move($dir, $nomeImagem);
            $dados['img_url'] = $dir."/".$nomeImagem;
        }

        Categoria::find($id)->update($dados); // atualiza a categoria confome os dados recebidos relacionados ao id
        return redirect()->route('admin.categorias');
    }

    public function deletar($id){
        Categoria::find($id)->delete();
        return redirect()->route('admin.categorias');
    }




}
