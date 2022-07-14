@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{route('app.fornecedor.adicionar')}}">Novo</a></li>
                <li><a href="{{route('app.fornecedor')}}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width:50%;margin-left:auto;margin-right:auto">
                <form action="{{route('app.fornecedor.listar')}}" method="post">
                    @csrf
                    
                    <input type="text" name="nome" class="borda-preta" value="{{old('nome')}}" placeholder="Nome">
                    {{$errors->has('nome') ? $errors->first('nome') : ''}}
                    <input type="text" name="site" class="borda-preta" value="{{old('site')}}" placeholder="Site">
                    {{$errors->has('site') ? $errors->first('site') : ''}}
                    <input type="text" name="uf" class="borda-preta" value="{{old('uf')}}" placeholder="UF">
                    {{$errors->has('uf') ? $errors->first('uf') : ''}}
                    <input type="text" name="email" class="borda-preta" value="{{old('email')}}" placeholder="E-mail">
                    {{$errors->has('email') ? $errors->first('email') : ''}}
                    <button type="submit">Pesquisar</button>                  
                </form>
            </div>
        </div>
    </div>
@endsection