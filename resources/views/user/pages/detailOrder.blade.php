@extends('user.index')
@section('title', 'Detail Pemesanan')

@section('konten')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #00C853;
            --primary-dark: #00A84A;
            --primary-light: #80E27E;
            --secondary: #1A237E;
            --secondary-dark: #0F1555;
            --secondary-light: #534BAE;
            --gradient: linear-gradient(135deg, #00C853, #1A237E);
            --gradient-hover: linear-gradient(135deg, #00B248, #151F6D);
            --gradient-light: linear-gradient(135deg, #80E27E, #534BAE);
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

            --shadow-sm: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            --shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -2px rgba(0, 0, 0, 0.02);
            --shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 10px 10px -5px rgba(0, 0, 0, 0.02);
            --shadow-xl: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
            --shadow-gradient: 0 15px 30px -10px rgba(0, 200, 83, 0.25), 0 15px 30px -10px rgba(26, 35, 126, 0.25);

            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-xl: 24px;
            --radius-2xl: 32px;
            --radius-full: 9999px;

            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #FFFFFF;
            color: var(--gray-700);
            min-height: 100vh;
            line-height: 1.6;
            padding: 40px 0;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 28px;
        }

        .page-header {
            padding: 20px 0 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .back-btn {
            width: 56px;
            height: 56px;
            background: white;
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray-600);
            font-size: 1.5rem;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            border: 1px solid var(--gray-200);
            text-decoration: none;
        }

        .back-btn:hover {
            background: var(--gradient);
            color: white;
            border-color: transparent;
            transform: translateX(-3px);
        }

        .page-title {
            font-size: 3.8rem;
            font-weight: 800;
            font-family: 'Space Grotesk', sans-serif;
            letter-spacing: -0.02em;
        }

        .gradient-text {
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: inline-block;
        }

        .status-badge-large {
            padding: 14px 32px;
            border-radius: var(--radius-full);
            font-weight: 700;
            font-size: 1.2rem;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            background: linear-gradient(135deg, #FEF3C7, #FDE68A);
            color: var(--warning);
            border: 1px solid rgba(245, 158, 11, 0.2);
        }

        .status-badge-large i {
            font-size: 1.4rem;
        }

        /* Order Detail Grid */
        .order-detail-grid {
            display: grid;
            grid-template-columns: 1.3fr 0.9fr;
            gap: 32px;
            margin: 20px 0 50px;
        }

        /* Main Card */
        .detail-main-card {
            background: white;
            border-radius: var(--radius-2xl);
            box-shadow: var(--shadow-xl);
            border: 1px solid rgba(203, 213, 225, 0.4);
            overflow: hidden;
            position: relative;
        }

        .detail-main-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: var(--gradient);
        }

        .card-section {
            padding: 32px;
            border-bottom: 1px solid var(--gray-200);
        }

        .card-section:last-child {
            border-bottom: none;
        }

        .section-header {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 28px;
        }

        .section-icon {
            width: 56px;
            height: 56px;
            background: var(--gradient-light);
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.6rem;
        }

        .section-header h2 {
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--gray-800);
            font-family: 'Space Grotesk', sans-serif;
        }

        /* Info Grid */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 28px;
        }

        .info-item {
            display: flex;
            gap: 16px;
        }

        .info-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, rgba(0, 200, 83, 0.08), rgba(26, 35, 126, 0.08));
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.4rem;
        }

        .info-content h4 {
            font-size: 0.9rem;
            color: var(--gray-500);
            font-weight: 500;
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-content p {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--gray-800);
        }

        /* Product Card (Single Tool) - DENGAN GAMBAR ASLI */
        .product-detail-card {
            background: linear-gradient(135deg, rgba(0, 200, 83, 0.02), rgba(26, 35, 126, 0.02));
            border-radius: var(--radius-xl);
            padding: 28px;
            border: 1px solid var(--gray-200);
            display: flex;
            gap: 28px;
            flex-wrap: wrap;
        }

        .product-image-large {
            width: 160px;
            height: 160px;
            border-radius: var(--radius-lg);
            flex-shrink: 0;
            border: 3px solid white;
            box-shadow: var(--shadow-md);
            overflow: hidden;
            background: #f0f4f8;
            position: relative;
        }

        .product-image-large img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.5s ease;
        }

        .product-image-large:hover img {
            transform: scale(1.08);
        }

        /* Fallback icon jika gambar tidak ada (tetap pakai img, jadi tidak perlu) */

        .product-info-detail {
            flex: 1;
        }

        .product-info-detail h3 {
            font-size: 2rem;
            font-weight: 800;
            color: var(--gray-800);
            font-family: 'Space Grotesk', sans-serif;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .product-badge {
            background: var(--primary);
            color: white;
            padding: 6px 16px;
            border-radius: var(--radius-full);
            font-size: 0.9rem;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .product-meta-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
            margin: 24px 0;
        }

        .meta-item {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .meta-label {
            color: var(--gray-500);
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .meta-label i {
            color: var(--primary);
            width: 18px;
        }

        .meta-value {
            font-weight: 700;
            color: var(--gray-800);
            font-size: 1.2rem;
        }

        .meta-value.price {
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 1.6rem;
        }

        /* Alamat Section */
        .address-box {
            background: var(--gray-50);
            border-radius: var(--radius-lg);
            padding: 24px;
            border: 1px solid var(--gray-200);
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }

        .address-icon {
            width: 52px;
            height: 52px;
            background: linear-gradient(135deg, rgba(0, 200, 83, 0.1), rgba(26, 35, 126, 0.1));
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.8rem;
            flex-shrink: 0;
        }

        .address-text h4 {
            font-weight: 700;
            margin-bottom: 8px;
            color: var(--gray-800);
            font-size: 1.1rem;
        }

        .address-text p {
            color: var(--gray-600);
            line-height: 1.7;
        }

        .address-text .note {
            margin-top: 12px;
            padding-top: 12px;
            border-top: 1px dashed var(--gray-300);
            color: var(--gray-500);
            font-size: 0.95rem;
            display: flex;
            gap: 8px;
        }

        /* Side Card */
        .detail-side-card {
            background: white;
            border-radius: var(--radius-2xl);
            box-shadow: var(--shadow-xl);
            border: 1px solid rgba(203, 213, 225, 0.4);
            position: sticky;
            top: 30px;
            height: fit-content;
            overflow: hidden;
        }

        .detail-side-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: var(--gradient);
        }

        .side-card-section {
            padding: 32px;
            border-bottom: 1px solid var(--gray-200);
        }

        .side-card-section:last-child {
            border-bottom: none;
        }

        .section-title-small {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--gray-800);
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-family: 'Space Grotesk', sans-serif;
        }

        .section-title-small i {
            color: var(--primary);
        }

        /* Payment Summary */
        .payment-summary {
            background: linear-gradient(135deg, rgba(0, 200, 83, 0.03), rgba(26, 35, 126, 0.03));
            border-radius: var(--radius-lg);
            padding: 24px;
            margin: 20px 0;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 18px;
            padding-bottom: 18px;
            border-bottom: 1px dashed var(--gray-300);
        }

        .summary-row:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .summary-label {
            color: var(--gray-500);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .summary-label i {
            color: var(--primary);
            width: 20px;
        }

        .summary-value {
            font-weight: 700;
            color: var(--gray-800);
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 2px solid var(--gray-300);
            font-weight: 700;
            font-size: 1.3rem;
        }

        .total-amount {
            font-size: 2rem;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 800;
        }

        /* KTP Image Display - Sudah Terisi */
        .ktp-display {
            background: linear-gradient(135deg, rgba(0, 200, 83, 0.02), rgba(26, 35, 126, 0.02));
            border-radius: var(--radius-xl);
            padding: 20px;
            border: 2px solid var(--gray-200);
            margin-top: 10px;
        }

        .ktp-image-container {
            width: 100%;
            border-radius: var(--radius-lg);
            overflow: hidden;
            border: 3px solid white;
            box-shadow: var(--shadow-lg);
            margin-bottom: 16px;
            position: relative;
        }

        .ktp-image-container img {
            width: 100%;
            height: auto;
            display: block;
            transition: var(--transition);
        }

        .ktp-image-container:hover img {
            transform: scale(1.02);
        }

        .ktp-verified-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #E8F5E9, #C8E6C9);
            color: var(--primary-dark);
            padding: 10px 18px;
            border-radius: var(--radius-full);
            font-weight: 600;
            font-size: 0.95rem;
            border: 1px solid var(--primary-light);
            margin-top: 12px;
        }

        .ktp-verified-badge i {
            color: var(--primary);
            font-size: 1.2rem;
        }

        .ktp-info-text {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 16px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .ktp-info-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--gray-600);
            font-size: 0.95rem;
        }

        .ktp-info-item i {
            color: var(--primary);
        }

        .btn {
            padding: 16px 28px;
            border-radius: var(--radius-md);
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition);
            border: none;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            text-decoration: none;
        }

        .btn-primary {
            background: var(--gradient);
            color: white;
            box-shadow: var(--shadow-gradient);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 25px 40px -10px rgba(0, 200, 83, 0.5), 0 25px 40px -10px rgba(26, 35, 126, 0.5);
        }

        .btn-outline {
            background: transparent;
            border: 2px solid var(--gray-300);
            color: var(--gray-700);
        }

        .btn-outline:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .btn-full {
            width: 100%;
        }

        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 16px;
            margin-top: 28px;
        }

        .info-box {
            background: linear-gradient(135deg, #E8EAF6, #C5CAE9);
            border-radius: var(--radius-md);
            padding: 20px;
            border-left: 4px solid var(--secondary);
            margin-top: 25px;
        }

        .info-box-content {
            display: flex;
            gap: 16px;
        }

        .info-box i {
            color: var(--secondary);
            font-size: 1.5rem;
        }

        .info-text h4 {
            color: var(--secondary);
            margin-bottom: 5px;
            font-size: 1rem;
            font-weight: 700;
        }

        .info-text p {
            color: var(--gray-600);
            font-size: 0.9rem;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .order-detail-grid {
                grid-template-columns: 1fr;
            }

            .detail-side-card {
                position: static;
            }
        }

        @media (max-width: 768px) {
            .product-detail-card {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .product-image-large {
                margin-bottom: 10px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .page-title {
                font-size: 2.2rem;
            }
        }
    </style>

    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                title: "Peminjaman Berhasil!",
                text: "{{ session('success') }}",
                icon: "success",
                confirmButtonText: "OK",
                confirmButtonColor: "#00C853",
                allowOutsideClick: false
            });
        </script>
    @endif

    <main>
        <div class="container">
            <!-- Page Header with Back Button (tanpa navbar) -->
            <div class="page-header" style="margin-top: 3rem">
                <div class="header-left">
                    <!-- <a href="#" class="back-btn"><i class="fas fa-arrow-left"></i></a> -->
                    <div>
                        <h1 class="page-title">
                            <span class="gradient-text">Detail</span> Pesanan
                        </h1>
                        <p style="color: var(--gray-500); margin-top: 5px;">ID peminjaman:
                            <strong>#{{ $order->invoice_number }}</strong></p>
                    </div>
                </div>
                <!-- <div class="status-badge-large">
                        <i class="fas fa-clock"></i>
                        <span>Menunggu Konfirmasi</span>
                    </div> -->
            </div>

            <!-- Main Detail Grid -->
            <div class="order-detail-grid">
                <!-- Left Column: Main Details -->
                <div class="detail-main-card">
                    <!-- Informasi Pemesan -->
                    <div class="card-section">
                        <div class="section-header">
                            <div class="section-icon"><i class="fas fa-user-circle"></i></div>
                            <h2>Informasi Pemesan</h2>
                        </div>
                        <div class="info-grid">
                            <div class="info-item">
                                <div class="info-icon"><i class="fas fa-user"></i></div>
                                <div class="info-content">
                                    <h4>Nama Lengkap</h4>
                                    <p>{{ $order->name }}</p>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon"><i class="fas fa-envelope"></i></div>
                                <div class="info-content">
                                    <h4>Email</h4>
                                    <p>{{ $order->email }}</p>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon"><i class="fas fa-phone-alt"></i></div>
                                <div class="info-content">
                                    <h4>No. HP</h4>
                                    <p>{{ $order->phone }}</p>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon"><i class="fas fa-id-card"></i></div>
                                <div class="info-content">
                                    <h4>NIK</h4>
                                    <p>{{ $order->nik }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Alat yang Dipinjam (SATU ALAT) - DENGAN GAMBAR REAL -->
                    <div class="card-section">
                        <div class="section-header">
                            <div class="section-icon"><i class="fas fa-tools"></i></div>
                            <h2>Alat yang Dipinjam</h2>
                        </div>

                        @foreach($order->details as $detail)
                        <div class="product-detail-card">
                            <!-- Gambar produk sebagai elemen <img> dengan sumber gambar bor listrik asli -->
                            <div class="product-image-large">
                                <img src="{{ asset('storage/'.$detail->tool->image) }}"
     alt="{{ $detail->tool->name }}">
                            </div>
                            <div class="product-info-detail">
                                <h3>
{{ $detail->tool->name }}
                                    <span class="product-badge">{{ $detail->tool->kategori->name }}</span>
                                </h3>

                                <div class="product-meta-grid">
                                    <div class="meta-item">
                                        <span class="meta-label"><i class="fas fa-tag"></i> Harga/hari</span>
                                        <span class="meta-value price"> Rp{{ number_format($detail->price_per_day,0,',','.') }}</span>
                                    </div>
                                    <div class="meta-item">
                                        <span class="meta-label"><i class="fas fa-cubes"></i> Jumlah</span>
                                        <span class="meta-value"> {{ $detail->quantity }} unit</span>
                                    </div>
                                    <div class="meta-item">
                                        <span class="meta-label"><i class="fas fa-clock"></i> Durasi</span>
                                        <span class="meta-value">{{ $order->duration_days }} hari</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- END Alat yang Dipinjam (SATU ALAT) - DENGAN GAMBAR REAL -->

                    <!-- Alamat Pengiriman -->
                    <div class="card-section">
                        <div class="section-header">
                            <div class="section-icon"><i class="fas fa-map-marker-alt"></i></div>
                            <h2>Alamat Pengiriman</h2>
                        </div>

                        <div class="address-box">
                            <div class="address-icon">
                                <i class="fas fa-home"></i>
                            </div>
                            <div class="address-text">
                                <h4>Alamat Lengkap</h4>
                                <p>{{ $order->address }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Payment + KTP (Sudah Terisi) -->
                <div class="detail-side-card">
                    <!-- Ringkasan Pembayaran -->
                    <div class="side-card-section">
                        <div class="section-title-small">
                            <i class="fas fa-receipt"></i> Ringkasan Pembayaran
                        </div>

                        <div class="payment-summary">
                            <div class="summary-row">
                                <span class="summary-label"><i class="fas fa-calendar-day"></i> Durasi Sewa</span>
<span class="summary-value">
{{ $order->duration_days }} hari
({{ \Carbon\Carbon::parse($order->start_date)->format('d M Y') }}
-
{{ \Carbon\Carbon::parse($order->end_date)->format('d M Y') }})
</span>                            </div>
                            <div class="summary-row">
                                <span class="summary-label"><i class="fas fa-cubes"></i> Jumlah Alat</span>
                                <span class="summary-value">{{ $order->details->sum('quantity') }} unit</span>
                            </div>
                            <div class="summary-row">
                                <span class="summary-label"><i class="fas fa-calculator"></i> Subtotal</span>
                                <span class="summary-value">Rp{{ number_format($order->details->sum('subtotal'),0,',','.') }}</span>
                            </div>
                        </div>

                        <div class="total-row">
                            <span>Total</span>
                            <span class="total-amount">Rp{{ number_format($order->gross_amount,0,',','.') }}</span>
                        </div>

                        <!-- Akun bank (contoh) -->
                        <!-- <div style="margin: 25px 0 10px; background: #E8F5E9; padding: 16px; border-radius: var(--radius-md);">
                                <div style="display: flex; gap: 12px; align-items: center;">
                                    <i class="fas fa-credit-card" style="color: var(--primary); font-size: 1.6rem;"></i>
                                    <div>
                                        <p style="font-weight: 600; color: var(--primary-dark);">Transfer BCA</p>
                                        <p style="color: var(--gray-600);">No. Rek: 1234567890 a.n. ToolRent Pro</p>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- KTP yang sudah diupload (TAMPILAN FOTO) -->
                        <div class="side-card-section">
                            <div class="section-title-small">
                                <i class="fas fa-id-card"></i> Foto KTP Pemesan
                            </div>

                            <div class="ktp-display">
                                <div class="ktp-image-container">
                                    <img src="{{ asset('storage/'.$order->ktp_image) }}"
     alt="{{ $order->name }}">
                                </div>

                                <!-- Verifikasi dan info tambahan (jika diperlukan) bisa ditambahkan di sini -->
                                <!-- <div class="ktp-verified-badge">
                                    <i class="fas fa-check-circle"></i>
                                    <span>KTP Terverifikasi</span>
                                </div> -->

                                <!-- <div class="ktp-info-text">
                                    <div class="ktp-info-item">
                                        <i class="fas fa-user"></i>
                                        <span>Ahmad Rizki</span>
                                    </div>
                                    <div class="ktp-info-item">
                                        <i class="fas fa-calendar-alt"></i>
                                        <span>12-03-1995</span>
                                    </div>
                                    <div class="ktp-info-item">
                                        <i class="fas fa-id-card"></i>
                                        <span>327301****0001</span>
                                    </div>
                                </div> -->

                                <!-- <div style="margin-top: 16px; padding-top: 16px; border-top: 1px dashed var(--gray-300); font-size: 0.9rem; color: var(--gray-500); display: flex; align-items: center; gap: 8px;">
                                    <i class="fas fa-clock"></i>
                                    <span>Diupload pada: 28 Februari 2025, 14:30 WIB</span>
                                </div> -->
                            </div>

                            <div class="info-box" style="margin-top: 20px;">
                                <div class="info-box-content">
                                    <i class="fas fa-shield-alt"></i>
                                    <div class="info-text">
                                        <h4>Data Terlindungi</h4>
                                        <p>KTP Anda aman dan hanya digunakan untuk verifikasi identitas.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="side-card-section">
                            <div class="action-buttons">
                                {{-- INI --}}
                               <button id="pay-button" class="btn btn-primary btn-full">
    <i class="fas fa-check-circle"></i> Konfirmasi Pembayaran
</button>
                                <button class="btn btn-outline btn-full">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- konten kanaan --}}
            </div>
    </main>

<script src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="{{ $clientKey }}"></script>

<script>
document.getElementById('pay-button').onclick = function () {
// DIDAPAT DARI CONTROLLER SNAP TOEKN NYA
    snap.pay('{{ $snapToken }}', {

        onSuccess: function(result) {
   window.location.href = "/notifikasi/pembayaran/berhasil?order_id=" + result.order_id;
        },

        onPending: function(result) {
            alert("Pembayaran masih pending");
        },

        onError: function(result) {
            alert("Pembayaran gagal");
        }

    });

};

</script>

@endsection
