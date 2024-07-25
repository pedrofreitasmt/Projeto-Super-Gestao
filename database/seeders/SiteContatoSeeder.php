<?php

namespace Database\Seeders;

use App\Models\SiteContato;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $contato = new SiteContato();
        // $contato->nome = 'Hugo';
        // $contato->telefone = '(11)99988-2233';
        // $contato->email = 'hugo123@gmail.com';
        // $contato->motivo_contato = 2;
        // $contato->mensagem = 'Bem vindo ao sistema SG';
        // $contato->save();

        SiteContato::factory()->count(100)->create();
    }
}
