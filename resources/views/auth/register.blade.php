@extends('layout.site')

@section('conteudo')
<div class="container">
    <div class="row justify-content-center">
        <form class="col-sm-4" method="POST" action="{{ url('/register') }}" >
            {{ csrf_field() }}

            <div class="form-group" {{ $errors->has('name') ? ' has-error' : '' }}>
                <label for="name" class="control-label">Nome</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required autofocus >

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group" {{ $errors->has('email') ? ' has-error' : '' }}>
                <label for="name" class="control-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}"placeholder="exemplo@mail.com" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>


            <div class="form-group" {{ $errors->has('password') ? ' has-error' : '' }}>
                <label for="password" class="control-label">Senha</label>
                <input type="password" name="password" class="form-control"  required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="password-conform" class="control-label">Confirmar Senha</label>
                <input type="password" name="password_confirmation" class="form-control"  required>
            </div>

            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>
</div>
@endsection
