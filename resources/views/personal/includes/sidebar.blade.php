
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
            <a href="{{route('personal.main.index')}}" class="nav-link">
                <i class="nav-icon fas fa-user"></i>

                <p>
                    Личный кабинет
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{route('personal.liked.index')}}" class="nav-link">
                <i class="nav-icon far fa-heart"></i>

                <p>
                    Понравившиеся посты
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{route('personal.comment.index')}}" class="nav-link">
                <i class="nav-icon fas fa-comments"></i>

                <p>
                    Комментарии
                </p>
            </a>
        </li>
    </ul>
</aside>

