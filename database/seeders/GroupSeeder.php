<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now();

        DB::table('groups')->insert([
            'name' => 'Administrador',
            'slug' => 'administrador',
            'description' => 'acesso total ao sistema',
            'created_at' => $now
        ]);

        DB::table('groups')->insert([
            'name' => 'Loja',
            'slug' => 'loja',
            'description' => 'acesso perfil loja ao sistema',
            'created_at' => $now
        ]);

        DB::table('groups')->insert([
            'name' => 'Vendedor',
            'slug' => 'vendedor',
            'description' => 'acesso perfil vendedor ao sistema',
            'created_at' => $now
        ]);
    }
}
