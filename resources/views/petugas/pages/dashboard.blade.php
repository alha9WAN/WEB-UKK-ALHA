@extends('petugas.index')
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
                    <div class="profile-avatar-large" style="background: linear-gradient(135deg, var(--primary), var(--secondary));">PT</div>
                    <div class="profile-details">
                        <h4>Petugas Lapangan</h4>
                        <p>Staff Operasional</p>
                        <span class="profile-badge">Petugas</span>
                    </div>
                </div>
                <div class="info-group">
                    <div class="info-item">
                        <span class="info-label">Email</span>
                        <span class="info-value">petugas@toolgreen.com</span>
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
                        <span class="info-label">Shift</span>
                        <span class="info-value">Pagi (08:00 - 16:00)</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Total Transaksi</span>
                        <span class="info-value">156 Peminjaman</span>
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
        <!-- Page Header with Quick Actions -->
        <div class="page-header">
            <div>
                <h1>Dashboard Petugas</h1>
                <p>Kelola peminjaman & pengembalian alat dengan cepat dan efisien</p>
            </div>
            <div class="header-actions">
                <button class="btn btn-primary" onclick="window.location.href='/peminjaman-baru'">
                    <i class="fas fa-plus"></i> Peminjaman Baru
                </button>
                <button class="btn btn-success" onclick="window.location.href='/pengembalian'">
                    <i class="fas fa-undo-alt"></i> Pengembalian
                </button>
                <button class="btn btn-info" onclick="window.location.href='/riwayat'">
                    <i class="fas fa-history"></i> Riwayat
                </button>
            </div>
        </div>

        <!-- Welcome Banner with Quick Stats -->
        <div class="welcome-banner">
            <div class="welcome-content">
                <h2>Selamat datang, Petugas! 👋</h2>
                <p>Ada <strong class="text-warning">3 permintaan peminjaman baru</strong> dan <strong class="text-success">5 alat siap dikembalikan</strong> hari ini. Segera proses untuk menjaga kelancaran operasional.</p>
            </div>
            <div class="welcome-stats">
                <div class="welcome-stat">
                    <div class="welcome-stat-value">8</div>
                    <div class="welcome-stat-label">Menunggu</div>
                </div>
                <div class="welcome-stat">
                    <div class="welcome-stat-value">23</div>
                    <div class="welcome-stat-label">Dipinjam</div>
                </div>
                <div class="welcome-stat">
                    <div class="welcome-stat-value">4</div>
                    <div class="welcome-stat-label">Terlambat</div>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="cards-grid">
            <div class="card" onclick="window.location.href='/permintaan-baru'">
                <div class="card-header">
                    <div class="card-icon" style="background: rgba(255, 193, 7, 0.1); color: var(--warning);">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="card-trend positive">
                        <i class="fas fa-arrow-up"></i> +5
                    </div>
                </div>
                <div class="card-value">8</div>
                <div class="card-label">Permintaan Peminjaman Baru</div>
                <div class="card-footer">
                    <span>3 perlu respon segera</span>
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>

            <div class="card" onclick="window.location.href='/peminjaman-aktif'">
                <div class="card-header">
                    <div class="card-icon" style="background: rgba(40, 167, 69, 0.1); color: var(--success);">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <div class="card-trend positive">
                        <i class="fas fa-arrow-up"></i> +3
                    </div>
                </div>
                <div class="card-value">23</div>
                <div class="card-label">Sedang Dipinjam</div>
                <div class="card-footer">
                    <span>15 akan jatuh tempo hari ini</span>
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>

            <div class="card" onclick="window.location.href='/keterlambatan'">
                <div class="card-header">
                    <div class="card-icon" style="background: rgba(220, 53, 69, 0.1); color: var(--danger);">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="card-trend negative">
                        <i class="fas fa-arrow-up"></i> +2
                    </div>
                </div>
                <div class="card-value">4</div>
                <div class="card-label">Pengembalian Terlambat</div>
                <div class="card-footer">
                    <span>2 lebih dari 3 hari</span>
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>

            <div class="card" onclick="window.location.href='/alat-tersedia'">
                <div class="card-header">
                    <div class="card-icon" style="background: rgba(23, 162, 184, 0.1); color: var(--info);">
                        <i class="fas fa-tools"></i>
                    </div>
                    <div class="card-trend positive">
                        <i class="fas fa-arrow-up"></i> 45
                    </div>
                </div>
                <div class="card-value">45</div>
                <div class="card-label">Alat Tersedia</div>
                <div class="card-footer">
                    <span>12 kategori berbeda</span>
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
        </div>

        <!-- Quick Action Buttons -->
        <div class="quick-action-bar">
            <div class="quick-action-title">
                <i class="fas fa-bolt"></i> Aksi Cepat:
            </div>
            <div class="quick-action-buttons">
                <button class="quick-action-btn-small primary" onclick="window.location.href='/peminjaman-baru'">
                    <i class="fas fa-plus-circle"></i> Peminjaman Baru
                </button>
                <button class="quick-action-btn-small success" onclick="window.location.href='/pengembalian'">
                    <i class="fas fa-undo-alt"></i> Pengembalian
                </button>
                <button class="quick-action-btn-small info" onclick="window.location.href='/riwayat'">
                    <i class="fas fa-history"></i> Riwayat Transaksi
                </button>
                <button class="quick-action-btn-small warning" onclick="window.location.href='/laporan'">
                    <i class="fas fa-print"></i> Cetak Laporan
                </button>
            </div>
        </div>

        <!-- Main Dashboard Grid -->
        <div class="dashboard-grid">
            <!-- Quick Actions Section -->
            <div class="dashboard-card">
                <div class="card-title">
                    <div>
                        <i class="fas fa-bell"></i>
                        <span>Aksi Cepat Perlu Diproses</span>
                    </div>
                    <span class="nav-badge">8</span>
                </div>

                <!-- Pending Approvals -->
                <div class="action-section">
                    <h4 class="section-title">
                        <i class="fas fa-hourglass-half" style="color: var(--warning);"></i>
                        Peminjaman Menunggu Persetujuan
                        <span class="section-badge">3</span>
                    </h4>

                    <div class="activity-list">
                        @foreach($pendingLoans ?? [1,2,3] as $loan)
                        <div class="activity-item">
                            <div class="activity-icon warning">
                                <i class="fas fa-tools"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">Bor Listrik 14mm</div>
                                <div class="activity-desc">
                                    <span class="user-name">Andi Saputra</span>
                                    <span class="time-remaining">• 2 jam lagi</span>
                                </div>
                                <div class="tool-details">Keperluan: Perbaikan mesin</div>
                            </div>
                            <div class="action-buttons">
                                <button class="btn-icon success" title="Setujui">
                                    <i class="fas fa-check"></i>
                                </button>
                                <button class="btn-icon danger" title="Tolak">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    @if(count($pendingLoans ?? []) > 3)
                    <a href="/pending-approvals" class="view-more">
                        Lihat semua permintaan <i class="fas fa-arrow-right"></i>
                    </a>
                    @endif
                </div>

                <!-- Ready to Return -->
                <div class="action-section">
                    <h4 class="section-title">
                        <i class="fas fa-undo-alt" style="color: var(--success);"></i>
                        Alat Siap Dikembalikan
                        <span class="section-badge">5</span>
                    </h4>

                    <div class="activity-list">
                        @foreach($readyToReturn ?? [1,2] as $item)
                        <div class="activity-item">
                            <div class="activity-icon success">
                                <i class="fas fa-undo-alt"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">Tang Crimping</div>
                                <div class="activity-desc">
                                    <span class="user-name">Ahmad Hidayat</span>
                                    <span class="time-waiting">• Sudah 1 jam</span>
                                </div>
                            </div>
                            <button class="btn btn-sm btn-success">
                                Proses <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Overdue Items -->
                <div class="action-section">
                    <h4 class="section-title">
                        <i class="fas fa-exclamation-circle" style="color: var(--danger);"></i>
                        Keterlambatan Hari Ini
                        <span class="section-badge danger">4</span>
                    </h4>

                    <div class="activity-list">
                        @foreach($overdueItems ?? [1,2] as $item)
                        <div class="activity-item">
                            <div class="activity-icon danger">
                                <i class="fas fa-exclamation-circle"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">Gergaji Mesin</div>
                                <div class="activity-desc">
                                    <span class="user-name">Andi Saputra</span>
                                    <span class="overdue-days">• Terlambat 2 hari</span>
                                </div>
                            </div>
                            <button class="btn btn-sm btn-danger">
                                <i class="fas fa-phone"></i> Hubungi
                            </button>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div>
                <!-- Active Loans Table -->
                <div class="dashboard-card">
                    <div class="card-title">
                        <div>
                            <i class="fas fa-list"></i>
                            Peminjaman Aktif
                        </div>
                        <a href="/all-loans" class="view-link">Lihat Semua</a>
                    </div>

                    <div class="table-responsive">
                        <table class="compact-table">
                            <thead>
                                <tr>
                                    <th>Alat</th>
                                    <th>Peminjam</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="tool-info">
                                            <strong>Bor Listrik</strong>
                                            <small>ID: BL-001</small>
                                        </div>
                                    </td>
                                    <td>Andi S.</td>
                                    <td><span class="status-badge status-borrowed">Dipinjam</span></td>
                                    <td>
                                        <button class="btn-icon success small" title="Tandai Dikembalikan">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="tool-info">
                                            <strong>Gerinda</strong>
                                            <small>ID: GR-002</small>
                                        </div>
                                    </td>
                                    <td>Budi S.</td>
                                    <td><span class="status-badge status-borrowed">Dipinjam</span></td>
                                    <td>
                                        <button class="btn-icon success small">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="tool-info">
                                            <strong>Gergaji</strong>
                                            <small>ID: GG-003</small>
                                        </div>
                                    </td>
                                    <td>Siti R.</td>
                                    <td><span class="status-badge status-overdue">Terlambat</span></td>
                                    <td>
                                        <button class="btn-icon warning small">
                                            <i class="fas fa-exclamation"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="tool-info">
                                            <strong>Waterpass</strong>
                                            <small>ID: WP-004</small>
                                        </div>
                                    </td>
                                    <td>Dewi L.</td>
                                    <td><span class="status-badge status-available">Siap</span></td>
                                    <td>
                                        <button class="btn-icon primary small">
                                            <i class="fas fa-arrow-right"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Summary Cards -->
                <div class="dashboard-card">
                    <div class="card-title">
                        <i class="fas fa-chart-pie"></i>
                        Ringkasan Hari Ini
                    </div>

                    <div class="summary-grid">
                        <div class="summary-item-card">
                            <div class="summary-icon" style="background: rgba(40, 167, 69, 0.1); color: var(--success);">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="summary-details">
                                <span class="summary-value">12</span>
                                <span class="summary-label">Total Peminjaman</span>
                            </div>
                        </div>

                        <div class="summary-item-card">
                            <div class="summary-icon" style="background: rgba(40, 167, 69, 0.1); color: var(--success);">
                                <i class="fas fa-undo-alt"></i>
                            </div>
                            <div class="summary-details">
                                <span class="summary-value">7</span>
                                <span class="summary-label">Dikembalikan</span>
                            </div>
                        </div>

                        <div class="summary-item-card">
                            <div class="summary-icon" style="background: rgba(255, 193, 7, 0.1); color: var(--warning);">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="summary-details">
                                <span class="summary-value">5</span>
                                <span class="summary-label">Belum Kembali</span>
                            </div>
                        </div>

                        <div class="summary-item-card">
                            <div class="summary-icon" style="background: rgba(220, 53, 69, 0.1); color: var(--danger);">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <div class="summary-details">
                                <span class="summary-value">4</span>
                                <span class="summary-label">Terlambat</span>
                            </div>
                        </div>
                    </div>

                    <!-- Progress Stats -->
                    <div class="progress-stats">
                        <div class="progress-stat-item">
                            <div class="progress-stat-label">
                                <span>Tepat Waktu</span>
                                <span>8 (67%)</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill success" style="width: 67%"></div>
                            </div>
                        </div>
                        <div class="progress-stat-item">
                            <div class="progress-stat-label">
                                <span>Terlambat</span>
                                <span>4 (33%)</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill danger" style="width: 33%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent History -->
                <div class="dashboard-card">
                    <div class="card-title">
                        <div>
                            <i class="fas fa-history"></i>
                            Riwayat Terbaru
                        </div>
                        <a href="/riwayat" class="view-link">Lihat Semua</a>
                    </div>

                    <div class="history-list">
                        <div class="history-item">
                            <div class="history-icon success">
                                <i class="fas fa-check"></i>
                            </div>
                            <div class="history-content">
                                <div class="history-title">Pengembalian Bor Listrik</div>
                                <div class="history-meta">
                                    <span>Andi Saputra</span>
                                    <span>• 10 menit lalu</span>
                                </div>
                            </div>
                        </div>

                        <div class="history-item">
                            <div class="history-icon warning">
                                <i class="fas fa-plus"></i>
                            </div>
                            <div class="history-content">
                                <div class="history-title">Peminjaman Gerinda</div>
                                <div class="history-meta">
                                    <span>Budi Santoso</span>
                                    <span>• 25 menit lalu</span>
                                </div>
                            </div>
                        </div>

                        <div class="history-item">
                            <div class="history-icon danger">
                                <i class="fas fa-exclamation"></i>
                            </div>
                            <div class="history-content">
                                <div class="history-title">Keterlambatan Gergaji</div>
                                <div class="history-meta">
                                    <span>Siti Rahayu</span>
                                    <span>• 1 jam lalu</span>
                                </div>
                            </div>
                        </div>

                        <div class="history-item">
                            <div class="history-icon success">
                                <i class="fas fa-undo-alt"></i>
                            </div>
                            <div class="history-content">
                                <div class="history-title">Pengembalian Waterpass</div>
                                <div class="history-meta">
                                    <span>Dewi Lestari</span>
                                    <span>• 2 jam lalu</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="dashboard-footer">
            <div class="footer-info">
                <i class="fas fa-clock"></i>
                Update terakhir: {{ now()->format('H:i') }} WIB
            </div>
            <div class="footer-actions">
                <button class="btn-icon small" onclick="location.reload()">
                    <i class="fas fa-sync-alt"></i>
                </button>
            </div>
        </div>
    </div>
