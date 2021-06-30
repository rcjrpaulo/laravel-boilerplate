<?php

namespace App\Providers;

use App\Models\Permissao;
use App\Models\Permission;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        //        $this->registerPolicies();

        if (Schema::hasTable('permissions')) {
            $permissions = Permission::get(['name'])->pluck('name')->toArray();

            foreach ($permissions as $permission) {
                Gate::define($permission, function ($user) use ($permission) {
                    if (empty($user->role->permissions->pluck('name')->toArray())) {
                        return false;
                    }

                    return in_array($permission, $user->role->permissions->pluck('name')->toArray());
                });
            }
        }
    }
}
