<?php


namespace App\Services\Roles;


use App\Models\Role;

class UpdateRolesService
{
    public function run(Role $role, array $data)
    {
        request()->merge([
            'unexpected_error_message' => 'Oops ! Houve um problema ao tentar atualizar papel',
        ]);

        $role->update($data);

        return $role->refresh();
    }
}
