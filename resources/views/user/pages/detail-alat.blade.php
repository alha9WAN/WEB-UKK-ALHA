@extends('user.index')
@section('title', 'Detail Alat')


@section('konten')
   <style>
        /* ===== CSS RESET & VARIABLES ===== */
        :root {
            --primary: #00C853;
            --primary-dark: #00B248;
            --primary-light: #80E27E;
            --secondary: #1A237E;
            --secondary-light: #534BAE;
            --accent: #FF6D00;
            --accent-light: #FF9E40;
            --dark: #121826;
            --light: #FFFFFF;
            --gray-50: #FAFAFA;
            --gray-100: #F5F5F5;
            --gray-200: #EEEEEE;
            --gray-300: #E0E0E0;
            --gray-400: #BDBDBD;
            --gray-500: #9E9E9E;
            --gray-600: #757575;
            --gradient: linear-gradient(135deg, var(--primary), var(--secondary));
            --gradient-light: linear-gradient(135deg, var(--primary-light), var(--secondary-light));
            --gradient-dark: linear-gradient(135deg, var(--primary-dark), #151F6D);
            --gradient-accent: linear-gradient(135deg, var(--accent), #FF4081);
            --gradient-recommended: linear-gradient(135deg, #FFD700, #FF6B00);
            --shadow-xs: 0 1px 4px rgba(0, 0, 0, 0.05);
            --shadow-sm: 0 4px 12px rgba(0, 0, 0, 0.08);
            --shadow-md: 0 8px 28px rgba(0, 0, 0, 0.12);
            --shadow-lg: 0 16px 48px rgba(0, 0, 0, 0.16);
            --shadow-xl: 0 24px 64px rgba(0, 0, 0, 0.2);
            --radius-sm: 10px;
            --radius-md: 16px;
            --radius-lg: 24px;
            --radius-xl: 36px;
            --radius-full: 9999px;
            --transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.75;
            color: var(--dark);
            background: var(--light);
            overflow-x: hidden;
        }

        /* ===== TYPOGRAPHY ===== */
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
            font-weight: 800;
            line-height: 1.15;
            letter-spacing: -0.03em;
        }

        .text-gradient {
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        p {
            font-size: 1.125rem;
            color: var(--gray-600);
            margin-bottom: 1.5rem;
            line-height: 1.8;
        }

        /* ===== LAYOUT ===== */
        .container {
            width: 100%;
            max-width: 1440px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        section {
            padding: 2rem 0 4rem;
            position: relative;
        }

        /* ===== DETAIL PRODUK ===== */
        .product-detail-wrapper {
            background: var(--light);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
            border: 1px solid var(--gray-200);
            overflow: hidden;
            margin-top: 1rem;
        }

        .product-detail-grid {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            gap: 2rem;
            padding: 2.5rem;
        }

        /* GALLERY SECTION */
        .product-gallery {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            position: relative;
        }

        .main-image {
            width: 100%;
            height: 450px;
            border-radius: var(--radius-md);
            overflow: hidden;
            border: 1px solid var(--gray-200);
            background: var(--gray-50);
            position: relative;
        }

        .main-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .main-image:hover img {
            transform: scale(1.05);
        }

        /* BADGE REKOMENDASI DI POJOK KANAN ATAS GAMBAR */
        .image-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1.2rem;
            background: var(--gradient-recommended);
            color: white;
            border-radius: var(--radius-full);
            font-weight: 700;
            font-size: 0.85rem;
            z-index: 10;
            box-shadow: 0 4px 12px rgba(255, 193, 7, 0.3);
        }

        /* PRODUCT INFO */
        .product-info {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .product-title {
            font-size: 2.2rem;
            line-height: 1.2;
            margin-bottom: 0.5rem;
        }

        .product-price {
            display: flex;
            align-items: baseline;
            gap: 0.75rem;
            flex-wrap: wrap;
            padding: 1rem 0;
            border-top: 1px solid var(--gray-200);
            border-bottom: 1px solid var(--gray-200);
        }

        .price-label {
            font-size: 1rem;
            color: var(--gray-600);
            font-weight: 500;
        }

        .price-amount {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary);
            line-height: 1;
        }

        .price-unit {
            font-size: 1rem;
            color: var(--gray-500);
            font-weight: 500;
        }

        .product-stock {
            display: flex;
            align-items: center;
            gap: 1rem;
            background: var(--gray-50);
            padding: 1rem 1.5rem;
            border-radius: var(--radius-md);
            border: 1px solid var(--gray-200);
        }

        .stock-indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background:#000;
            box-shadow: 0 0 0 3px rgba(0, 200, 83, 0.2);
        }

        .stock-info {
            font-size: 1rem;
            color: var(--dark);
        }

        .stock-info strong {
            color: var(--primary);
        }

        .product-description {
            color: var(--gray-600);
            line-height: 1.8;
            font-size: 1rem;
        }

        /* ===== FITUR SECTION - KECIL ===== */
        .features-section {
            padding: 1.5rem 2.5rem;
            border-top: 1px solid var(--gray-200);
        }

        .features-title {
            font-size: 1.4rem;
            margin-bottom: 1.2rem;
            color: var(--dark);
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
        }

        .feature-card {
            background: var(--light);
            border: 1px solid var(--gray-200);
            border-radius: var(--radius-md);
            padding: 1rem 1rem;
            transition: var(--transition);
            box-shadow: var(--shadow-xs);
            display: flex;
            gap: 0.8rem;
             align-items: center;
    justify-content: center;
    text-align: center;
        }

        .feature-card:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-sm);
            border-color: var(--primary);
        }

        .feature-icon {
            width: 40px;
            height: 40px;
            background: var(--gradient-light);
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--light);
            font-size: 1.2rem;
            box-shadow: 0 4px 8px rgba(0, 200, 83, 0.15);
            flex-shrink: 0;
        }

        .feature-content {
            flex: 1;

        }

        .feature-content h3 {
            display: flex;
            font-size: 1rem;
            margin-bottom: 0.2rem;
            color: var(--dark);
            font-weight: 700;
            align-items: center;
        }

        .feature-content p {
            font-size: 0.8rem;
            color: var(--gray-600);
            margin-bottom: 0.1rem;
            line-height: 1.4;
        }

        .feature-content small {
            display: block;
            font-size: 0.7rem;
            color: var(--gray-500);
            margin-top: 0.1rem;
        }

        /* ACTION BUTTONS */
        .product-actions {
            display: flex;
            gap: 1.5rem;
            margin-top: 1rem;
            flex-wrap: wrap;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            padding: 1.2rem 3rem;
            border-radius: var(--radius-md);
            font-weight: 700;
            font-size: 1.1rem;
            text-decoration: none;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            z-index: 1;
            border: none;
            cursor: pointer;
            font-family: 'Inter', sans-serif;
            flex: 1;
            min-width: 200px;
            background: var(--gradient);
            color: var(--light);
            box-shadow: 0 8px 20px rgba(0, 200, 83, 0.3);
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.7s ease;
            z-index: -1;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 30px rgba(0, 200, 83, 0.4);
        }

        /* REVIEWS SECTION - DIPERKECIL JUGA */
        .reviews-section {
            padding: 1.5rem 2.5rem 2.5rem;
            border-top: 1px solid var(--gray-200);
        }

        .reviews-title {
            font-size: 1.4rem;
            margin-bottom: 1.2rem;
            color: var(--dark);
        }

        .reviews-summary {
            display: flex;
            gap: 2rem;
            padding: 1.5rem;
            background: var(--gray-50);
            border-radius: var(--radius-md);
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .average-rating {
            text-align: center;
        }

        .big-rating {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--dark);
            line-height: 1;
        }

        .rating-stars {
            color: #FFB800;
            margin: 0.3rem 0;
            font-size: 0.9rem;
        }

        .rating-progress {
            flex: 1;
            min-width: 200px;
        }

        .progress-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.5rem;
            font-size: 0.8rem;
        }

        .progress-star {
            width: 30px;
            color: var(--dark);
            font-weight: 600;
        }

        .progress-bar {
            flex: 1;
            height: 6px;
            background: var(--gray-300);
            border-radius: 3px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: var(--gradient);
            border-radius: 3px;
        }

        .review-card {
            padding: 1.2rem;
            border: 1px solid var(--gray-200);
            border-radius: var(--radius-md);
            margin-bottom: 1rem;
        }

        .review-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
        }

        .reviewer {
            font-weight: 700;
            color: var(--dark);
            font-size: 0.9rem;
        }

        .review-date {
            color: var(--gray-500);
            font-size: 0.8rem;
        }

        .review-rating {
            color: #FFB800;
            margin-bottom: 0.5rem;
            font-size: 0.8rem;
        }

        .review-text {
            color: var(--gray-600);
            line-height: 1.5;
            font-size: 0.9rem;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 992px) {
            .product-detail-grid {
                grid-template-columns: 1fr;
            }
            .features-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .product-detail-grid {
                padding: 1.5rem;
            }
            .product-title {
                font-size: 1.8rem;
            }
            .product-actions {
                flex-direction: column;
            }
            .btn-primary {
                width: 100%;
            }
            .reviews-summary {
                flex-direction: column;
                gap: 1rem;
            }
            .main-image {
                height: 350px;
            }
            .features-grid {
                grid-template-columns: 1fr;
            }
            .feature-card {
                padding: 0.8rem;
            }
        }
    </style>

       <section class="product-detail" style="margin-top: 7rem">
        <div class="container">
            <div class="product-detail-wrapper">
                <!-- GRID UTAMA: GALLERY + INFO -->
                <div class="product-detail-grid">
                    <!-- LEFT: GALLERY DENGAN BADGE DI POJOK KANAN ATAS -->
                    <div class="product-gallery">
                        <!-- BADGE REKOMENDASI DI POJOK KANAN ATAS GAMBAR -->
                        <div class="image-badge">
                            <i class="fas fa-star"></i> REKOMENDASI TERBAIK
                        </div>

                        <div class="main-image">
                            <img src="{{ $tools->image
    ? asset('storage/' . $tools->image)
    : asset('assets/img/no-image.png') }}"
    alt="{{ $tools->name }}"
                                 id="mainProductImage">
                        </div>
                    </div>

                    <!-- RIGHT: PRODUCT INFO -->
                    <div class="product-info">
                        <h1 class="product-title">{{ $tools->name }}</h1>

                        <div class="product-price">
                            <span class="price-label">Harga Sewa:</span>
                            <span class="price-amount">     Rp{{ number_format($tools->price, 0, ',', '.') }}</span>
                            <span class="price-unit">/hari</span>
                        </div>

                     <div class="product-stock">
    <div class="stock-indicator"></div>
    <span class="stock-info">
        Stok tersedia: <strong style="color: #000">{{ $tools->stock }} unit</strong>
    </span>

    @if ($tools->stock > 5)
        <span style="font-size: 0.9rem; font-wight:bold" class="stock-status available">Tersedia</span>
    @elseif ($tools->stock > 0)
        <span style="font-size: 0.9rem; font-wight:bold" class="stock-status limited">Terbatas</span>
    @else
        <span style="font-size: 0.9rem; font-wight:bold" class="stock-status out">Habis</span>
    @endif
