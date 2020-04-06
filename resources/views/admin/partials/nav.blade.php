<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <li class="nav-item">
        <a href="{{ route('dashboard') }}" class="nav-link {{ setActiveRoute('dashboard') }}">
            <i class="nav-icon fas fa-home"></i>
            <p>{{ __('Inicio') }}</p>
        </a>
    </li>

    <li class="nav-item has-treeview {{ request()->is('admin/posts*') ? 'menu-open' : ''}}">
        <a href="#" class="nav-link {{ setActiveRoute('admin.posts.index') }}">
            <i class="nav-icon fas fa-bars"></i>
            <p>
                {{ __('Blog') }}
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('admin.posts.index') }}" class="nav-link {{ setActiveRoute('admin.posts.index') }}">
                    <i class="far fa-eye"></i>
                    <p>{{ __('Ver todos los posts') }}</p>
                </a>
            </li>
            <li class="nav-item">
                @if(request()->is('admin/posts/*'))
                    <a href="{{ route('admin.posts.index', '#create') }}" class="nav-link">
                        <i class="far fa-edit"></i>
                        <p>{{ __('Crear un post') }}</p>
                    </a>
                @else
                    <a href="#" data-toggle="modal" data-target="#exampleModal" class="nav-link">
                        <i class="far fa-edit"></i>
                        <p>{{ __('Crear un post') }}</p>
                    </a>
                @endif
            </li>
        </ul>
    </li>

    <li class="nav-item has-treeview {{ request()->is('admin/users*') ? 'menu-open' : ''}}">
        <a href="#" class="nav-link {{ setActiveRoute('admin.users.index') }}">
            <i class="nav-icon fas fa-users"></i>
            <p>
                {{ __('Usuarios') }}
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('admin.users.index') }}" class="nav-link {{ setActiveRoute('admin.users.index') }}">
                    <i class="far fa-eye"></i>
                    <p>{{ __('Ver todos los usuarios') }}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.users.create') }}" class="nav-link">
                    <i class="far fa-edit"></i>
                    <p>{{ __('Crear un usuario') }}</p>
                </a>
            </li>
        </ul>
    </li>

</ul>