</main>

@endsection

<style>
/* Enhanced Styles */
:root {
    --primary: #4361ee;
    --secondary: #6c757d;
    --success: #2ecc71;
    --danger: #e74c3c;
    --warning: #f39c12;
    --info: #3498db;
    --dark: #2c3e50;
    --light: #f8f9fa;
    --bg-primary: #ffffff;
    --bg-secondary: #f8f9fa;
    --text-primary: #2c3e50;
    --text-secondary: #7f8c8d;
    --text-tertiary: #95a5a6;
    --border-light: #ecf0f1;
    --shadow-sm: 0 2px 4px rgba(0,0,0,0.05);
    --shadow-md: 0 4px 6px rgba(0,0,0,0.1);
    --shadow-lg: 0 10px 15px rgba(0,0,0,0.1);
    --radius-sm: 4px;
    --radius: 8px;
    --radius-lg: 12px;
}

/* Header Actions */
.header-actions {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.btn {
    padding: 10px 20px;
    border: none;
    border-radius: var(--radius);
    font-weight: 500;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
}

.btn-primary {
    background: var(--primary);
    color: white;
}

.btn-success {
    background: var(--success);
    color: white;
}

.btn-info {
    background: var(--info);
    color: white;
}

.btn-warning {
    background: var(--warning);
    color: white;
}

.btn-danger {
    background: var(--danger);
    color: white;
}

.btn-sm {
    padding: 6px 12px;
    font-size: 0.9rem;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

/* Quick Action Bar */
.quick-action-bar {
    background: var(--bg-primary);
    border-radius: var(--radius-lg);
    padding: 16px 20px;
    margin-bottom: 24px;
    display: flex;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--border-light);
}

.quick-action-title {
    display: flex;
    align-items: center;
    gap: 8px;
    color: var(--text-secondary);
    font-weight: 600;
}

.quick-action-title i {
    color: var(--warning);
}

.quick-action-buttons {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    flex: 1;
}

.quick-action-btn-small {
    padding: 8px 16px;
    border: none;
    border-radius: var(--radius);
    font-weight: 500;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    background: var(--bg-secondary);
    color: var(--text-primary);
}

.quick-action-btn-small.primary {
    background: rgba(67, 97, 238, 0.1);
    color: var(--primary);
}

.quick-action-btn-small.success {
    background: rgba(46, 204, 113, 0.1);
    color: var(--success);
}

.quick-action-btn-small.info {
    background: rgba(52, 152, 219, 0.1);
    color: var(--info);
}

.quick-action-btn-small.warning {
    background: rgba(243, 156, 18, 0.1);
    color: var(--warning);
}

.quick-action-btn-small:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-sm);
}

