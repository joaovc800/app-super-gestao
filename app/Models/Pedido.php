<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    public function produtos()
    {
        //return $this->belongsToMany('App\Models\Produto', 'pedidos_produtos');
        return $this->belongsToMany('App\Models\Item', 'pedidos_produtos', 'pedido_id', 'produto_id')->withPivot('created_at', 'updated_at','id');
        /*
          @params 
          1- Modelo do relacionanemnto N para N.
          2- Tabela auxiliar que armazena os registros de armazenamento.
          3- Nome da Fk da tabela mapeada pelo model na tabela de relacionamento.
          4- Nome da Fk mapeada pelo model ultilizada no relacionamento que está sendo implementado. 
        */

    }
}
