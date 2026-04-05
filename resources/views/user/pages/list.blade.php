@extends('user.index')
@section('title', 'List Alat')

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
            --header-height: 90px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.75;
            color: var(--dark);
            background: var(--light);
            overflow-x: hidden;
        }

        /* ===== TYPOGRAPHY ===== */
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Poppins', sans-serif;
            font-weight: 800;
            line-height: 1.15;
            letter-spacing: -0.03em;
        }

        h2 {
            font-size: clamp(1.75rem, 4vw, 2.5rem);
            margin-bottom: 1.25rem;
        }

        h3 {
            font-size: clamp(1.25rem, 3vw, 1.75rem);
            margin-bottom: 1rem;
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
            max-width: 1500px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        section {
            padding: 2rem 0;
            position: relative;
        }

        .section-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 1.5rem;
            margin-top: 3rem;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -0.75rem;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--gradient);
            border-radius: 2px;
        }

        /* ===== BREADCRUMB ===== */
        .breadcrumb {
            background: var(--gray-50);
            padding: 2rem 0;
            margin-top: 0;
        }

        .breadcrumb-content {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 1rem;
            color: var(--gray-600);
        }

        .breadcrumb-link {
            color: var(--gray-600);
            text-decoration: none;
            transition: var(--transition);
        }

        .breadcrumb-link:hover {
            color: var(--primary);
        }

        .breadcrumb-current {
            color: var(--primary);
            font-weight: 600;
        }

        /* ===== SHOP HEADER ===== */
        .shop-header-modern {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 2rem 0 1.5rem;
            padding: 1.5rem 2rem;
            background: var(--light);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
            border: 1px solid var(--gray-200);
            flex-wrap: wrap;
            gap: 1rem;
        }

        .total-products {
            font-size: 1.2rem;
            color: var(--gray-600);
            margin: 0;
            font-weight: 500;
        }

        .total-products span {
            color: var(--primary);
            font-weight: 700;
            font-size: 1.4rem;
        }

        /* ===== FILTER SECTION ===== */
        .shop-filter-modern {
            background: var(--light);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
            margin-bottom: 2.5rem;
            border: 1px solid var(--gray-200);
        }

        .filter-header {
            padding: 1.5rem 2rem;
            border-bottom: 1px solid var(--gray-200);
        }

        .filter-title {
            font-size: 1.4rem;
            color: var(--dark);
            margin: 0;
            font-weight: 700;
        }

        .filter-modern-form {
            padding: 2rem;
        }

        /* SEARCH STANDALONE WRAPPER */
        .filter-search-standalone {
            margin-bottom: 2rem;
        }

        /* Search container dengan icon, tombol clear, dan tombol cari di samping */
        .search-wrapper-row {
            display: flex;
            gap: 1rem;
            align-items: flex-start;
            width: 100%;
        }

        .search-wrapper {
            position: relative;
            flex: 1;
            min-width: 250px;
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-500);
            font-size: 1rem;
            pointer-events: none;
            z-index: 2;
        }

        .search-input {
            width: 100%;
            padding: 1rem 3rem 1rem 2.8rem;
            border: 2px solid var(--gray-200);
            border-radius: var(--radius-md);
            font-size: 1rem;
            transition: var(--transition);
            font-family: 'Inter', sans-serif;
            background: var(--light);
            height: 54px;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(0, 200, 83, 0.1);
        }

        .clear-search {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--gray-500);
            cursor: pointer;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.2rem;
            transition: var(--transition);
            border-radius: 50%;
            width: 28px;
            height: 28px;
        }

        .clear-search:hover {
            color: var(--primary);
            background: var(--gray-100);
            transform: translateY(-50%) scale(1.1);
        }

        .clear-search.hidden {
            display: none;
        }

        /* Tombol cari di samping search */
        .search-side-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            padding: 0 2rem;
            border: none;
            border-radius: var(--radius-md);
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            font-family: 'Inter', sans-serif;
            background: var(--gradient);
            color: var(--light);
            box-shadow: 0 4px 12px rgba(0, 200, 83, 0.2);
            height: 54px;
            white-space: nowrap;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .search-side-btn::before {
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

        .search-side-btn:hover::before {
            left: 100%;
        }

        .search-side-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 200, 83, 0.4);
        }

        /* Baris utama filter: Kategori, Rentang Harga, Sortir */
        .filter-row-main {
            display: grid;
            grid-template-columns: 1.5fr 2fr 2fr;
            gap: 1.5rem;
            margin-bottom: 2rem;
            align-items: end;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .filter-label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.95rem;
            color: var(--dark);
            font-weight: 600;
            white-space: nowrap;
        }

        .filter-label i {
            color: var(--primary);
            font-size: 0.9rem;
            width: 16px;
        }

        .filter-input,
        .filter-select {
            padding: 0.8rem 1rem;
            border: 2px solid var(--gray-200);
            border-radius: var(--radius-md);
            background: var(--light);
            color: var(--dark);
            font-size: 0.95rem;
            transition: var(--transition);
            font-family: 'Inter', sans-serif;
            width: 100%;
            height: 48px;
        }

        .filter-input:focus,
        .filter-select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(0, 200, 83, 0.1);
        }

        /* Tombol aksi */
        .filter-actions {
            display: flex;
            justify-content: flex-start;
            gap: 1.5rem;
            margin-top: 0.5rem;
        }

        .filter-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            padding: 1rem 3rem;
            border: none;
            border-radius: var(--radius-md);
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            font-family: 'Inter', sans-serif;
            min-width: 180px;
            position: relative;
            overflow: hidden;
            z-index: 1;
            height: 54px;
        }
