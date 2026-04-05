@extends('admin. index')
@section('title', 'ActivityLog')

@section('konten-ds')
<style>
    :root {
        --primary-color: #10B981;
        --primary-light: #D1FAE5;
        --primary-dark: #059669;
        --secondary-color: #3B82F6;
        --danger-color: #EF4444;
        --warning-color: #F59E0B;
        --success-color: #10B981;
        --info-color: #06B6D4;

        --white: #FFFFFF;
        --light-bg: #F8FAFC;
        --card-bg: #FFFFFF;
        --text-primary: #1F2937;
        --text-secondary: #6B7280;
        --border-color: #E5E7EB;

        --shadow-sm: 0 1px 3px rgba(0,0,0,0.05);
        --shadow-md: 0 4px 6px -1px rgba(0,0,0,0.06);
        --shadow-lg: 0 10px 15px -3px rgba(0,0,0,0.08);

        --radius-sm: 8px;
        --radius-md: 12px;
        --radius-lg: 16px;
        --radius-xl: 20px;

        --transition-fast: 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        --transition-normal: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-color: #F9FAFB;
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
        color: var(--text-primary);
        line-height: 1.5;
        min-height: 100vh;
    }

    .container-main {
        width: 110%;
        max-width: 1450px;
        margin: 0 auto;
        padding: 30px;
    }

    /* Header Styles */
    .header-section {
        background: var(--white);
        border-radius: var(--radius-xl);
        padding: 40px;
        margin-bottom: 30px;
        box-shadow: var(--shadow-lg);
        border: 1px solid var(--border-color);
        position: relative;
        overflow: hidden;
    }
