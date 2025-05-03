<!-- Divider -->
<hr class="sidebar-divider my-0 " >
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
        <hr class="sidebar-divider">  
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active {{ request()->is('admin/user') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/user') }}">
                    <i class="fas fa-users me-2"></i>
                    <span>User</span></a>
            </li>         
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active {{ request()->is('admin/kategori') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/kategori') }}">
                    <i class="fas fa-th-list"></i>
                    <span>Kategori</span></a>
            </li>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active {{ request()->is('admin/produk') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/produk') }}">
                    <i class="fas fa-campground me-2"></i>
                    <span>Produk</span></a>
            </li>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active {{ request()->is('admin/transaksi') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/transaksi') }}">
                    <i class="fas fa-hand-holding-usd"></i>
                    <span>Transaksi</span></a>
            </li>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active {{ request()->is('admin/ulasan') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('admin/ulasan') }}">
                    <i class="fas fa-comments"></i>
                    <span>Ulasan</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="logout.php?halaman=logout">
                    <i class="fas fa-sign-out-alt me-2"></i>
                    <span>logout</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->