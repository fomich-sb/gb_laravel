<header class='site-header sticky-top py-1'>
    <nav class="container d-flex flex-column flex-md-row justify-content-between">
    <a class="py-2" href="/" aria-label="Product" style='text-decoration: none;'>
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24" style='float: left;'>
        <title>News Aggregator</title>
        <circle cx="12" cy="12" r="10"/><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/>
      </svg>

      <span style='padding-left:10px;'>News Aggregator</span></a>
    <a class="py-2 d-none d-md-inline-block @if(request()->routeIs('category.*')) active @endif" href="{{ route('category.index', []) }}">Категории</a>
    <a class="py-2 d-none d-md-inline-block @if(request()->routeIs('news.*')) active @endif" href="{{ route('news.index', []) }}">Новости</a>
    <a class="py-2 d-none d-md-inline-block @if(request()->routeIs('source.*')) active @endif" href="{{ route('source.create', []) }}">Заказ на новости</a>
    @if(Auth::user()->is_admin === true)
      <a class="py-2 d-none d-md-inline-block @if(request()->routeIs('admin.*')) active @endif" href="{{ route('admin.index', []) }}">Панель управления</a>
    @endif
    <ul class="navbar-nav">
      <!-- Authentication Links -->
      @guest
          @if (Route::has('login'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Войти') }}</a>
              </li>
          @endif

          @if (Route::has('register'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Зарегистрироваться') }}</a>
              </li>
          @endif
      @else
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }}
              </a>

              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                      {{ __('Выйти') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>
          </li>
      @endguest
  </ul>
  </nav>
</header>