<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    @can('reunioes.menu')
        <div class="menu_section">
            <h3>Reuniões</h3>
            <ul class="nav side-menu">
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
            </ul>
        </div>
    @endcan
    <div class="menu_section">
        <h3>Empresas/Serviços</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-briefcase"></i> Empresas <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="#">Listar</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>