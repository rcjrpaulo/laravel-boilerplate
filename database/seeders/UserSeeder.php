<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Usuário Administrador',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'role_id' => 1,
        ]);
        User::factory()->create([
            'name' => 'Usuário Cliente',
            'email' => 'client@client.com',
            'password' => bcrypt('client'),
            'role_id' => 2,
        ]);
    }
}
