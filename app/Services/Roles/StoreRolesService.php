<?php


namespace App\Services\Roles;


use App\Models\Role;

class StoreRolesService
{
    public function run(array $data)
    {
        request()->merge([
            'unexpected_error_message' => 'Oops ! Houve um problema ao tentar criar papel',
        ]);

        return Role::create($data);
    }
}
