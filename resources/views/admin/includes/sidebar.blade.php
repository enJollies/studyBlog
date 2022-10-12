
<aside class="pt-3 main-sidebar sidebar-dark-primary elevation-4">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{route('main.index')}}" class="nav-link">
                <i class="nav-icon fas fa-home"></i>

                <p>
                    На главную
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{route('admin.main.index')}}" class="nav-link">
                <i class="nav-icon fas fa-user-shield"></i>
                <p>
                    Админ панель
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.user.index')}}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>

                <p>
                    Пользователи
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{route('admin.category.index')}}" class="nav-link">
                <i class="nav-icon fas fa-list"></i>

                <p>
                    Категории
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{route('admin.tag.index')}}" class="nav-link">
                <i class="nav-icon fas fa-tags"></i>

                <p>
                    Теги
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{route('admin.post.index')}}" class="nav-link">
                <i class="nav-icon fas fa-newspaper"></i>

                <p>
                    Посты
                </p>
            </a>
        </li>
    </ul>
</aside>

