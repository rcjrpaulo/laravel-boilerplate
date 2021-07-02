<?php

namespace Tests\Feature\Web;

use App\Models\Role;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class RoleControllerTest extends TestCase
{
    use DatabaseMigrations;

    /*
     * CREATE
     * */

    /** @test */
    public function criar_papel()
    {
        $this->assertDatabaseCount('roles', 2);

        $dados = [
            'name' => 'teste',
            'label' => 'teste label',
        ];

        $this->post(route('roles.store'), $dados)
            ->assertStatus(302);

        $this->assertDatabaseHas('roles', ['name' => 'teste']);
        $this->assertDatabaseCount('roles', 3);
    }

    /*
     * READ - List
     * */

    /** @test */
    public function listar_papeis()
    {
        $response = $this->get(route('roles.index'))
            ->assertStatus(200);
    }

    /*
     * READ - Show
     * */

    /** @test */
    public function mostrar_papel()
    {
        $papel = Role::factory()->create();

        $this->get(route('roles.show', $papel))
            ->assertStatus(200);
    }

    /*
     * UPDATE
     * */

    /** @test */
    public function atualizar_papel()
    {
        $papel = Role::factory()->create(['name' => 'old name']);

        $this->assertDatabaseHas('roles', ['name' => 'old name']);

        $dados = [
            'name' => 'new name',
            'email' => 'mail@mail.com',
            'role_id' => '1',
            'photo' => null,
        ];

        $this->put(route('roles.update', $papel), $dados)
            ->assertStatus(302);

        $this->assertDatabaseHas('roles', ['name' => 'new name']);
        $this->assertDatabaseMissing('roles', ['name' => 'old name']);
    }

    /*
     * DELETE
     * */

    /** @test */
    public function deletar_papel()
    {
        $papel = Role::factory()->create();

        $this->assertDatabaseHas('roles', ['name' => $papel->name]);

        $this->delete(route('roles.destroy', $papel))
            ->assertStatus(302);

        $this->assertDatabaseMissing('roles', ['name' => $papel->name, 'deleted_at' => null]);
    }
}
