@extends('layouts.site')

@section('content')
    <!--contact start here-->
    <div class="contact" style="background: #FFF;">
        <div class="container">
            <div class="contact-main">
                <div class="contact-top">
                    <h2>Área de estudo doutrinário do Gaeeb</h2>
                    <p>Acesse o sistema para atualizar as informações e fazer donwload do material referente ao seu curso.</p>
                </div>
                <div class="contact-block1 center">
                    <div class="login-box container col-lg-offset-3 col-md-offset-3 col-xs-6">
                        <div class="login-box-body">

                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-mail</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email"
                                               value="{{ old('email') }}">

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Senha</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password">

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember"> Me lembrar
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-btn fa-sign-in"></i> Login
                                        </button>
                                        <a class="btn btn-link" href="{{ url('/password/reset') }}">Esqueceu sua
                                            senha?</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
