<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>Módulo Administrativo</h3>
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
            <li><a><i class="fa fa-binoculars"></i> Ocorrências <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="#">Listar</a></li>
                    <li><a href="#">Cadastrar</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-wrench"></i> Serviço <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="#">Listar locais</a></li>
                    <li><a href="#">Listar compartilhados</a></li>
                    <li><a href="#">Cadastrar</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-table"></i> Relatórios <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="#">Listar</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="menu_section">
        <h3>Módulo Comunitário</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-group"></i> Moradores <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="#">Listar</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-user"></i> Sindico <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="#">Listar</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-soccer-ball-o"></i> Ambientes <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="#">Listar</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-building"></i> Condomínio <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="#">Listar</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-table"></i> Relatórios <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="#">Listar</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="menu_section">
        <h3>Módulo Financeiro</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-bank"></i> Contas <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="#">Listar</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-money"></i> Fluxo de Caixa <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="#">Listar</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-file-excel-o"></i> Documentos <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="#">Listar</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-table"></i> Relatórios <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="#">Listar</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>