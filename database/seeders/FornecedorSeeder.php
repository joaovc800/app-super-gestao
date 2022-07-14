<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor100';
        $fornecedor->site = 'fornecedor100.com.br';
        $fornecedor->uf = 'CE';
        $fornecedor->email = 'fornecedor100@gmail.com';
        $fornecedor->save();

        Fornecedor::create([
            'nome'  => 'Fornecedor200',
            'site'  => 'fornecedor200.com.br',
            'uf'    => 'RS',
            'email' => 'fornecedor200@gmail.com'
        ]);

        /* DB::table('fornecedores')->insert([
            'nome'  => 'Fornecedor300',
            'site'  => 'fornecedor300.com.br',
            'uf'    => 'SP',
            'email' => 'fornecedor300@gmail.com'
        ]); */
    }
}
