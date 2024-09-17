<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;
class FornecedorController extends Controller
{
    public function index()
    {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request)
    {
        $fornecedores = Fornecedor::where('nome', 'LIKE', '%'.$request->input('nome').'%')
        ->where('site', 'LIKE', '%'.$request->input('site').'%')
        ->where('uf', 'LIKE', '%'.$request->input('uf').'%')
        ->where('email', 'LIKE', '%'.$request->input('email').'%')
        ->get();

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores]);
    }

    public function adicionar(Request $request)
    {
        $msg = '';

        if ($request->input('_token') != '' && $request->input('id') == '') {
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
                'uf.min' => 'O campo nome deve ter no mínimo 2 caracteres',
                'uf.max' => 'O campo nome deve ter no máximo 2 caracteres',
                'email.email' => 'O campo e-mail não foi preenchido corretamente'
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();

            $fornecedor->create($request->all());

            $msg = 'Cadastro realizado com sucesso!';
        }

        if ($request->input('_token') != '' && $request->input('id') != '') {
            $fornecedor = Fornecedor::findOrFail($request->input('id'));

            $update = $fornecedor->update($request->all());

            $msg = $update ? 'Atualização realizada com sucesso' : 'Erro ao atualizar o registro';

            return redirect()->route('app.fornecedor.editar', [
                'id' => $request->input('id'),
                'msg' => $msg]);
        }

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function editar($id, $msg = '')
    {
        $fornecedor = Fornecedor::findOrFail($id);

        return view('app.fornecedor.adicionar', [
            'fornecedor' => $fornecedor,
            'msg' => $msg]);
    }
}
