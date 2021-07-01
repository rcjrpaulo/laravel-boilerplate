<?php


namespace App\Services\Roles;


use App\Models\Role;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

class ListRolesService
{
    public function run(array $filters = [], $relations = [], bool $pagination = false, int $itemsPerPage = 20)
    {
        request()->merge([
            'unexpected_error_message' => 'Oops ! Houve um problema ao tentar listar papéis',
        ]);

        return Role::filterByLabel(Arr::get($filters, 'label'))
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