/* Dashboard Grid */
.dashboard-grid {
    display: grid;
    grid-template-columns: 1.2fr 0.8fr;
    gap: 24px;
}

/* Cards Grid */
.cards-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    margin-bottom: 24px;
}

.card {
    background: var(--bg-primary);
    border-radius: var(--radius-lg);
    padding: 20px;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--border-light);
    cursor: pointer;
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
}

.card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.card-icon {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
}

.card-trend {
    padding: 4px 8px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
}

.card-trend.positive {
    background: rgba(46, 204, 113, 0.1);
    color: var(--success);
}

.card-trend.negative {
    background: rgba(231, 76, 60, 0.1);
    color: var(--danger);
}

.card-value {
    font-size: 2rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 5px;
}

.card-label {
    color: var(--text-secondary);
    font-size: 0.9rem;
    margin-bottom: 15px;
}

.card-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 15px;
    border-top: 1px solid var(--border-light);
    color: var(--text-tertiary);
    font-size: 0.85rem;
}

/* Dashboard Card */
.dashboard-card {
    background: var(--bg-primary);
    border-radius: var(--radius-lg);
    padding: 20px;
    margin-bottom: 24px;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--border-light);
}

.card-title {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 1px solid var(--border-light);
    font-weight: 600;
    color: var(--text-primary);
}

