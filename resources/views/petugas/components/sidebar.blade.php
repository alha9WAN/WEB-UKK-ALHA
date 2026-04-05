

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
<!-- Sidebar Overlay -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<!-- Sidebar -->
<aside class="sidebar" id="sidebar">
    <nav class="nav-menu">

        <!-- DASHBOARD -->
        <div class="nav-item {{ request()->routeIs('halaman-dashboard-petugas') ? 'active' : '' }}">
            <a href="{{ route('halaman-dashboard-petugas') }}" class="nav-link">
                <div class="nav-icon"><i class="fas fa-house"></i></div>
                <div class="nav-text">Dashboard</div>
            </a>
        </div>
   <!-- PROFIL -->
        <div class="nav-item {{ request()->routeIs('profile.index') ? 'active' : '' }}">
            <a href="{{ route('profile.index') }}" class="nav-link">
                <div class="nav-icon"><i class="fas fa-user"></i></div>
                <div class="nav-text">Profil</div>
            </a>
        </div>

        <!-- PERMINTAAN PEMINJAMAN -->
        <div class="nav-item">
            <a href="{{ route('halaman-list-peminjaman') }}" class="nav-link">
                <div class="nav-icon"><i class="fas fa-inbox"></i></div>
                <div class="nav-text">Permintaan Peminjaman</div>
                <span class="nav-badge">8</span>
            </a>
        </div>

        <!-- PENGEMBALIAN -->
        <div class="nav-item {{ request()->routeIs('petugas.pengembalian.*') ? 'active' : '' }}">
            <a href="#" class="nav-link">
                <div class="nav-icon"><i class="fas fa-rotate-left"></i></div>
                <div class="nav-text">Pengembalian</div>
                                <span class="nav-badge">8</span>

            </a>
        </div>

        <!-- RIWAYAT -->
        <div class="nav-item {{ request()->routeIs('petugas.riwayat.*') ? 'active' : '' }}">
            <a href="#" class="nav-link">
                <div class="nav-icon"><i class="fas fa-clock-rotate-left"></i></div>
                <div class="nav-text">Riwayat Peminjaman</div>
            </a>
        </div>

        <!-- LAPORAN -->
        <div class="nav-item {{ request()->routeIs('petugas.laporan.*') ? 'active' : '' }}">
            <a href="#" class="nav-link">
                <div class="nav-icon"><i class="fas fa-print"></i></div>
                <div class="nav-text">Cetak Laporan</div>
            </a>
        </div>



        <!-- LOGOUT -->
        <div class="nav-item logout mt-4">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-link logout-btn">
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


