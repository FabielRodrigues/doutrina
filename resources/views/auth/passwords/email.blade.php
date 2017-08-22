@extends('layouts.site')

@section('content')
    <!--contact start here-->
    <div class="contact" style="background: #FFF;">
        <div class="container">
            <div class="contact-main">
                <div class="contact-top">
                    <h2>Esqueci a senha</h2>
                    <p>Para receber uma nova senha digite o e-mail que foi utilizado no seu cadastro no formulário abaixo e clique em "Enviar link para resetar a senha". Em poucos minutos você receberá uma mensagem contendo um link para cadastrar uma nova senha.</p>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="contact-block1 center">
                    <div class="login-box container col-lg-offset-3 col-md-offset-3 col-xs-6">
                        <div class="login-box-body">


                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-btn fa-envelope"></i> Enviar link para resetar a senha
                                </button>
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