.card-title i {
    margin-right: 10px;
    color: var(--primary);
}

/* Action Section */
.action-section {
    margin-bottom: 24px;
}

.action-section:last-child {
    margin-bottom: 0;
}

.section-title {
    display: flex;
    align-items: center;
    color: var(--text-secondary);
    margin-bottom: 16px;
    font-size: 0.95rem;
}

.section-title i {
    margin-right: 8px;
}

/* Activity List */
.activity-list {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.activity-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px;
    border-radius: var(--radius);
    transition: all 0.2s ease;
}

.activity-item:hover {
    background: var(--bg-secondary);
}

.activity-icon {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
}

.activity-icon.warning {
    background: rgba(243, 156, 18, 0.1);
    color: var(--warning);
}

.activity-icon.success {
    background: rgba(46, 204, 113, 0.1);
    color: var(--success);
}

.activity-icon.danger {
    background: rgba(231, 76, 60, 0.1);
    color: var(--danger);
}

.activity-icon.secondary {
    background: rgba(108, 117, 125, 0.1);
    color: var(--secondary);
}

.activity-content {
    flex: 1;
}

.activity-title {
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 2px;
}

.activity-desc {
    font-size: 0.85rem;
    color: var(--text-tertiary);
}

.user-name {
    font-weight: 600;
    color: var(--text-primary);
}

