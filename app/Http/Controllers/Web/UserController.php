<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Services\UserService;

class UserController extends Controller
{
    private $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function index()
    {
        $users = $this->userService->index(
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
        $user = $this->userService->store($storeUserRequest->validated());

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
        $user = $this->userService->update($user, $updateUserRequest->validated());

        session()->flash('success', 'Usuário atualizado com sucesso !');

        return redirect(route('users.edit', $user));
    }

    public function destroy(User $user)
    {
        $this->userService->destroy($user);

        session()->flash('success', 'Usuário deletado com sucesso !');

        return redirect(route('users.index'));
    }
}
