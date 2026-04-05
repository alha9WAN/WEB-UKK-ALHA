@extends('user.pages.dashboard-user.index')
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
                    <div class="profile-avatar-large">BU</div>
                    <div class="profile-details">
                        <h4>Budi Santoso</h4>
                        <p>Pengguna Aktif</p>
                        <span class="profile-badge">Member</span>
                    </div>
                </div>
                <div class="info-group">
                    <div class="info-item">
                        <span class="info-label">Email</span>
                        <span class="info-value">budi.santoso@email.com</span>
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
                        <span class="info-label">Total Peminjaman</span>
                        <span class="info-value">12 kali</span>
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
            <h1>Dashboard Peminjam</h1>
            <p>Lihat dan kelola peminjaman alat pertukangan Anda dengan mudah</p>
        </div>

        <!-- Welcome Banner -->
        <div class="welcome-banner">
            <div class="welcome-content">
                <h2>Selamat datang, Budi Santoso! 👋</h2>
                <p>Pantau status peminjaman Anda, lihat riwayat, dan temukan alat yang tersedia. Semua informasi peminjaman Anda ada di sini.</p>
            </div>
            <div class="welcome-stats">
                <div class="welcome-stat">
                    <div class="welcome-stat-value">3</div>
                    <div class="welcome-stat-label">Sedang Dipinjam</div>
                </div>
                <div class="welcome-stat">
                    <div class="welcome-stat-value">1</div>
                    <div class="welcome-stat-label">Menunggu Konfirmasi</div>
                </div>
                <div class="welcome-stat">
                    <div class="welcome-stat-value">12</div>
                    <div class="welcome-stat-label">Total Peminjaman</div>
                </div>
            </div>
        </div>

        <!-- Stats Cards for User -->
        <div class="cards-grid">
            <div class="card">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <div class="card-trend">
                        <i class="fas fa-check-circle"></i>
                        Aktif
                    </div>
                </div>
                <div class="card-value">3</div>
                <div class="card-label">Alat Sedang Dipinjam</div>
                <div class="card-progress">
                    <div class="card-progress-bar" style="width: 60%"></div>
                </div>
                <small class="card-subnote">2 akan jatuh tempo minggu ini</small>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-hourglass-half"></i>
                    </div>
                    <div class="card-trend warning">
                        <i class="fas fa-exclamation-triangle"></i>
                        Perhatian
                    </div>
                </div>
                <div class="card-value">1</div>
                <div class="card-label">Menunggu Persetujuan</div>
                <div class="card-progress">
                    <div class="card-progress-bar" style="width: 25%"></div>
                </div>
                <small class="card-subnote">Pengajuan: Gerinda Tangan</small>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div class="card-trend down">
                        <i class="fas fa-arrow-down"></i>
                        2 Hari
                    </div>
                </div>
                <div class="card-value">2</div>
                <div class="card-label">Akan Dikembalikan</div>
                <div class="card-progress">
                    <div class="card-progress-bar" style="width: 40%"></div>
                </div>
                <small class="card-subnote">Batas: 5 April 2026</small>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="card-trend up">
                        <i class="fas fa-arrow-up"></i>
                        +2
                    </div>
                </div>
                <div class="card-value">5</div>
                <div class="card-label">Alat Tersedia Favorit</div>
                <div class="card-progress">
                    <div class="card-progress-bar" style="width: 70%"></div>
                </div>
                <small class="card-subnote">Bor, Gergaji, Obeng, dll.</small>
            </div>
        </div>

        <!-- Main Dashboard Grid -->
        <div class="dashboard-grid">
            <!-- My Active Loans Section -->
            <div class="dashboard-card">
                <div class="card-title">
                    <i class="fas fa-handshake"></i>
                    Peminjaman Aktif Saya
                </div>
                <ul class="activity-list">
                    <li class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-drill"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Bor Listrik 12mm</div>
                            <div class="activity-desc">Dipinjam: 1 Apr 2026 • <span class="status-badge status-borrowed">Aktif</span></div>
                        </div>
                        <div class="activity-time">Jatuh Tempo: 8 Apr</div>
                    </li>

                    <li class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-saw"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Gergaji Mesin Circular</div>
                            <div class="activity-desc">Dipinjam: 3 Apr 2026 • <span class="status-badge status-borrowed">Aktif</span></div>
                        </div>
                        <div class="activity-time">Jatuh Tempo: 10 Apr</div>
                    </li>

                    <li class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-gavel"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Mesin Amplas</div>
                            <div class="activity-desc">Dipinjam: 4 Apr 2026 • <span class="status-badge status-borrowed">Aktif</span></div>
                        </div>
                        <div class="activity-time">Jatuh Tempo: 11 Apr</div>
                    </li>
                </ul>
                <div class="card-footer-link">
                    <a href="#">Lihat Semua Peminjaman Saya <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <!-- Recent Activity & Notifications -->
            <div class="dashboard-card">
                <div class="card-title">
                    <i class="fas fa-bell"></i>
                    Notifikasi & Riwayat
                </div>
                <ul class="activity-list">
                    <li class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Peminjaman Disetujui</div>
                            <div class="activity-desc">Bor Listrik Anda telah disetujui dan siap diambil.</div>
                        </div>
                        <div class="activity-time">Kemarin</div>
                    </li>

                    <li class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-undo-alt"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Pengembalian Berhasil</div>
                            <div class="activity-desc">Anda telah mengembalikan Gerinda Tangan. Terima kasih!</div>
                        </div>
                        <div class="activity-time">2 hari lalu</div>
                    </li>

                    <li class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Pengingat Pengembalian</div>
                            <div class="activity-desc">Jangan lupa mengembalikan Gergaji Mesin sebelum 10 April 2026.</div>
                        </div>
                        <div class="activity-time">3 hari lalu</div>
                    </li>
                </ul>
                 <div class="card-footer-link">
                    <a href="#">Lihat Semua Notifikasi <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Recommended Tools Section -->
        <div class="dashboard-card full-width" style="margin-top: 1.5rem;">
            <div class="card-title">
                <i class="fas fa-star"></i>
                Rekomendasi Alat untuk Anda
            </div>
            <div class="tools-recommendation">
                <div class="tool-item">
                    <div class="tool-icon"><i class="fas fa-wrench"></i></div>
                    <div class="tool-info">
                        <h4>Set Obeng Plus-Minus</h4>
                        <p>Tersedia 12 unit</p>
                    </div>
                    <button class="btn-small">Pinjam</button>
                </div>
                <div class="tool-item">
                    <div class="tool-icon"><i class="fas fa-paint-roller"></i></div>
                    <div class="tool-info">
                        <h4>Roller Cat 10 inch</h4>
                        <p>Tersedia 8 unit</p>
                    </div>
                    <button class="btn-small">Pinjam</button>
                </div>
                <div class="tool-item">
                    <div class="tool-icon"><i class="fas fa-level-up-alt"></i></div>
                    <div class="tool-info">
                        <h4>Waterpass Digital</h4>
                        <p>Tersedia 5 unit</p>
                    </div>
                    <button class="btn-small">Pinjam</button>
                </div>
            </div>
        </div>

    </div>
