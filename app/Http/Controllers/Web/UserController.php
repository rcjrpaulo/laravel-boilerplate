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

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::get(['id', 'label']);

        return view('users.create', compact('roles'));
    }

    public function store(StoreUserRequest $storeUserRequest)
    {
        $user = (new StoreUserService())->run($storeUserRequest->validated());

        session()->flash('success', 'Usuário criado com sucesso !');

        return redirect(route('users.show', $user));
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::get(['id', 'label']);

        return view('users.edit', compact('user', 'roles'));
    }

    public function update(UpdateUserRequest $updateUserRequest, User $user)
    {
        $user = (new UpdateUserService())->run($user, $updateUserRequest->validated());

        session()->flash('success', 'Usuário atualizado com sucesso !');

        return redirect(route('users.edit', $user));
    }

    public function destroy(User $user)
    {
        (new DestroyUserService())->run($user);

        session()->flash('success', 'Usuário deletado com sucesso !');

        return redirect(route('users.index'));
    }
}
