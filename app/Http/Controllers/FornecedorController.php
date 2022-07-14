<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index(){
        return view('app.fornecedor.index');
    }
    public function listar(Request $request){
        $fornecedores = Fornecedor::with(['produtos'])->where('nome','like','%'.$request->input('nome').'%')
        ->where('site','like','%'.$request->input('site').'%')
        ->where('uf','like','%'.$request->input('uf').'%')
        ->where('email','like','%'.$request->input('email').'%')
        ->paginate(3);

        
        return view('app.fornecedor.listar',['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }
    public function adicionar(Request $request){
        $msg = '';
        if(!empty($request->input('_token')) && empty($request->input('id'))){
            
            //validação
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];

            $feedback = [
                'required' => "O campo :attribute deve ser preenchido",
                'nome.min' => 'O campo nome deve ter no minimo 3 caractres',
                'nome.max' => 'O campo nome deve ter no maximo 40 caractres',
                'uf.min' => 'O campo uf deve ter no minimo 2 caractres',
                'uf.max' => 'O campo uf deve ter no maximo 2 caractres',
                'email' => 'O campo e-mail não foi preenchido corretamente'
            ];

            $request->validate($regras,$feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msg = 'Cadastro relizado com sucesso';
        }

        //edição
        if(!empty($request->input('_token')) && !empty($request->input('id'))){
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if($update){
                $msg =  'Atualizacao realizado';
            }else{
                $msg =  'erro ao tentar atualizar o registro';
            }

            return redirect()->route('app.fornecedor.editar',['id' => $request->input('id'),'msg' => $msg]);

        }


        return view('app.fornecedor.adicionar',['msg' => $msg]);
    }
    public function editar($id,$msg = ''){
        $fornecedor = Fornecedor::find($id);
        
        return view('app.fornecedor.adicionar',['fornecedor' => $fornecedor,'msg' => $msg]);
    }

    public function excluir($id){
        Fornecedor::find($id)->delete();
        //Fornecedor::find($id)->forceDelete();
        return redirect()->route('app.fornecedor');
    }
}