</main>

<style>
/* Additional styles for user dashboard elements */
.card-subnote {
    font-size: 0.7rem;
    color: var(--text-secondary);
    margin-top: 0.5rem;
    display: block;
}
.card-trend.warning {
    background: rgba(245, 158, 11, 0.1);
    color: #f59e0b;
}
.card-footer-link {
    margin-top: 1rem;
    padding-top: 0.75rem;
    border-top: 1px solid var(--border-color);
    text-align: right;
}
.card-footer-link a {
    font-size: 0.8rem;
    color: var(--primary-color);
    text-decoration: none;
}
.card-footer-link a:hover {
    text-decoration: underline;
}
.tools-recommendation {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    margin-top: 0.5rem;
}
.tool-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    background: var(--bg-secondary);
    padding: 0.75rem 1rem;
    border-radius: 12px;
    flex: 1;
    min-width: 180px;
}
.tool-icon {
    width: 40px;
    height: 40px;
    background: var(--primary-light);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-color);
    font-size: 1.2rem;
}
.tool-info h4 {
    font-size: 0.9rem;
    margin-bottom: 0.2rem;
}
.tool-info p {
    font-size: 0.7rem;
    color: var(--text-secondary);
}
.btn-small {
    background: var(--primary-color);
    color: white;
    border: none;
    padding: 0.3rem 0.8rem;
    border-radius: 20px;
    font-size: 0.7rem;
    cursor: pointer;
    transition: all 0.2s ease;
}
.btn-small:hover {
    background: var(--primary-dark);
    transform: scale(1.02);
}
.full-width {
    grid-column: 1 / -1;
}
</style>

@endsection
