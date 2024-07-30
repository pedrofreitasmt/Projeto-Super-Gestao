{{ $slot }}

<form action={{ route('site.contato') }} method="POST">
    @csrf
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="{{ $classe }}">
    <br>
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="{{ $classe }}">
    <br>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{ $classe }}">
    <br>

    <select name="motivo_contato" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>

        @foreach ($motivo_contatos as $key => $motivo_contato)
            <option value="{{ $motivo_contato->id }}" {{ old('motivo_contato') == $motivo_contato->id ? 'selected': '' }}>{{ $motivo_contato->motivo_contato }}</option>
        @endforeach

    </select>
    <br>
    <textarea name="mensagem" class="{{ $classe }}">
        @if (old('mensagem') != '')
            {{ old('mensagem') }}
        @else
            Preencha aqui sua mensagem
        @endif
    </textarea>
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>

<div style="position:absolute; top:0px; left:0px; width:100%; background:red">
    <pre>
        {{ print_r($errors) }}
    </pre>
</div>
