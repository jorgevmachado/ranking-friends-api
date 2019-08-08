<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(PaisSeeder::class);
         $this->call(EstadoSeeder::class);
         $this->call(CidadeSeeder::class);
         $this->call(EstadoCivilSeeder::class);
         $this->call(CategoriaSeeder::class);
         $this->call(PontuacaoSeeder::class);
         $this->call(PessoaSeeder::class);
         $this->call(EnderecoSeeder::class);
         $this->call(ContatoSeeder::class);
    }
}