.filter-btn :hover{
    color: #fff;
}
        .search-btn {
            background: var(--gradient);
            color: var(--light);
            box-shadow: 0 4px 12px rgba(0, 200, 83, 0.2);
        }

        .search-btn::before {
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

        .search-btn:hover::before {
            left: 100%;
        }

        .search-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 200, 83, 0.4);
        }

        .reset-btn {
            background: var(--light);
            color: var(--gray-600);
            border: 2px solid var(--gray-200);
        }

        .reset-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 200, 83, 0.1), transparent);
            transition: left 0.7s ease;
            z-index: -1;
        }

        .reset-btn:hover::before {
            left: 100%;
        }

        .reset-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-color: var(--primary);
        }

        /* ===== PRODUCTS GRID ===== */
        .products-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 2rem;
            margin: 2.5rem 0;
        }

        .tool-card {
            background: white;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid var(--gray-200);
            display: flex;
            flex-direction: column;
            position: relative;
                min-height: 650px; /* Tinggi minimum konsisten */
                 height: 100%;
        }

        .tool-card:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .tool-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--gradient);
        }

        .tool-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            padding: 0.375rem 0.875rem;
            border-radius: 1rem;
            font-size: 0.75rem;
            font-weight: 700;
            z-index: 2;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 0.375rem;
            text-transform: uppercase;
            background: var(--gradient-recommended);
            color: white;
        }

        .tool-img {
            height: 200px;
            position: relative;
            overflow: hidden;
        }

        .tool-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .tool-card:hover .tool-img img {
            transform: scale(1.1);
        }

        .tool-content {
            padding: 1.5rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .tool-header {
            margin-bottom: 1rem;
        }

        .tool-category {
            display: inline-flex;
            align-items: center;
            gap: 0.375rem;
            font-size: 0.75rem;
            color: var(--gray-500);
            padding: 0.2rem 0.5rem;
            background: var(--gray-100);
            border-radius: 0.5rem;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .tool-category i {
            font-size: 0.7rem;
            color: var(--primary);
        }

        .tool-title-row {
            display: flex;
            align-items: baseline;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 0.5rem;
            flex-wrap: wrap;
        }

        .tool-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
            margin: 0;
            flex: 1;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
                min-height: 3.6rem; /* Tinggi untuk 2 baris */
        }

        .tool-price-inline {
            display: flex;
            align-items: baseline;
            gap: 0.25rem;
            padding: 0.25rem 0.75rem;
            border-radius: var(--radius-full);
            white-space: nowrap;
        }

        .tool-price-inline .price-number {
            font-size: 1.7rem;
            font-weight: 800;
            color: var(--primary);
            line-height: 1;
        }

        .tool-price-inline .price-unit {
            font-size: 0.9rem;
            color: var(--gray-500);
            font-weight: 500;
        }

        .tool-stock {
            margin-bottom: 1rem;
            margin-top: 1rem;
        }

        .stock-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.6rem 0.75rem;
            background: var(--gray-50);
            border-radius: 0.75rem;
            border: 1px solid var(--gray-200);
        }

        .stock-text {
            font-size: 1rem;
            color: #000;
            flex: 1;
        }

        .stock-text strong {
            color: var(--dark);
            font-weight: 700;
        }

        .stock-status {
            display: flex;
            align-items: center;
            gap: 0.375rem;
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.2rem 0.5rem;
            border-radius: 1rem;
        }

        .stock-status.available {
            background: rgba(16, 185, 129, 0.1);
            color: var(--primary);
        }

        .stock-status.limited {
            background: rgba(245, 158, 11, 0.1);
            color: #f59e0b;
        }

        .stock-status.out {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
        }

        .stock-status.available .stock-dot,
        .stock-status.limited .stock-dot,
        .stock-status.out .stock-dot {
            display: none;
        }

        .tool-description {
            color: var(--gray-600);
            line-height: 1.5;
            margin-bottom: 1rem;
            font-size: 0.875rem;
               min-height: 3rem; /* Tinggi untuk 3 baris */
                   display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
        }

        .tool-specs {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .spec {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.75rem;
            color: var(--gray-600);
            background: var(--gray-100);
            padding: 0.5rem;
            border-radius: 0.5rem;
        }

        .spec i {
            color: var(--primary);
            font-size: 0.7rem;
        }

        .tool-actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.75rem;
            margin-top: 0.5rem;
        }



        .btn-rent,
        .btn-detail {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.7rem 0.5rem;
            border-radius: 0.75rem;
            font-weight: 600;
            font-size: 0.85rem;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            z-index: 1;
            border: none;
            cursor: pointer;
            font-family: 'Inter', sans-serif;
        }

        .btn-rent {
            background: var(--gradient);
            color: var(--light);
            box-shadow: 0 4px 12px rgba(0, 200, 83, 0.2);
        }

        .btn-rent::before {
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

        .btn-rent:hover::before {
            left: 100%;
        }

        .btn-rent:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 200, 83, 0.4);
        }

        .btn-detail {
            background: var(--light);
            color: var(--dark);
            border: 2px solid var(--gray-300);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .btn-detail i {
            color: var(--primary);
            font-size: 0.8rem;
            transition: transform 0.3s ease;
        }

        .btn-detail::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 200, 83, 0.1), transparent);
            transition: left 0.7s ease;
            z-index: -1;
        }

        .btn-detail:hover::before {
            left: 100%;
        }

        .btn-detail:hover {
            border-color: var(--primary);
            background: rgba(0, 200, 83, 0.05);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 200, 83, 0.15);
        }

        .btn-detail:hover i {
            transform: translateX(3px);
        }

        /* ===== PAGINATION - Warna SAMA DENGAN BUTTON CARI ===== */
        .pagination-modern {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
            margin: 4rem 0 2rem;
            flex-wrap: wrap;
            list-style: none;
            padding: 0;
        }

        .pagination-modern li {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .pagination-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background: transparent;
            font-size: 0.95rem;
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
            color: var(--gray-600);
        }

        .pagination-link:hover {
            background: var(--gradient);
            color: white;
            box-shadow: 0 4px 12px rgba(0, 200, 83, 0.3);
            transform: translateY(-2px);
        }

        .pagination-link.active {
            background: var(--gradient);
            color: white;
            box-shadow: 0 4px 12px rgba(0, 200, 83, 0.3);
        }

        .pagination-link.icon {
            background: var(--gray-100);
        }

        /* ===== FOOTER ===== */
        .footer {
            background: var(--light);
            color: var(--dark);
            padding: 4rem 0 2rem;
            border-top: 1px solid var(--gray-200);
            margin-top: 4rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 1.5fr repeat(3, 1fr);
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 1rem;
            font-size: 1.5rem;
            font-weight: 900;
            margin-bottom: 1rem;
        }

        .footer-logo-icon {
            width: 40px;
            height: 40px;
            background: var(--gradient);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--light);
        }

        .footer-heading {
            font-size: 1.125rem;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .footer-heading::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 30px;
            height: 3px;
            background: var(--gradient);
            border-radius: 2px;
        }

        .footer-links a {
            color: var(--gray-700);
            text-decoration: none;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9375rem;
            margin-bottom: 0.875rem;
        }

        .footer-links a:hover {
            color: var(--dark);
            padding-left: 5px;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid var(--gray-300);
            color: var(--gray-600);
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 992px) {
            .filter-row-main {
                grid-template-columns: 1fr 1fr;
                gap: 1rem;
            }

            .filter-actions {
                gap: 1rem;
            }

            .filter-btn {
                padding: 0.9rem 2rem;
                min-width: 160px;
            }

            .search-wrapper-row {
                flex-wrap: wrap;
            }

            .search-side-btn {
                width: 100%;
            }
        }

        @media (max-width: 768px) {
            .shop-header-modern {
                flex-direction: column;
                align-items: flex-start;
            }

            .filter-row-main {
                grid-template-columns: 1fr;
            }

            .filter-actions {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
                width: 100%;
            }

            .filter-btn {
                width: 100%;
                padding: 1rem;
            }

            .products-container {
                grid-template-columns: 1fr;
            }

            .tool-actions {
                grid-template-columns: 1fr;
            }

            .footer-content {
                grid-template-columns: 1fr;
            }
        }


        .else{
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Ganti class .else dengan ini */
.empty-state-container {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 400px; /* Beri tinggi minimum */
    width: 100%;
    grid-column: 1 / -1; /* Memenuhi seluruh grid column */
}

.empty-state {
    text-align: center;
    padding: 3rem;
    background: var(--light);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-md);
    max-width: 500px;
    width: 100%;
}

