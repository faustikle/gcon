<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        {{--<h3>Módulo Administrativo</h3>--}}
        <ul class="nav side-menu">
            @can('reunioes.menu')
            <li><a><i class="fa fa-balance-scale"></i> Reunião Online <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    @can('reunioes.listar')
                        <li><a href="{{ route('reuniao.index')  }}">Listar</a></li>
                    @endcan
                    @can('reunioes.cadastro')
                        <li><a href="{{ route('reuniao.cadastrar')  }}">Cadastrar</a></li>
                    @endcan
                </ul>
            </li>
            @endcan
            @can('ocorrencias.menu')
            <li><a><i class="fa fa-binoculars"></i> Ocorrências <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    @can('ocorrencias.listar')
                        <li><a href="{{ route('ocorrencia.index') }}">Listar</a></li>
                    @endcan
                    @can('ocorrencias.registrar')
                        <li><a href="{{ route('ocorrencia.registrar') }}">Registrar Nova</a></li>
                    @endcan
                </ul>
            </li>
            @endcan
            @can('servicos.menu')
            <li><a><i class="fa fa-wrench"></i> Serviço <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    @can('servicos.cadastro')
                        <li><a href="{{ route('servicos.cadastrar') }}">Cadastrar</a></li>
                    @endcan
                    @can('servicos.listar')
                        <li><a href="{{ route('servicos.index') }}">Listar</a></li>
                    @endcan
                </ul>
            </li>
            @endcan
            @can('prestadores.menu')
            <li><a><i class="fa fa-wrench"></i> Prestadores de Serviço <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    @can('prestadores.listar')
                        <li><a href="{{ route('prestadores.index') }}">Listar</a></li>
                    @endcan
                    @can('prestadores.cadastro')
                        <li><a href="{{ route('prestadores.cadastrar')  }}">Cadastrar</a></li>
                    @endcan
                </ul>
            </li>
            @endcan
            @can('documentos-condominio.menu')
            <li><a><i class="fa fa-file-excel-o"></i> Documentos <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    @can('documentos-condominio.listar')
                    <li><a href="{{ route('documentos-condominio.index') }}">Listar</a></li>
                    @endcan
                    @can('documentos-condominio.cadastro')
                        <li><a href="{{ route('documentos-condominio.cadastro') }}">Adicionar</a></li>
                    @endcan
                </ul>
            </li>
            @endcan
        </ul>
        <ul class="nav side-menu">
            @can('moradores.menu')
            <li><a><i class="fa fa-group"></i> Moradores <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    @can('moradores.listar')
                        <li><a href="{{ route('moradores.index') }}">Listar</a></li>
                    @endcan
                    @can('moradores.convidar')
                        <li><a href="{{ route('moradores.adicionar') }}">Adicionar</a></li>
                    @endcan
                </ul>
            </li>
            @endcan
        </ul>
        <ul class="nav side-menu">
            @can('financeiro.menu')
            <li><a><i class="fa fa-bank"></i> Financeiro <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    @can('fluxo-caixa')
                        <li><a href="{{ route('fluxo-caixa.index') }}">Fluxo de caixa</a></li>
                    @endcan
                    @can('balancete.menu')
                        <li><a href="#">Balancete</a></li>
                    @endcan
                </ul>
            </li>
            @endcan
        </ul>
    </div>
</div>