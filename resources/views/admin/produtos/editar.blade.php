@extends('layout.site')

@section('conteudo')
    <div class="container">
        <h3 class="text-center">Editar Produtos</h3>
        <form class="" action="{{route('admin.produtos.atualizar', $registro['produtos']->id)}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}

            @include('admin.produtos._form')

            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
@endsection