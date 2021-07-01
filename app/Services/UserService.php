<?php


namespace App\Services;


use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class UserService
{
    public function index(array $filters = [], $relations = [], bool $pagination = false, int $itemsPerPage = 20)
    {
        request()->merge([
            'unexpected_error_message' => 'Oops ! Houve um problema ao tentar criar usuário',
        ]);

        return User::filterByName(Arr::get($filters, 'name'))
            ->with($relations)
            ->when(
                $pagination,
                function (Builder $builder) use ($itemsPerPage) {
                    return $builder->paginate($itemsPerPage)->withQueryString();
                },
                function (Builder $builder) {
                    return $builder->get();
                }
            );
    }

    public function store(array $data)
    {
        request()->merge([
            'unexpected_error_message' => 'Oops ! Houve um problema ao tentar criar usuário',
        ]);

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        if (request()->hasFile('photo')) {
            $photo = request()->photo->store("files/user/{$user->id}");
            $user->update(['photo' => $photo]);
        }

        return $user->refresh();
    }

    public function update(User $user, array $data)
    {
        request()->merge([
            'unexpected_error_message' => 'Oops ! Houve um problema ao tentar atualizar usuário',
        ]);

        if (request()->hasFile('photo')) {
            $photo = request()->photo->store("files/user/{$user->id}");
            $data['photo'] = $photo;
            if (Storage::exists($user->photo)) {
                Storage::delete($user->photo);
            }
        }

        if (Arr::get($data, 'password', false)) {
            $data['password'] = bcrypt($data['password']);
        }

        $user->update($data);

        return $user->refresh();
    }

    public function destroy(User $user)
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
