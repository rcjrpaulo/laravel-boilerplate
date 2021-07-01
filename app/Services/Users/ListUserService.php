<?php


namespace App\Services\Users;


use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

class ListUserService
{
    public function run(array $filters = [], $relations = [], bool $pagination = false, int $itemsPerPage = 20)
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
}
