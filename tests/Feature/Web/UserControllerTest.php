<?php

namespace Tests\Feature\Web;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use DatabaseMigrations;

    /*
     * CREATE
     * */

    /** @test */
    public function criar_usuario()
    {
        $this->assertDatabaseCount('users', 2);

        $dados = [
            'name' => 'teste',
            'email' => 'teste@teste.com',
            'role_id' => Role::first()->id,
            'photo' => null,
            'password' => 'teste',
        ];

        $this->post(route('users.store'), $dados)
            ->assertStatus(302);

        $this->assertDatabaseHas('users', ['name' => 'teste']);
        $this->assertDatabaseCount('users', 3);
    }

    /*
     * READ - List
     * */

    /** @test */
    public function listar_usuarios()
    {
        $this->get(route('users.index'))
            ->assertStatus(200);
    }

    /*
     * READ - Show
     * */

    /** @test */
    public function mostrar_usuario()
    {
        $usuario = User::factory()->create();

        $this->get(route('users.show', $usuario))
            ->assertStatus(200);
    }

    /*
     * UPDATE
     * */

    /** @test */
    public function atualizar_usuario()
    {
        $usuario = User::factory()->create(['name' => 'old name']);

        $this->assertDatabaseHas('users', ['name' => 'old name']);

        $dados = [
            'name' => 'new name',
            'email' => 'mail@mail.com',
            'role_id' => '1',
            'photo' => null,
        ];

        $this->put(route('users.update', $usuario), $dados)
            ->assertStatus(302);

        $this->assertDatabaseHas('users', ['name' => 'new name']);
        $this->assertDatabaseMissing('users', ['name' => 'old name']);
    }

    /*
     * DELETE
     * */

    /** @test */
    public function deletar_usuario()
    {
        $usuario = User::factory()->create();

        $this->assertDatabaseHas('users', ['name' => $usuario->name]);

        $this->delete(route('users.destroy', $usuario))
            ->assertStatus(302);

        $this->assertDatabaseMissing('users', ['name' => $usuario->name]);
    }
}
