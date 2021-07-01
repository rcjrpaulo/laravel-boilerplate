<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Services\Users\ListUserService;
use App\Services\Users\StoreUserService;
use App\Services\Users\UpdateUserService;
use App\Services\Users\DestroyUserService;

class UserController extends Controller
{
    public function index()
    {
        $users = (new ListUserService())->run(
            request()->query(),
            ['role']
        );
    }

    public function create()
    {
        $roles = Role::get(['id', 'label']);
    }

    public function store(StoreUserRequest $storeUserRequest)
    {
        $user = (new StoreUserService())->run($storeUserRequest->validated());

        session()->flash('success', 'Usuário criado com sucesso !');

        return redirect(route('users.show', $user));
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        $roles = Role::get(['id', 'label']);
    }

    public function update(UpdateUserRequest $updateUserRequest, User $user)
    {
        $user = (new UpdateUserService())->update($user, $updateUserRequest->validated());

        session()->flash('success', 'Usuário atualizado com sucesso !');

        return redirect(route('users.edit', $user));
    }

    public function destroy(User $user)
    {
        (new DestroyUserService())->destroy($user);

        session()->flash('success', 'Usuário deletado com sucesso !');

        return redirect(route('users.index'));
    }
}
