<?php


namespace App\Services\Users;


use App\Models\User;
use Illuminate\Support\Facades\Storage;

class DestroyUserService
{
    public function run(User $user)
    {
        request()->merge([
            'unexpected_error_message' => 'Oops ! Houve um problema ao tentar deletar usuário',
        ]);

        if (Storage::exists($user->photo)) {
            Storage::delete($user->photo);
        }

        return $user->delete();
    }
}
