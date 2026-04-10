@extends('petugas.index')

@section('title', 'Manajemen Peminjaman Alat')

@section('konten-ds')



<main class="main-content" id="mainContent">
    <style>
/* Popup */
.swal-popup {
    border-radius: 16px;
    padding: 20px;
    font-family: 'Segoe UI', sans-serif;
}

/* Tombol Hapus / Confirm */
.swal-btn-delete {
    background:  #10B981;
    color: white;
    padding: 10px 20px;
    border-radius: 8px;
    margin-right: 10px;
    font-weight: 600;
    border: none;
    transition: 0.3s;
}

.swal-btn-delete:hover {
    background:  #059669;
}

/* Tombol Cancel */
.swal-btn-cancel {
    background: #e0e0e0;
    color: #333;
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: 600;
    border: none;
    transition: 0.3s;
}

.swal-btn-cancel:hover {
    background: #bdbdbd;
}


</style>
<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
        }

        :root {
            --primary: #10B981;
            --primary-dark: #059669;
            --primary-light: #80E27E;
            --secondary: #1A237E;
            --secondary-dark: #0F1555;
            --secondary-light: #534BAE;
            --gradient: linear-gradient(135deg, #10B981, #059669);
            --bg: #F8FAFC;
            --white: #FFFFFF;
            --border: #E2E8F0;
            --text-primary: #1E293B;
            --text-secondary: #64748B;
            --text-muted: #94A3B8;
            --success: #10B981;
            --warning: #F59E0B;
            --danger: #EF4444;
            --paid: #3B82F6;
            --unpaid: #6B7280;
            --refund: #8B5CF6;
            --shadow-sm: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
            --shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-xl: 24px;
            --radius-2xl: 32px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            background-color: var(--bg);
            font-family: 'Inter', sans-serif;
            color: var(--text-primary);
            line-height: 1.5;
        }

        .container-main {
            max-width: 1500px;
            margin: 0 auto;
            padding: 24px;
        }

        .header-section {
            background: var(--white);
            border-radius: var(--radius-2xl);
            padding: 36px 48px;
            margin-bottom: 32px;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border);
        }

        .header-title {
            font-size: 2.4rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 16px;
            font-family: 'Space Grotesk', sans-serif;
        }

        .header-title i {
            color: var(--primary);
            background: linear-gradient(135deg, #10B98120, #1A237E20);
            padding: 12px;
            border-radius: var(--radius-lg);
        }

        .header-subtitle {
            color: var(--text-secondary);
            font-size: 1.1rem;
            max-width: 700px;
            margin-top: 12px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 20px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: var(--white);
            border-radius: var(--radius-xl);
            padding: 24px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 16px;
            transition: var(--transition);
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
        }

        .stat-icon {
            width: 56px;
            height: 56px;
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            background: linear-gradient(135deg, #10B98110, #1A237E10);
            color: var(--primary);
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 800;
            line-height: 1.2;
            color: var(--text-primary);
        }

        .stat-label {
            color: var(--text-secondary);
            font-size: 0.9rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .charts-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 32px;
        }

        .chart-card {
            background: var(--white);
            border-radius: var(--radius-xl);
            padding: 24px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border);
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .chart-header h4 {
            font-size: 1.1rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--text-primary);
        }

        .chart-header h4 i {
            color: var(--primary);
        }

        .chart-container {
            height: 250px;
            position: relative;
        }

        .action-bar {
            background: var(--white);
            border-radius: var(--radius-xl);
            padding: 28px;
            margin-bottom: 28px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border);
        }

        .search-section {
            display: flex;
            gap: 16px;
            margin-bottom: 24px;
        }

        .search-wrapper {
            flex: 1;
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 16px 20px 16px 52px;
            border: 2px solid var(--border);
            border-radius: var(--radius-lg);
            font-size: 1rem;
            transition: var(--transition);
            background: #F8FAFC;
        }

        .search-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
            outline: none;
            background: white;
        }

        .search-icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
            font-size: 1.2rem;
        }

        .btn {
            padding: 14px 28px;
            border-radius: var(--radius-lg);
            font-weight: 600;
            font-size: 0.95rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            border: none;
            cursor: pointer;
            transition: var(--transition);
            white-space: nowrap;
            font-family: 'Inter', sans-serif;
        }

        .btn-primary {
            background: var(--gradient);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px -5px rgba(16, 185, 129, 0.3);
        }

        .btn-secondary {
            background: white;
            border: 2px solid var(--border);
            color: var(--text-primary);
        }

        .btn-secondary:hover {
            border-color: var(--primary);
            background: #F8FAFC;
        }

        .btn-danger {
            background: var(--danger);
            color: white;
        }

        .btn-danger:hover {
            background: #dc2626;
            transform: translateY(-2px);
        }

        .filter-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-top: 20px;
        }

        .filter-item {
            flex: 1;
        }

        .filter-label {
            display: block;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text-secondary);
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .filter-select {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid var(--border);
            border-radius: var(--radius-md);
            background: var(--white);
            font-size: 0.95rem;
            cursor: pointer;
        }

        .filter-select:focus {
            border-color: var(--primary);
            outline: none;
        }

        .filter-actions {
            display: flex;
            gap: 12px;
            margin-top: 24px;
            justify-content: flex-end;
        }

        .table-container {
            background: var(--white);
            border-radius: var(--radius-2xl);
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border);
            overflow: hidden;
            margin-bottom: 32px;
        }

        .table-header {
            padding: 24px 28px;
            background: white;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table-header h3 {
            font-size: 1.4rem;
            font-weight: 800;
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--text-primary);
            font-family: 'Space Grotesk', sans-serif;
        }

        .table-header h3 i {
            color: var(--primary);
        }

        .table-responsive {
            overflow-x: auto;
        }

        .tools-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1500px;
        }

        .tools-table th {
            text-align: left;
            padding: 18px 20px;
            background: #F8FAFC;
            font-weight: 700;
            color: var(--text-primary);
            border-bottom: 2px solid var(--border);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .tools-table td {
            padding: 16px 20px;
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
        }

        .tools-table tbody tr:hover {
            background: linear-gradient(90deg, rgba(16, 185, 129, 0.02), transparent);
        }

        .officer-cell {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid white;
            box-shadow: var(--shadow-sm);
        }

        .officer-name {
            font-weight: 700;
            color: var(--text-primary);
        }

        .officer-id {
            font-size: 0.8rem;
            color: var(--text-secondary);
            display: flex;
            align-items: center;
            gap: 4px;
            margin-top: 2px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: 40px;
            font-weight: 600;
            font-size: 0.8rem;
            white-space: nowrap;
            border: 1px solid transparent;
        }

        .badge-approved { background: #E8F5E9; color: #2E7D32; border-color: #A5D6A7; }
        .badge-pending { background: #FFF3E0; color: #EF6C00; border-color: #FFB74D; }
        .badge-rejected { background: #FFEBEE; color: #C62828; border-color: #EF9A9A; }
        .badge-paid { background: #E3F2FD; color: #1565C0; border-color: #90CAF9; }
        .badge-unpaid { background: #ECEFF1; color: #546E7A; border-color: #B0BEC5; }
        .badge-refund { background: #EDE7F6; color: #5E35B1; border-color: #B39DDB; }

        .action-group {
            display: flex;
            gap: 8px;
            align-items: center;
            justify-content: flex-start;
            flex-wrap: nowrap;
        }

        .action-btn-text {
            padding: 8px 16px;
            border-radius: var(--radius-md);
            border: 1px solid var(--border);
            background: white;
            color: var(--text-secondary);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            cursor: pointer;
            transition: var(--transition);
            font-size: 0.85rem;
            font-weight: 600;
            box-shadow: var(--shadow-sm);
            min-width: 85px;
            white-space: nowrap;
        }

        .action-btn-text i {
            font-size: 0.9rem;
        }

        .btn-approve-text {
            color: var(--success);
            border-color: var(--success);
            background: #F0FDF4;
        }
        .btn-approve-text:hover {
            background: var(--success);
            color: white;
            border-color: var(--success);
        }

        .btn-reject-text {
            color: var(--danger);
            border-color: var(--danger);
            background: #FEF2F2;
        }
        .btn-reject-text:hover {
            background: var(--danger);
            color: white;
            border-color: var(--danger);
        }

        .btn-view-text {
            color: var(--secondary);
            border-color: var(--secondary);
            background: #EEF2FF;
        }
        .btn-view-text:hover {
            background: var(--secondary);
            color: white;
            border-color: var(--secondary);
        }

        .pagination-wrap {
            padding: 20px 28px;
            border-top: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #F8FAFC;
        }

        .pagination-list {
            display: flex;
            gap: 6px;
            list-style: none;
        }

        .page-item a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 10px;
            border: 1px solid var(--border);
            background: white;
            color: var(--text-primary);
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
        }

        .page-item a:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .page-item.active a {
            background: var(--gradient);
            border-color: transparent;
            color: white;
        }

        .footer {
            text-align: center;
            padding: 32px;
            color: var(--text-secondary);
        }

        /* ==================== MODAL STYLES ==================== */
        .order-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(8px);
            z-index: 9999;
            align-items: center;
            justify-content: center;
        }

        .order-modal.show {
            display: flex !important;
        }

        .order-modal-card {
            background: var(--white);
            border-radius: var(--radius-2xl);
            width: 90%;
            max-width: 1100px;
            max-height: 85vh;
            overflow-y: auto;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            animation: modalFadeIn 0.3s ease;
        }

        .order-modal-card-small {
            max-width: 500px;
        }

        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: scale(0.95) translateY(-20px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        .order-modal-head {
            padding: 20px 28px;
            border-bottom: 1px solid var(--border);
            background: var(--white);
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: var(--radius-2xl) var(--radius-2xl) 0 0;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .order-modal-head h2 {
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 0;
        }

        .order-modal-head h2 i {
            color: var(--primary);
        }

        .order-modal-close {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            border: 1px solid var(--border);
            background: white;
            font-size: 1.1rem;
            cursor: pointer;
            transition: var(--transition);
            color: var(--text-secondary);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .order-modal-close:hover {
            background: var(--danger);
            color: white;
            border-color: var(--danger);
            transform: rotate(90deg);
        }

        .order-modal-body {
            padding: 28px;
        }

        .order-modal-footer {
            padding: 16px 28px;
            border-top: 1px solid var(--border);
            background: #F8FAFC;
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            border-radius: 0 0 var(--radius-2xl) var(--radius-2xl);
            position: sticky;
            bottom: 0;
            z-index: 10;
        }

        .order-detail-grid {
            display: grid;
            grid-template-columns: 1.3fr 0.9fr;
            gap: 24px;
        }

        .detail-main-card {
            background: white;
            border-radius: var(--radius-xl);
            border: 1px solid var(--border);
            overflow: hidden;
        }

        .card-section {
            padding: 20px;
            border-bottom: 1px solid var(--border);
        }

        .card-section:last-child {
            border-bottom: none;
        }

        .section-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
        }

        .section-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #10B98115, #1A237E15);
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.1rem;
        }

        .section-header h3 {
            font-size: 1.1rem;
            font-weight: 700;
            margin: 0;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .info-item {
            display: flex;
            gap: 10px;
        }

        .info-icon {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #10B98110, #1A237E10);
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            flex-shrink: 0;
        }

        .info-item h4 {
            font-size: 0.7rem;
            color: var(--text-secondary);
            font-weight: 500;
            margin-bottom: 2px;
            text-transform: uppercase;
        }

        .info-item p {
            font-weight: 600;
            color: var(--text-primary);
            margin: 0;
            font-size: 0.9rem;
        }

        .product-detail-card {
            background: #F8FAFC;
            border-radius: var(--radius-lg);
            padding: 16px;
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }

        .product-image-large {
            width: 100px;
            height: 100px;
            border-radius: var(--radius-lg);
            overflow: hidden;
            border: 2px solid white;
            box-shadow: var(--shadow-sm);
            flex-shrink: 0;
        }

        .product-image-large img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-info {
            flex: 1;
        }

        .product-info h4 {
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .product-meta {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 8px;
        }

        .product-meta div span {
            font-size: 0.7rem;
            color: var(--text-secondary);
        }

        .address-box {
            background: #F8FAFC;
            border-radius: var(--radius-lg);
            padding: 14px;
            display: flex;
            gap: 12px;
        }

        .payment-summary {
            background: #F8FAFC;
            border-radius: var(--radius-lg);
            padding: 16px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px dashed var(--border);
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0 0;
            font-weight: 700;
            margin-top: 8px;
            border-top: 2px solid var(--border);
        }

        .total-amount {
            color: var(--primary);
            font-size: 1.2rem;
            font-weight: 800;
        }

        .ktp-display {
            background: #F8FAFC;
            border-radius: var(--radius-lg);
            padding: 16px;
        }

        .ktp-image-container {
            width: 100%;
            border-radius: var(--radius-lg);
            overflow: hidden;
            border: 2px solid white;
            box-shadow: var(--shadow-sm);
        }

        .ktp-image-container img {
            width: 100%;
            height: auto;
            display: block;
        }

        .info-box {
            background: #E3F2FD;
            border-radius: var(--radius-md);
            padding: 10px;
            margin-top: 12px;
            font-size: 0.8rem;
        }

        .rejection-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group label {
            font-weight: 700;
            font-size: 0.9rem;
        }

        .form-group textarea {
            padding: 12px;
            border: 2px solid var(--border);
            border-radius: var(--radius-lg);
            font-family: inherit;
            font-size: 0.9rem;
            resize: vertical;
        }

        .form-group textarea:focus {
            border-color: var(--danger);
            outline: none;
        }

        @media (max-width: 1000px) {
            .order-detail-grid { grid-template-columns: 1fr; }
            .stats-grid { grid-template-columns: repeat(3, 1fr); }
            .charts-row { grid-template-columns: 1fr; }
            .filter-grid { grid-template-columns: repeat(2, 1fr); }
            .action-group { flex-wrap: wrap; }
            .action-btn-text { min-width: 70px; padding: 6px 12px; font-size: 0.75rem; }
        }

        @media (max-width: 768px) {
            .stats-grid { grid-template-columns: 1fr; }
            .filter-grid { grid-template-columns: 1fr; }
            .search-section { flex-direction: column; }
            .header-title { font-size: 1.8rem; }
            .order-modal-card { width: 95%; margin: 10px; }
            .order-modal-body { padding: 16px; }
            .info-grid { grid-template-columns: 1fr; }
            .product-detail-card { flex-direction: column; align-items: center; text-align: center; }
            .product-meta { grid-template-columns: 1fr; }
        }

        /* BOX UTAMA */
.rejection-box {
    margin-top: 15px;
    padding: 14px 16px;
    border-radius: 14px;
    background: linear-gradient(135deg, #fff5f5, #ffecec);
    border: 1px solid rgba(255, 0, 0, 0.15);
    display: none;
    flex-direction: column;
    gap: 8px;
    animation: fadeIn 0.3s ease;
}

/* HEADER */
.rejection-header {
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: 600;
    color: #d32f2f;
    font-size: 0.95rem;
}

/* ICON */
.rejection-header i {
    font-size: 1rem;
}

/* TEXT */
.rejection-text {
    font-size: 0.9rem;
    color: #5c1a1a;
    line-height: 1.5;
    background: rgba(255, 0, 0, 0.04);
    padding: 10px 12px;
    border-radius: 10px;
}

/* ANIMASI MASUK */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(5px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}


    </style>


<div class="container-main">
    <header class="header-section">
        <h1 class="header-title" style="color: #10B981"><i class="fas fa-tools"></i> Manajemen Peminjaman Alat</h1>
        <p class="header-subtitle">Dashboard terintegrasi untuk mengelola petugas, alat, status persetujuan, dan pembayaran.</p>
    </header>

<div class="stats-grid">

    <!-- TOTAL -->
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-users" style="color: #3b82f6;"></i>
        </div>
        <div>
            <div class="stat-value">{{ $stats['total'] }}</div>
            <div class="stat-label">Total Peminjam</div>
        </div>
    </div>

    <!-- DISETUJUI -->
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-check-circle" style="color: #22c55e;"></i>
        </div>
        <div>
            <div class="stat-value">{{ $stats['approved'] }}</div>
            <div class="stat-label" style="color: #22c55e;">Disetujui</div>
        </div>
    </div>

    <!-- MENUNGGU -->
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-clock" style="color: #eab308;"></i>
        </div>
        <div>
            <div class="stat-value">{{ $stats['pending'] }}</div>
            <div class="stat-label" style="color: #eab308;">Menunggu</div>
        </div>
    </div>

    <!-- DITOLAK -->
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-times-circle" style="color: #ef4444;"></i>
        </div>
        <div>
            <div class="stat-value">{{ $stats['rejected'] }}</div>
            <div class="stat-label" style="color: #ef4444;">Ditolak</div>
        </div>
    </div>

    <!-- LUNAS -->
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-credit-card" style="color: #6366f1;"></i>
        </div>
        <div>
            <div class="stat-value">{{ $stats['paid'] }}</div>
            <div class="stat-label" style="color: #6366f1;">Lunas</div>
        </div>
    </div>

</div>
{{--
    <div class="charts-row">
        <div class="chart-card">
            <div class="chart-header"><h4><i class="fas fa-chart-pie"></i> Status Peminjaman</h4><span>Maret 2024</span></div>
            <div class="chart-container"><canvas id="statusChart"></canvas></div>
        </div>
        <div class="chart-card">
            <div class="chart-header"><h4><i class="fas fa-chart-line"></i> Tren Peminjaman</h4><span>7 hari terakhir</span></div>
            <div class="chart-container"><canvas id="trendChart"></canvas></div>
        </div>
    </div> --}}

    <!-- SEARCH  DAN FILTER-->
<form method="GET" action="{{ route('halaman-list-peminjaman') }}">
<div class="action-bar">

    <!-- SEARCH -->
    <div class="search-section">
        <div class="search-wrapper">
            <i class="fas fa-search search-icon"></i>
            <input
                class="search-input"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari nama, NIK, alat, atau invoice...">
        </div>

        <button class="btn btn-primary" type="submit">
            <i class="fas fa-search"></i> Cari
        </button>

        <a href="{{ url()->current() }} " class="btn btn-secondary">
            <i class="fas fa-redo-alt"></i> Reset
        </a>
    </div>

    <!-- FILTER -->
    <div>
        <div style="font-weight:700; margin-bottom:16px;">
            <i class="fas fa-filter" style="color:var(--primary);"></i> Filter Lanjutan
        </div>

        <div class="filter-grid">

            <!-- STATUS -->
            <div class="filter-item">
                <label class="filter-label">Status</label>
                <select class="filter-select" name="status">
                    <option value="Semua">Semua</option>
                    <option value="Disetujui" {{ request('status')=='Disetujui' ? 'selected' : '' }}>Disetujui</option>
                    <option value="Menunggu" {{ request('status')=='Menunggu' ? 'selected' : '' }}>Menunggu</option>
                    <option value="Ditolak" {{ request('status')=='Ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>
            </div>

            <!-- PEMBAYARAN -->
            <div class="filter-item">
                <label class="filter-label">Pembayaran</label>
                <select class="filter-select" name="payment_status">
                    <option value="Semua">Semua</option>
                    <option value="Lunas" {{ request('payment_status')=='Lunas' ? 'selected' : '' }}>Lunas</option>
                    <option value="Belum Bayar" {{ request('payment_status')=='Belum Bayar' ? 'selected' : '' }}>Belum Bayar</option>
                    <option value="Refund" {{ request('payment_status')=='Refund' ? 'selected' : '' }}>Refund</option>
                </select>
            </div>

            <!-- PERIODE -->
            <div class="filter-item">
                <label class="filter-label">Periode</label>
                <select class="filter-select" name="period">
                    <option value="Semua">Semua</option>
                    <option value="Hari Ini" {{ request('period')=='Hari Ini' ? 'selected' : '' }}>Hari Ini</option>
                    <option value="Minggu Ini" {{ request('period')=='Minggu Ini' ? 'selected' : '' }}>Minggu Ini</option>
                    <option value="Bulan Ini" {{ request('period')=='Bulan Ini' ? 'selected' : '' }}>Bulan Ini</option>
                </select>
            </div>

            <!-- SORT -->
            <div class="filter-item">
                <label class="filter-label">Urutkan</label>
                <select class="filter-select" name="sort">
                    <option value="Terbaru">Terbaru</option>
                    <option value="Nama A-Z" {{ request('sort')=='Nama A-Z' ? 'selected' : '' }}>Nama A-Z</option>
                    <option value="Nama Z-A" {{ request('sort')=='Nama Z-A' ? 'selected' : '' }}>Nama Z-A</option>
                </select>
            </div>

        </div>

        <div class="filter-actions">
            <button class="btn btn-primary" type="submit">
                <i class="fas fa-check"></i> Terapkan
            </button>
   <a href="{{ url()->current() }}" class="btn btn-secondary">
            <i class="fas fa-redo-alt"></i> Reset
        </a>        </div>
    </div>

</div>
</form>


    <!-- DATA LIST -->
    <div class="table-container">
        <div class="table-header"><h3><i class="fas fa-clipboard-list"></i> Daftar Peminjaman</h3></div>
        <div class="table-responsive">
            <table class="tools-table" id="ordersTable">
                <thead>
                    <tr><th>Peminjam</th><th>Kontak / NIK</th><th>Alat Dipinjam</th><th>Qty</th><th>Periode</th><th>Status</th><th>Pembayaran</th><th style="text-align:center;">Aksi</th></tr>
                </thead>
            <tbody id="tableBody">

@forelse($orders as $order)
<tr id="row-{{ $order->id }}">

    <td>
        <div class="officer-cell">
            <img class="avatar" src="{{ $order->user->foto ? asset('storage/'.$order->user->foto) : 'https://ui-avatars.com/api/?name='.$order->user->name }}">
            <div>
                <div class="officer-name">{{ $order->name }}</div>
                <div class="officer-id">
                    <i class="fas fa-id-card"></i> {{ $order->invoice_number }}
                </div>
            </div>
        </div>
    </td>

    <!-- EMAIL & NIK -->
    <td>
        {{ $order->email }} <br>
        <small>NIK: {{ $order->nik }}</small>
    </td>

    <!-- TOOL (AMBIL DARI RELASI 🔥) -->
    <td>
        @foreach($order->details as $detail)
            {{ $detail->tool->name }}<br>
        @endforeach
    </td>

    <!-- JUMLAH -->
    <td>
        @foreach($order->details as $detail)
            {{ $detail->quantity }}<br>
        @endforeach
    </td>

    <!-- TANGGAL -->
    <td>
        {{ $order->start_date->format('d M Y') }} -
        {{ $order->end_date->format('d M Y') }}
    </td>

    <!-- STATUS -->
    <td>
        @if($order->status == 'approved')
            <span class="badge badge-approved">
                <i class="fas fa-check-circle"></i> Disetujui Petugas
            </span>
        @elseif($order->status == 'waiting_approval')
            <span class="badge badge-pending">
                <i class="fas fa-clock"></i> Menunggu Persetujuan Petugas
            </span>
        @else
            <span class="badge badge-rejected">
                <i class="fas fa-times-circle"></i> Ditolak Petugas
            </span>
        @endif
    </td>

    <!-- PAYMENT -->
    <td>
        @if($order->payment_status == 'paid')
            <span class="badge badge-paid">
                <i class="fas fa-check-circle"></i> Lunas
            </span>
        @elseif($order->payment_status == 'pending')
            <span class="badge badge-unpaid">
                <i class="fas fa-clock"></i> Belum Bayar
            </span>
        @else
            <span class="badge badge-refund">
                <i class="fas fa-undo"></i> Refund
            </span>
        @endif
    </td>

    <!-- ACTION -->
    <td style="text-align:center;">
        <div class="action-group">

            {{-- INI UNTUK MODAL DETAIL --}}
            <button class="action-btn-text btn-view-text"
                onclick="showDetail({{ $order->id }})">
                <i class="fas fa-eye"></i> Detail
            </button>

            {{-- PERSETJUAN DAN PENOLKAN --}}
            @if($order->status == 'waiting_approval')

            {{-- PERSETUJUAN --}}
 <form action="{{ route('persetujuan', $order->id) }}" method="POST" class="form-approve">
    @csrf
    <button type="submit" class="action-btn-text btn-approve-text">
        <i class="fas fa-check"></i> Setuju
    </button>
</form>

{{-- PENOLAKAN --}}
<button class="action-btn-text btn-reject-text"
   onclick="showRejectModal({{ $order->id }}, '{{ $order->name }}')">
   <i class="fas fa-times"></i> Tolak
</button>
            @endif

        </div>
    </td>

</tr>

@empty

<tr>
    <td colspan="8" style="text-align:center; padding:30px;">
        <i class="fas fa-box-open" style="font-size:24px; color:#ccc;"></i><br><br>
        Data tidak ditemukan
    </td>
</tr>

<!-- MODAL REJECTION -->
<div id="rejectionModal{{ $order->id }}" class="order-modal">
   <div class="order-modal-card order-modal-card-small">
       <div class="order-modal-head">
           <h2><i class="fas fa-times-circle"></i> Alasan Penolakan</h2>


       </div>
             <!-- FORM LANGSUNG KE ROUTE -->
       <form action="{{ route('penolakan', $order->id) }}" method="POST">
           @csrf
       <div class="order-modal-body">
           <div class="rejection-form">
               <div class="form-group">
                   <label><i class="fas fa-pen"></i> Alasan Lengkap</label>
<textarea name="rejection_reason" id="rejectionReasonText{{ $order->id }}" rows="4" placeholder="Tuliskan alasan penolakan secara detail..."></textarea>               </div>
               <div class="info-box"><i class="fas fa-shield-alt"></i> Alasan penolakan akan dikirimkan kepada pemohon melalui notifikasi.</div>
           </div>
       </div>
       <div class="order-modal-footer">
           <button class="btn btn-secondary" onclick="closeModal('rejectionModal{{ $order->id }}')">Batal</button>
           <button class="btn btn-danger" type="submit" id="submitRejectionBtn"><i class="fas fa-check"></i> Konfirmasi Tolak</button>
       </div>
   </div>
           </form>
</div>

@endforelse

</tbody>
            </table>
        </div>
        {{-- PAGINATION --}}
  @if ($orders->hasPages())
<div class="pagination-wrap">

    {{-- INFO DATA --}}
    <div>
        <i class="fas fa-info-circle" style="color:var(--primary);"></i>
        {{ $orders->firstItem() }} - {{ $orders->lastItem() }} dari {{ $orders->total() }}
    </div>

    {{-- PAGINATION --}}
    <ul class="pagination-list">

        {{-- PREVIOUS --}}
        <li class="page-item {{ $orders->onFirstPage() ? 'disabled' : '' }}">
            <a href="{{ $orders->previousPageUrl() }}">
                <i class="fas fa-chevron-left"></i>
            </a>
        </li>

        {{-- ANGKA --}}
        @foreach ($orders->getUrlRange(1, $orders->lastPage()) as $page => $url)
            <li class="page-item {{ $orders->currentPage() == $page ? 'active' : '' }}">
                <a href="{{ $url }}">{{ $page }}</a>
            </li>
        @endforeach

        {{-- NEXT --}}
        <li class="page-item {{ $orders->hasMorePages() ? '' : 'disabled' }}">
            <a href="{{ $orders->nextPageUrl() }}">
                <i class="fas fa-chevron-right"></i>
            </a>
        </li>

    </ul>
</div>


@endif
        </div>
    </div>


</div>

<!-- MODAL DETAIL DINAMIS (1 MODAL UNTUK SEMUA DATA) -->
<div id="detailModal" class="order-modal">
    <div class="order-modal-card">
        <div class="order-modal-head">
            <h2>
                <i class="fas fa-file-invoice"></i>
                Detail Pesanan - <span id="modal_nama">Memuat...</span>
            </h2>
            <button class="order-modal-close" onclick="closeModal('detailModal')">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="order-modal-body">
            <div class="order-detail-grid">

                <!-- KIRI: Informasi Pemesan & Alat -->
                <div class="detail-main-card">

                    <!-- INFORMASI PEMESAN -->
                    <div class="card-section">
                        <div class="section-header">
                            <div class="section-icon"><i class="fas fa-user-circle"></i></div>
                            <h3>Informasi Pemesan</h3>
                        </div>
                        <div class="info-grid">
                            <div class="info-item">
                                <div class="info-icon"><i class="fas fa-user"></i></div>
                                <div>
                                    <h4>Nama</h4>
                                    <p id="nama">-</p>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon"><i class="fas fa-envelope"></i></div>
                                <div>
                                    <h4>Email</h4>
                                    <p id="email">-</p>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon"><i class="fas fa-phone"></i></div>
                                <div>
                                    <h4>Telepon</h4>
                                    <p id="phone">-</p>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon"><i class="fas fa-id-card"></i></div>
                                <div>
                                    <h4>NIK</h4>
                                    <p id="nik">-</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ALAT DIPINJAM -->
                    <div class="card-section">
                        <div class="section-header">
                            <div class="section-icon"><i class="fas fa-tools"></i></div>
                            <h3>Alat Dipinjam</h3>
                        </div>
                        <div id="toolsContainer">
                            <div style="text-align:center; padding:20px;">
                                <i class="fas fa-spinner fa-spin"></i> Memuat data...
                            </div>
                        </div>
                    </div>

                    <!-- ALAMAT -->
                    <div class="card-section">
                        <div class="section-header">
                            <div class="section-icon"><i class="fas fa-map-marker-alt"></i></div>
                            <h3>Alamat</h3>
                        </div>
                        <div class="address-box">
                            <div style="font-size:1.5rem; color:var(--primary);">
                                <i class="fas fa-home"></i>
                            </div>
                            <div>
                                <p id="alamat">-</p>
                                <p id="catatan" style="margin-top:8px; color:var(--text-secondary);"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- KANAN: Ringkasan Pembayaran & KTP -->
                <div style="background:white; border-radius:24px; border:1px solid var(--border); padding:20px;">

                    <h3 style="font-size:1.1rem; font-weight:700; margin-bottom:16px;">
                        <i class="fas fa-receipt" style="color:var(--primary);"></i> Ringkasan Pembayaran
                    </h3>

                    <div class="payment-summary">
                        <div class="summary-row">
                            <span>ID Pesanan</span>
                            <span id="order_id">-</span>
                        </div>
                        <div class="summary-row">
                            <span>Status</span>
                            <span id="status_badge">-</span>
                        </div>
                        <div class="summary-row">
                            <span>Pembayaran</span>
                            <span id="payment_badge">-</span>
                        </div>
                        <div class="summary-row">
                            <span>Periode</span>
                            <span id="periode">-</span>
                        </div>
                     <div class="summary-row rejection-box" id="rejection_reason_row" style="display:none;">
    <div class="rejection-header">
        <i class="fas fa-exclamation-triangle"></i>
        <span>Alasan Penolakan</span>
    </div>
    <div id="rejection_reason" class="rejection-text"></div>
</div>
                    </div>

                    <div class="total-row">
                        <span>Total</span>
                        <span class="total-amount" id="totalAmount">Rp0</span>
                    </div>

                    <!-- FOTO KTP -->
                    <div style="margin-top:20px;">
                        <h3 style="font-size:1rem; font-weight:700; margin-bottom:12px;">
                            <i class="fas fa-id-card"></i> Foto KTP
                        </h3>
                        <div class="ktp-display">
                            <div class="ktp-image-container">
                                <img id="ktpImage" src="https://placehold.co/800x500/1A237E/FFFFFF?text=KTP" alt="KTP">
                            </div>
                            <div class="info-box">
                                <i class="fas fa-shield-alt"></i> Data terverifikasi dan aman.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="order-modal-footer">
            <button class="btn btn-secondary" onclick="closeModal('detailModal')">Tutup</button>
        </div>
    </div>
</div>

<!-- END MODAL DETAIL DINAMIS (1 MODAL UNTUK SEMUA DATA) -->

<script>
// ==================== MODAL FUNCTIONS ====================
function openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) modal.classList.add('show');
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) modal.classList.remove('show');
}

// Klik luar modal (support banyak modal)
window.onclick = function(event) {
    document.querySelectorAll('.order-modal, .modal').forEach(modal => {
        if (event.target === modal) {
            modal.classList.remove('show');
        }
    });
}

// ==================== SHOW DETAIL (SATU FUNGSI, PAKAI FETCH) ====================
function showDetail(id) {
    // Loading state
    document.getElementById('toolsContainer').innerHTML = '<div style="text-align:center; padding:20px;"><i class="fas fa-spinner fa-spin"></i> Memuat data alat...</div>';

    fetch(`/orders/${id}`)
        .then(response => response.json())
        .then(data => {
            // ===== 1. DATA USER =====
            document.getElementById('modal_nama').innerText = data.user?.name || '-';
            document.getElementById('nama').innerText = data.user?.name || '-';
            document.getElementById('email').innerText = data.user?.email || '-';
            document.getElementById('phone').innerText = data?.nomor_hp || data?.phone || '-';
            document.getElementById('nik').innerText = data?.nik || '-';

            // ===== 2. ALAMAT =====
            document.getElementById('alamat').innerText = data?.address || 'Alamat tidak tersedia';
            document.getElementById('catatan').innerHTML = data.notes ? `<i class="fas fa-sticky-note"></i> ${data.notes}` : '';

            // ===== 3. ORDER INFO =====
            document.getElementById('order_id').innerText = '#' + (data.invoice_number || data.id);
            document.getElementById('periode').innerText = `${formatDate(data.start_date)} - ${formatDate(data.end_date)}`;
            document.getElementById('totalAmount').innerHTML = `Rp ${(data.gross_amount || data.gross_amount || 0).toLocaleString()}`;

            // ===== 4. ALAT DIPINJAM (dengan tampilan premium) =====
            let toolsHtml = '';
            if (data.details && data.details.length > 0) {
                data.details.forEach(item => {
                    const tool = item.tool;
                    const pricePerDay = tool?.price_per_day || tool?.price || 0;
                    const quantity = item.quantity;
                    const days = data.total_days || 1;
                    const subtotal = pricePerDay * quantity * days;

                    toolsHtml += `
                        <div class="product-detail-card" style="margin-bottom:16px;">
                            <div class="product-image-large">
                                <img src="${tool?.image ? '/storage/' + tool.image : 'https://placehold.co/100/10B981/white?text=Alat'}" alt="${tool?.name || 'Alat'}">
                            </div>
                            <div class="product-info">
                                <h4>${tool?.name || 'Alat tidak diketahui'}</h4>
                                <div class="product-meta">
                                    <div><span>Harga/hari</span><br><strong style="color:var(--primary);">Rp ${pricePerDay.toLocaleString()}</strong></div>
                                    <div><span>Jumlah</span><br><strong>${quantity} unit</strong></div>
                                    <div><span>Durasi</span><br><strong>${days} hari</strong></div>
                                    <div><span>Subtotal</span><br><strong>Rp ${subtotal.toLocaleString()}</strong></div>
                                </div>
                            </div>
                        </div>
                    `;
                });
            } else {
                toolsHtml = '<p style="padding:20px; text-align:center;">Tidak ada data alat</p>';
            }
            document.getElementById('toolsContainer').innerHTML = toolsHtml;

            // ===== 5. STATUS BADGE =====
            const status = data.status;
            let statusHtml = '';
            if (status === 'approved') {
                statusHtml = '<span class="badge badge-approved"><i class="fas fa-check-circle"></i> Disetujui</span>';
            } else if (status === 'waiting_approval') {
                statusHtml = '<span class="badge badge-pending"><i class="fas fa-clock"></i> Menunggu Persetujuan</span>';
            } else if (status === 'rejected') {
                statusHtml = '<span class="badge badge-rejected"><i class="fas fa-times-circle"></i> Ditolak</span>';
            } else {
                statusHtml = `<span class="badge badge-pending">${status}</span>`;
            }
            document.getElementById('status_badge').innerHTML = statusHtml;

            // ===== 6. PAYMENT BADGE =====
            const paymentStatus = data.payment_status;
            let paymentHtml = '';
            if (paymentStatus === 'paid') {
                paymentHtml = '<span class="badge badge-paid"><i class="fas fa-check-circle"></i> Lunas</span>';
            } else if (paymentStatus === 'pending') {
                paymentHtml = '<span class="badge badge-unpaid"><i class="fas fa-hourglass-half"></i> Belum Bayar</span>';
            } else if (paymentStatus === 'refund') {
                paymentHtml = '<span class="badge badge-refund"><i class="fas fa-rotate-left"></i> Refund</span>';
            } else {
                paymentHtml = `<span class="badge badge-unpaid">${paymentStatus}</span>`;
            }
            document.getElementById('payment_badge').innerHTML = paymentHtml;

            // ===== 7. ALASAN PENOLAKAN =====
            if (data.status === 'rejected' && data.rejection_reason) {
                const rejectionRow = document.getElementById('rejection_reason_row');
                if (rejectionRow) {
                    rejectionRow.style.display = 'flex';
                    document.getElementById('rejection_reason').innerText = data.rejection_reason;
                }
            } else {
                const rejectionRow = document.getElementById('rejection_reason_row');
                if (rejectionRow) {
                    rejectionRow.style.display = 'none';
                    document.getElementById('rejection_reason').innerText = '';
                }
            }

            // ===== 8. FOTO KTP =====
            const ktpUrl = data?.ktp_image
                ? (data.ktp_image.startsWith('http') ? data.ktp_image : '/storage/' + data.ktp_image)
                : 'https://placehold.co/800x500/1A237E/FFFFFF?text=KTP';
            document.getElementById('ktpImage').src = ktpUrl;

            // ===== 9. TAMPILKAN MODAL =====
            openModal('detailModal');
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('toolsContainer').innerHTML = '<div style="text-align:center; padding:20px; color:red;"><i class="fas fa-exclamation-circle"></i> Gagal memuat data</div>';
            alert('Gagal mengambil data detail peminjaman');
        });
}

// Helper format tanggal
function formatDate(dateString) {
    if (!dateString) return '-';
    const date = new Date(dateString);
    return date.toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });
}

// ==================== APPROVE ORDER ====================
document.querySelectorAll('.form-approve').forEach(form => {
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        Swal.fire({
            title: 'Yakin?',
            html: `Setujui peminjaman ini?`,
            icon: 'warning',
            iconColor: '#ff3b3b',
            showCancelButton: true,
            confirmButtonText: 'Ya, Setujui!',
            cancelButtonText: 'Batal',
            buttonsStyling: false,
            customClass: {
                popup: 'swal-popup',
                confirmButton: 'swal-btn-delete',
                cancelButton: 'swal-btn-cancel'
            },
            showClass: {
                popup: 'animate__animated animate__zoomIn'
            },
            hideClass: {
                popup: 'animate__animated animate__zoomOut'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});

// ==================== REJECT ORDER ====================
function showRejectModal(orderId) {
    const modal = document.getElementById('rejectionModal' + orderId);
    if (modal) {
        modal.classList.add('show');
        // reset textarea khusus modal ini
        const textarea = modal.querySelector('textarea');
        if (textarea) textarea.value = '';
    } else {
        console.error('Modal not found for ID:', orderId);
    }
}
</script>

</main>

@endsection
