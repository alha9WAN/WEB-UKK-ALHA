
@extends('admin. index')
@section('title', 'List Data')

@section('konten-ds')


  <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #10B981;
            --primary-dark: #059669;
            --primary-light: #A7F3D0;
            --primary-soft: #ECFDF5;
            --gradient: linear-gradient(135deg, #10B981, #059669);
            --dark: #0B1120;
            --light: #FFFFFF;
            --gray-50: #F8FAFC;
            --gray-100: #F1F5F9;
            --gray-200: #E2E8F0;
            --gray-300: #CBD5E1;
            --gray-400: #94A3B8;
            --gray-500: #64748B;
            --gray-600: #475569;
            --gray-700: #334155;
            --gray-800: #1E293B;
            --success: #10B981;
            --warning: #F59E0B;
            --error: #EF4444;
            --error-light: #FEF2F2;
            --info: #3B82F6;
            --reject-border: #FECACA;
            --refund-badge: #F59E0B;
            --refund-soft: #FFFBEB;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-xl: 20px;
            --radius-2xl: 24px;
            --radius-full: 9999px;
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #fff;
            color: var(--gray-700);
            min-height: 100vh;
            padding: 32px 0 48px;
        }

        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 24px;
        }

        .header-card {
            background: var(--light);
            border-radius: var(--radius-2xl);
            padding: 32px 40px;
            margin-bottom: 32px;
            box-shadow: var(--shadow-xl);
            border: 1px solid rgba(16,185,129,0.15);
            position: relative;
            overflow: hidden;
        }

        .header-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: var(--gradient);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 24px;
            position: relative;
            z-index: 1;
        }

        .header-left h1 {
            font-size: 2rem;
            font-weight: 800;
            color: var(--gray-800);
            margin-bottom: 10px;
            font-family: 'Space Grotesk', sans-serif;
            letter-spacing: -0.02em;
            background: var(--gradient);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .header-left p {
            color: var(--gray-500);
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .header-left p i {
            color: var(--primary);
        }

        .badge-group {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 24px;
            border-radius: var(--radius-full);
            font-size: 0.85rem;
            font-weight: 700;
            box-shadow: var(--shadow-sm);
        }

        .badge-danger {
            background: var(--error-light);
            color: var(--error);
            border: 1px solid var(--reject-border);
        }

        .order-detail-grid {
            display: grid;
            grid-template-columns: 1.4fr 0.9fr;
            gap: 28px;
        }

        .detail-main-card {
            background: var(--light);
            border-radius: var(--radius-2xl);
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--gray-200);
            overflow: hidden;
        }

        .card-section {
            padding: 28px 32px;
            border-bottom: 1px solid var(--gray-200);
        }

        .card-section:last-child {
            border-bottom: none;
        }

        .section-header {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 28px;
        }

        .section-icon {
            width: 52px;
            height: 52px;
            background: var(--primary-soft);
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.4rem;
        }

        .section-header h2 {
            font-size: 1.35rem;
            font-weight: 700;
            color: var(--gray-800);
            font-family: 'Space Grotesk', sans-serif;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 28px;
        }

        .info-item {
            display: flex;
            gap: 16px;
            align-items: flex-start;
        }

        .info-icon {
            width: 46px;
            height: 46px;
            background: var(--gray-100);
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.2rem;
        }

        .info-content h4 {
            font-size: 0.7rem;
            color: var(--gray-500);
            font-weight: 600;
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 0.6px;
        }

        .info-content p {
            font-size: 1rem;
            font-weight: 600;
            color: var(--gray-800);
        }

        .product-detail-card {
            background: var(--gray-50);
            border-radius: var(--radius-xl);
            padding: 24px;
            border: 1px solid var(--gray-200);
            display: flex;
            gap: 28px;
            flex-wrap: wrap;
        }

        .product-image-large {
            width: 130px;
            height: 130px;
            border-radius: var(--radius-lg);
            flex-shrink: 0;
            overflow: hidden;
            background: white;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gray-200);
        }

        .product-image-large img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-info-detail {
            flex: 1;
        }

        .product-info-detail h3 {
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--gray-800);
            margin-bottom: 12px;
        }

        .product-badge {
            background: var(--gradient);
            color: white;
            padding: 4px 14px;
            border-radius: var(--radius-full);
            font-size: 0.7rem;
            font-weight: 700;
            margin-left: 10px;
        }

        .product-meta-grid {
            display: flex;
            gap: 32px;
            margin: 18px 0;
            flex-wrap: wrap;
        }

        .meta-item {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .meta-label {
            color: var(--gray-500);
            font-size: 0.75rem;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .meta-label i {
            color: var(--primary);
        }

        .meta-value {
            font-weight: 700;
            color: var(--gray-800);
            font-size: 1rem;
        }

        .meta-value.price {
            color: var(--primary);
            font-size: 1.25rem;
            font-weight: 800;
        }

        .address-box {
            background: var(--gray-50);
            border-radius: var(--radius-lg);
            padding: 22px;
            display: flex;
            gap: 18px;
            border: 1px solid var(--gray-200);
        }

        .address-icon {
            width: 52px;
            height: 52px;
            background: var(--primary-soft);
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.4rem;
            flex-shrink: 0;
        }

        .rejection-card {
            background: var(--error-light);
            border-left: 5px solid var(--error);
            border-radius: var(--radius-lg);
            padding: 20px 24px;
            margin-bottom: 20px;
        }

        .rejection-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 14px;
        }

        .rejection-header i {
            font-size: 1.6rem;
            color: var(--error);
        }

        .rejection-header h3 {
            font-weight: 800;
            color: var(--error);
            font-size: 1.1rem;
            margin: 0;
        }

        .rejection-reason-box {
            background: white;
            border-radius: var(--radius-md);
            padding: 16px;
            margin-top: 8px;
            border: 1px solid var(--reject-border);
        }

        .rejection-reason-box p {
            color: var(--gray-700);
            line-height: 1.5;
            font-size: 0.9rem;
        }

        .rejection-note {
            margin-top: 12px;
            font-size: 0.8rem;
            color: var(--gray-500);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .detail-side-card {
            background: var(--light);
            border-radius: var(--radius-2xl);
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--gray-200);
            position: sticky;
            top: 24px;
            overflow: hidden;
        }

        .side-card-section {
            padding: 24px 28px;
            border-bottom: 1px solid var(--gray-200);
        }

        .section-title-small {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--gray-800);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-family: 'Space Grotesk', sans-serif;
        }

        .section-title-small i {
            color: var(--primary);
        }

        .payment-summary {
            background: var(--gray-50);
            border-radius: var(--radius-lg);
            padding: 20px;
            margin-bottom: 20px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid var(--gray-200);
        }

        .summary-label {
            color: var(--gray-600);
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.85rem;
            font-weight: 500;
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
        .summary-value {
            font-weight: 600;
            color: var(--gray-800);
        }

        .payment-status-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--refund-soft);
            padding: 6px 14px;
            border-radius: 60px;
            font-size: 0.7rem;
            font-weight: 800;
            color: var(--refund-badge);
            border: 1px solid #FDE68A;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 16px;
            padding-top: 16px;
            border-top: 2px solid var(--primary-light);
            font-weight: 800;
        }

        .total-amount {
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--primary);
        }

        .payment-detail-box {
            background: var(--gray-50);
            border-radius: var(--radius-lg);
            padding: 18px;
            margin-top: 12px;
        }

        .payment-detail-item {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid var(--gray-200);
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;
        }

        .payment-detail-item:last-child {
            border-bottom: none;
        }

        .payment-detail-label {
            color: var(--gray-600);
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .payment-detail-value {
            font-weight: 600;
            color: var(--gray-800);
        }

        .ktp-display {
            background: var(--gray-50);
            border-radius: var(--radius-lg);
            padding: 16px;
            border: 1px solid var(--gray-200);
        }

        .ktp-image-container {
            width: 100%;
            border-radius: var(--radius-md);
            overflow: hidden;
            margin-bottom: 14px;
            border: 1px solid var(--gray-300);
        }

        .ktp-image-container img {
            width: 100%;
            height: auto;
            display: block;
        }

        .info-box {
            background: var(--error-light);
            border-radius: var(--radius-md);
            padding: 14px;
            margin-top: 14px;
            border: 1px solid var(--reject-border);
        }

        .btn {
            padding: 14px 20px;
            border-radius: var(--radius-md);
            font-weight: 700;
            font-size: 0.9rem;
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            border: none;
            width: 100%;
            font-family: 'Inter', sans-serif;
            text-decoration: none;
        }

        .btn-primary {
            background: var(--gradient);
            color: white;
            box-shadow: var(--shadow-sm);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .btn-outline {
            background: transparent;
            border: 1px solid var(--gray-300);
            color: var(--gray-700);
        }

        .btn-outline:hover {
            border-color: var(--primary);
            color: var(--primary);
            background: var(--primary-soft);
        }

        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 14px;
            margin-top: 12px;
        }

        @media (max-width: 968px) {
            .order-detail-grid {
                grid-template-columns: 1fr;
            }
            .detail-side-card {
                position: static;
            }
            .header-card {
                padding: 24px;
            }
        }

        @media (max-width: 640px) {
            .info-grid {
                grid-template-columns: 1fr;
            }
            .product-detail-card {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }
            .product-meta-grid {
                justify-content: center;
            }
            .header-left h1 {
                font-size: 1.6rem;
            }
            .card-section {
                padding: 20px;
            }
        }
    </style>

        <main class="main-content" id="mainContent">

              <div class="container">
        <div class="header-card">
            <div class="header-content">
                <div class="header-left">
                    <h1><i class="fas fa-file-invoice"></i> Detail Pesanan</h1>
                    <p><i class="fas fa-receipt"></i> ID Peminjaman: <strong>#{{ $order->invoice_number }}</strong> &nbsp;|&nbsp; <i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($order->created_at)->translatedFormat('d F Y') }}
</p>
                </div>
                <div class="badge-group">
<div class="badge-group">
    <span class="badge
        @if($order->status == 'approved') badge-approved
        @elseif($order->status == 'waiting_approval') badge-waiting
        @elseif($order->status == 'rejected') badge-rejected
        @elseif($order->status == 'completed') badge-completed
        @endif
    ">
        <i class="fas fa-circle"></i>
        {{ ucfirst(str_replace('_',' ', $order->status)) }}
    </span>
</div>                </div>
            </div>
        </div>

        <div class="order-detail-grid">
            <div class="detail-main-card">
                <div class="card-section">
                    <div class="section-header">
                        <div class="section-icon"><i class="fas fa-user-circle"></i></div>
                        <h2>Informasi Pemesan</h2>
                    </div>
                    <p></p>
<p></p>
<p></p>
<p></p>
                    <div class="info-grid">
                        <div class="info-item"><div class="info-icon"><i class="fas fa-user"></i></div><div class="info-content"><h4>Nama Lengkap</h4><p>{{ $order->name }}</p></div></div>
                        <div class="info-item"><div class="info-icon"><i class="fas fa-envelope"></i></div><div class="info-content"><h4>Email</h4><p>{{ $order->email }}</p></div></div>
                        <div class="info-item"><div class="info-icon"><i class="fas fa-phone-alt"></i></div><div class="info-content"><h4>No. HP</h4><p>{{ $order->phone }}</p></div></div>
                        <div class="info-item"><div class="info-icon"><i class="fas fa-id-card"></i></div><div class="info-content"><h4>NIK</h4><p>{{ $order->nik ?? '-' }}</p></div></div>
                    </div>
                </div>

                <div class="card-section">
                    <div class="section-header">
                        <div class="section-icon"><i class="fas fa-tools"></i></div>
                        <h2>Detail Alat Sewa</h2>
                    </div>
                  @foreach($order->details as $detail)
<div class="product-detail-card">

    <div class="product-image-large">
        <img src="{{ asset('storage/'.$detail->tool->image) }}" alt="">
    </div>

    <div class="product-info-detail">
        <h3>{{ $detail->tool->name }}</h3>

        <div class="product-meta-grid">
            <div class="meta-item">
                <span class="meta-label">Harga/Hari</span>
                <span class="meta-value price">
                    Rp{{ number_format($detail->price_per_day) }}
                </span>
            </div>

            <div class="meta-item">
                <span class="meta-label">Kuantitas</span>
                <span class="meta-value">{{ $detail->quantity }} Unit</span>
            </div>

            <div class="meta-item">
                <span class="meta-label">Durasi</span>
                <span class="meta-value">
                    {{ $order->duration_days }} Hari
                </span>
            </div>
        </div>
    </div>

</div>
@endforeach


                </div>

                <div class="card-section">
                    <div class="section-header">
                        <div class="section-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <h2>Alamat Pengiriman</h2>
                    </div>
                    <div class="address-box">
                        <div class="address-icon"><i class="fas fa-building"></i></div>
                        <div class="address-text">
                            <h4>Alamat Lengkap</h4>
                            <p>{{ $order->address }}</p>

                        </div>
                    </div>
                </div>

             @if($order->status == 'rejected' && $order->rejection_reason)
<div class="card-section">
    <div class="rejection-card">
        <div class="rejection-header">
            <i class="fas fa-ban"></i>
            <h3>⛔ Alasan Penolakan Pesanan</h3>
        </div>

        <div class="rejection-reason-box">
            <p style="font-weight:600;">
                <i class="fas fa-exclamation-triangle"></i>
                {{ $order->rejection_reason }}
            </p>

            <div class="rejection-note">
                <i class="fas fa-clock"></i>
                <span>
                    Ditinjau pada:
                    {{ $order->updated_at->format('d M Y H:i') }}
                </span>
            </div>
        </div>
    </div>
</div>
@endif
            </div>


            <div class="detail-side-card">
                <div class="side-card-section">
                    <div class="section-title-small"><i class="fas fa-receipt"></i> Ringkasan Pembayaran</div>
                    <div class="payment-summary">
                        <div class="summary-row">
                            <span class="summary-label"><i class="fas fa-calendar-day"></i> Durasi Sewa</span>
                            <span class="summary-value">{{ $order->duration_days }} hari</span>
                        </div>
                        <div class="summary-row">
                            <span class="summary-label"><i class="fas fa-cubes"></i> Jumlah Alat</span>
                            <span class="summary-value">{{ $order->duration_days }} hari</span>
                        </div>
                        <div class="summary-row">
                            <span class="summary-label"><i class="fas fa-calculator"></i> Subtotal Sewa</span>
                            <span class="summary-value">{{ $order->gross_amount}}</span>
                        </div>
                        <div class="summary-row" style="border-bottom: none; padding-bottom: 6px;">

                        </div>
                    </div>
                    <div class="total-row">
                        <span>Total Dibayar</span>
                        <span class="total-amount">{{ $order->gross_amount}}</span>
                    </div>
                </div>

          <div class="side-card-section">
    <div class="section-title-small">
        <i class="fas fa-credit-card"></i> Detail Pembayaran
    </div>

    <div class="payment-detail-box">
     {{-- TRANSACTION ID --}}
        <div class="payment-detail-item">
            <span class="payment-detail-label">
                <i class="fas fa-qrcode"></i> ID Transaksi
            </span>
            <span class="payment-detail-value">
                {{ $order->payment->transaction_id ?? '-' }}
            </span>
        </div>
        {{-- METODE --}}
        <div class="payment-detail-item">
            <span class="payment-detail-label">
                <i class="fas fa-university"></i> Metode
            </span>
            <span class="payment-detail-value">
                {{ $order->payment->payment_type ?? '-' }}
            </span>
        </div>

        {{-- STATUS --}}
        <div class="payment-detail-item">
            <span class="payment-detail-label">
                <i class="fas fa-info-circle"></i> Status
            </span>

            <span class="payment-detail-value" style="font-weight:800;">
                @php
                    $status = $order->payment->transaction_status ?? 'pending';
                @endphp

                @if($status == 'settlement' || $status == 'capture')
                    <span style="color:green;">✔ Berhasil</span>
                @elseif($status == 'pending')
                    <span style="color:orange;">⏳ Pending</span>
                @elseif($status == 'expire')
                    <span style="color:gray;">⌛ Kadaluarsa</span>
                @elseif($status == 'cancel' || $status == 'deny')
                    <span style="color:red;">✖ Dibatalkan</span>
                @elseif($status == 'refund')
                    <span style="color:purple;">↩ Refund</span>
                @else
                    <span>-</span>
                @endif
            </span>
        </div>

        {{-- TANGGAL --}}
        <div class="payment-detail-item">
            <span class="payment-detail-label">
                <i class="fas fa-calendar-check"></i> Tanggal
            </span>
            <span class="payment-detail-value">
     {{ optional($order->payment?->updated_at)->format('d M Y H:i') ?? '-' }}            </span>
        </div>





    </div>
</div>

                <div class="side-card-section">
                    <div class="section-title-small"><i class="fas fa-id-card"></i> Verifikasi Identitas</div>
                    <div class="ktp-display">
                        <div class="ktp-image-container">
                            <img src="{{ asset('storage/'.$order->ktp_image) }}" alt="Foto KTP Pemesan">
                        </div>

                    </div>
                </div>

                <div class="side-card-section">
                    <div class="action-buttons">
                        {{-- <a href="#" class="btn btn-primary" onclick="window.print(); return false;"><i class="fas fa-print"></i> Cetak Bukti Penolakan</a> --}}
                        <a href="{{ route('admin.manajemen.peminjaman.list') }}" class="btn btn-outline" onclick="history.back(); return false;"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </main>




@endsection
