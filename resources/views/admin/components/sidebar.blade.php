

<style>
    /* Logout Button Styling */
    .nav-item.logout .logout-btn {
        background: transparent;
        border: none;
        padding: 12px 20px;
        color: #ef4444;
        text-decoration: none;
        display: flex;
        align-items: center;
        width: 100%;
        cursor: pointer;
        transition: all 0.3s ease;
        border-left: 4px solid #ef4444;
    }

    .nav-item.logout .logout-btn:hover {
        background: rgba(239, 68, 68, 0.1);
        color: #dc2626;
    }

    .nav-item.logout .nav-icon {
        color: #ef4444;
        width: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .nav-item.logout .nav-text {
        flex: 1;
        font-weight: 600;
    }

    /* Remove default button styling */
    .logout-btn:focus {
        outline: none;
        box-shadow: none;
    }
</style>

 <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <nav class="nav-menu">
               <!-- Dashboard -->
  <div class="nav-item {{ request()->routeIs('halaman-dashboard-admin') ? 'active' : '' }}">
    <a href="{{ route('halaman-dashboard-admin') }}" class="nav-link">
        <div class="nav-icon"><i class="fas fa-house"></i></div>
        <div class="nav-text">Dashboard</div>
    </a>
</div>

            <!-- Profile -->
            {{-- <div class="nav-item">
                <a href="#" class="nav-link" id="profileLink">
                    <div class="nav-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="nav-text">Profil</div>
                </a>
            </div> --}}


                  <div class="nav-item {{ request()->routeIs('profile.index.*') ? 'active' : '' }}">
                <a href="{{ route('profile.index') }}" class="nav-link" id="">
                    <div class="nav-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="nav-text">Profil</div>
                </a>
            </div>

                <!-- Kategori Alat -->
   <div class="nav-item {{ request()->routeIs('admin.kategori.*') ? 'active' : '' }}">
    <a href="{{ route('admin.kategori.list') }}" class="nav-link">
        <div class="nav-icon"><i class="fas fa-layer-group"></i></div>
        <div class="nav-text">Kategori Alat</div>
    </a>
</div>



                      <!-- Data Alat Pertukangan -->
           <div class="nav-item {{ request()->routeIs('admin.alat.*') ? 'active' : '' }}">
    <a href="{{ route('admin.alat.list') }}" class="nav-link">
        <div class="nav-icon">                        <i class="fa-solid fa-screwdriver-wrench"></i>

</div>
        <div class="nav-text"> Alat Pertukangan</div>
    </a>
</div>

            <!-- Peminjaman -->
            <div class="nav-item {{ request()->routeIs('admin.manajemen.peminjaman.*') ? 'active' : '' }}">
                <a href="{{ route('admin.manajemen.peminjaman.list') }}" class="nav-link">
                    <div class="nav-icon">
                        <i class="fas fa-right-left"></i>
                    </div>
                    <div class="nav-text">Peminjaman</div>
                    <span class="nav-badge">12</span>
                </a>
            </div>

               <!-- Peminjaman -->
            <div class="nav-item">
                <a href="#" class="nav-link">
                    <div class="nav-icon">
                        <i class="fas fa-right-left"></i>
                    </div>
                    <div class="nav-text">Pengembalian</div>
                    <span class="nav-badge">12</span>
                </a>
            </div>

            <!-- Pengguna -->
            <div class="nav-item {{ request()->routeIs('admin.manajemenuser*') ? 'active' : '' }}">
                <a href="{{ route('admin.manajemenuser.list') }}" class="nav-link">
                    <div class="nav-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="nav-text">Pengguna</div>
                </a>
            </div>

            <!-- Laporan / Analitik -->
            <div class="nav-item">
                <a href="#" class="nav-link">
                    <div class="nav-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="nav-text">Laporan</div>
                </a>
            </div>

       <!-- LOG AKTIVITAS -->
<div class="nav-item {{ request()->routeIs('log-aktivitas') ? 'active' : '' }}">
    <a href="{{ route('log-aktivitas') }}" class="nav-link">
        <div class="nav-icon">
            <i class="fas fa-history"></i>
        </div>
        <div class="nav-text">Log Aktivitas</div>
    </a>
</div>


            <!-- Pengaturan -->
            <div class="nav-item">
                <a href="#" class="nav-link">
                    <div class="nav-icon">
                        <i class="fas fa-gear"></i>
                    </div>
                    <div class="nav-text">Pengaturan</div>
                </a>
            </div>

             <!-- Logout -->
        <div class="nav-item logout" style="margin-top: 3rem">
            <form action="{{ route('logout') }}" method="POST" class="w-100">
                @csrf
                <button type="submit" class="nav-link logout-btn w-100 text-start">
                    <div class="nav-icon">
                        <i class="fas fa-right-from-bracket"></i>
                    </div>
                    <div class="nav-text">Logout</div>
                </button>
            </form>
        </div>
        </nav>
    </aside>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const currentUrl = window.location.href;
        const navItems = document.querySelectorAll('.nav-item');

        navItems.forEach(item => {
            const link = item.querySelector('.nav-link');

            if (link && link.href === currentUrl) {
                // hapus active lama
                navItems.forEach(i => i.classList.remove('active'));

                // set active baru
                item.classList.add('active');
            }
        });
    });
</script>