.empty-state i {
    font-size: 4rem;
    color: var(--gray-400);
    margin-bottom: 1.5rem;
}

.empty-state h3 {
    color: var(--dark);
    margin-bottom: 0.5rem;
    font-size: 1.5rem;
}

.empty-state p {
    color: var(--gray-600);
    margin-bottom: 1.5rem;
}

.empty-state .btn-reset {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 2rem;
    background: var(--gradient);
    color: white;
    border-radius: var(--radius-md);
    text-decoration: none;
    font-weight: 600;
    transition: var(--transition);
}

.empty-state .btn-reset:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0, 200, 83, 0.3);
}
    </style>

    <!-- BREADCRUMB -->
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-content">
                <a href="/" class="breadcrumb-link"><i class="fas fa-home"></i> Beranda</a>
                <i class="fas fa-chevron-right"></i>
                <span class="breadcrumb-current">Semua Alat</span>
            </div>
        </div>
    </div>

    <!-- PRODUCTS SECTION -->
    <section class="products-section">
        <div class="container">
            <!-- Section Header -->
            <div class="section-header">
                <h2 class="section-title">Semua <span class="text-gradient">Alat</span> Tersedia</h2>
                <p>Temukan alat pertukangan berkualitas untuk semua kebutuhan proyek Anda</p>
            </div>

            <!-- Shop Header -->
            <div class="shop-header-modern">
                <p class="total-products">
                    Kami menemukan <span>{{ $tools->count() }}</span> alat untuk Anda!
                </p>
            </div>

            <!-- Filter Section - Search standalone + filter lainnya -->
            <div class="shop-filter-modern">
                <div class="filter-header">
                    <h2 class="filter-title">Filter & Urutkan Alat</h2>
                </div>
{{-- ini --}}
                <form action="{{ route('halaman-list-alat') }}" method="GET" class="filter-modern-form" id="filterForm">
                    <!-- SEARCH STANDALONE dengan icon, tombol silang, dan tombol cari di samping -->
                    <div class="filter-search-standalone">
                        <div class="filter-group">
                            <label for="search-input" class="filter-label">
                                <i class="fas fa-search"></i> Cari Alat
                            </label>
                            <div class="search-wrapper-row">
                                <div class="search-wrapper">
                                    <i class="fas fa-search search-icon"></i>
                                    <input type="text" name="keyword" id="search-input" class="search-input" value="{{ request('keyword') }}"
                                        placeholder="Cari nama alat, contoh: bor, gerinda...">
                                    <button type="button" id="clearSearchBtn" class="clear-search {{ request('keyword') ? '' : 'hidden' }}"
                                        aria-label="Hapus pencarian">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                <button type="submit" class="search-side-btn" id="sideSearchBtn">
                                    <i class="fas fa-search"></i> Cari
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- BARIS UTAMA: KATEGORI + HARGA + SORT -->
                    <div class="filter-row-main">
                        <!-- KATEGORI -->
                        <div class="filter-group">
                            <label for="category-select" class="filter-label">
                                <i class="fas fa-tags"></i> Kategori
                            </label>
                  <!-- KATEGORI - Ubah name="category" menjadi name="kategori" -->
