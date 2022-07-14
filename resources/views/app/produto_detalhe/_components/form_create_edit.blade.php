    @if(isset($produto_detalhe->id))
        <form action="{{route('produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id])}}" method="post">          
            @csrf
            @method('PUT')
    @else
        <form action="{{route('produto-detalhe.store')}}" method="post">          
            @csrf
    @endif
            <input type="text" name="produto_id" class="borda-preta" value="{{$produto_detalhe->produto_id ?? old('produto_id')}}" placeholder="ID do produto">
            {{$errors->has('produto_id') ? $errors->first('produto_id') : ''}}
            <input type="text" name="comprimento" class="borda-preta" value="{{$produto_detalhe->comprimento ?? old('comprimento')}}" placeholder="Comprimento">
            {{$errors->has('comprimento') ? $errors->first('comprimento') : ''}}
            <input type="text" name="largura" class="borda-preta" value="{{$produto_detalhe->largura ?? old('largura')}}" placeholder="Largura">
            {{$errors->has('largura') ? $errors->first('largura') : ''}}
            <input type="text" name="altura" class="borda-preta" value="{{$produto_detalhe->altura ?? old('altura')}}" placeholder="Altura">
            {{$errors->has('altura') ? $errors->first('altura') : ''}}
            <select name="unidade_id" class="borda-preta">
                <option selected disabled> -- Selecione a unidade de medida -- </option>

                @foreach($unidades as $unidade)
                    <option {{($produto_detalhe->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : ''}} value="{{$unidade->id}}">
                        {{$unidade->descricao}}
                    </option>
                @endforeach
                
            </select>
            {{$errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}
            
            <button type="submit">Cadastrar</button>                  
        </form>