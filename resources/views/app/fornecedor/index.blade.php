<h3>Fornecedores</h3>

@php
    /*
    if (isset($var))
    */
@endphp

@isset($fornecedores)
    Fornecedor: {{ $fornecedores[0]['nome'] }}
    <br>
    Status: {{ $fornecedores[0]['status'] }}
    <br>
    CNPJ: {{ $fornecedores[1]['cnpj'] ?? 'Dado não preenchido.' }}

@endisset
<br>
