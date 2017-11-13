@extends('layout.site')

@section('conteudo')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <h3 class="text-center">Adicionar Produto</h3>
                <br>
                    <form class="" action="{{route('admin.produtos.salvar')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        @include('admin.produtos._form')
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
            </div>
        </div>
    </div>
@endsection