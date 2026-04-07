@extends('user.pages.dashboard-user.index')
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
            --primary-lighter: #D1FAE5;
            --primary-soft: #ECFDF5;
            --primary-gradient: linear-gradient(135deg, #10B981 0%, #34D399 100%);
            --primary-gradient-dark: linear-gradient(135deg, #059669 0%, #10B981 100%);
            --danger: #EF4444;
            --danger-dark: #DC2626;
            --danger-light: #FEE2E2;
            --warning: #F59E0B;
            --warning-dark: #D97706;
            --warning-light: #FEF3C7;
            --success: #10B981;
            --success-dark: #059669;
            --success-light: #D1FAE5;
            --blue: #3B82F6;
            --blue-light: #EFF6FF;
            --purple: #8B5CF6;
            --purple-light: #EDE9FE;
            --dark: #111827;
            --gray-900: #1F2937;
            --gray-800: #2D3A4B;
            --gray-700: #374151;
            --gray-600: #4B5563;
            --gray-500: #6B7280;
            --gray-400: #9CA3AF;
            --gray-300: #D1D5DB;
            --gray-200: #E5E7EB;
            --gray-100: #F3F4F6;
            --gray-50: #F9FAFB;
            --white: #FFFFFF;

            --shadow-xs: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
            --shadow-2xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);

            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-xl: 20px;
            --radius-2xl: 24px;
            --radius-3xl: 32px;

            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            background: linear-gradient(135deg, #F9FAFB 0%, #F1F5F9 100%);
            font-family: 'Inter', sans-serif;
            color: var(--gray-900);
            line-height: 1.5;
            min-height: 100vh;
        }

        .container {
            width: 150%;
    max-width: 1500px; /* atau 1600px */
    margin: 0 auto;
    padding: 30px;
        }

        /* ========== HEADER SECTION ========== */
        .header-section {
            background: var(--white);
            border-radius: var(--radius-3xl);
            padding: 32px 40px;
            margin-bottom: 32px;
            box-shadow: var(--shadow-xl);
            border: 1px solid rgba(16, 185, 129, 0.15);
            position: relative;
            overflow: hidden;
        }

        .header-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: var(--primary-gradient);
        }

        .header-section::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(16,185,129,0.03) 0%, transparent 70%);
            border-radius: 50%;
        }

        .profile-card {
            display: flex;
            align-items: center;
            gap: 32px;
            margin-bottom: 28px;
            flex-wrap: wrap;
            position: relative;
            z-index: 1;
        }

        .avatar {
            width: 100px;
            height: 100px;
            background: var(--primary-gradient);
            border-radius: var(--radius-2xl);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: white;
            box-shadow: var(--shadow-lg);
            transition: var(--transition);
        }

        .avatar:hover {
            transform: scale(1.05);
            box-shadow: var(--shadow-xl);
        }

        .user-details h1 {
            font-size: 1.8rem;
            font-weight: 800;
            margin-bottom: 8px;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .user-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--primary-soft);
            padding: 4px 14px;
            border-radius: 100px;
            font-size: 0.7rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 12px;
        }

        .user-contact {
            display: flex;
            gap: 24px;
            flex-wrap: wrap;
        }

        .user-contact span {
            font-size: 0.85rem;
            color: var(--gray-600);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .user-contact i {
            color: var(--primary);
            width: 18px;
        }

        .stats-badge {
            margin-left: auto;
            display: flex;
            gap: 28px;
            background: var(--gray-50);
            padding: 16px 28px;
            border-radius: var(--radius-2xl);
            border: 1px solid var(--gray-200);
            box-shadow: var(--shadow-sm);
        }

        .stats-badge-item {
            text-align: center;
            padding: 0 12px;
        }

        .stats-badge-item .number {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--primary);
            line-height: 1.2;
        }

        .stats-badge-item .label {
            font-size: 0.7rem;
            color: var(--gray-500);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .header-title {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-top: 8px;
        }

        .header-title i {
            width: 48px;
            height: 48px;
            background: var(--primary-soft);
            border-radius: var(--radius-xl);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.2rem;
        }

        .header-title h2 {
            font-size: 1.6rem;
            font-weight: 800;
            letter-spacing: -0.02em;
        }

        /* ========== STATS GRID ========== */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: var(--white);
            border-radius: var(--radius-2xl);
            padding: 22px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--gray-200);
            display: flex;
            align-items: center;
            gap: 18px;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 3px;
            transform: scaleX(0);
            transition: var(--transition);
        }

        .stat-card:hover::before {
            transform: scaleX(1);
        }

        .stat-card:nth-child(1)::before { background: var(--blue); }
        .stat-card:nth-child(2)::before { background: var(--primary); }
        .stat-card:nth-child(3)::before { background: var(--warning); }
        .stat-card:nth-child(4)::before { background: var(--danger); }

        .stat-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-xl);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: var(--radius-xl);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
        }

        .stat-card:nth-child(1) .stat-icon { background: var(--blue-light); color: var(--blue); }
        .stat-card:nth-child(2) .stat-icon { background: var(--primary-soft); color: var(--primary); }
        .stat-card:nth-child(3) .stat-icon { background: var(--warning-light); color: var(--warning); }
        .stat-card:nth-child(4) .stat-icon { background: var(--danger-light); color: var(--danger); }

        .stat-info .value {
            font-size: 2rem;
            font-weight: 800;
            line-height: 1.2;
        }

        .stat-info .label {
            font-size: 0.8rem;
            color: var(--gray-500);
            font-weight: 500;
            margin-top: 4px;
        }

        /* ========== FILTER BAR ========== */
        .filter-bar {
            background: var(--white);
            border-radius: var(--radius-2xl);
            padding: 20px 28px;
            margin-bottom: 28px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--gray-200);
        }

        .filter-group {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--gray-200);
        }

        .filter-btn {
            padding: 10px 24px;
            background: var(--gray-100);
            border: none;
            border-radius: 60px;
            font-weight: 600;
            font-size: 0.85rem;
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--gray-600);
            text-decoration: none;
        }

        .filter-btn:hover {
            background: var(--primary-soft);
            color: var(--primary);
            transform: translateY(-2px);
        }

        .filter-btn.active {
            background: var(--primary-gradient);
            color: white;
            box-shadow: var(--shadow-md);
        }

        /* Search Section */
        .search-section {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .search-wrapper {
            flex: 1;
            position: relative;
            min-width: 280px;
        }

        .search-input {
            width: 100%;
            padding: 12px 20px 12px 48px;
            border: 2px solid var(--gray-200);
            border-radius: 60px;
            font-size: 0.9rem;
            transition: var(--transition);
            background: var(--gray-50);
        }

        .search-input:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 4px rgba(16,185,129,0.1);
            background: var(--white);
        }

        .search-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-400);
            font-size: 1rem;
        }

        .search-btn {
            padding: 12px 28px;
            background: var(--primary-gradient);
            border: none;
            border-radius: 60px;
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: white;
            font-size: 0.85rem;
            white-space: nowrap;
            box-shadow: var(--shadow-sm);
        }

        .search-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .reset-btn {
            padding: 12px 24px;
            background: var(--gray-100);
            border: 2px solid var(--gray-200);
            border-radius: 60px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--gray-600);
            font-size: 0.85rem;
            white-space: nowrap;
        }

        .reset-btn:hover {
            background: var(--gray-200);
            border-color: var(--gray-300);
            transform: translateY(-2px);
        }

        /* ========== RENTALS GRID ========== */
        .rentals-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(420px, 1fr));
            gap: 28px;
            margin-bottom: 40px;
        }

        /* Rental Card Premium */
        .rental-card {
            background: var(--white);
            border-radius: var(--radius-2xl);
            overflow: hidden;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--gray-200);
            transition: var(--transition);
            position: relative;
        }

        .rental-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-2xl);
            border-color: var(--primary-light);
        }

        .card-badge {
            position: absolute;
            top: 16px;
            right: 16px;
            padding: 6px 14px;
            border-radius: 60px;
            font-size: 0.7rem;
            font-weight: 700;
            z-index: 10;
            backdrop-filter: blur(8px);
            box-shadow: var(--shadow-sm);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .badge-approved {
            background: linear-gradient(135deg, var(--success), var(--success-dark));
            color: white;
        }

        .badge-pending {
            background: linear-gradient(135deg, var(--warning), var(--warning-dark));
            color: white;
        }

        .badge-rejected {
            background: linear-gradient(135deg, var(--danger), var(--danger-dark));
            color: white;
        }

        .product-image {
            height: 220px;
            position: relative;
            overflow: hidden;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .rental-card:hover .product-image img {
            transform: scale(1.08);
        }

        .product-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 16px;
            background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
        }

        .product-category {
            background: rgba(255,255,255,0.2);
            backdrop-filter: blur(8px);
            padding: 6px 14px;
            border-radius: 60px;
            font-size: 0.7rem;
            color: white;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-weight: 600;
        }

        .card-content {
            padding: 24px;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }

        .rental-id {
            font-size: 0.75rem;
            color: var(--primary);
            font-weight: 700;
            background: var(--primary-soft);
            padding: 4px 12px;
            border-radius: 60px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .deposit {
            font-weight: 800;
            color: var(--primary);
            font-size: 1.1rem;
        }

        .tool-name {
            font-size: 1.2rem;
            font-weight: 800;
            margin-bottom: 8px;
            color: var(--gray-900);
        }

        .borrower {
            font-size: 0.8rem;
            color: var(--gray-500);
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 16px;
        }

        .date-info {
            background: var(--gray-50);
            border-radius: var(--radius-lg);
            padding: 14px;
            margin: 16px 0;
        }

        .date-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 0.85rem;
        }

        .date-row:last-child {
            margin-bottom: 0;
        }

        .date-label {
            color: var(--gray-500);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .date-value {
            font-weight: 600;
            color: var(--gray-800);
        }

        .status-chip {
            padding: 12px;
            border-radius: var(--radius-lg);
            text-align: center;
            font-weight: 700;
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin: 16px 0;
        }

        .status-active {
            background: var(--success-light);
            color: var(--success-dark);
        }

        .status-warning {
            background: var(--warning-light);
            color: var(--warning-dark);
        }

        .status-completed {
            background: var(--gray-100);
            color: var(--gray-600);
        }

        .status-danger {
            background: var(--danger-light);
            color: var(--danger-dark);
        }

        .notes {
            background: var(--gray-50);
            padding: 12px 14px;
            border-radius: var(--radius-lg);
            font-size: 0.8rem;
            color: var(--gray-600);
            border-left: 3px solid var(--primary);
            margin: 12px 0;
            display: flex;
            align-items: flex-start;
            gap: 8px;
        }

        .notes i {
            color: var(--primary);
            margin-top: 2px;
        }

        .card-actions {
            display: flex;
            gap: 12px;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid var(--gray-200);
        }

        .btn-outline {
            flex: 1;
            padding: 12px;
            background: var(--white);
            border: 2px solid var(--gray-200);
            border-radius: var(--radius-lg);
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            color: var(--gray-600);
            font-size: 0.85rem;
            transition: var(--transition);
            text-decoration: none;
        }

        .btn-outline:hover {
            border-color: var(--primary);
            color: var(--primary);
            background: var(--primary-soft);
            transform: translateY(-2px);
        }

        .btn-primary {
            flex: 1;
            padding: 12px;
            background: var(--primary-gradient);
            border: none;
            border-radius: var(--radius-lg);
            font-weight: 700;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            color: white;
            font-size: 0.85rem;
            transition: var(--transition);
            text-decoration: none;
            box-shadow: var(--shadow-sm);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-disabled {
            flex: 1;
            padding: 12px;
            background: var(--gray-100);
            border: none;
            border-radius: var(--radius-lg);
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            color: var(--gray-400);
            font-size: 0.85rem;
            cursor: not-allowed;
        }

        /* PAGINATION STYLES - MURNI HTML/CSS */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            margin: 32px 0 20px;
        }

        .pagination a, .pagination .page-active {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 44px;
            height: 44px;
            padding: 0 16px;
            background: var(--white);
            border: 1px solid var(--gray-200);
            border-radius: 60px;
            font-weight: 600;
            font-size: 0.9rem;
            color: var(--gray-700);
            text-decoration: none;
            transition: var(--transition);
            gap: 6px;
        }

        .pagination a:hover {
            background: var(--primary-soft);
            border-color: var(--primary-light);
            color: var(--primary);
            transform: translateY(-2px);
        }

        .pagination .page-active {
            background: var(--primary-gradient);
            color: white;
            border-color: transparent;
            box-shadow: var(--shadow-md);
            cursor: default;
        }

        .pagination .disabled-page {
            opacity: 0.5;
            cursor: not-allowed;
            pointer-events: none;
            background: var(--gray-100);
        }

        /* Page visibility - Halaman 1 */
        .page-1 .page-hide-1 { display: none; }
        .page-2 .page-hide-2 { display: none; }

        /* Sembunyikan card berdasarkan halaman */
        .page-1 .card-page-2,
        .page-2 .card-page-1 {
            display: none;
        }

        /* Footer Premium */
        .footer {
            text-align: center;
            padding: 32px;
            color: var(--gray-500);
            border-top: 1px solid var(--gray-200);
            background: var(--white);
            border-radius: var(--radius-2xl);
            margin-top: 40px;
            box-shadow: var(--shadow-sm);
        }

        .footer p:first-child {
            font-weight: 500;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .rental-card {
            animation: fadeInUp 0.5s ease-out;
            animation-fill-mode: both;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .profile-card {
                flex-direction: column;
                text-align: center;
            }

            .stats-badge {
                margin-left: 0;
                width: 100%;
                justify-content: center;
            }

            .user-contact {
                justify-content: center;
            }
        }

        @media (max-width: 768px) {
            .container {
                padding: 16px;
            }

            .header-section {
                padding: 24px;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 12px;
            }

            .rentals-grid {
                grid-template-columns: 1fr;
            }

            .filter-group {
                justify-content: center;
            }

            .search-section {
                flex-direction: column;
                align-items: stretch;
            }

            .search-wrapper {
                width: 100%;
            }

            .search-btn, .reset-btn {
                width: 100%;
                justify-content: center;
            }

            .stat-card {
                padding: 16px;
            }

            .stat-icon {
                width: 50px;
                height: 50px;
                font-size: 1.3rem;
            }

            .stat-info .value {
                font-size: 1.6rem;
            }

            .avatar {
                width: 80px;
                height: 80px;
                font-size: 2rem;
            }

            .user-details h1 {
                font-size: 1.4rem;
            }

            .pagination a, .pagination .page-active {
                min-width: 38px;
                height: 38px;
                padding: 0 12px;
                font-size: 0.8rem;
            }
        }

        /* ========== PAGINATION STYLES ========== */
.pagination-wrap {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
    margin: 32px 0 20px;
    background: var(--white);
    padding: 16px 24px;
    border-radius: var(--radius-2xl);
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--gray-200);
}

.pagination-wrap > div:first-child {
    font-size: 0.85rem;
    color: var(--gray-600);
    display: flex;
    align-items: center;
    gap: 8px;
}

.pagination-list {
    display: flex;
    align-items: center;
    gap: 8px;
    list-style: none;
    margin: 0;
    padding: 0;
}

.pagination-list .page-item {
    display: inline-flex;
}

.pagination-list .page-item a {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 40px;
    height: 40px;
    padding: 0 12px;
    background: var(--gray-50);
    border: 1px solid var(--gray-200);
    border-radius: var(--radius-lg);
    font-weight: 600;
    font-size: 0.85rem;
    color: var(--gray-700);
    text-decoration: none;
    transition: var(--transition);
    gap: 6px;
}

.pagination-list .page-item a:hover {
    background: var(--primary-soft);
    border-color: var(--primary-light);
    color: var(--primary);
    transform: translateY(-2px);
}

.pagination-list .page-item.active a {
    background: var(--primary-gradient);
    color: white;
    border-color: transparent;
    box-shadow: var(--shadow-md);
    cursor: default;
    pointer-events: none;
}

.pagination-list .page-item.disabled a {
    opacity: 0.5;
    cursor: not-allowed;
    pointer-events: none;
    background: var(--gray-100);
}

/* Responsive Pagination */
@media (max-width: 768px) {
    .pagination-wrap {
        flex-direction: column;
        justify-content: center;
        text-align: center;
        padding: 16px;
    }

    .pagination-list .page-item a {
        min-width: 36px;
        height: 36px;
        padding: 0 10px;
        font-size: 0.75rem;
    }
}

/* Empty State Styles */
/* Empty State Wrapper - untuk center di grid */
.rentals-grid:has(.empty-state-wrapper) {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 500px;
}

.empty-state-wrapper {
    width: 70%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.empty-state {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    background: linear-gradient(135deg, #f8f9fa, #ffffff);
    border-radius: 24px;
    border: 2px dashed #dee2e6;
    min-width: 320px;
    transition: all 0.3s ease;
}

.empty-state i {
    font-size: 30px;
    color: #9ca3af;
    margin-bottom: 16px;
    transition: all 0.3s ease;
}

.empty-state p {
    font-size: 16px;
    color: #6b7280;
    margin: 0;
    font-weight: 500;
}

.empty-state:hover {
    border-color: #10b981;
    transform: translateY(-4px);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08);
}

.empty-state:hover i {
    color: #10b981;
    transform: scale(1.05);
}

.empty-state:hover p {
    color: #374151;
}
    </style>
<main class="main-content" id="mainContent">
<div class="container">


    <!-- Header Section Premium -->
    <div class="header-section">
        <div class="profile-card">
            <div class="avatar">
                <i class="fas fa-user-astronaut"></i>
            </div>
            <div class="user-details">
                <h1>{{ auth()->user()->name }}</h1>
                <div class="user-badge">
                    <i class="fas fa-crown"></i> Member Premium
                </div>
                <div class="user-contact">
                    <span><i class="fas fa-envelope"></i> {{ auth()->user()->email }}</span>
                    <span><i class="fas fa-phone"></i> {{ auth()->user()->phone ?? '-' }}</span>
                    <span><i class="fas fa-id-card"></i>  {{ auth()->user()->nik ?? '-' }}</span>
                </div>
            </div>
        </div>
        <div class="header-title">
            <i class="fas fa-history"></i>
            <h2>Riwayat Peminjaman Alat</h2>
        </div>
    </div>

    <!-- Stats Cards Premium -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-tools"></i></div>
            <div class="stat-info">
                <div class="value">{{ $stats['total'] }}</div>
                <div class="label">Total Peminjaman</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-clock"></i></div>
            <div class="stat-info">
                <div class="value">{{ $stats['approved'] }}</div>
                <div class="label">Sedang Dipinjam</div>
            </div>
        </div>
             <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-clock"></i></div>
            <div class="stat-info">
                <div class="value">{{ $stats['pending'] }}</div>
                <div class="label">Di Menunggu Persetujuan</div>
            </div>
        </div>

             <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-clock"></i></div>
            <div class="stat-info">
                <div class="value">{{ $stats['rejected'] }}</div>
                <div class="label">Di Tolak</div>
            </div>
        </div>

    </div>

    <!-- Filter Bar Premium -->
    <div class="filter-bar">
        <div class="filter-group">
            {{-- FILTER BAGIAN ORDER --}}
            <a href="#" class="filter-btn active"><i class="fas fa-list"></i> Semua</a>
            <a href="#" class="filter-btn"><i class="fas fa-check-circle"></i> Disetujui</a>
            <a href="#" class="filter-btn"><i class="fas fa-hourglass-half"></i> Menunggu</a>
            <a href="#" class="filter-btn"><i class="fas fa-times-circle"></i> Ditolak</a>
        {{-- FILTER BAGIAN RENTAL --}}
  <a href="#" class="filter-btn"><i class="fas fa-check-circle"></i> Aktif</a>
            <a href="#" class="filter-btn"><i class="fas fa-hourglass-half"></i> Terlambat</a>
            <a href="#" class="filter-btn"><i class="fas fa-times-circle"></i> Selesai</a>
        </div>
        <div class="search-section">
            <div class="search-wrapper">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="search-input" placeholder="Cari alat atau ID peminjaman...">
            </div>
            <button class="search-btn"><i class="fas fa-search"></i> Cari</button>
            <button class="reset-btn"><i class="fas fa-times"></i> Reset</button>
        </div>
    </div>

    <!-- Rentals Grid - Card Premium (6 CARD ASLI, dibagi 2 halaman: halaman1 = 3 card, halaman2 = 3 card) -->
    <div class="rentals-grid" style="display: flex;">
        @forelse($rentals as $rental)
        <!-- CARD 1 - Halaman 1 -->

        <div class="rental-card card-page-1">

   {{-- BADGE ORDER STATUS --}}
    @php
        $orderStatus = $rental->order->status ?? '-';
    @endphp

    <div class="card-badge
        @if($orderStatus == 'approved') badge-approved
        @elseif($orderStatus == 'pending') badge-pending
        @elseif($orderStatus == 'rejected') badge-rejected
        @endif
    ">
        <i class="fas fa-circle"></i> {{ strtoupper($orderStatus) }}
    </div>

    <div class="product-image">
                <img src="{{ $rental->order->details->tool->image ?? 'https://via.placeholder.com/500' }}" alt="Bor Listrik">
                <div class="product-overlay"><span class="product-category"><i class="fas fa-tag"></i> Power Tools</span></div>
            </div>
            <div class="card-content">
                <div class="card-header"><span class="rental-id"><i class="fas fa-barcode"></i> PNJ-2024-001</span><span class="deposit">Rp 500.000</span></div>
                <h3 class="tool-name">Bor Listrik Makita 14mm</h3>
                <div class="borrower"><i class="fas fa-user"></i> Budi Santoso</div>
                <div class="date-info">
                    <div class="date-row"><span class="date-label"><i class="fas fa-calendar-plus"></i> Tanggal Pinjam</span><span class="date-value">10 Maret 2024</span></div>
                    <div class="date-row"><span class="date-label"><i class="fas fa-calendar-check"></i> Tanggal Kembali</span><span class="date-value">17 Maret 2024</span></div>
                </div>
                <div class="status-chip status-active"><i class="fas fa-check-circle"></i> AKTIF • Tersisa 4 hari</div>
                <div class="notes"><i class="fas fa-sticky-note"></i> Renovasi rumah lantai 2 - pengeboran dinding</div>
                <div class="card-actions"><a href="#" class="btn-outline"><i class="fas fa-eye"></i> Detail</a><a href="#" class="btn-primary" onclick="return confirm('Kembalikan alat?')"><i class="fas fa-undo-alt"></i> Kembalikan</a></div>
            </div>
        </div>
   @empty
    <div class="empty-state-wrapper">
        <div class="empty-state">
            <i class="fas fa-search"></i>
            <p>Data peminjaman tidak ditemukan</p>
        </div>
    </div>
@endforelse



    </div>

    <div class="pagination-wrap">
            <div><i class="fas fa-info-circle" style="color:var(--primary);"></i> Menampilkan 1-5 dari 24 data</div>
            <ul class="pagination-list">
                <li class="page-item disabled"><a href="#"><i class="fas fa-chevron-left"></i></a></li>
                <li class="page-item active"><a href="#">1</a></li>
                <li class="page-item"><a href="#">2</a></li>
                <li class="page-item"><a href="#">3</a></li>
                <li class="page-item"><a href="#">4</a></li>
                <li class="page-item"><a href="#">5</a></li>
                <li class="page-item"><a href="#"><i class="fas fa-chevron-right"></i></a></li>
            </ul>
        </div>


</main>


@endsection
