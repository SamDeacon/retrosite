<?php

namespace App\Providers;
use Laravel\Passport\Passport;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies();
        $gate->define('isSuperAdmin', function($user){
          return $user->usertype =='superadmin';
        });
        $gate->define('isEditor', function($user){
          return $user->usertype =='editor';
        });
        $gate->define('isSuperAdminOrEditor', function($user){
          if ($user->usertype === 'editor' || $user->usertype === 'superadmin') {
            return true;
          }
        });
        $gate->define('isUser', function($user){
          return $user->usertype =='user';
        });
    }
}