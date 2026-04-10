
@extends('admin. index')
@section('title', 'List Data')

@section('konten-ds')

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
            --primary-light: #A7F3D0;
            --primary-soft: #ECFDF5;
            --secondary: #1A237E;
            --gradient: linear-gradient(135deg, #10B981, #059669);
            --bg: #F8FAFC;
            --white: #FFFFFF;
            --border: #E2E8F0;
            --text-primary: #1E293B;
            --text-secondary: #64748B;
            --success: #10B981;
            --warning: #F59E0B;
            --danger: #EF4444;
            --danger-light: #FEF2F2;
            --info: #3B82F6;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-xl: 20px;
            --radius-2xl: 24px;
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
            position: relative;
            overflow: hidden;
        }

        .header-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient);
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
            background: var(--primary-soft);
            padding: 12px;
            border-radius: var(--radius-lg);
        }

        .header-subtitle {
            color: var(--text-secondary);
            font-size: 1rem;
            margin-top: 12px;
        }

        .admin-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--primary-soft);
            padding: 6px 16px;
            border-radius: 40px;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--primary-dark);
            margin-top: 16px;
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
            background: var(--primary-soft);
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
            font-size: 0.85rem;
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
            font-size: 0.85rem;
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
            min-width: 1300px;
        }

        .tools-table th {
            text-align: left;
            padding: 18px 20px;
            background: #F8FAFC;
            font-weight: 700;
            color: var(--text-primary);
            border-bottom: 2px solid var(--border);
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .tools-table td {
            padding: 16px 20px;
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
        }

        .tools-table tbody tr {
            transition: var(--transition);
        }

        .tools-table tbody tr:hover {
            background: linear-gradient(90deg, rgba(16, 185, 129, 0.03), transparent);
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: var(--gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1rem;
            box-shadow: var(--shadow-sm);
        }

        .user-details {
            display: flex;
            flex-direction: column;
        }

        .user-id {
            font-size: 0.75rem;
            color: var(--text-secondary);
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .user-name {
            font-weight: 700;
            color: var(--text-primary);
            font-size: 0.95rem;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: 40px;
            font-weight: 600;
            font-size: 0.75rem;
            white-space: nowrap;
            border: 1px solid transparent;
        }

        .badge-approved { background: #E8F5E9; color: #2E7D32; border-color: #A5D6A7; }
        .badge-waiting { background: #FFF3E0; color: #EF6C00; border-color: #FFB74D; }
        .badge-rejected { background: #FFEBEE; color: #C62828; border-color: #EF9A9A; }
        .badge-completed { background: #E3F2FD; color: #1565C0; border-color: #90CAF9; }
        .badge-paid { background: #E3F2FD; color: #1565C0; border-color: #90CAF9; }
        .badge-pending { background: #ECEFF1; color: #546E7A; border-color: #B0BEC5; }
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
            font-size: 0.8rem;
            font-weight: 600;
            text-decoration: none;
        }

        .action-btn-text i {
            font-size: 0.85rem;
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

        @media (max-width: 1000px) {
            .stats-grid { grid-template-columns: repeat(3, 1fr); }
            .charts-row { grid-template-columns: 1fr; }
            .filter-grid { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 768px) {
            .stats-grid { grid-template-columns: 1fr; }
            .filter-grid { grid-template-columns: 1fr; }
            .search-section { flex-direction: column; }
            .header-title { font-size: 1.6rem; }
            .action-group { flex-direction: column; }
            .action-btn-text { width: 100%; }
        }

        /* BADGE BASE */
.badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 12px;
    border-radius: 50px;
    font-size: 0.75rem;
    font-weight: 600;
    border: 1px solid transparent;
}

/* STATUS ORDER */
.badge-approved {
    background: #E8F5E9;
    color: #2E7D32;
    border-color: #A5D6A7;
}

.badge-pending {
    background: #FFF3E0;
    color: #EF6C00;
    border-color: #FFB74D;
}

.badge-rejected {
    background: #FFEBEE;
    color: #C62828;
    border-color: #EF9A9A;
}

.badge-completed {
    background: #E3F2FD;
    color: #1565C0;
    border-color: #90CAF9;
}

/* PAYMENT */
.badge-paid {
    background: #E3F2FD;
    color: #1565C0;
    border-color: #90CAF9;
}

.badge-warning {
    background: #FFF8E1;
    color: #F57F17;
    border-color: #FFE082;
}

.badge-danger {
    background: #FEE2E2;
    color: #B91C1C;
    border-color: #FCA5A5;
}
    </style>

    <main class="main-content" id="mainContent">

    <div class="container-main">
    <header class="header-section">
        <h1 class="header-title"><i class="fas fa-crown"></i> Admin Panel</h1>
        <p class="header-subtitle">Manajemen Peminjaman Alat — Pantau dan kelola seluruh data peminjaman dengan mudah.</p>
        <div class="admin-badge"><i class="fas fa-shield-alt"></i> Administrator Access • Full Read-Only</div>
    </header>

    <div class="stats-grid">
        <div class="stat-card"><div class="stat-icon"><i class="fas fa-clipboard-list"></i></div><div><div class="stat-value">{{ $total }}</div><div class="stat-label">Total Peminjaman</div></div></div>
        <div class="stat-card"><div class="stat-icon"><i class="fas fa-check-circle"></i></div><div><div class="stat-value">{{ $approved}}</div><div class="stat-label">Disetujui</div></div></div>
        <div class="stat-card"><div class="stat-icon"><i class="fas fa-clock"></i></div><div><div class="stat-value">{{ $pending }}</div><div class="stat-label">Menunggu</div></div></div>
        <div class="stat-card"><div class="stat-icon"><i class="fas fa-times-circle"></i></div><div><div class="stat-value">{{ $rejected }}</div><div class="stat-label">Ditolak</div></div></div>
        <div class="stat-card"><div class="stat-icon"><i class="fas fa-check-double"></i></div><div><div class="stat-value">{{ $selesai }}</div><div class="stat-label">Selesai</div></div></div>
    </div>

    <div class="charts-row">
        <div class="chart-card">
            <div class="chart-header"><h4><i class="fas fa-chart-pie"></i> Status Peminjaman</h4><span>Maret 2025</span></div>
            <div class="chart-container"><canvas id="statusChart"></canvas></div>
        </div>
        <div class="chart-card">
            <div class="chart-header"><h4><i class="fas fa-chart-line"></i> Tren Peminjaman</h4><span>7 hari terakhir</span></div>
            <div class="chart-container"><canvas id="trendChart"></canvas></div>
        </div>
    </div>


   <form method="GET" action="">
<div class="action-bar">

    <!-- SEARCH -->
    <div class="search-section">
        <div class="search-wrapper">
            <i class="fas fa-search search-icon"></i>
            <input
                type="text"
                name="search"
                class="search-input"
                placeholder="Cari nama, email, NIK, atau invoice..."
                value="{{ request('search') }}"
            >
        </div>
        <button class="btn btn-primary">
            <i class="fas fa-search"></i> Cari
        </button>
    </div>

    <!-- FILTER -->
    <div>
        <div style="font-weight:700; margin-bottom:16px;">
            <i class="fas fa-filter" style="color:var(--primary);"></i> Filter Data
        </div>

        <div class="filter-grid">

            <!-- STATUS -->
            <div class="filter-item">
                <label class="filter-label">Status Peminjaman</label>
                <select class="filter-select" name="status">
                    <option value="">Semua</option>
                    <option value="waiting_approval" {{ request('status')=='waiting_approval' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ request('status')=='approved' ? 'selected' : '' }}>Disetujui</option>
                    <option value="rejected" {{ request('status')=='rejected' ? 'selected' : '' }}>Ditolak</option>
                    <option value="completed" {{ request('status')=='completed' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>

            <!-- PERIODE -->
            <div class="filter-item">
                <label class="filter-label">Periode</label>
                <select class="filter-select" name="period">
                    <option value="">Semua</option>
                    <option value="hari" {{ request('period')=='hari' ? 'selected' : '' }}>Hari Ini</option>
                    <option value="minggu" {{ request('period')=='minggu' ? 'selected' : '' }}>Minggu Ini</option>
                    <option value="bulan" {{ request('period')=='bulan' ? 'selected' : '' }}>Bulan Ini</option>
                    <option value="tahun" {{ request('period')=='tahun' ? 'selected' : '' }}>Tahun Ini</option>
                </select>
            </div>

            <!-- PAYMENT -->
            <div class="filter-item">
                <label class="filter-label">Status Pembayaran</label>
                <select class="filter-select" name="payment">
                    <option value="">Semua</option>
                    <option value="paid" {{ request('payment')=='paid' ? 'selected' : '' }}>Lunas</option>
                    <option value="pending" {{ request('payment')=='pending' ? 'selected' : '' }}>Pending</option>
                    <option value="failed" {{ request('payment')=='failed' ? 'selected' : '' }}>Gagal</option>
                </select>
            </div>

            <!-- SORT -->
            <div class="filter-item">
                <label class="filter-label">Urutkan</label>
                <select class="filter-select" name="sort">
                    <option value="latest">Terbaru</option>
                    <option value="az" {{ request('sort')=='az' ? 'selected' : '' }}>Nama A-Z</option>
                    <option value="za" {{ request('sort')=='za' ? 'selected' : '' }}>Nama Z-A</option>
                </select>
            </div>

        </div>

        <div class="filter-actions">
            <button class="btn btn-primary">
                <i class="fas fa-check"></i> Terapkan
            </button>

            <a href="{{ url()->current() }}" class="btn btn-secondary">
                <i class="fas fa-redo-alt"></i> Reset
            </a>
        </div>

    </div>

</div>
</form>

    <div class="table-container">
        <div class="table-responsive">
            <table class="tools-table">
                <thead>
                    <tr>
<th>Peminjam</th>
                        <th>Kontak</th>
                        <th>Alat Dipinjam</th>
                        <th>Qty</th>
                        <th>Periode</th>
<th>Status Peminjman</th>
                        <th>Status Pembayaran</th>
                        <th style="text-align:center;">Aksi</th>
                    </tr>
                </thead>

              {{-- DATA LIST --}}
           <tbody>
@forelse($orders as $order)
<tr>
   <td>
       <div class="user-info">
           <div class="user-avatar">
               {{ strtoupper(substr($order->user->name ?? 'U', 0, 2)) }}
           </div>
           <div class="user-details">
               <div class="user-id">{{ $order->user->email ?? '-' }}</div>
               <div class="user-name">{{ $order->user->name ?? '-' }}</div>
           </div>
       </div>
   </td>


   <td>
{{ $order->phone ?? '-' }}
   </td>


<td>
   @foreach($order->details as $detail)
       {{ $detail->tool->name ?? '-' }} <br>
   @endforeach
</td>
   <td>  @foreach($order->details as $detail)
       {{ $detail->quantity }} <br>
   @endforeach</td>


   <td>
       {{ \Carbon\Carbon::parse($order->start_date)->format('d M Y') }}
       -
       {{ \Carbon\Carbon::parse($order->end_date)->format('d M Y') }}
   </td>


   <td>
       <span class="badge
           @if($order->status == 'approved') badge-approved
           @elseif($order->status == 'waiting_approval') badge-pending
           @elseif($order->status == 'rejected') badge-rejected
           @endif">
           {{ ucfirst($order->status) }}
       </span>
   </td>


   <td>
       <span class="badge
           @if($order->payment_status == 'paid') badge-paid
           @elseif($order->payment_status == 'pending') badge-warning
           @else badge-danger
           @endif">
           {{ ucfirst($order->payment_status) }}
       </span>
   </td>




       <td style="text-align:center;"><a href="{{ route('admin.manajemen.peminjaman.detail', $order->id) }}" class="action-btn-text btn-view-text"><i class="fas fa-eye"></i> Detail</a></td>


</tr>


@empty
<tr>
   <td colspan="8" style="text-align:center; padding:30px;">
       <i class="fas fa-database" style="font-size:40px; color:#ccc;"></i>
       <p style="margin-top:10px; color:#888;">Data tidak ditemukan</p>
   </td>
</tr>
@endforelse
</tbody>


            </table>
        </div>
    <div class="pagination-wrap">
    <ul class="pagination-list">

        {{-- PREVIOUS --}}
        <li class="page-item {{ $orders->onFirstPage() ? 'disabled' : '' }}">
            <a href="{{ $orders->previousPageUrl() }}">
                <i class="fas fa-chevron-left"></i>
            </a>
        </li>

        {{-- NUMBER --}}
        @for ($i = 1; $i <= $orders->lastPage(); $i++)
            <li class="page-item {{ $orders->currentPage() == $i ? 'active' : '' }}">
                <a href="{{ $orders->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        {{-- NEXT --}}
        <li class="page-item {{ !$orders->hasMorePages() ? 'disabled' : '' }}">
            <a href="{{ $orders->nextPageUrl() }}">
                <i class="fas fa-chevron-right"></i>
            </a>
        </li>

    </ul>
</div>
    </div>


</div>
    </main>
<script>
    // Chart.js
    new Chart(document.getElementById('statusChart'), {
        type: 'doughnut',
        data: { labels: ['Disetujui', 'Menunggu', 'Ditolak', 'Selesai'], datasets: [{ data: [28, 12, 5, 3], backgroundColor: ['#10B981', '#F59E0B', '#EF4444', '#3B82F6'], borderColor: 'white', borderWidth: 3 }] },
        options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { position: 'bottom' } }, cutout: '70%' }
    });

    new Chart(document.getElementById('trendChart'), {
        type: 'line',
        data: { labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'], datasets: [{ label: 'Peminjaman', data: [8, 12, 9, 15, 20, 14, 18], borderColor: '#10B981', backgroundColor: 'rgba(16,185,129,0.1)', tension: 0.4, fill: true }] },
        options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true } } }
    });


</script>
@endsection
