<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Super Gestão - @yield('titulo')</title>
    <link rel="stylesheet" href="{{ asset("css/estilo_basico.css") }}">
</head>

<body>
    @include('site.layouts.partials.topo') {{-- Incluindo um layout padrão no topo para as views --}}
    @yield('conteudo') {{-- Puxando o conteudo de cada view --}}
</body>

</html>
