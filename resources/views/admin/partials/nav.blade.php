<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
        <a href="{{ route('dashboard') }}" class="nav-link  {{ request()->is('admin') ? 'active' : ''}}">
            <i class="nav-icon fas fa-home"></i>
            <p>{{ __('Inicio') }}</p>
        </a>
    </li>
    <li class="nav-item has-treeview {{ request()->is('admin/posts*') ? 'menu-open' : ''}}">
        <a href="#" class="nav-link {{ request()->is('admin/posts') ? 'active' : ''}}">
            <i class="nav-icon fas fa-bars"></i>
            <p>
                {{ __('Blog') }}
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('admin.posts.index') }}" class="nav-link {{ request()->is('admin/posts') ? 'active' : ''}}">
                    <i class="far fa-eye"></i>
                    <p>{{ __('Ver todos los posts') }}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.posts.create') }}" class="nav-link {{ request()->is('admin/posts/create') ? 'active' : ''}}">
                    <i class="far fa-edit"></i>
                    <p>{{ __('Crear un post') }}</p>
                </a>
            </li>
        </ul>
    </li>
</ul>
