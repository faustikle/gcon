<?php

namespace App\Providers;

use App\Models\Usuario;
use Illuminate\Support\Facades\Gate;
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
    public function boot()
    {
        $this->registerPolicies();
        $this->regiterAcl();
    }

    private function regiterAcl()
    {
        foreach (config('acl') as $menu => $funcoes) {
            Gate::define($menu, function (Usuario $usuario) use ($funcoes) {
                return $usuario->isAdministrador() || in_array($usuario->funcao, $funcoes);
            });
        }
    }
}
