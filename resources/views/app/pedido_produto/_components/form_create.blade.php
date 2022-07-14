
<form action="{{route('pedido-produto.store', ['pedido' => $pedido])}}" method="post">          
    @csrf

    <select name="produto_id" class="borda-preta">
        <option selected disabled> -- Selecione um produto -- </option>

        @foreach($produtos as $produto)
            <option {{($pedido->produto_id ?? old('produto_id')) == $produto->id ? 'selected' : ''}} value="{{$produto->id}}">
                {{$produto->nome}}
            </option>
        @endforeach
            
    </select>
    {{$errors->has('produto_id') ? $errors->first('produto_id') : ''}}

    <input type="number" name="quantidade" value="{{old('quantidade') ? old('quantidade') : ''}}" placeholder="Quantidade" class="borda-preta">
    {{$errors->has('quantidade') ? $errors->first('quantidade') : ''}}

    <button type="submit">Cadastrar</button>                  
</form>