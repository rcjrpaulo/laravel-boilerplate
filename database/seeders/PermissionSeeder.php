<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name' => 'create_users',
                'label' => 'Criar Usuários',
                'group_label' => 'Usuários',
            ],
            [
                'name' => 'read_users',
                'label' => 'Ver Usuários',
                'group_label' => 'Usuários',
            ],
            [
                'name' => 'update_users',
                'label' => 'Atualizar Usuários',
                'group_label' => 'Usuários',
            ],
            [
                'name' => 'delete_users',
                'label' => 'Deletar Usuários',
                'group_label' => 'Usuários',
            ],
            [
                'name' => 'create_roles',
                'label' => 'Criar Grupos',
                'group_label' => 'Grupos',
            ],
            [
                'name' => 'read_roles',
                'label' => 'Ver Grupos',
                'group_label' => 'Grupos',
            ],
            [
                'name' => 'update_roles',
                'label' => 'Atualizar Grupos',
                'group_label' => 'Grupos',
            ],
            [
                'name' => 'delete_roles',
                'label' => 'Deletar Grupos',
                'group_label' => 'Grupos',
            ]
        ];

        foreach ($permissions as $permission) {
            Permission::factory()->create([
                'name' => $permission['name'],
                'label' => $permission['label'],
                'group_label' => $permission['group_label'],
            ]);
        }
    }
}
