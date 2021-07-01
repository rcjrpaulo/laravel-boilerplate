<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Models\Role;
use App\Services\Roles\DestroyRolesService;
use App\Services\Roles\ListRolesService;
use App\Services\Roles\StoreRolesService;
use App\Services\Roles\UpdateRolesService;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function index()
    {
        $roles = (new ListRolesService())->run(
            request()->query(),
            []
        );

        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(StoreRoleRequest $storeRoleRequest)
    {
        $role = (new StoreRolesService())->run($storeRoleRequest->validated());

        session()->flash('success', 'Papel criado com sucesso !');

        return redirect(route('roles.show', $role));
    }

    public function show(Role $role)
    {
        return view('roles.show', compact('role'));
    }

    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    public function update(UpdateRoleRequest $updateRoleRequest, Role $role)
    {
        $role = (new UpdateRolesService())->run($role, $updateRoleRequest->validated());

        session()->flash('success', 'Papel atualizado com sucesso !');

        return redirect(route('roles.edit', $role));
    }

    public function destroy(Role $role)
    {
        (new DestroyRolesService())->run($role);

        session()->flash('success', 'Papel deletado com sucesso !');

        return redirect(route('users.index'));
    }

    public function updatePermissions(Role $role)
    {
        $role->permissions()->sync(request()->get('permissions', []));

        session()->flash('success', 'Permissões do papel atualizadas com sucesso !');

        return back();
    }
}
