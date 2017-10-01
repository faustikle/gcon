<h3>Sistema GCON</h3>
<p>Bem vindo ao GCON,</p>

<p>O sindico <strong>{{ $usuario->nome }}</strong> do condominio <strong>{{ $convite->condominio->nome }}</strong> está te enviando um convite de morador.</p>

<p>Acesse este link para fazer seu cadastro: <a href="{{ route('convite.cadastro', $convite->token) }}">>> Clique Aqui <<</a></p>