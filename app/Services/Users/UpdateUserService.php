<?php


namespace App\Services\Users;


use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class UpdateUserService
{
    public function run(User $user, array $data)
    {
        request()->merge([
            'unexpected_error_message' => 'Oops ! Houve um problema ao tentar atualizar usuário',
        ]);

        if (request()->hasFile('photo') && request()->file('photo')->isValid()) {
            $photo = request()->photo->store("files/user/{$user->id}");
            $data['photo'] = $photo;
            if (Storage::exists($user->photo)) {
                Storage::delete($user->photo);
            }
        }

        if (Arr::get($data, 'password', false)) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return $user->refresh();
    }
}
