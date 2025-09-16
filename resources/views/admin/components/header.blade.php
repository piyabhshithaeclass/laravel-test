<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
<div class="container">
        <a class="navbar-brand" href="#">ADMIN PANEL</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                       href="{{ route('admin.dashboard') }}">
                        DASHBOARD
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.classes.*') ? 'active' : '' }}"
                       href="{{ route('admin.classes.index') }}">
                        CLASSES
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.subscriptions.*') ? 'active' : '' }}"
                       href="{{ route('admin.subscriptions.index') }}">
                        SUBSCRIPTIONS
                    </a>
                </li>

                <li class="nav-item">
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="nav-link">LOGOUT</button>

                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