<select name="kategori" id="category-select" class="filter-select">
    <option value="all" {{ request('kategori') == 'all' ? 'selected' : '' }}>Semua Kategori</option>
    @foreach ($kategories as $kategori)
        <option value="{{ $kategori->id }}"
            {{ request('kategori') == $kategori->id ? 'selected' : '' }}>
            {{ $kategori->name }}
        </option>
    @endforeach
</select>
                        </div>

                        <!-- RENTANG HARGA -->
                        <div class="filter-group">
                            <label class="filter-label">
                                <i class="fas fa-dollar-sign"></i> Rentang Harga
                            </label>
                       <!-- RENTANG HARGA - Ubah name="price_range" menjadi name="price" -->
<select name="price" id="price-range" class="filter-select">
    <option value="all" {{ request('price') == 'all' ? 'selected' : '' }}>Semua Harga</option>
    <option value="0-50000" {{ request('price') == '0-50000' ? 'selected' : '' }}>Rp 0 - 50.000</option>
    <option value="50000-100000" {{ request('price') == '50000-100000' ? 'selected' : '' }}>Rp 50.000 - 100.000</option>
    <option value="100000-200000" {{ request('price') == '100000-200000' ? 'selected' : '' }}>Rp 100.000 - 200.000</option>
    <option value="200000-9999999" {{ request('price') == '200000-9999999' ? 'selected' : '' }}>&gt; Rp 200.000</option>
