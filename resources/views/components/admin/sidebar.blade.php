<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.index')) active @endif" aria-current="page" href="{{ route('admin.index') }}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Панель управления
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.category.*')) active @endif" href="{{ route('admin.category.index') }}">
                    <span data-feather="folder" class="align-text-bottom"></span>
                    Категории
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.news.*')) active @endif" href="{{ route('admin.news.index') }}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Новости
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.source.*')) active @endif" href="{{ route('admin.source.index') }}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Источники новостей
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.user.*')) active @endif" href="{{ route('admin.user.index') }}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Пользователи
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.parser.*')) active @endif" href="{{ route('admin.parser.index') }}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    ОБНОВИТЬ НОВОСТИ
                </a>
            </li>

        </ul>
    </div>
</nav>