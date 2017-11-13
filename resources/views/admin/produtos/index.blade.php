@extends('layout.site')


@section('conteudo')

    <div class="container">

        <div class="row justify-content-center">
            <h3>Produtos</h3>
        </div>
        <br>
        <table class="table table-bordered ">
            <thead>
            <tr>
                <th scope="col">Produto</th>
                <th scope="col">Descrição</th>
                <th scope="col">Imagens</th>
                <th scope="col">Categorias</th>
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
                    <td width="100" height="100" class="align-middle ">
                        <div id="carousel{{$registro->id}}" class="carousel slide align-middle " data-ride="carousel"
                             style="width: 200px; height: 100px; overflow: hidden; display: inline-flex; background: #ccc;" >
                            <div class="carousel-inner align-middle ">
                                @foreach( $registro->images()->get() as $key=>$imagem)
                                    @if($key == 0)
                                        <div class="carousel-item active align-middle" data-toggle="modal" data-target="#modalFotos{{$key}}{{$registro->id}}">
                                            @else
                                                <div class="carousel-item align-middle" data-toggle="modal" data-target="#modalFotos{{$key}}{{$registro->id}}">
                                                    @endif
                                                    <div style="width: 80%; margin: 0 auto">
                                                        <img class="img-fluid d-block w-100 align-middle justify-content-center" src="{{asset($imagem->url)}}">
                                                    </div>
                                                </div>
                                                <!-- Modal -->
                                                <div class="modal fade" id="modalFotos{{$key}}{{$registro->id}}" tabindex="-1" role="dialog" aria-labelledby="modalFotos" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img class="img-fluid" src="{{asset($imagem->url)}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                        </div>
                                        <a class="carousel-control-prev" href="#carousel{{$registro->id}}" role="button" data-slide="prev" style="color: #000000 " >
                                            <span class="carousel-control-prev-icon" aria-hidden="true" ></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carousel{{$registro->id}}" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                            </div>
                            <p style="font-size: 11px" class="font-weight-light text-sm-center"> Clique na imagem para ampliar </p>
                        </div>
                    </td>
                    <td>
                        @foreach($registro->categorias as $categoria)
                            @if(!Auth::guest())
                                <span class="span-cat"><a href="{{route('admin.categorias')}}"> {{$categoria->nome}}</a> </span>
                            @else
                                <span class="span-cat"><a href="{{route('categorias')}}"> {{$categoria->nome}}</a> </span>
                            @endif
                        @endforeach
                    </td>
                    @if(!Auth::guest())
                        <td width="200">
                            <a href="{{route('admin.produtos.editar', $registro->id)}}" class="btn btn-warning">Alterar</a>
                            <a href="{{route('admin.produtos.deletar', $registro->id)}}" class="btn btn-danger">Excluir</a>
                        </td>
                    @endif
                </tr>


            @endforeach
            </tbody>
        </table>
        @if(!Auth::guest())
            <a href="{{route('admin.produtos.adicionar')}}" class="btn btn-primary">Adicionar</a>
        @endif




    </div>

@endsection