@extends('layout.site')

@section('conteudo')
<div class="container">
    <div class="row justify-content-center">
        <form class="col-sm-4" method="POST" action="{{ url('/login') }}" >
            {{ csrf_field() }}

            <div class="form-group" {{ $errors->has('email') ? ' has-error' : '' }}>
                <label for="exampleDropdownFormEmail2">Email</label>
                <input type="email" name="email" class="form-control" placeholder="email@example.com" value="{{ old('email') }}" required autofocus >

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

            </div>
            <div class="form-group" {{ $errors->has('password') ? ' has-error' : '' }}>
                <label for="exampleDropdownFormPassword2">Senha</label>
                <input type="password" name="password" class="form-control" placeholder="Password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="remember" {{ old('remember') ? 'checked' : ''}}> Lembrar de mim
                </label>
            </div>

            <div class="form-group">
                <a href="{{ url('/password/reset') }}">
                    Esqueceu sua senha?
                </a>
            </div>
            <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
    </div>
</div>
@endsection
