<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now();

        DB::table('permissions')->insert([
            'name' => 'Loja',
            'slug' => 'loja',
            'description' => 'crud de loja',
            'created_at' => $now
        ]);

        DB::table('permissions')->insert([
            'name' => 'Modelo',
            'slug' => 'modelo',
            'description' => 'crud de modelos',
            'created_at' => $now
        ]);

        DB::table('permissions')->insert([
            'name' => 'Vendedor',
            'slug' => 'vendedor',
            'description' => 'crud de vendedores',
            'created_at' => $now
        ]);

        DB::table('permissions')->insert([
            'name' => 'Loja Estoque',
            'slug' => 'loja_estoque',
            'description' => 'crud de loja estoque',
            'created_at' => $now
        ]);

        DB::table('permissions')->insert([
            'name' => 'Usuário',
            'slug' => 'usuario',
            'description' => 'crud de usuários',
            'created_at' => $now
        ]);

        DB::table('permissions')->insert([
            'name' => 'Grupo',
            'slug' => 'grupo',
            'description' => 'crud de grupos',
            'created_at' => $now
        ]);

        DB::table('permissions')->insert([
            'name' => 'Permissões',
            'slug' => 'permissoes',
            'description' => 'crud de permissões',
            'created_at' => $now
        ]);
    }
}
