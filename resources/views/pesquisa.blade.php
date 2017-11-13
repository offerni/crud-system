@extends('layout.site')

@section('conteudo')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-sm-10 ">
                <div class="list-group">
                    @foreach($registro['produtos'] as $pesquisa)
                        <div class="row">
                            <div class="col-sm-10 pr-0">
                                <a href="{{route('produtos')}}" class="list-group-item list-group-item-action">
                                    <h6>{{$pesquisa->nome}} <span class="badge badge-primary"> Produto</span></h6>
                                    <p>{{$pesquisa->descricao}}</p>
                                </a>
                            </div>
                            <div class="col-sm-2 pl-1 pb-1">

                                <div id="carousel{{$pesquisa->id}}" class="carousel slide align-middle " data-ride="carousel"
                                     style="width: 140px; height: 90px; overflow: hidden; display: inline-flex; background: #ccc;" >
                                    <div class="carousel-inner align-middle">
                                        @foreach( $pesquisa->images()->get() as $key=>$imagem)
                                            @if($key == 0)
                                                <div class="carousel-item active align-middle" data-toggle="modal" data-target="#modalFotos{{$key}}{{$pesquisa->id}}">
                                                    @else
                                                        <div class="carousel-item align-middle" data-toggle="modal" data-target="#modalFotos{{$key}}{{$pesquisa->id}}">
                                                            @endif
                                                            <div style="width: 80%; margin: 0 auto;">
                                                                <img class="img-fluid d-block w-100 align-middle justify-content-center" style="cursor: pointer;" src="{{asset($imagem->url)}}">
                                                            </div>
                                                        </div>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="modalFotos{{$key}}{{$pesquisa->id}}" tabindex="-1" role="dialog" aria-labelledby="modalFotos" aria-hidden="true">
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
                                                <a class="carousel-control-prev" href="#carousel{{$pesquisa->id}}" role="button" data-slide="prev" style="color: #000000 " >
                                                    <span class="carousel-control-prev-icon" aria-hidden="true" ></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carousel{{$pesquisa->id}}" role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                    </div>
                                </div>

                            </div>
                    @endforeach
                </div>

                <div class="list-group">
                    @foreach($registro['categorias'] as $pesquisa)

                        <a href="{{route('categorias')}}" class=" list-group-item list-group-item-action">
                            <div class="row">
                                <div class="col-sm-10">
                                    <h6>{{$pesquisa->nome}} <span class="badge badge-secondary"> Categoria</span></h6>
                                    <p>{{$pesquisa->descricao}}</p>
                                </div>
                                <div class=" col-sm-2">
                                    <img width="100" class="img-fluid align-middle justify-content-end" src="{{asset($pesquisa->img_url)}}">
                                </div>
                            </div>
                        </a>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection

