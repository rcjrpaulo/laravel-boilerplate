<?php


namespace App\Services\Roles;


use App\Models\Role;

class DestroyRolesService
{
    public function run(Role $role)
    {
        request()->merge([
            'unexpected_error_message' => 'Oops ! Houve um problema ao tentar deletar papel',
        ]);

        $role->permissions()->sync([]);

        return $role->delete();
    }
}
