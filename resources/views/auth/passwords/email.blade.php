@extends('layout.site')

<!-- Main Content -->
@section('conteudo')
<div class="container">
    <div class="row justify-content-center">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form class="col-sm-4" method="POST" action="{{ url('/password/email') }}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                <label for="email" class=" control-label">Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

            </div>

            <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Enviar redefinição de senha
                    </button>
            </div>
        </form>
    </div>
</div>
@endsection
