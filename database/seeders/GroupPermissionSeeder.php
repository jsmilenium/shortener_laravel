<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group_has_permissions')->insert([
            'group_id' => 1, // Administrador
            'permission_id' => 1, // Crud de Loja
        ]);

        DB::table('group_has_permissions')->insert([
            'group_id' => 1, // Administrador
            'permission_id' => 2, // Crud de Modelos
        ]);

        DB::table('group_has_permissions')->insert([
            'group_id' => 1, // Administrador
            'permission_id' => 3, // Crud de Vendedores
        ]);

        DB::table('group_has_permissions')->insert([
            'group_id' => 1, // Administrador
            'permission_id' => 4, // Crud de Loja Estoque
        ]);

        DB::table('group_has_permissions')->insert([
            'group_id' => 1, // Administrador
            'permission_id' => 5, // Crud de Usuários
        ]);

        DB::table('group_has_permissions')->insert([
            'group_id' => 1, // Administrador
            'permission_id' => 6, // Crud de Grupos
        ]);

        DB::table('group_has_permissions')->insert([
            'group_id' => 1, // Administrador
            'permission_id' => 7, // Crud de Permissões
        ]);

        DB::table('group_has_permissions')->insert([
            'group_id' => 2, // Loja
            'permission_id' => 1, // Crud de Loja
        ]);

        DB::table('group_has_permissions')->insert([
            'group_id' => 2, // Loja
            'permission_id' => 2, // Crud de Modelos
        ]);

        DB::table('group_has_permissions')->insert([
            'group_id' => 2, // Loja
            'permission_id' => 3, // Crud de Vendedores
        ]);

        DB::table('group_has_permissions')->insert([
            'group_id' => 2, // Loja
            'permission_id' => 5, // Crud de Usuários
        ]);

        DB::table('group_has_permissions')->insert([
            'group_id' => 3, // Vendedor
            'permission_id' => 3, // Crud de Vendedores
        ]);

        DB::table('group_has_permissions')->insert([
            'group_id' => 3, // Vendedor
            'permission_id' => 5, // Crud de Usuários
        ]);
    }
}
