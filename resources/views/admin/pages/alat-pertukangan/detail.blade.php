@extends('admin. index')
@section('title', 'Detail Data')

@section('konten-ds')

<style>
        :root {
            --primary-color: #10B981;
            --primary-light: #D1FAE5;
            --primary-lighter: #ECFDF5;
            --primary-dark: #059669;
            --primary-darker: #047857;
            --accent-color: #34D399;
            --white: #FFFFFF;
            --light-bg: #F9FAFB;
            --card-bg: #FFFFFF;
            --text-primary: #111827;
            --text-secondary: #6B7280;
            --text-light: #9CA3AF;
            --border-color: #E5E7EB;
            --border-light: #F3F4F6;
            --success-color: #10B981;
            --warning-color: #F59E0B;
            --danger-color: #EF4444;
            --info-color: #3B82F6;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-xl: 24px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', system-ui, -apple-system, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            color: var(--text-primary);
            line-height: 1.6;
            min-height: 100vh;
            padding: 40px 30px;
        }

        /* Container Utama */
        .container-main {
            max-width: 1400px;
            margin: 0 auto;
            width: 100%;
        }

        /* Header Styles */
        .header-section {
            background: var(--white);
            border-radius: var(--radius-xl);
            padding: 40px 50px;
            margin-bottom: 40px;
            box-shadow: var(--shadow-xl);
            border: 1px solid rgba(209, 250, 229, 0.5);
            backdrop-filter: blur(10px);
            position: relative;
            overflow: hidden;
        }

        /* .header-section::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 300px;
            height: 300px;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(52, 211, 153, 0.1));
            border-radius: 0 0 0 100%;
        } */

        .header-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: var(--primary-darker);
            display: flex;
            align-items: center;
            gap: 20px;
            position: relative;
            z-index: 1;
        }

        .header-title i {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.3rem;
            box-shadow: var(--shadow-lg);
        }

        .header-subtitle {
            color: var(--text-secondary);
            font-size: 0.95rem;
            line-height: 1.7;
            max-width: 900px;
            position: relative;
            z-index: 1;
        }

        /* Product Detail Card */
        .product-detail-card {
            background: var(--white);
            border-radius: var(--radius-xl);
            overflow: hidden;
            box-shadow: var(--shadow-xl);
            border: 1px solid var(--border-light);
            margin-bottom: 50px;
            position: relative;
            width: 100%;
        }

        /* Product Header */
        .product-header {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            padding: 30px 50px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .product-header::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .product-header h2 {
            font-size: 1.3rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 20px;
            position: relative;
            z-index: 1;
        }

        .product-header h2 i {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
        }

        /* Product Content */
        .product-content {
            padding: 40px 50px;
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 50px;
        }

        /* Image Gallery */
        .image-gallery {
            position: relative;
        }

        .product-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            z-index: 10;
            padding: 8px 18px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 700;
            color: white;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            box-shadow: var(--shadow-md);
        }

        .main-image-container {
            position: relative;
            overflow: hidden;
            border-radius: var(--radius-lg);
            margin-bottom: 1.5rem;
            border: 2px solid var(--primary-light);
            box-shadow: var(--shadow-lg);
            background: var(--light-bg);
            height: 420px;
        }

        .main-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .image-zoom-overlay {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(255, 255, 255, 0.9);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-darker);
            cursor: pointer;
            z-index: 5;
            box-shadow: var(--shadow-md);
            transition: var(--transition);
        }

        .image-zoom-overlay:hover {
            background: var(--primary-color);
            color: white;
            transform: scale(1.1);
        }

        .thumbnail-gallery {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
        }

        .thumbnail-item {
            position: relative;
            cursor: pointer;
            overflow: hidden;
            border-radius: var(--radius-md);
            border: 2px solid transparent;
            transition: var(--transition);
            background: var(--light-bg);
            height: 100px;
        }

        .thumbnail-item.active {
            border-color: var(--primary-color);
            transform: scale(1.05);
            box-shadow: var(--shadow-md);
        }

        .thumbnail-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .thumbnail-item:hover .thumbnail-img {
            transform: scale(1.1);
        }

        /* Product Info */
        .product-info {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* Product Header Info */
        .product-header-info {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-bottom: 15px;
        }

        .product-code {
            color: var(--text-secondary);
            font-size: 0.9rem;
            background: var(--primary-lighter);
            padding: 10px 18px;
            border-radius: var(--radius-md);
            display: inline-block;
            border-left: 5px solid var(--primary-color);
            width: fit-content;
        }

        .product-category {
            display: inline-block;
            background: linear-gradient(135deg, var(--primary-light), var(--primary-lighter));
            color: var(--primary-darker);
            padding: 8px 16px;
            border-radius: var(--radius-md);
            font-weight: 600;
            font-size: 0.9rem;
            border: 2px solid var(--primary-light);
            width: fit-content;
        }

        /* Product Title */
        .product-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-darker);
            margin-bottom: 15px;
            position: relative;
            padding-bottom: 12px;
        }

        .product-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 60px;
            height: 3px;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            border-radius: 2px;
        }

        /* Price Section */
        .price-section {
            background: linear-gradient(135deg, var(--primary-lighter), var(--white));
            padding: 25px;
            border-radius: var(--radius-lg);
            border: 2px solid var(--primary-light);
            margin-bottom: 20px;
            position: relative;
            overflow: hidden;
        }

        .price-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
        }

        .price-row {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .current-price {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--primary-darker);
        }

        .original-price {
            font-size: 1.3rem;
            font-weight: 500;
            color: var(--text-secondary);
            text-decoration: line-through;
        }

        .discount-badge {
            font-size: 0.95rem;
            font-weight: 600;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            display: inline-block;
            box-shadow: var(--shadow-sm);
        }

        /* Product Meta */
        .product-meta-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 20px;
        }

        .meta-item {
            background: var(--light-bg);
            padding: 18px;
            border-radius: var(--radius-md);
            border: 2px solid var(--border-light);
            transition: var(--transition);
        }

        .meta-item:hover {
            border-color: var(--primary-light);
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        .meta-icon {
            color: var(--primary-color);
            font-size: 1.1rem;
            margin-bottom: 8px;
        }

        .meta-label {
            font-size: 0.85rem;
            color: var(--text-secondary);
            margin-bottom: 5px;
        }

        .meta-value {
            font-weight: 600;
            color: var(--text-primary);
            font-size: 1rem;
        }

        .stock-status {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-block;
        }

        .status-active {
            background: linear-gradient(135deg, var(--success-color), var(--primary-color));
            color: white;
        }

        /* Product Description */
        .section-block {
            margin: 20px 0;
        }

        .section-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary-darker);
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 2px solid var(--primary-light);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .section-title i {
            color: var(--primary-color);
        }

        .product-description {
            line-height: 1.7;
            color: var(--text-primary);
            padding: 20px;
            background: var(--light-bg);
            border-radius: var(--radius-md);
            border-left: 5px solid var(--primary-color);
            font-size: 0.95rem;
        }

        /* Features List */
        .features-container {
            background: var(--primary-lighter);
            padding: 20px;
            border-radius: var(--radius-md);
            border: 2px solid var(--primary-light);
            margin-bottom: 20px;
        }

        .features-list {
            list-style: none;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .features-list li {
            padding: 12px;
            background: var(--white);
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-light);
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 0.9rem;
            transition: var(--transition);
        }

        .features-list li:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
            border-color: var(--primary-light);
        }

        .features-list li:before {
            content: "✓";
            color: var(--primary-color);
            font-weight: bold;
            font-size: 1rem;
            width: 22px;
            height: 22px;
            background: var(--primary-lighter);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Product Actions */
        .product-actions {
            margin: 25px 0;
            padding: 25px;
            background: var(--light-bg);
            border-radius: var(--radius-lg);
            border: 2px solid var(--primary-light);
        }

        .action-controls {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .quantity-control {
            display: flex;
            align-items: center;
            background: var(--white);
            border: 2px solid var(--primary-color);
            border-radius: var(--radius-md);
            overflow: hidden;
            width: 140px;
        }

        .quantity-btn {
            background: var(--primary-light);
            border: none;
            width: 40px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-darker);
            font-size: 1.2rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .quantity-btn:hover {
            background: var(--primary-color);
            color: white;
        }

        .quantity-input {
            width: 60px;
            padding: 14px 5px;
            border: none;
            text-align: center;
            font-weight: 600;
            font-size: 1rem;
            color: var(--primary-darker);
            background: var(--white);
            outline: none;
        }

        .action-btn {
            padding: 16px 30px;
            border-radius: var(--radius-md);
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            transition: var(--transition);
            border: none;
            cursor: pointer;
            font-size: 1rem;
            flex: 1;
            position: relative;
            overflow: hidden;
        }

        .btn-cart {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            box-shadow: var(--shadow-lg);
        }

        .btn-cart:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-xl);
        }

        .btn-cart::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.7s;
        }

        .btn-cart:hover::before {
            left: 100%;
        }

        /* Stats Info */
        .product-stats {
            display: flex;
            gap: 20px;
            margin: 15px 0;
            padding: 15px;
            background: var(--primary-lighter);
            border-radius: var(--radius-md);
            border: 2px solid var(--primary-light);
        }

        .stat-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .stat-icon {
            color: var(--primary-color);
            font-size: 1.1rem;
        }

        .stat-value {
            font-weight: 600;
            color: var(--primary-darker);
        }

        .stat-label {
            font-size: 0.85rem;
            color: var(--text-secondary);
        }

        /* Bottom Actions */
        .bottom-actions {
            padding: 30px 50px;
            border-top: 1px solid var(--border-light);
            display: flex;
            justify-content: space-between;
            gap: 20px;
            /* background: linear-gradient(to right, var(--primary-lighter), var(--white)); */
        }

        .btn {
            padding: 16px 32px;
            border-radius: var(--radius-md);
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 12px;
            border: none;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
            min-width: 180px;
            justify-content: center;
        }

        .btn-secondary {
            background: var(--white);
            border: 2px solid var(--border-color);
            color: var(--text-primary);
        }

        .btn-secondary:hover {
            background: var(--light-bg);
            border-color: var(--primary-color);
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            border: none;
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow-lg);
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.7s;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-xl);
        }

        /* Notifikasi */
        .notification {
            position: fixed;
            top: 30px;
            right: 30px;
            background: white;
            padding: 20px 25px;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-xl);
            border-left: 5px solid var(--success-color);
            display: flex;
            align-items: center;
            gap: 15px;
            z-index: 1000;
            transform: translateX(150%);
            transition: transform 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .notification.show {
            transform: translateX(0);
        }

        .notification-icon {
            color: var(--success-color);
            font-size: 1.3rem;
        }

        .notification-content h4 {
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--text-primary);
        }

        .notification-content p {
            font-size: 0.9rem;
            color: var(--text-secondary);
        }

        /* Modal Zoom */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.85);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2000;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
        }

        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .modal-image-container {
            max-width: 90%;
            max-height: 90%;
            position: relative;
        }

        .modal-image {
            width: 100%;
            height: auto;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-xl);
        }

        .modal-close {
            position: absolute;
            top: -15px;
            right: -15px;
            width: 40px;
            height: 40px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: var(--text-primary);
            cursor: pointer;
            box-shadow: var(--shadow-md);
            transition: var(--transition);
        }

        .modal-close:hover {
            background: var(--danger-color);
            color: white;
            transform: rotate(90deg);
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .container-main {
                max-width: 100%;
                padding: 0 20px;
            }

            .header-section,
            .product-content,
            .bottom-actions {
                padding: 35px;
            }
        }

        @media (max-width: 992px) {
            .header-title {
                font-size: 1.6rem;
            }

            .header-title i {
                width: 50px;
                height: 50px;
                font-size: 1.1rem;
            }

            .product-content {
                grid-template-columns: 1fr;
                gap: 35px;
            }

            .main-image-container {
                height: 350px;
            }

            .features-list {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            body {
                padding: 25px 20px;
            }

            .header-section,
            .product-content,
            .bottom-actions {
                padding: 25px;
            }

            .product-meta-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .thumbnail-gallery {
                grid-template-columns: repeat(2, 1fr);
            }

            .action-controls {
                flex-direction: column;
                align-items: stretch;
            }

            .quantity-control {
                width: 100%;
            }

            .bottom-actions {
                flex-direction: column;
                gap: 15px;
            }

            .bottom-actions .btn {
                width: 100%;
                min-width: auto;
                padding: 14px 25px;
                font-size: 0.95rem;
            }
        }

        @media (max-width: 576px) {
            body {
                padding: 20px 15px;
            }

            .header-title {
                font-size: 1.3rem;
            }

            .header-title i {
                width: 45px;
                height: 45px;
                font-size: 1rem;
            }

            .product-content {
                padding: 20px;
            }

            .main-image-container {
                height: 280px;
            }

            .thumbnail-item {
                height: 80px;
            }

            .current-price {
                font-size: 1.8rem;
            }

            .original-price {
                font-size: 1.1rem;
            }

            .btn {
                padding: 14px 25px;
                font-size: 0.95rem;
            }

            .product-header-info {
                gap: 10px;
            }
        }

        @media (max-width: 400px) {
            .main-image-container {
                height: 240px;
            }

            .thumbnail-item {
                height: 70px;
            }

            .price-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .btn {
                padding: 12px 20px;
                font-size: 0.9rem;
            }
        }
    </style>




<main class="main-content" id="mainContent">
    <div class="container-main">
        <!-- Header -->
        <div class="header-section">
            <h1 class="header-title">
                <i class="fas fa-box-open"></i>
                Detail Produk Lengkap
            </h1>
            <p class="header-subtitle">
                Informasi detail dan spesifikasi lengkap alat.
            </p>
        </div>

        <!-- Main Product Card -->
        <div class="product-detail-card">
            <!-- Product Header -->
            <div class="product-header">
                <h2><i class="fas fa-info-circle"></i>
 </i> Detail Produk </h2>
            </div>

            <!-- Product Content (DATA DARA NYA DISNI)-->


            <div class="product-content">
                <!-- Image Gallery -->
                <div class="image-gallery">
                    <div class="product-badge">
                        <i class="fas fa-tag"></i>
                        {{ $tools->kategori->name }}

                    </div>

                    <!-- Main Image with Zoom -->
                    <div class="main-image-container">

                        @if ($tools->image)

                        <img src="{{ asset('storage/' . $tools->image) }}"
                             alt="Henley Shirt Premium - Front View"
                             class="main-image"
                             id="mainImage">
                                @else
                            Tidak ada foto
                        @endif
                        <div class="image-zoom-overlay" id="zoomBtn">
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </div>
                </div>




                <!-- Product Information -->
                <div class="product-info">
                    <!-- Product Header Info -->
                    <div class="product-header-info">
                        <div class="product-code">
                            <i class="fas fa-barcode"></i> <strong>Kode Produk: {{ $tools->code }}</strong>

                        </div>


                    </div>

                    <!-- Product Title -->
                    <h1 class="product-title">Henley Shirt Premium</h1>

                         <!-- Price Section -->
                    <div class="price-section">
                        <div class="price-row">
                            <div class="current-price">Rp {{ number_format($tools->price, 0, ',', '.') }}</div>
                            <!-- <div class="original-price">$145.00</div>
                            <span class="discount-badge"><i class="fas fa-percentage"></i> Hemat 20%</span> -->
                        </div>

                    </div>

                    <!-- Stats Info -->
                    <!-- <div class="product-stats">
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="fas fa-eye"></i>
                            </div>
                            <div>
                                <div class="stat-value">1,245</div>
                                <div class="stat-label">Dilihat</div>
                            </div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <div>
                                <div class="stat-value">89</div>
                                <div class="stat-label">Dipinjam</div>
                            </div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="fas fa-star"></i>
                            </div>
                            <div>
                                <div class="stat-value">4.8</div>
                                <div class="stat-label">Rating</div>
                            </div>
                        </div>
                    </div> -->



                    <!-- Product Meta Information -->
                    <div class="product-meta-grid">
                        <div class="meta-item">
                            <div class="meta-icon">
                                <i class="fas fa-boxes"></i>
                            </div>
                            <div class="meta-label">Stok Tersedia</div>
                            <div class="meta-value"><span id="stockCount">{{ $tools->stock }}</span> unit</div>
                        </div>

                               <div class="meta-item">
                            <div class="meta-icon">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <div class="meta-label">Tanggal Ditambahkan</div>
                            <div class="meta-value">
                                {{ isset($tools->created_at) ? \Carbon\Carbon::parse($tools->created_at)->format('d M Y') : 'N/A' }}
                            </div>
                        </div>
                        <!-- <div class="meta-item">
                            <div class="meta-icon">
                                <i class="fas fa-certificate"></i>
                            </div>
                            <div class="meta-label">Kondisi Barang</div>
                            <div class="meta-value">Baru & Segel</div>
                        </div> -->

                        <!-- <div class="meta-item">
                            <div class="meta-icon">
                                <i class="fas fa-layer-group"></i>
                            </div>
                            <div class="meta-label">Kategori ID</div>
                            <div class="meta-value">PKA-003</div>
                        </div>

                        <div class="meta-item">
                            <div class="meta-icon">
                                <i class="fas fa-toggle-on"></i>
                            </div>
                            <div class="meta-label">Status Produk</div>
                            <div class="meta-value">
                                <span class="stock-status status-active">Aktif & Tersedia</span>
                            </div>
                        </div> -->
                    </div>

                    <!-- Product Description -->
                    <div class="section-block">
                        <h3 class="section-title">
                            <i class="fas fa-align-left"></i> Deskripsi Produk
                        </h3>
                        <div class="product-description">
                            <p>{{ $tools->description ?? 'Deskripsi produk tidak tersedia.' }}p>
                        </div>
                    </div>

                    <!-- Product Features -->
  @if($tools->features && count($tools->features) > 0)
<div class="section-block">
    <h3 class="section-title">
        <i class="fas fa-check-circle"></i> Fitur & Spesifikasi
    </h3>
    <div class="features-container">
        <ul class="features-list">
            @foreach($tools->features as $feature)
                <li>{{ $feature }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif
                    <!-- END Product Features -->


            <!-- Product Content (DATA DARA NYA SAAAMPAI DISNI)-->


                    <!-- Product Actions -->
                    <!-- <div class="product-actions">
                        <div class="action-controls">
                            <div class="quantity-control">
                                <button class="quantity-btn" id="decreaseQty">-</button>
                                <input type="number" class="quantity-input" value="1" min="1" max="45" id="quantityInput">
                                <button class="quantity-btn" id="increaseQty">+</button>
                            </div>
                            <button class="action-btn btn-cart" id="addToCartBtn">
                                <i class="fas fa-calendar-check"></i> Ajukan Pinjaman
                            </button>
                        </div>
                        <div style="margin-top: 15px; font-size: 0.9rem; color: var(--text-secondary); text-align: center;">
                            <i class="fas fa-clock"></i> Durasi pinjaman maksimal 7 hari
                        </div>
                    </div> -->
                </div>
            </div>

            <!-- Bottom Action Buttons -->
            <div class="bottom-actions">
                <a href="{{ route('admin.alat.list') }}" class="btn btn-secondary" id="backBtn">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <a href="{{ route('admin.alat.edit', $tools->id) }}" class="btn btn-primary">
                    <i class="fas fa-edit"></i> Edit Detail Produk
                </a>

            </div>
        </div>
    </div>

    {{-- FITUR GAMBAR BESAR --}}
    <!-- Modal Image Zoom -->
    <div class="modal-overlay" id="imageModal">
        <div class="modal-image-container">
            <img src="" alt="" class="modal-image" id="modalImage">
            <div class="modal-close" id="closeModal">
                <i class="fas fa-times"></i>
            </div>
        </div>
    </div>

    </main>


  <script>
        // DOM Elements
        const mainImage = document.getElementById('mainImage');
        //FITUR GAMBAR BESAR
        const modalImage = document.getElementById('modalImage');
        const imageModal = document.getElementById('imageModal');
        const closeModal = document.getElementById('closeModal');
        const zoomBtn = document.getElementById('zoomBtn');
        // endFITUR GAMBAR BESAR
        const thumbnailItems = document.querySelectorAll('.thumbnail-item');
        const quantityInput = document.getElementById('quantityInput');
        const decreaseBtn = document.getElementById('decreaseQty');
        const increaseBtn = document.getElementById('increaseQty');
        const addToCartBtn = document.getElementById('addToCartBtn');
        const notification = document.getElementById('notification');
        const stockCount = document.getElementById('stockCount');
        const shareBtn = document.getElementById('shareBtn');

        // Current Stock
        let currentStock = 45;

        // Image Gallery Functionality
        thumbnailItems.forEach(item => {
            item.addEventListener('click', function() {
                // Remove active class from all thumbnails
                thumbnailItems.forEach(thumb => thumb.classList.remove('active'));

                // Add active class to clicked thumbnail
                this.classList.add('active');

                // Change main image
                const newImageSrc = this.getAttribute('data-image');
                mainImage.src = newImageSrc;
                mainImage.alt = this.querySelector('.thumbnail-img').alt;

                // Add fade effect
                mainImage.style.opacity = '0.7';
                setTimeout(() => {
                    mainImage.style.opacity = '1';
                }, 200);
            });
        });

                // FITUR GAMBAR BESAR

        // Image Zoom Functionality
        zoomBtn.addEventListener('click', () => {
            modalImage.src = mainImage.src;
            modalImage.alt = mainImage.alt;
            imageModal.classList.add('active');
        });

        closeModal.addEventListener('click', () => {
            imageModal.classList.remove('active');
        });

        imageModal.addEventListener('click', (e) => {
            if (e.target === imageModal) {
                imageModal.classList.remove('active');
            }
        });
                // endFITUR GAMBAR BESAR


        // Quantity Controls
        decreaseBtn.addEventListener('click', () => {
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        });

        increaseBtn.addEventListener('click', () => {
            let currentValue = parseInt(quantityInput.value);
            if (currentValue < currentStock) {
                quantityInput.value = currentValue + 1;
            } else {
                showNotification('Stok tidak mencukupi!', 'error');
            }
        });

        quantityInput.addEventListener('change', function() {
            let value = parseInt(this.value);

            if (isNaN(value) || value < 1) {
                this.value = 1;
            } else if (value > currentStock) {
                this.value = currentStock;
                showNotification(`Stok maksimal adalah ${currentStock} unit`, 'warning');
            }
        });

        // Add to Cart Functionality
        addToCartBtn.addEventListener('click', function() {
            const quantity = parseInt(quantityInput.value);

            // Update stock
            currentStock -= quantity;
            stockCount.textContent = currentStock;

            // Disable button if stock is zero
            if (currentStock <= 0) {
                this.disabled = true;
                this.innerHTML = '<i class="fas fa-times"></i> Stok Habis';
                this.style.opacity = '0.6';
                stockCount.parentElement.innerHTML = '<span class="stock-status" style="background: var(--danger-color);">Stok Habis</span>';
            }

            // Button animation
            const originalText = this.innerHTML;
            this.innerHTML = '<i class="fas fa-check"></i> Berhasil Dipinjam!';
            this.style.background = 'linear-gradient(135deg, var(--success-color), var(--primary-color))';

            // Reset button after 2 seconds
            setTimeout(() => {
                this.innerHTML = originalText;
                this.style.background = '';
            }, 2000);

            // Show success notification
            showNotification(`${quantity} Henley Shirt Premium berhasil ditambahkan ke peminjaman!`, 'success');
        });

        // Share Functionality
        shareBtn.addEventListener('click', function() {
            const shareData = {
                title: 'Henley Shirt Premium',
                text: 'Lihat produk Henley Shirt Premium yang keren ini!',
                url: window.location.href
            };

            if (navigator.share) {
                navigator.share(shareData)
                    .then(() => showNotification('Produk berhasil dibagikan!', 'success'))
                    .catch(err => console.log('Error sharing:', err));
            } else {
                // Fallback for browsers that don't support Web Share API
                navigator.clipboard.writeText(window.location.href);
                showNotification('Link produk berhasil disalin ke clipboard!', 'info');
            }
        });

        // Notification System
        function showNotification(message, type = 'success') {
            const notificationContent = notification.querySelector('.notification-content p');
            const notificationIcon = notification.querySelector('.notification-icon i');
            const notificationTitle = notification.querySelector('.notification-content h4');

            // Set notification content
            notificationContent.textContent = message;

            // Set notification style based on type
            switch(type) {
                case 'success':
                    notificationTitle.textContent = 'Berhasil!';
                    notificationIcon.className = 'fas fa-check-circle';
                    notification.style.borderLeftColor = 'var(--success-color)';
                    notificationIcon.style.color = 'var(--success-color)';
                    break;
                case 'error':
                    notificationTitle.textContent = 'Error!';
                    notificationIcon.className = 'fas fa-exclamation-circle';
                    notification.style.borderLeftColor = 'var(--danger-color)';
                    notificationIcon.style.color = 'var(--danger-color)';
                    break;
                case 'warning':
                    notificationTitle.textContent = 'Peringatan!';
                    notificationIcon.className = 'fas fa-exclamation-triangle';
                    notification.style.borderLeftColor = 'var(--warning-color)';
                    notificationIcon.style.color = 'var(--warning-color)';
                    break;
                case 'info':
                    notificationTitle.textContent = 'Informasi';
                    notificationIcon.className = 'fas fa-info-circle';
                    notification.style.borderLeftColor = 'var(--info-color)';
                    notificationIcon.style.color = 'var(--info-color)';
                    break;
            }

            // Show notification
            notification.classList.add('show');

            // Hide notification after 3 seconds
            setTimeout(() => {
                notification.classList.remove('show');
            }, 3000);
        }

        // Keyboard shortcuts
        document.addEventListener('keydown', (e) => {
            // Escape to close modal
            if (e.key === 'Escape' && imageModal.classList.contains('active')) {
                imageModal.classList.remove('active');
            }

            // Plus/Minus for quantity
            if (e.key === '+' || e.key === '=') {
                e.preventDefault();
                increaseBtn.click();
            }
            if (e.key === '-' || e.key === '_') {
                e.preventDefault();
                decreaseBtn.click();
            }
        });

        // Initialize with first thumbnail active
        document.querySelector('.thumbnail-item').click();
    </script>
@endsection
