@extends('layout.site')

@section('conteudo')
    <div class="container">
        <div class="row justify-content-center" >
            <div class="col-sm-8">
                <h3 class="text-center">Editar Categoria</h3>
                <br>
                <form class="" action="{{route('admin.categorias.atualizar', $registro->id)}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="put">
                    {{csrf_field()}}
                    @include('admin.categorias._form')
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
@endsection