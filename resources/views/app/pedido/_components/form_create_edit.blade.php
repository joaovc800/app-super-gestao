@if(isset($pedido->id))
    <form action="{{route('pedido.update', ['pedido' => $pedido->id])}}" method="post">          
        @csrf
        @method('PUT')
@else
    <form action="{{route('pedido.store')}}" method="post">          
        @csrf
@endif
        <select name="cliente_id" class="borda-preta">
            <option selected disabled> -- Selecione um cliente -- </option>

            @foreach($clientes as $cliente)
                <option {{($pedido->cliente_id ?? old('cliente_id')) == $cliente->id ? 'selected' : ''}} value="{{$cliente->id}}">
                    {{$cliente->nome}}
                </option>
            @endforeach
                
        </select>
        {{$errors->has('cliente_id') ? $errors->first('cliente_id') : ''}}

        <button type="submit">Cadastrar</button>                  
    </form>