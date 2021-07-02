<?php

namespace Tests;

use App\Models\Permission;
use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $faker;

    public function setUp(): void
    {
        parent::setUp();
        $this->faker = Factory::create();

        // Run the DatabaseSeeder...
        $this->seed();

        // user admin autenticado
        $this->actingAs(User::where('email', 'admin@admin.com')->first());

        //gates
        if (Schema::hasTable('permissions')) {
            $permissions = Permission::get(['name'])->pluck('name')->toArray();

            foreach ($permissions as $permission) {
                Gate::define($permission, function ($user) use ($permission) {
                    return true;
                });
            }
        }
    }
}
