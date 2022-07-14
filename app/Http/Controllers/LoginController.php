<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request){
        $erro = '';
        if($request->get('erro') == 1){
            $erro = 'Usuario e ou senha nao existe';
        }
        if($request->get('erro') == 2){
            $erro = 'Necessario realizar login para acessar a pagina';
        }
        
        return view('site.login',['titulo' => 'Login','erro' => $erro]);
    }

    public function autenticar(Request $request){
        //regras de valida��o
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        $feedback = [
            'usuario.email' => 'O campo usuario e obrigatorio',
            'senha.required' => 'O campo de senha e obrigatorio'
        ];

        $request->validate($regras,$feedback);

        $email = $request->get('usuario');
        $password = $request->get('senha');

        //iniciar um model User
        $user = new User();
        
        $usuario = $user->where('email', '=', $email)->where('password','=',$password)->get()->first();
        
        if(isset($usuario->name)){
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.home');
        }else{
            return redirect()->route('site.login',['erro' => 1]);
        }

    }

    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
}
