<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* $contato = new SiteContato();
        $contato->nome = 'Sistema SG';
        $contato->telefone = '(11) 999999-9999';
        $contato->email = 'teste@contatosg.com.br';
        $contato->motivo_contato = 1;
        $contato->mensagem = 'Seja, bem vindo ao sistema super gestao';
        $contato->save(); */

        SiteContato::factory()->count(60000)->create();
    }
}