</div>

                        <p class="product-description">
                          {{ $tools->description }}
                        </p>

                        <div class="product-actions">
                            <a href="{{ route('orders.create', $tools->id) }}" class="btn-primary">
                                <i class="fas fa-shopping-cart"></i> PINJAMAN SEKARANG
                            </a>
                        </div>
                    </div>
                </div>

                <!-- FITUR SECTION - KECIL DAN PADAT -->
                <div class="features-section">
                    <h2 class="features-title">Fitur Unggulan</h2>
<div class="features-grid">
    @forelse ($tools->features ?? [] as $feature)
        <div class="feature-card">
            <div class="feature-icon" style="margin-top: 1rem">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="feature-content">
                <h3>{{ $feature }}</h3>
            </div>
        </div>
    @empty
        <div class="feature-card">
            <div class="feature-content">
                <h3>Tidak ada fitur</h3>
            </div>
        </div>
    @endforelse
</div>
                </div>

                <!-- REVIEWS SECTION - JUGA DIPERKECIL -->
                <div class="reviews-section">
                    <h2 class="reviews-title">Ulasan Pengguna</h2>

                    <!-- RINGKASAN REVIEW - KECIL -->
                    <div class="reviews-summary">
                        <div class="average-rating">
                            <div class="big-rating">4.8</div>
                            <div class="rating-stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <div style="font-size:0.8rem;">Dari 246 ulasan</div>
                        </div>
                        <div class="rating-progress">
                            <div class="progress-item">
                                <span class="progress-star">5</span>
                                <div class="progress-bar"><div class="progress-fill" style="width: 80%"></div></div>
                                <span style="font-size:0.8rem;">80%</span>
                            </div>
                            <div class="progress-item">
                                <span class="progress-star">4</span>
                                <div class="progress-bar"><div class="progress-fill" style="width: 15%"></div></div>
                                <span style="font-size:0.8rem;">15%</span>
                            </div>
                            <div class="progress-item">
                                <span class="progress-star">3</span>
                                <div class="progress-bar"><div class="progress-fill" style="width: 3%"></div></div>
                                <span style="font-size:0.8rem;">3%</span>
                            </div>
                            <div class="progress-item">
                                <span class="progress-star">2</span>
                                <div class="progress-bar"><div class="progress-fill" style="width: 1%"></div></div>
                                <span style="font-size:0.8rem;">1%</span>
                            </div>
                            <div class="progress-item">
                                <span class="progress-star">1</span>
                                <div class="progress-bar"><div class="progress-fill" style="width: 1%"></div></div>
                                <span style="font-size:0.8rem;">1%</span>
                            </div>
                        </div>
                    </div>

                    <!-- LIST REVIEW - KECIL -->
                    <div class="review-card">
                        <div class="review-header">
                            <span class="reviewer">Budi Santoso</span>
                            <span class="review-date">2 hari lalu</span>
                        </div>
                        <div class="review-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="review-text">"Bor nya sangat bertenaga! Pengiriman cepat, alat bersih dan terawat."</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
