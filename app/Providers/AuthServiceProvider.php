<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\User;
use App\Policies\Articlepolicy;
use App\Policies\Userpolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        User::class=>Userpolicy::class,
//    Article::class=>Articlepolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::before(function ($user){
            if ($user->is_superuser()){
                return true;
            }

        });
        $this->registerPolicies();

        //
    }
}
