@extends('site.layouts.basico') {{-- Puxando a view "basico" --}}

@section('titulo', $titulo) {{-- Alterando o nome de "titulo" utilizando o controller --}}

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>

        <div class="informacao-pagina formulario_login">
            <form action="{{ route('site.login') }}" method="POST">
                @csrf
                <input name="usuario" value="{{ old('usuario') }}" class="m-3 rounded-3" type="text" placeholder="Usuário">
                @if ($errors->has('usuario'))
                    <div class="text-danger">{{ $errors->first('usuario') }}</div>
                @endif

                <input name="senha" value="{{ old('senha') }}" class="m-3 rounded-3" type="password" placeholder="Senha">
                @if ($errors->has('senha'))
                    <div class="text-danger">{{ $errors->first('senha') }}</div>
                @endif

                <button class="m-3 rounded-3" type="submit">Acessar</button>
            </form>
            @if (isset($erro) && $erro != '')
                <div class="text-danger">{{ $erro }}</div>
            @endif
        </div>
    </div>

    <div class="rodape">
        <div class="redes-sociais">
            <h2>Redes sociais</h2>
            <img src="{{ asset('img/facebook.png') }}">
            <img src="{{ asset('img/linkedin.png') }}">
            <img src="{{ asset('img/youtube.png') }}">
        </div>
        <div class="area-contato">
            <h2>Contato</h2>
            <span>(11) 3333-4444</span>
            <br>
            <span>supergestao@dominio.com.br</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src="{{ asset('img/mapa.png') }}">
        </div>
    </div>

@endsection
