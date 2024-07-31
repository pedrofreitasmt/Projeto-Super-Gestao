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
        // Realizando a validação dos dados do formulários recebidos no request
        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        // Customizando a validação do formulário em caso de erros
        $feedback = [
            'nome.min' => 'O campo nome precisa ter pelo menos 3 caracteres.',
            'nome.max' => 'O campo nome tem um limite de 40 caracteres.',
            'nome.unique' => 'O nome inserido já existe.',

            'email.email' => 'O email informado não é válido.',

            'mensagem.max' => 'O campo mensagem tem um limite de 2000 caracteres.',

            'required' => 'O campo :attribute precisa ser preenchido'
        ];

        $request->validate($regras, $feedback);

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
