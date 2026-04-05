@extends('admin. index')
@section('konten-ds')


   <!-- Profile Modal -->
    <div class="modal-overlay" id="profileModal">
        <div class="modal">
            <div class="modal-header">
                <h3>Profil Saya</h3>
                <button class="modal-close" id="closeProfileModal">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="profile-info">
                    <div class="profile-header">
                        <div class="profile-avatar-large">AS</div>
                        <div class="profile-details">
                            <h4>Admin Sistem</h4>
                            <p>Super Administrator</p>
                            <span class="profile-badge">Administrator</span>
                        </div>
                    </div>
                    <div class="info-group">
                        <div class="info-item">
                            <span class="info-label">Email</span>
                            <span class="info-value">admin@toolgreen.com</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">No. Telepon</span>
                            <span class="info-value">+62 812 3456 7890</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Bergabung Sejak</span>
                            <span class="info-value">15 Januari 2024</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Total Login</span>
                            <span class="info-value">142 kali</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" id="editProfileBtn">Edit Profil</button>
                <button class="btn btn-primary" id="saveProfileBtn">Simpan Perubahan</button>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="main-content" id="mainContent">
        <div class="content-area">
            <!-- Page Header -->
            <div class="page-header">
                <h1>Dashboard ToolGreen</h1>
                <p>Kelola peminjaman alat pertukangan dengan mudah dan efisien</p>
            </div>

            <!-- Welcome Banner -->
            <div class="welcome-banner">
                <div class="welcome-content">
                    <h2>Selamat datang, Admin Sistem! 👋</h2>
                    <p>Pantau statistik, kelola alat, dan lacak peminjaman dalam satu dashboard yang terintegrasi. Semua yang Anda butuhkan untuk mengelola bisnis pertukangan ada di sini.</p>
                </div>
                <div class="welcome-stats">
                    <div class="welcome-stat">
                        <div class="welcome-stat-value">142</div>
                        <div class="welcome-stat-label">Total Alat</div>
                    </div>
                    <div class="welcome-stat">
                        <div class="welcome-stat-value">67</div>
                        <div class="welcome-stat-label">Dipinjam</div>
                    </div>
                    <div class="welcome-stat">
                        <div class="welcome-stat-value">92%</div>
                        <div class="welcome-stat-label">Kepuasan</div>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="cards-grid">
                <div class="card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-tools"></i>
                        </div>
                        <div class="card-trend">
                            <i class="fas fa-arrow-up"></i>
                            8.2%
                        </div>
                    </div>
                    <div class="card-value">142</div>
                    <div class="card-label">Total Alat Tersedia</div>
                    <div class="card-progress">
                        <div class="card-progress-bar" style="width: 85%"></div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <div class="card-trend">
                            <i class="fas fa-arrow-up"></i>
                            3.5%
                        </div>
                    </div>
                    <div class="card-value">67</div>
                    <div class="card-label">Sedang Dipinjam</div>
                    <div class="card-progress">
                        <div class="card-progress-bar" style="width: 47%"></div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="card-trend down">
                            <i class="fas fa-arrow-down"></i>
                            2.1%
                        </div>
                    </div>
                    <div class="card-value">12</div>
                    <div class="card-label">Peminjaman Hari Ini</div>
                    <div class="card-progress">
                        <div class="card-progress-bar" style="width: 60%"></div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="card-trend down">
                            <i class="fas fa-arrow-down"></i>
                            5.7%
                        </div>
                    </div>
                    <div class="card-value">5</div>
                    <div class="card-label">Terlambat Dikembalikan</div>
                    <div class="card-progress">
                        <div class="card-progress-bar" style="width: 15%"></div>
                    </div>
                </div>
            </div>

            <!-- Main Dashboard Grid -->
            <div class="dashboard-grid">
                <!-- Chart Section -->
                <div class="dashboard-card">
                    <div class="card-title">
                        <i class="fas fa-chart-line"></i>
                        Statistik Peminjaman (30 Hari)
                    </div>
                    <div class="chart-container">
                        <canvas id="borrowingChart"></canvas>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="dashboard-card">
                    <div class="card-title">
                        <i class="fas fa-history"></i>
                        Aktivitas Terbaru
                    </div>
                    <ul class="activity-list">
                        <li class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-handshake"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">Bor Listrik Dipinjam</div>
                                <div class="activity-desc">Oleh: Budi Santoso • <span class="status-badge status-borrowed">Dipinjam</span></div>
                            </div>
                            <div class="activity-time">10:30</div>
                        </li>

                        <li class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-undo-alt"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">Gerinda Dikembalikan</div>
                                <div class="activity-desc">Oleh: Siti Rahayu • <span class="status-badge status-available">Baik</span></div>
                            </div>
                            <div class="activity-time">09:15</div>
                        </li>

                        <li class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-tools"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">Alat Baru Ditambahkan</div>
                                <div class="activity-desc">Mesin Potong Keramik • <span class="status-badge status-available">Tersedia</span></div>
                            </div>
                            <div class="activity-time">Kemarin</div>
                        </li>

                        <li class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-exclamation-circle"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">Peringatan Keterlambatan</div>
                                <div class="activity-desc">Gergaji Mesin oleh Andi • <span class="status-badge status-overdue">Terlambat</span></div>
                            </div>
                            <div class="activity-time">2 hari lalu</div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Recent Tools Section -->
            <div class="dashboard-card">
                <div class="card-title">
                    <i class="fas fa-wrench"></i>
                    Alat yang Sering Dipinjam
                </div>
                <div class="recent-tools-grid">
                    <div class="tool-card">
                        <div class="tool-image">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <div class="tool-name">Bor Listrik</div>
                        <div class="tool-category">Perkakas Listrik</div>
                        <div class="status-badge status-borrowed tool-status">Dipinjam</div>
                    </div>

                    <div class="tool-card">
                        <div class="tool-image">
                            <i class="fas fa-cut"></i>
                        </div>
                        <div class="tool-name">Gerinda</div>
                        <div class="tool-category">Perkakas Listrik</div>
                        <div class="status-badge status-available tool-status">Tersedia</div>
                    </div>

                    <div class="tool-card">
                        <div class="tool-image">
                            <i class="fas fa-saw"></i>
                        </div>
                        <div class="tool-name">Gergaji Mesin</div>
                        <div class="tool-category">Perkakas Kayu</div>
                        <div class="status-badge status-overdue tool-status">Terlambat</div>
                    </div>

                    <div class="tool-card">
                        <div class="tool-image">
                            <i class="fas fa-hammer"></i>
                        </div>
                        <div class="tool-name">Palu</div>
                        <div class="tool-category">Perkakas Manual</div>
                        <div class="status-badge status-available tool-status">Tersedia</div>
                    </div>

                    <div class="tool-card">
                        <div class="tool-image">
                            <i class="fas fa-ruler"></i>
                        </div>
                        <div class="tool-name">Meteran Laser</div>
                        <div class="tool-category">Alat Ukur</div>
                        <div class="status-badge status-borrowed tool-status">Dipinjam</div>
                    </div>
                </div>
            </div>
        </div>
    </main>


@endsection