.time-remaining {
    color: var(--warning);
}

.time-waiting {
    color: var(--success);
}

.overdue-days {
    color: var(--danger);
}

.tool-details {
    font-size: 0.8rem;
    color: var(--text-tertiary);
    margin-top: 4px;
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 6px;
}

.btn-icon {
    width: 32px;
    height: 32px;
    border-radius: 8px;
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s ease;
}

.btn-icon.success {
    background: rgba(46, 204, 113, 0.1);
    color: var(--success);
}

.btn-icon.danger {
    background: rgba(231, 76, 60, 0.1);
    color: var(--danger);
}

.btn-icon.warning {
    background: rgba(243, 156, 18, 0.1);
    color: var(--warning);
}

.btn-icon.primary {
    background: rgba(67, 97, 238, 0.1);
    color: var(--primary);
}

.btn-icon:hover {
    transform: scale(1.1);
}

.btn-icon.small {
    width: 28px;
    height: 28px;
    font-size: 0.8rem;
}

/* Table */
.table-responsive {
    overflow-x: auto;
}

.compact-table {
    width: 100%;
    border-collapse: collapse;
}

.compact-table th {
    text-align: left;
    padding: 12px 8px;
    color: var(--text-secondary);
    font-weight: 600;
    font-size: 0.85rem;
    border-bottom: 2px solid var(--border-light);
}

.compact-table td {
    padding: 12px 8px;
    border-bottom: 1px solid var(--border-light);
}

.tool-info {
    display: flex;
    flex-direction: column;
}

.tool-info small {
    color: var(--text-tertiary);
    font-size: 0.75rem;
}

/* Status Badges */
.status-badge {
    padding: 4px 8px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
}

.status-borrowed {
    background: rgba(67, 97, 238, 0.1);
    color: var(--primary);
}

.status-overdue {
    background: rgba(231, 76, 60, 0.1);
    color: var(--danger);
}

.status-available {
    background: rgba(46, 204, 113, 0.1);
    color: var(--success);
}

/* Section Badge */
.section-badge {
    background: var(--bg-secondary);
    color: var(--text-primary);
    padding: 2px 8px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 600;
    margin-left: 8px;
}

.section-badge.danger {
    background: rgba(231, 76, 60, 0.1);
    color: var(--danger);
}

/* View More Links */
.view-more {
    display: block;
    text-align: center;
    margin-top: 12px;
    padding: 8px;
    color: var(--primary);
    text-decoration: none;
    font-size: 0.9rem;
    border-radius: var(--radius);
    transition: all 0.2s ease;
}

