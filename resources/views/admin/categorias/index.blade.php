@extends('layout.site')


@section('conteudo')

    <div class="container">

        <div class="row justify-content-center">
            <h3>Categorias</h3>
        </div>
        <br>
        <table class="table table-bordered ">
            <thead>
            <tr>
                <th scope="col">Categoria</th>
                <th scope="col">Descrição</th>
                <th scope="col">Imagem</th>
                @if(!Auth::guest())
                    <th></th>
                @endif

            </tr>
            </thead>
            <tbody>

                @foreach($registros as $registro)
                    <tr>
                        <td>{{$registro->nome}}</td>
                        <td>{{$registro->descricao}}</td>
                        <td align="center"> <img width="100" src="{{asset($registro->img_url)}}"></td>
                        @if(!Auth::guest())
                            <td width="200">
                                <a href="{{route('admin.categorias.editar', $registro->id)}}" class="btn btn-warning">Alterar</a>
                                <a href="{{route('admin.categorias.deletar', $registro->id)}}" class="btn btn-danger">Excluir</a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if(!Auth::guest())
            <a href="{{route('admin.categorias.adicionar')}}" class="btn btn-primary">Adicionar</a>
        @endif



    </div>

@endsection