</select>
                        </div>

                        <!-- URUTKAN -->
                        <div class="filter-group">
                            <label class="filter-label">
                                <i class="fas fa-arrow-up-wide-short"></i> Urutkan
                            </label>
                            <select name="sort" id="sort-select" class="filter-select">
                                <option value="default" {{ request('sort') == 'default' ? 'selected' : '' }}>Default</option>
                                <option value="price-low" {{ request('sort') == 'price-low' ? 'selected' : '' }}>Harga: Rendah → Tinggi</option>
                                <option value="price-high" {{ request('sort') == 'price-high' ? 'selected' : '' }}>Harga: Tinggi → Rendah</option>
                                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Terbaru</option>
                                <option value="old" {{ request('sort') == 'old' ? 'selected' : '' }}>Terlama</option>
                            </select>
                        </div>
                    </div>

                    <!-- TOMBOL AKSI -->
                    <div class="filter-actions">
                        <button type="submit" class="search-side-btn" id="applyFilterBtn">
                            <i class="fas fa-search"></i> Terapkan Filter
                        </button>
                        <a href="{{ route('halaman-list-alat') }}" class="filter-btn reset-btn" id="resetBtn">
                            <i class="fas fa-rotate-left"></i> Reset Filter
                        </a>
                    </div>
                </form>
            </div>

            <!-- Products Grid -->
            <div class="products-container" id="productsContainer">
                @forelse ($tools as $tool)
                    <!-- Tool Card -->
                    <div class="tool-card" data-category="{{ $tool->kategori->id ?? 'unknown' }}" data-price="{{ $tool->price * 1000 }}" data-rating="4.8">
                        <div class="tool-badge"><i class="fas fa-star"></i> {{ $tool->kategori->name ?? 'Alat' }}</div>
                        <div class="tool-img">
                            <img src="{{ $tool->image ? asset('storage/' . $tool->image) : 'https://via.placeholder.com/400x300?text=No+Image' }}"
                                alt="{{ $tool->name }}">
                        </div>
                        <div class="tool-content">
                            <div class="tool-title-row">
                                <h3 class="tool-title">{{ $tool->name }}</h3>
                                <div class="tool-price-inline">
                                    <span class="price-number">Rp {{ number_format($tool->price) }}k</span>
                                    <span class="price-unit">/hari</span>
                                </div>
                            </div>

                            <div class="tool-stock">
                                <div class="stock-info">
                                    <i class="fas fa-box"></i>
                                    <span class="stock-text">
                                        Stok: <strong>{{ $tool->stock }}</strong>
                                    </span>
                                    @if ($tool->stock > 5)
                                        <span class="stock-status available">Tersedia</span>
                                    @elseif ($tool->stock > 0)
                                        <span class="stock-status limited">Terbatas</span>
                                    @else
                                        <span class="stock-status out">Habis</span>
                                    @endif
                                </div>
                            </div>

                            <p class="tool-description">
                                {{ \Illuminate\Support\Str::limit($tool->description, 100, '...') }}
                            </p>

                            <div class="tool-specs">
                                @forelse (collect($tool->features ?? [])->take(4) as $feature)
                                    <div class="spec">
                                        <i class="fas fa-check-circle"></i>
                                        <span>{{ $feature }}</span>
                                    </div>
                                @empty
                                    <div class="spec">
                                        <i class="fas fa-wrench"></i>
                                        <span>Alat berkualitas</span>
                                    </div>
                                    <div class="spec">
                                        <i class="fas fa-shield-alt"></i>
                                        <span>Garansi tersedia</span>
                                    </div>
                                    <div class="spec">
                                        <i class="fas fa-clock"></i>
                                        <span>Sewa harian</span>
                                    </div>
                                    <div class="spec">
                                        <i class="fas fa-check"></i>
                                        <span>Kondisi baik</span>
                                    </div>
                                @endforelse
                            </div>

                            <div class="tool-actions">
                                {{-- ini --}}
                                <a href="{{ route('orders.create', $tool->id) }}" class="btn-rent"><i class="fas fa-shopping-cart"></i> PINJAM</a>