.view-more:hover {
    background: var(--bg-secondary);
}

.view-link {
    color: var(--primary);
    text-decoration: none;
    font-size: 0.85rem;
    padding: 4px 8px;
    border-radius: var(--radius);
}

.view-link:hover {
    background: var(--bg-secondary);
}

/* Summary Grid */
.summary-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 16px;
    margin-bottom: 20px;
}

.summary-item-card {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 16px;
    background: var(--bg-secondary);
    border-radius: var(--radius);
}

.summary-icon {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
}

.summary-details {
    display: flex;
    flex-direction: column;
}

.summary-value {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-primary);
    line-height: 1.2;
}

.summary-label {
    font-size: 0.85rem;
    color: var(--text-tertiary);
}

/* Progress Stats */
.progress-stats {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.progress-stat-item {
    width: 100%;
}

.progress-stat-label {
    display: flex;
    justify-content: space-between;
    margin-bottom: 6px;
    font-size: 0.9rem;
    color: var(--text-secondary);
}

.progress-bar {
    height: 8px;
    background: var(--border-light);
    border-radius: 4px;
    overflow: hidden;
}

.progress-fill {
    height: 100%;
    border-radius: 4px;
    transition: width 0.3s ease;
}

.progress-fill.success {
    background: var(--success);
}

.progress-fill.danger {
    background: var(--danger);
}

.progress-fill.warning {
    background: var(--warning);
}

/* History List */
.history-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.history-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 8px;
    border-radius: var(--radius);
    transition: all 0.2s ease;
}

.history-item:hover {
    background: var(--bg-secondary);
}

.history-icon {
    width: 32px;
    height: 32px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.9rem;
}

.history-icon.success {
    background: rgba(46, 204, 113, 0.1);
    color: var(--success);
}

.history-icon.warning {
    background: rgba(243, 156, 18, 0.1);
    color: var(--warning);
}

.history-icon.danger {
    background: rgba(231, 76, 60, 0.1);
    color: var(--danger);
}

.history-content {
    flex: 1;
}

.history-title {
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 2px;
    font-size: 0.95rem;
}

.history-meta {
    font-size: 0.8rem;
    color: var(--text-tertiary);
}

.history-meta span:first-child {
    font-weight: 500;
}

/* Footer */
.dashboard-footer {
    margin-top: 32px;
    padding: 20px 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-top: 1px solid var(--border-light);
}

.footer-info {
    color: var(--text-tertiary);
    font-size: 0.9rem;
}

.footer-info i {
    margin-right: 6px;
}

.footer-actions {
    display: flex;
    gap: 8px;
}

/* Welcome Banner */
.welcome-banner {
    background: linear-gradient(135deg, var(--primary), var(--info));
    border-radius: var(--radius-lg);
    padding: 24px 32px;
    margin-bottom: 24px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
    color: white;
}

.welcome-content h2 {
    margin-bottom: 8px;
    font-size: 1.5rem;
}

.welcome-content p {
    opacity: 0.9;
    margin: 0;
}

.welcome-content strong {
    font-weight: 700;
}

.welcome-stats {
    display: flex;
    gap: 24px;
}

.welcome-stat {
    text-align: center;
}

.welcome-stat-value {
    font-size: 1.8rem;
    font-weight: 700;
    line-height: 1.2;
}

.welcome-stat-label {
    font-size: 0.9rem;
    opacity: 0.9;
}

/* Nav Badge */
.nav-badge {
    background: var(--danger);
    color: white;
    padding: 2px 8px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 600;
}

/* Text Utilities */
.text-warning { color: var(--warning) !important; }
.text-success { color: var(--success) !important; }
.text-danger { color: var(--danger) !important; }
.text-primary { color: var(--primary) !important; }

/* Responsive */
@media (max-width: 1024px) {
    .cards-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .dashboard-grid {
        grid-template-columns: 1fr;
    }

    .header-actions {
        flex-direction: column;
        width: 100%;
    }

    .header-actions .btn {
        width: 100%;
    }

    .quick-action-bar {
        flex-direction: column;
        align-items: flex-start;
    }

    .quick-action-buttons {
        width: 100%;
    }

    .quick-action-btn-small {
        flex: 1;
    }

    .welcome-banner {
        flex-direction: column;
        text-align: center;
    }

    .summary-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 480px) {
    .cards-grid {
        grid-template-columns: 1fr;
    }

    .quick-action-buttons {
        flex-direction: column;
    }

    .quick-action-btn-small {
        width: 100%;
    }
}
</style>
