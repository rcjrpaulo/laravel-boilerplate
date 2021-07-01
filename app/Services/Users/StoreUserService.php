<?php


namespace App\Services\Users;


use App\Models\User;

class StoreUserService
{
    public function run(array $data)
    {
        request()->merge([
            'unexpected_error_message' => 'Oops ! Houve um problema ao tentar criar usuário',
        ]);

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        if (request()->hasFile('photo') && request()->file('photo')->isValid()) {
            $photo = request()->photo->store("files/user/{$user->id}");
            $user->update(['photo' => $photo]);
        }

        return $user->refresh();
    }
}
