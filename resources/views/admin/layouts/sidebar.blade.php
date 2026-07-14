<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark vh-100" style="width: 250px;">
    <a href="{{ route('admin.dashboard') }}"
        class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4">📰 Newspaper Admin</span>
    </a>

    <hr>

    <ul class="nav nav-pills flex-column mb-auto">

        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}"
                class="nav-link text-white {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i>
                Dashboard
            </a>
        </li>

        <li>
            <a href="{{ route('admin.categories.index') }}"
                class="nav-link text-white {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                <i class="bi bi-folder"></i>
                Categories
            </a>
        </li>

        <li>
            <a href="{{ route('admin.news.index') }}"
                class="nav-link text-white {{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
                <i class="bi bi-newspaper"></i>
                News
            </a>
        </li>

        <li>
            <a href="" class="nav-link text-white">
                <i class="bi bi-person"></i>
                Profile
            </a>
        </li>

    </ul>

    <hr>

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button class="btn btn-danger w-100">
            <i class="bi bi-box-arrow-right"></i>
            Logout
        </button>
    </form>
</div>