<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produtos', function(Blueprint $table){
            $forncedor_id = DB::table('fornecedores')->insertGetId([
                'nome' => 'fornecedorpadrao',
                'site' => 'fornecedorpadrao.com.br',
                'uf' => 'SP',
                'email' => 'contato@fornecedorpadrao.com.br',
            ]);
            $table->unsignedBigInteger('fornecedor_id')->default($forncedor_id)->after('id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function(Blueprint $table){
            $table->DropForeign('produtos_fornecedor_id_foreing');
            $table->DropColumn('fornecedor_id');
        });   
    }
};
