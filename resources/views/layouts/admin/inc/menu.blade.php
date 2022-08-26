<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div class="">
                <img src="{{  auth()->user()->url_image }}" alt="" class="avatar-md rounded-circle">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1">{{ auth()->user()->name }}</h4>
                <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('admin.home') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span class="bg-success float-end"></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                @if (Auth::user()->isAdmin())
                    <li>
                        <a href="{{ route('admin.plans.index') }}" class=" waves-effect">
                            <i class="ri-calendar-2-line"></i>
                            <span>Planos</span>
                        </a>
                    </li>
                @elseif(auth()->user()->hasPermission('plans'))
                <li>
                    <a href="{{ route('admin.plans.index') }}" class=" waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>Planos</span>
                    </a>
                </li>
                @endif

                @if (Auth::user()->isAdmin())
                    <li>
                        <a href="{{ route('admin.users.index') }}" class=" waves-effect">
                            <i class="ri-user-line"></i>
                            <span>Usuários</span>
                        </a>
                    </li>
                @elseif(auth()->user()->hasPermission('users'))
                <li>
                    <a href="{{ route('admin.users.index') }}" class=" waves-effect">
                        <i class="ri-user-line"></i>
                        <span>Usuários</span>
                    </a>
                </li>
                @endif

                @if (Auth::user()->isAdmin())
                    <li>
                        <a href="{{ route('admin.tenants.index') }}" class=" waves-effect">
                            <i class="ri-database-line"></i>
                            <span>Empresas</span>
                        </a>
                    </li>
                @elseif(auth()->user()->hasPermission('tenants'))
                    <li>
                        <a href="{{ route('admin.tenants.index') }}" class=" waves-effect">
                            <i class="ri-database-line"></i>
                            <span>Empresas</span>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->isAdmin())
                    <li>
                        <a href="{{ route('admin.profiles.index') }}" class=" waves-effect">
                            <i class="ri-account-circle-line"></i>
                            <span>Perfis</span>
                        </a>
                    </li>
                @elseif(auth()->user()->hasPermission('profiles'))
                <li>
                    <a href="{{ route('admin.profiles.index') }}" class=" waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Perfis</span>
                    </a>
                </li>
                @endif

                @if(Auth::user()->isAdmin())
                    <li>
                        <a href="{{ route('admin.roles.index') }}" class=" waves-effect">
                            <i class="ri-hammer-line"></i>
                            <span>Cargos</span>
                        </a>
                    </li>
                @elseif(auth()->user()->hasPermission('roles'))
                <li>
                    <a href="{{ route('admin.roles.index') }}" class=" waves-effect">
                        <i class="ri-hammer-line"></i>
                        <span>Cargos</span>
                    </a>
                </li>
                @endif

                @if(Auth::user()->isAdmin())
                    <li>
                        <a href="{{ route('admin.permissions.index') }}" class=" waves-effect">
                            <i class="ri-lock-2-line"></i>
                            <span>Permissões</span>
                        </a>
                    </li>
                @elseif(auth()->user()->hasPermission('permissions'))
                <li>
                    <a href="{{ route('admin.permissions.index') }}" class=" waves-effect">
                        <i class="ri-lock-2-line"></i>
                        <span>Permissões</span>
                    </a>
                </li>
                @endif

                @if(Auth::user()->isAdmin())
                    <li>
                        <a href="{{ route('admin.categories.index') }}" class=" waves-effect">
                            <i class="ri-price-tag-3-line"></i>
                            <span>Categorias</span>
                        </a>
                    </li>
                @elseif(auth()->user()->hasPermission('categories'))
                <li>
                    <a href="{{ route('admin.categories.index') }}" class=" waves-effect">
                        <i class="ri-price-tag-3-line"></i>
                        <span>Categorias</span>
                    </a>
                </li>
                @endif

                @if(Auth::user()->isAdmin())
                    <li>
                        <a href="{{ route('admin.products.index') }}" class=" waves-effect">
                            <i class=" ri-inbox-archive-line"></i>
                            <span>Produtos</span>
                        </a>
                    </li>
                @elseif(auth()->user()->hasPermission('products'))
                <li>
                    <a href="{{ route('admin.products.index') }}" class=" waves-effect">
                        <i class=" ri-inbox-archive-line"></i>
                        <span>Produtos</span>
                    </a>
                </li>
                @endif

                @if(Auth::user()->isAdmin())
                    <li>
                        <a href="{{ route('admin.tables.index') }}" class=" waves-effect">
                            <i class=" ri-inbox-archive-line"></i>
                            <span>Mesas</span>
                        </a>
                    </li>
                @elseif(auth()->user()->hasPermission('tables'))
                <li>
                    <a href="{{ route('admin.tables.index') }}" class=" waves-effect">
                        <i class=" ri-inbox-archive-line"></i>
                        <span>Mesas</span>
                    </a>
                </li>
                @endif


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
