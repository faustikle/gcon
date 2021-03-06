<?php

namespace App\Providers;

use App\Models\Documento;
use App\Models\Ocorrencia;
use App\Models\Reuniao\Pauta;
use App\Models\Reuniao\Reuniao;
use App\Models\Servico\PrestadorServico;
use App\Models\Servico\Servico;
use App\Models\Usuario;
use App\Policies\DocumentoPolicy;
use App\Policies\OcorrenciaPolicy;
use App\Policies\PautaPolicy;
use App\Policies\PrestadorServicoPolicy;
use App\Policies\ReuniaoPolicy;
use App\Policies\ServicoPolicy;
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
        Reuniao::class => ReuniaoPolicy::class,
        Pauta::class => PautaPolicy::class,
        Ocorrencia::class => OcorrenciaPolicy::class,
        PrestadorServico::class => PrestadorServicoPolicy::class,
        Servico::class => ServicoPolicy::class,
        Documento::class => DocumentoPolicy::class,
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
