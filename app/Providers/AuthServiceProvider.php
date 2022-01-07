<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',

       // Department::class => DepartmentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('logged-in', function ($user) {
            return $user;
        });

        /*Gate::define('admin', function ($user) {
            return $user->hasAnyRole('admin')
                ? Response::allow()
                : Response::deny('You must be an administrator.');
        });


        Gate::define('hr-access', function ($user) {
            return $user->hasAnyRole('hr')
                ? Response::allow()
                : Response::deny('You must be an administrator.');
        }); */


        /**
         * Define Gate for admin user role
         * Returns true if user role is set to admin
         */
        Gate::define('admin', function ($user) {
            return $user->hasAnyRole('admin');
        });

        // Gate for HR
        Gate::define('hr-access', function($user) {
            return $user->hasAnyRole('hr');
        });

        
       /* Gate::define('is-security', function ($user) {
            return $user->hasAnyRole('security');
        });

        // example of hasanyroles with array
        Gate::define('is-a-user', function ($user) {
            return $user->hasAnyRoles(['admin', 'hr', 'employee', 'manager', 'supervisor', 'security', 'superuser']);
        });

        
        // Gate for employee
        Gate::define('employee-access', function($user) {
            return $user->hasAnyRole('employee');
        }); */
    }
}