/*
        .header-section::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 300px;
            height: 300px;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(52, 211, 153, 0.1));
            border-radius: 0 0 0 100%;
            z-index: 0;
        } */

    .header-content {
        position: relative;
        z-index: 1;
    }

    .header-title {
        font-size: 2.2rem;
        font-weight: 700;
        margin-bottom: 12px;
        color: var(--primary-dark);
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .header-subtitle {
        color: var(--text-secondary);
        font-size: 1.05rem;
        line-height: 1.6;
        max-width: 700px;
    }

    /* Stats Cards */
    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 25px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: var(--white);
        border-radius: var(--radius-lg);
        padding: 20px;
        box-shadow: var(--shadow-md);
        border: 1px solid var(--border-color);
        transition: all var(--transition-normal);
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
    }

    .stat-card-total {
        border-left: 4px solid var(--primary-color);
    }

    .stat-card-create {
        border-left: 4px solid var(--success-color);
    }

    .stat-card-update {
        border-left: 4px solid var(--secondary-color);
    }

    .stat-card-delete {
        border-left: 4px solid var(--danger-color);
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .stat-card-total .stat-icon {
        background: var(--primary-light);
        color: var(--primary-color);
    }

    .stat-card-create .stat-icon {
        background: rgba(16, 185, 129, 0.1);
        color: var(--success-color);
    }

    .stat-card-update .stat-icon {
        background: rgba(59, 130, 246, 0.1);
        color: var(--secondary-color);
    }

    .stat-card-delete .stat-icon {
        background: rgba(239, 68, 68, 0.1);
        color: var(--danger-color);
    }

    .stat-info {
        flex: 1;
    }

    .stat-value {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 4px;
        color: var(--text-primary);
    }

    .stat-label {
        color: var(--text-secondary);
        font-size: 0.95rem;
        font-weight: 500;
    }

    /* Search Bar */
    .search-bar {
        background: var(--white);
        border-radius: var(--radius-lg);
        padding: 25px 30px;
        margin-bottom: 25px;
        box-shadow: var(--shadow-md);
        border: 1px solid var(--border-color);
    }

    /* Search Box */
    .search-box {
        display: flex;
        gap: 12px;
    }

    .search-wrapper {
        flex: 1;
        position: relative;
    }

    .search-input {
        width: 100%;
        padding: 14px 20px 14px 48px;
        border: 2px solid var(--border-color);
        border-radius: var(--radius-md);
        background: var(--white);
        color: var(--text-primary);
        font-size: 0.95rem;
        transition: all var(--transition-normal);
        font-family: 'Inter', sans-serif;
    }

    .search-input:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.15);
    }

    .search-icon {
        position: absolute;
        left: 18px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-secondary);
        font-size: 1.1rem;
    }

    .search-btn {
        padding: 14px 28px;
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
        border: none;
        border-radius: var(--radius-md);
        font-weight: 600;
        font-size: 0.95rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all var(--transition-normal);
        white-space: nowrap;
    }

    .search-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(16, 185, 129, 0.2);
    }

    /* Filter Section - Separate Container */
    .filter-section {
        background: var(--white);
        border-radius: var(--radius-lg);
        padding: 30px;
        margin-bottom: 25px;
        box-shadow: var(--shadow-md);
        border: 1px solid var(--border-color);
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        flex-wrap: wrap;
        gap: 15px;
    }

    .section-title {
        font-size: 1.3rem;
        font-weight: 600;
        color: var(--text-primary);
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .section-title i {
        color: var(--primary-color);
    }

    .filter-container {
        background: var(--light-bg);
        border-radius: var(--radius-md);
        padding: 25px;
        border: 1px solid var(--border-color);
    }

    .filter-title {
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 1rem;
    }

    .filter-title i {
        color: var(--primary-color);
    }

    .filter-row {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
    }

    .filter-group {
        flex: 1;
        min-width: 200px;
    }

    .filter-label {
        display: block;
        margin-bottom: 8px;
        font-size: 0.9rem;
        color: var(--text-secondary);
        font-weight: 500;
    }

    .filter-select {
        width: 100%;
        padding: 12px 16px;
        border: 1px solid var(--border-color);
        border-radius: var(--radius-md);
        background: var(--white);
        font-size: 0.95rem;
        color: var(--text-primary);
        cursor: pointer;
        transition: all var(--transition-fast);
    }

    .filter-select:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
    }

    .filter-actions {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }

    .btn {
        padding: 12px 24px;
        border-radius: var(--radius-md);
        font-weight: 600;
        font-size: 0.95rem;
        cursor: pointer;
        transition: all var(--transition-normal);
        display: flex;
        align-items: center;
        gap: 8px;
        border: none;
        font-family: 'Inter', sans-serif;
        text-decoration: none;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(16, 185, 129, 0.2);
    }

    .btn-secondary {
        background: var(--white);
        color: var(--text-primary);
        border: 2px solid var(--border-color);
    }

    .btn-secondary:hover {
        background: var(--light-bg);
        border-color: var(--primary-color);
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    /* Data Section - Separate Container */
    .data-section {
        background: var(--white);
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow-lg);
        border: 1px solid var(--border-color);
        margin-bottom: 40px;
    }

    .section-header {
        padding: 25px 30px;
        border-bottom: 1px solid var(--border-color);
        background: linear-gradient(to right, var(--white), var(--light-bg));
    }

    .table-subtitle {
        color: var(--text-secondary);
        font-size: 0.9rem;
        margin-top: 5px;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .activity-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 1000px;
    }

    .activity-table th {
        padding: 18px 20px;
        text-align: left;
        font-weight: 600;
        color: var(--text-primary);
        border-bottom: 2px solid var(--border-color);
        background: var(--light-bg);
        font-size: 0.9rem;
        white-space: nowrap;
    }

    .activity-table th i {
        margin-right: 8px;
        color: var(--primary-color);
    }

    .activity-table td {
        padding: 18px 20px;
        border-bottom: 1px solid var(--border-color);
        color: var(--text-primary);
        vertical-align: middle;
        font-size: 0.95rem;
    }

    .activity-table tbody tr {
        transition: background-color var(--transition-fast);
    }

    .activity-table tbody tr:hover {
        background-color: rgba(16, 185, 129, 0.03);
    }

    .activity-table tbody tr:last-child td {
        border-bottom: none;
    }

    /* User Info Cell */
    .user-info {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .user-avatar {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
        font-size: 16px;
        flex-shrink: 0;
    }

    .user-details {
        flex: 1;
        min-width: 0;
    }

    .user-id {
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 2px;
        font-size: 1rem;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .user-name {
        font-size: 0.85rem;
        color: var(--text-secondary);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* Activity Type Badge */
    .activity-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        white-space: nowrap;
    }

    .activity-create,.activity-login, .activity-logout  {
        background: rgba(16, 185, 129, 0.12);
        color: var(--success-color);
        border: 1px solid rgba(16, 185, 129, 0.2);
    }

    .activity-update {
        background: rgba(59, 130, 246, 0.12);
        color: var(--secondary-color);
        border: 1px solid rgba(59, 130, 246, 0.2);
    }

    .activity-delete {
        background: rgba(239, 68, 68, 0.12);
        color: var(--danger-color);
        border: 1px solid rgba(239, 68, 68, 0.2);
    }




    /* Description Cell */
    .activity-description {
        color: var(--text-primary);
        line-height: 1.5;
        margin-bottom: 4px;
    }

    /* Role Badge */
    .role-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .role {
        background: rgba(16, 185, 129, 0.12);
        color: var(--success-color);
        border: 1px solid rgba(16, 185, 129, 0.2);
    }

    /* Timestamp */
    .timestamp {
        color: var(--text-secondary);
        font-size: 0.85rem;
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    .timestamp-date {
        font-weight: 500;
    }

    .timestamp-time {
        font-size: 0.8rem;
        color: var(--text-secondary);
    }

    /* Pagination */
    .pagination-container {
        padding: 25px 30px;
        border-top: 1px solid var(--border-color);
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
        background: linear-gradient(to right, var(--white), var(--light-bg));
    }

    .pagination-info {
        font-size: 0.9rem;
        color: var(--text-secondary);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .pagination-info i {
        color: var(--primary-color);
        font-size: 1rem;
    }

    .pagination {
        display: flex;
        gap: 4px;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .page-item {
        margin: 0;
    }

    .page-link {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: var(--radius-sm);
        border: 1px solid var(--border-color);
        background: var(--white);
        color: var(--text-primary);
        text-decoration: none;
        font-weight: 500;
        font-size: 0.9rem;
        transition: all var(--transition-fast);
    }

    .page-link:hover {
        background: var(--light-bg);
        border-color: var(--primary-color);
        color: var(--primary-color);
    }

    .page-item.active .page-link {
        background: var(--primary-color);
        border-color: var(--primary-color);
        color: white;
    }

    .page-item.disabled .page-link {
        background: var(--light-bg);
        color: var(--text-secondary);
        cursor: not-allowed;
        opacity: 0.6;
    }

    /* tombol clear (X SEARCH) */
    .clear-btn {
        position: absolute;
        right: 110px;
        top: 50%;
        transform: translateY(-50%);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #0b0c0d;
        font-size: 12px;
        cursor: pointer;
        transition: all 0.2s ease;
        font-size: 15px;
        text-decoration: none;
        background: transparent;
        border: none;
    }

    .clear-btn:hover {
        color: red;
        background: rgba(0, 0, 0, 0.05);
    }

    /* forelse nya */
    .empty-state {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
        gap: 15px;
    }

    .empty-state i {
        font-size: 48px;
        color: var(--text-secondary);
    }

    .empty-state p {
        color: var(--text-secondary);
        font-size: 1rem;
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .container-main {
            padding: 20px;
        }

        .header-section {
            padding: 30px;
        }

        .filter-row {
            flex-direction: column;
        }

        .filter-group {
            min-width: 100%;
        }
    }

    @media (max-width: 768px) {
        .header-title {
            font-size: 1.8rem;
        }

        .stats-container {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .stat-card {
            padding: 20px;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            font-size: 1.3rem;
        }

        .stat-value {
            font-size: 1.7rem;
        }

        .search-bar, .filter-section {
            padding: 20px;
        }

        .search-box {
            flex-direction: column;
            gap: 10px;
        }

        .search-btn {
            width: 100%;
            justify-content: center;
        }

        .clear-btn {
            right: 20px;
        }

        .filter-actions {
            flex-direction: column;
        }

        .filter-actions .btn {
            width: 100%;
            justify-content: center;
        }

        .pagination-container {
            flex-direction: column;
            text-align: center;
            gap: 15px;
        }

        .user-info {
            flex-direction: column;
            align-items: flex-start;
            gap: 8px;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            font-size: 14px;
        }

        .activity-table th,
        .activity-table td {
            padding: 14px 16px;
        }
    }

    @media (max-width: 576px) {
        .header-title {
            font-size: 1.5rem;
        }

        .header-section {
            padding: 25px;
        }

        .stat-card {
            flex-direction: column;
            text-align: center;
            gap: 15px;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            font-size: 1.2rem;
        }

        .stat-value {
            font-size: 1.5rem;
        }

        .section-header {
            padding: 20px;
        }

        .pagination {
            flex-wrap: wrap;
            justify-content: center;
        }
    }
</style>

<main class="main-content" id="mainContent">
    <div class="container-main">
        <!-- Header -->
        <header class="header-section">
            <div class="header-content">
                <h1 class="header-title">
                    <i class="fas fa-history"></i>
                    Log Aktivitas Sistem
                </h1>
                <p class="header-subtitle">
                    Pantau dan lacak semua aktivitas pengguna dalam sistem manajemen produk Anda.
                </p>
            </div>
        </header>

        <!-- Stats Cards -->
        <div class="stats-container">
            <div class="stat-card stat-card-total">
                <div class="stat-icon">
                    <i class="fas fa-history"></i>
                </div>
                <div class="stat-info">
                    <h3 class="stat-value">{{ $totalAktivitas }}</h3>
                    <p class="stat-label">Total Aktivitas</p>
                </div>
            </div>
            <div class="stat-card stat-card-create">
                <div class="stat-icon">
                    <i class="fas fa-plus-circle"></i>
                </div>
                <div class="stat-info">
                    <h3 class="stat-value">{{ $totalCreate }}</h3>
                    <p class="stat-label">Buat Data</p>
                </div>
            </div>
            <div class="stat-card stat-card-update">
                <div class="stat-icon">
                    <i class="fas fa-edit"></i>
                </div>
                <div class="stat-info">
                    <h3 class="stat-value">{{ $totalUpdate }}</h3>
                    <p class="stat-label">Perbarui Data</p>
                </div>
            </div>
            <div class="stat-card stat-card-delete">
                <div class="stat-icon">
                    <i class="fas fa-trash-alt"></i>
                </div>
                <div class="stat-info">
                    <h3 class="stat-value">{{ $totalDelete }}</h3>
                    <p class="stat-label">Hapus Data</p>
                </div>
            </div>
        </div>

        <!-- Search Bar (Separate) -->
        <div class="search-bar">
            <div class="search-box">
                <div class="search-wrapper">
                    <form action="{{ route('log-aktivitas') }}" method="GET" class="search-box">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text"
                               name="keyword"
                               class="search-input"
                               placeholder="Cari aktivitas, user, atau deskripsi..."
                               value="{{ request('keyword') }}"
                               aria-label="Cari log aktivitas">

                        @if (request('keyword'))
                            <a href="{{ route('log-aktivitas') }}" class="clear-btn" title="Reset pencarian">
                                <i class="fas fa-times"></i>
                            </a>
                        @endif

                        <button class="search-btn" type="submit">
                            Cari
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Filter Section (Separate Container) -->
        <div class="filter-section">
            <div class="section-header">
                <h3 class="section-title">
                    <i class="fas fa-filter"></i>
                    Filter Data
                </h3>
            </div>

            <form action="{{ route('log-aktivitas') }}" method="GET">
                <div class="filter-container">
                    <div class="filter-title">
                        <i class="fas fa-sliders-h"></i>
                        Atur Filter
                    </div>

                    <div class="filter-row">
                        <!-- JENIS AKTIVITAS -->
                        <div class="filter-group">
                            <label class="filter-label">Jenis Aktivitas</label>
                            <select class="filter-select" name="activity_type">
                                <option value="">Semua Jenis</option>
                                <option value="create" {{ request('activity_type') == 'create' ? 'selected' : '' }}>Buat Data</option>
                                <option value="update" {{ request('activity_type') == 'update' ? 'selected' : '' }}>Perbarui Data</option>
                                <option value="delete" {{ request('activity_type') == 'delete' ? 'selected' : '' }}>Hapus Data</option>
                                <option value="login" {{ request('activity_type') == 'login' ? 'selected' : '' }}>Login Sistem</option>
                                <option value="logout" {{ request('activity_type') == 'logout' ? 'selected' : '' }}>Logout Sistem</option>
                            </select>
                        </div>

                        <!-- ROLE -->
                        <div class="filter-group">
                            <label class="filter-label">Peran Pengguna</label>
                            <select class="filter-select" name="role">
                                <option value="">Semua Peran</option>
                                <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Administrator</option>
                                <option value="petugas" {{ request('role') == 'petugas' ? 'selected' : '' }}>Petugas</option>
                                <option value="user" {{ request('role') == 'user' ? 'selected' : '' }}>Pengguna</option>
                            </select>
                        </div>

                        <!-- PERIODE WAKTU -->
                        <div class="filter-group">
                            <label class="filter-label">Periode Waktu</label>
                            <select class="filter-select" name="date">
                                <option value="">Semua Waktu</option>
                                <option value="today" {{ request('date') == 'today' ? 'selected' : '' }}>Hari Ini</option>
                                <option value="week" {{ request('date') == 'week' ? 'selected' : '' }}>Minggu Ini</option>
                                <option value="month" {{ request('date') == 'month' ? 'selected' : '' }}>Bulan Ini</option>
                                <option value="year" {{ request('date') == 'year' ? 'selected' : '' }}>Tahun Ini</option>
                            </select>
                        </div>
                    </div>

                    <!-- ACTION BUTTON -->
                    <div class="filter-actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-check"></i>
                            Terapkan Filter
                        </button>

                        <a href="{{ route('log-aktivitas') }}" class="btn btn-secondary text-decoration-none">
                            <i class="fas fa-times"></i>
                            Hapus Filter
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Data Section (Separate Container) -->
        <div class="data-section">
            <div class="section-header">
                <div>
                    <h3 class="section-title">
                        <i class="fas fa-list-check"></i>
                        Daftar Log Aktivitas
                    </h3>
                    <p class="table-subtitle">Semua aktivitas yang terekam dalam sistem</p>
                </div>
            </div>

            <div class="table-responsive">
                <table class="activity-table">
                    <thead>
                        <tr>
                            <th width="250">
                                <i class="fas fa-user"></i> Email & Nama
                            </th>
                            <th width="150">
                                <i class="fas fa-tasks"></i> Jenis Aktivitas
                            </th>
                            <th width="300">
                                <i class="fas fa-align-left"></i> Deskripsi & Detail
                            </th>
                            <th width="150">
                                <i class="fas fa-user-tag"></i> Peran
                            </th>
                            <th width="180">
                                <i class="fas fa-clock"></i> Waktu
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($log_aktivitas as $activity)
                            <tr>
                                <!-- USER -->
                                <td>
                                    <div class="user-info">
                                        <div class="user-avatar">
                                            {{ strtoupper(substr($activity->user->name ?? 'S', 0, 2)) }}
                                        </div>
                                        <div class="user-details">
                                            <div class="user-id">
                                                {{ $activity->user->email ?? 'system' }}
                                            </div>
                                            <div class="user-name">
                                                {{ $activity->user->name ?? 'System' }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <!-- JENIS AKTIVITAS -->
                                <td>
                                    @php
                                        $activityClass = '';
                                        switch($activity->activity_type) {
                                            case 'create': $activityClass = 'activity-create'; break;
                                            case 'update': $activityClass = 'activity-update'; break;
                                            case 'delete': $activityClass = 'activity-delete'; break;
                                            case 'login': $activityClass = 'activity-login'; break;
                                            case 'logout': $activityClass = 'activity-logout'; break;
                                            default: $activityClass = 'activity-create';
                                        }
                                    @endphp
                                    <span class="activity-badge {{ $activityClass }}">
                                        <i class="fas fa-clipboard-list"></i>
                                        {{ ucfirst($activity->activity_type) }}
                                    </span>
                                </td>

                                <!-- DESKRIPSI -->
                                <td>
                                    <div class="activity-description">
                                        {{ $activity->description }}
                                    </div>
                                </td>

                                <!-- ROLE -->
                                <td>
                                    <span class="role-badge role">
                                        <i class="fas fa-user-shield"></i>
                                        {{ ucfirst($activity->role) }}
                                    </span>
                                </td>

                                <!-- WAKTU -->
                                <td>
                                    <div class="timestamp">
                                        <span class="timestamp-date">
                                            {{ $activity->created_at->format('d M Y') }}
                                        </span>
                                        <span class="timestamp-time">
                                            {{ $activity->created_at->format('H:i:s') }}
                                        </span>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <!-- kalau data kosong -->
                            <tr>
                                <td colspan="5" class="text-center py-4">
                                    <div class="empty-state">
                                        <i class="fas fa-search" style="font-size: 48px; color: #9ca3af;"></i>
                                        <p class="mt-2 mb-0 text-muted">
                                            Data tidak ditemukan
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if ($log_aktivitas->hasPages())
                <div class="pagination-container">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <!-- PREVIOUS -->
                            <li class="page-item {{ $log_aktivitas->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $log_aktivitas->previousPageUrl() }}">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            </li>

                            <!-- PAGE NUMBERS -->
                            @foreach ($log_aktivitas->getUrlRange(1, $log_aktivitas->lastPage()) as $page => $url)
                                <li class="page-item {{ $log_aktivitas->currentPage() == $page ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">
                                        {{ $page }}
                                    </a>
                                </li>
                            @endforeach

                            <!-- NEXT -->
                            <li class="page-item {{ $log_aktivitas->hasMorePages() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $log_aktivitas->nextPageUrl() }}">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            @endif
        </div>
    </div>
</main>

@endsection
