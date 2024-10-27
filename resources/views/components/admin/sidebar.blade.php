<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link @if (request()->routeIs('admin.admin')) active @endif" href="{{route('admin.admin')}}">
            <span data-feather="bar-chart"></span>
            Старт <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if (request()->routeIs('admin.home.*')) active @endif" href="{{route('admin.home.index')}}">
            <span data-feather="home"></span>
            Главная страница <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if (request()->routeIs('admin.categories.*')) active @endif" href="{{ route('admin.categories.index')}}">
            <span data-feather="file"></span>
            Категории
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if (request()->routeIs('admin.news.*')) active @endif" href="{{ route('admin.news.index')}}">
            <span data-feather="shopping-bag"></span>
            Новости
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if (request()->routeIs('admin.newssources.*')) active @endif" href="{{ route('admin.newssources.index')}}">
            <span data-feather="plus-circle"></span>
            Источники
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if (request()->routeIs('admin.about.*')) active @endif" href="{{ route('admin.about.index')}}">
            <span data-feather="layers"></span>
            О проекте
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if (request()->routeIs('admin.users.*')) active @endif" href="{{ route('admin.users.index')}}">
            <span data-feather="users"></span>
            Пользователи
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if (request()->routeIs('admin.mails.*')) active @endif" href="{{ route('admin.mails.index')}}">
            <span data-feather="file-text"></span>
            Сообщения
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if (request()->routeIs('admin.orders.*')) active @endif" href="{{ route('admin.orders.index')}}">
            <span data-feather="file-text"></span>
            Заявки
          </a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="bar-chart-2"></span>
            Reports
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="layers"></span>
            Integrations
          </a>
        </li> --}}
      </ul>

      {{-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Saved reports</span>
        <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
          <span data-feather="plus-circle"></span>
        </a>
      </h6>
      <ul class="nav flex-column mb-2">
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Current month
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Last quarter
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Social engagement
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Year-end sale
          </a>
        </li>
      </ul> --}}
    </div>
  </nav>