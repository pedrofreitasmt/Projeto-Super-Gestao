<h3>Fornecedores</h3>

@isset($fornecedores)
    @forelse ($fornecedores as $indice => $fornecedor)

        Iteração atual: {{ $loop->iteration }}
        <br>
        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        Status: {{ $fornecedor['status'] }}
        <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? 'Dado não preenchido.' }}
        <br>
        Telefone: ({{ $fornecedor['ddd'] ?? '' }}) {{ $fornecedor['telefone'] ?? '' }}
        <br>
        @if ($loop->first)
            Primeira iteração do Loop
            <br>
        @endif
        <br>
        @if ($loop->last)
            Última iteração do Loop
            <br>
            Total de registros: {{ $loop->count }}
        @endif
        <hr>
    @empty
        Não existem fornecedores cadastrados!
    @endforelse

@endisset
<br>
