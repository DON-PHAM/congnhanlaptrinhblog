<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
      <!--begin::Brand Link-->
      <a href="{{ route('admin.dashboard') }}" class="brand-link">
       
        <!--end::Brand Image-->
        <!--begin::Brand Text-->
        <span class="brand-text fw-light">Quản trị</span>
        <!--end::Brand Text-->
      </a>
      <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
      <nav class="mt-2">
        <!--begin::Sidebar Menu-->
        <ul
          class="nav sidebar-menu flex-column"
          data-lte-toggle="treeview"
          role="menu"
          data-accordion="false"
        >
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
              <i class="nav-icon bi bi-speedometer"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('categories.index') }}" class="nav-link">
              <i class="nav-icon bi bi-folder"></i>
              <p>Quản lý danh mục</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('posts.index') }}" class="nav-link">
              <i class="nav-icon bi bi-file-earmark-text"></i>
              <p>Quản lý bài viết</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('comments.index') }}" class="nav-link">
              <i class="nav-icon bi bi-chat-dots"></i>
              <p>Quản lý bình luận</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('settings.index') }}" class="nav-link">
              <i class="nav-icon bi bi-gear"></i>
              <p>Cài đặt website</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link">
              <i class="nav-icon bi bi-people"></i>
              <p>Quản lý người dùng</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('abouts.index') }}" class="nav-link">
              <i class="nav-icon bi bi-person-badge"></i>
              <p>Thông tin cá nhân</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('tags.index') }}" class="nav-link">
              <i class="nav-icon bi bi-tags"></i>
              <p>Quản lý thẻ (Tag)</p>
            </a>
          </li>
        </ul>
        <!--end::Sidebar Menu-->
      </nav>
    </div>
    <!--end::Sidebar Wrapper-->
  </aside>