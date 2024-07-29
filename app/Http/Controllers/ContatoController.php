<?php

namespace App\Http\Controllers;

use App\Models\SiteContato;
use Illuminate\Http\Request;
use App\Models\MotivoContato;
class ContatoController extends Controller
{
    public function contato(Request $request)
    {
        $motivo_contatos = $motivo_contatos = MotivoContato::all();

        return view("site.contato", ['titulo' => 'Contato', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request)
    {
        // Realizar a validação dos dados do formulários recebidos no request
        $request->validate([
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required|max:2000'
        ]);
    }
}
