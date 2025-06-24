<nav class="app-header navbar navbar-expand bg-body">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <!-- Logo & Trang chủ -->
        <a class="navbar-brand d-flex align-items-center" href="/admin">
            <img src="{{ asset('backend/assets/img/AdminLTELogo.png') }}" alt="Logo" style="height:32px; margin-right:10px;">
            <span class="fw-bold">Quản trị</span>
        </a>
        <!-- User Info & Menu -->
        <ul class="navbar-nav ms-auto align-items-center">
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                    <img src="{{ asset('backend/assets/img/avatar.png') }}" class="user-image rounded-circle shadow" alt="User Image" style="height:32px; width:32px; object-fit:cover;">
                    <span class="d-none d-md-inline ms-2">{{ Auth::user()->name ?? 'Admin' }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li class="dropdown-item-text text-center">
                        <strong>{{ Auth::user()->name ?? 'Admin' }}</strong><br>
                        <small>{{ Auth::user()->email ?? '' }}</small>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a href="#" class="dropdown-item">Thông tin tài khoản</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">Đăng xuất</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>