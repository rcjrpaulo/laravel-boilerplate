<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::factory()->create([
            'name' => 'admin',
            'label' => 'Administrador',
        ]);

        Role::factory()->create([
            'name' => 'client',
            'label' => 'Cliente',
        ]);
    }
}
