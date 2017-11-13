<?php

namespace CRUDSystem\Http\Controllers\Admin;

use CRUDSystem\Categoria;
use Illuminate\Http\Request;
use CRUDSystem\Http\Controllers\Controller;
use CRUDSystem\Produto;
use Psy\Output\ProcOutputPager;

class ProdutoController extends Controller
{
    public function index(){
        $registros = Produto::all(); // recebe os dados do banco e retorna para a view
        return view('admin.produtos.index', compact('registros'));
    }

    public function adicionar(){
        $registro['categorias'] = Categoria::all(); // retorna uma collection com todas as categorias cadastradas
        $registro['produtos'] = null; // iniciando a var
        return view('admin.produtos.adicionar', compact('registro'));
    }

    public function salvar(Request $req){
        $dados = $req->all();
        $produto = Produto::create($dados);

        if($req->hasFile('images')){ // Tratamento de imagem
            $imagens = $req->file('images');
            $imageDados = array();
            foreach ($imagens as $imagem){
                $num = rand(1111, 9999);
                $dir = "img/produtos";
                $ex = $imagem->guessClientExtension();
                $nomeImagem = "image_".$num.".".$ex;
                $imagem->move($dir, $nomeImagem);
                $url = $dir."/".$nomeImagem;
                $imageDados[] = ['url' => $url];
            }
            $produto->images()->createMany($imageDados); // Relaciona produto a tabela de imagens e
                    // cria um array com as urls das imgs

        }
        $categorias =[]; // cria um array de categorias
        foreach ($dados['categorias'] as $id){ // percorre os ids de categorias com a tabela intermediaria
            $categorias[] = ['categoria_id' => $id];
        }

        $produto->categorias()->attach($categorias); // relaciona os ids de categorias com o produto


        return redirect()->route('admin.produtos');
    }

    public function editar($id){
        $registro = [];
        $registro['produtos'] = Produto::find($id); // busca o produto pelo id e retorna para a view de edição
        $registro['categorias'] = Categoria::all();
        return view('admin.produtos.editar', compact('registro'));
    }

    public function atualizar(Request $req, $id)
    {
        $dados = $req->all(); // recebe um array com os dados do form
        $produto = Produto::find($id);
        $produto->update($dados);

        if ($req->hasFile('images')) { // Tratamento de imagem
            $imagens = $req->file('images');
            $imageDados = array();
            foreach ($imagens as $imagem) {
                $num = rand(1111, 9999);
                $dir = "img/produtos";
                $ex = $imagem->guessClientExtension();
                $nomeImagem = "image_" . $num . "." . $ex;
                $imagem->move($dir, $nomeImagem);
                $url = $dir . "/" . $nomeImagem;
                $imageDados[] = ['url' => $url];
            }
            $produto->images()->createMany($imageDados);
        }

        $categorias = [];
        foreach ($dados['categorias'] as $id) {
            $categorias[] = ['categoria_id' => $id];
        }

        $produto->categorias()->detach(); // remove a relação entre categorias e produtos para não haver duplicidade
        $produto->categorias()->attach($categorias); // adiciona novamente a relação com as novas categorias selecionadas
        return redirect()->route('admin.produtos');
    }

    public function deletar($id){
        Produto::find($id)-> delete();
        return redirect()->route('admin.produtos');
    }
}
