<div class="form-group row">
    <label for="formGroupExampleInput" class="col-sm-2 col-form-label">Nome</label>
    <div class="col-sm-10">
        <input name="nome" type="text" class="form-control" placeholder="" value="{{isset($registro['produtos']->nome) ? $registro['produtos']->nome : ''}}" required>
    </div>
</div>
<div class="form-group row">
    <label for="formGroupExampleInput" class="col-sm-2 col-form-label">Descrição</label>
    <div class="col-sm-10">
        <input name="descricao" type="text" class="form-control"  placeholder="" value="{{isset($registro['produtos']->descricao) ? $registro['produtos']->descricao : ''}}" required>
    </div>
</div>

<div class="form-group row">
    <label for="exampleFormControlFile1" class="col-sm-2 col-form-label">Imagem</label>
    <div class="col-sm-6">
        <input name="images[]" type="file" multiple class="form-control-file" required>
    </div>
    @if($registro['produtos'])
        <div class="col-sm-4 justify-content-center">
            <div id="carousel{{$registro['produtos']->id}}" class="carousel slide align-middle" data-ride="carousel"
                 style="width: 200px; height: 100px; overflow: hidden; display: inline-flex; background: #ccc;" >
                <div class="carousel-inner align-middle">
                    @foreach( $registro['produtos']->images()->get() as $key=>$imagem)
                        @if($key == 0)
                            <div class="carousel-item active align-middle" data-toggle="modal" data-target="#modalFotos{{$key}}">
                        @else
                            <div class="carousel-item align-middle" data-toggle="modal" data-target="#modalFotos{{$key}}">
                        @endif
                        <div style="width: 80%; margin: 0 auto">
                            <img class="img-fluid d-block w-100 align-middle justify-content-center" src="{{asset($imagem->url)}}">
                        </div>
                        </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modalFotos{{$key}}" tabindex="-1" role="dialog" aria-labelledby="modalFotos" aria-hidden="true">
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
                    <a class="carousel-control-prev" href="#carousel{{$registro['produtos']->id}}" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel{{$registro['produtos']->id}}" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    </div>
                    <p class="text-sm-left"> Clique na imagem para ampliar </p>
            </div>
            @endif
    </div>


<div class="form-group row">
    <label for="exampleFormControlSelect2">Categorias do produto</label>
    <select multiple class="form-control" name="categorias[]">
        @foreach($registro['categorias'] as $categoria)
            <option {{$registro['produtos'] && $registro['produtos']->categorias()->where('categoria_id', '=', $categoria->id)->count() > 0 ? 'selected' : '' }} value="{{$categoria->id}}">{{ $categoria->nome }}</option>
        @endforeach
    </select>
</div>
