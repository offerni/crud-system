<div class="form-group row">
    <label for="formGroupExampleInput" class="col-sm-2 col-form-label">Nome</label>
    <div class="col-sm-10">
        <input name="nome" type="text" class="form-control" placeholder="" value="{{isset($registro->nome) ? $registro->nome : ''}}">
    </div>
</div>
<div class="form-group row">
    <label for="formGroupExampleInput" class="col-sm-2 col-form-label">Descrição</label>
    <div class="col-sm-10">
        <input name="descricao" type="text" class="form-control"  placeholder="" value="{{isset($registro->descricao) ? $registro->descricao : ''}}">
    </div>
</div>

<div class="form-group row">
    <label for="exampleFormControlFile1" class="col-sm-2 col-form-label">Imagem</label>
    <div class="col-sm-6">
        <input name="img_url" type="file" class="form-control-file" value="{{isset($registro->img_url) ? $registro->img_url : ''}}">
    </div>

    @if(isset($registro->img_url))
        <div class="col-sm-4">
            <img width="150" src="{{asset($registro->img_url)}}" />
        </div>
    @endif
</div>