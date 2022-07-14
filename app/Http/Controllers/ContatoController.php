<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request){
        /* $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->email = $request->input('email');
        $contato->mensagem = $request->input('mensagem');

        $contato->save(); */

        //$contato = new SiteContato();
        //$contato->create($request->all());
        
        $motivo_contatos = MotivoContato::all();
        return view('site.contato',['titulo' => 'Contato','motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request){
        //validar dos dados do form recebidos no request

        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000',
        ];

        $feeedback = [
            'nome.min' => 'O campo nome precisa ter no minimo 3 caracteres',
            'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres',
            'nome.unique' => 'O nome informado já está em uso',
            'email.email' => 'Informar um e-mail válido',
            'mensagem.max' => 'A mensagem deve ter no máximo 2000 caracteres',
            'required' => 'O campo :attribute deve ser preenchido'
        ];

        $feeedback = array_map('utf8_encode',$feeedback);

        $request->validate($regras,$feeedback);
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