<a href="{{ route('halaman-detail-alat', $tool->id) }}" class="btn-detail">
    <i class="fas fa-eye" style="color: #000;"></i> DETAIL
</a>
  </div>
                        </div>
                    </div>
         @empty
    <div class="empty-state-container">
        <div class="empty-state">
            <i class="fas fa-tools"></i>
            <h3>Tidak Ada Alat Ditemukan</h3>
            <p>Maaf, tidak ada alat yang sesuai dengan kriteria pencarian Anda.</p>

             <p>Silahkan Reset filter</p>

        </div>
    </div>
                @endforelse
            </div>

            <!-- Pagination -->

@if ($tools->hasPages())
<ul class="pagination-modern">

    {{-- PREVIOUS --}}
    @if ($tools->onFirstPage())
        <li>
            <span class="pagination-link icon">
                <i class="fas fa-chevron-left"></i>
            </span>
        </li>
    @else
        <li>
            <a href="{{ $tools->previousPageUrl() }}" class="pagination-link icon">
                <i class="fas fa-chevron-left"></i>
            </a>
        </li>
    @endif


    {{-- PAGE NUMBER --}}
    @foreach ($tools->getUrlRange(1, $tools->lastPage()) as $page => $url)
        <li>
            <a href="{{ $url }}"
               class="pagination-link {{ $tools->currentPage() == $page ? 'active' : '' }}">
                {{ $page }}
            </a>
        </li>
    @endforeach


    {{-- NEXT --}}
    @if ($tools->hasMorePages())
        <li>
            <a href="{{ $tools->nextPageUrl() }}" class="pagination-link icon">
                <i class="fas fa-chevron-right"></i>
            </a>
        </li>
    @else
        <li>
            <span class="pagination-link icon">
                <i class="fas fa-chevron-right"></i>
            </span>
        </li>
    @endif

</ul>
@endif

        </div>
    </section>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search-input');
            const clearBtn = document.getElementById('clearSearchBtn');

            // Tampilkan/sembunyikan tombol clear berdasarkan input search
            function toggleClearButton() {
                if (searchInput.value.trim() !== '') {
                    clearBtn.classList.remove('hidden');
                } else {
                    clearBtn.classList.add('hidden');
                }
            }

            // Clear search
            if (clearBtn) {
                clearBtn.addEventListener('click', function() {
                    searchInput.value = '';
                    toggleClearButton();
                    searchInput.focus();
                    document.getElementById('filterForm').submit();
                });
            }

            if (searchInput) {
                searchInput.addEventListener('input', toggleClearButton);
            }

            // Inisialisasi
            toggleClearButton();
        });
    </script>
@endsection
