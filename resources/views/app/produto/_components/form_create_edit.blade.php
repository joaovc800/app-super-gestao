    @if(isset($produto->id))
        <form action="{{route('produto.update', ['produto' => $produto->id])}}" method="post">          
            @csrf
            @method('PUT')
    @else
        <form action="{{route('produto.store')}}" method="post">          
            @csrf
    @endif
            <select name="fornecedor_id" class="borda-preta">
                <option selected disabled> -- Selecione um fornecedor -- </option>

                @foreach($fornecedores as $fornecedor)
                    <option {{($produto->fornecedor_id ?? old('fornecedor_id')) == $fornecedor->id ? 'selected' : ''}} value="{{$fornecedor->id}}">
                        {{$fornecedor->nome}}
                    </option>
                @endforeach
                
            </select>
            {{$errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : ''}}

            <input type="text" name="nome" class="borda-preta" value="{{$produto->nome ?? old('nome')}}" placeholder="Nome">
            {{$errors->has('nome') ? $errors->first('nome') : ''}}
            <input type="text" name="descricao" class="borda-preta" value="{{$produto->descricao ?? old('descricao')}}" placeholder="Descricao">
            {{$errors->has('descricao') ? $errors->first('descricao') : ''}}
            <input type="text" name="peso" class="borda-preta" value="{{$produto->peso ?? old('peso')}}" placeholder="Peso">
            {{$errors->has('peso') ? $errors->first('peso') : ''}}
            <select name="unidade_id" class="borda-preta">
                <option selected disabled> -- Selecione a unidade de medida -- </option>

                @foreach($unidades as $unidade)
                    <option {{($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : ''}} value="{{$unidade->id}}">
                        {{$unidade->descricao}}
                    </option>
                @endforeach
                
            </select>
            {{$errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}
            
            <button type="submit">Cadastrar</button>                  
        </form>