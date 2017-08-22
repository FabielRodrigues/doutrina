<h2>Área de estudo doutrinário do Gaeeb.</h2>
Clique aqui para resetar a sua senha: <a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
