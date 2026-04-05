@extends('admin. index')
@section('title', 'List Data')

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

            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.08);

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
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header Styles */
        .header-section {
            background: var(--white);
            border-radius: var(--radius-xl);
            padding: 30px;
            margin-bottom: 24px;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border-color);
        }

        .header-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--primary-dark);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .header-subtitle {
            color: var(--text-secondary);
            font-size: 1rem;
            line-height: 1.6;
            max-width: 700px;
        }

        /* Stats Cards */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 24px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-color);
            transition: all var(--transition-normal);
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }

        .stat-card-total {
            border-left: 4px solid var(--primary-color);
        }

        .stat-card-available {
            border-left: 4px solid rgb(24, 97, 181);
        }

        .stat-card-maintenance {
            border-left: 4px solid var(--warning-color);
        }

        .stat-card-broken {
            border-left: 4px solid var(--danger-color);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
        }

        .stat-card-total .stat-icon {
            background: var(--primary-light);
            color: var(--primary-color);
        }

        .stat-card-available .stat-icon {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success-color);
        }

        .stat-card-maintenance .stat-icon {
            background: rgba(245, 158, 11, 0.1);
            color: var(--warning-color);
        }

        .stat-card-broken .stat-icon {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger-color);
        }

        .stat-info {
            flex: 1;
        }

        .stat-value {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 4px;
            color: var(--text-primary);
        }

        .stat-label {
            color: var(--text-secondary);
            font-size: 0.9rem;
            font-weight: 500;
        }

        /* Action Bar */
        .action-bar {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 20px 24px;
            margin-bottom: 24px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .search-wrapper {
            flex: 1;
            min-width: 300px;
            position: relative;
        }

        .search-box {
            position: relative;
            display: flex;
            align-items: center;
            gap: 10px;
            width: 100%;
        }

        .search-input {
            flex: 1;
            padding: 12px 16px 12px 44px;
            border: 2px solid var(--border-color);
            border-radius: var(--radius-md);
            background: var(--white);
            color: var(--text-primary);
            font-size: 0.95rem;
            transition: all var(--transition-normal);
            font-family: 'Inter', sans-serif;
            min-width: 250px;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.15);
        }

        .search-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
            font-size: 1rem;
            z-index: 2;
        }

        .search-btn {
            padding: 17px 20px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            border: none;
            border-radius: var(--radius-md);
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all var(--transition-normal);
            font-family: 'Inter', sans-serif;
            white-space: nowrap;
        }

        .search-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 16px rgba(16, 185, 129, 0.2);
        }

        .clear-btn {
            padding: 8px;
            background: var(--light-bg);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-sm);
            color: var(--text-secondary);
            cursor: pointer;
            transition: all var(--transition-fast);
        }

        .clear-btn:hover {
            background: var(--danger-color);
            color: white;
            border-color: var(--danger-color);
        }

        .action-buttons {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        /* Button Styles */
        .btn {
            padding: 15px 25px;
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
            white-space: nowrap;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            position: relative;
            overflow: hidden;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(16, 185, 129, 0.2);
        }

        .btn-secondary {
            background: var(--white);
            color: var(--text-primary);
            border: 2px solid var(--border-color);
            text-decoration: none;
            display: inline-flex;
        }

        .btn-secondary:hover {
            background: var(--light-bg);
            border-color: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        /* Filter Container */
        .filter-container {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 24px;
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow-md);
            margin-bottom: 24px;
        }

        .filter-title {
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 1.1rem;
        }

        .filter-title i {
            color: var(--primary-color);
        }

        .filter-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
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
            gap: 12px;
            margin-top: 10px;
            flex-wrap: wrap;
        }

        /* Table Container */
        .table-container {
            background: var(--white);
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border-color);
            margin-bottom: 30px;
        }

        .table-header {
            padding: 20px 24px;
            border-bottom: 1px solid var(--border-color);
            background: var(--light-bg);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .table-header h3 {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .table-header h3 i {
            color: var(--primary-color);
            font-size: 1.1rem;
        }

        .export-btn {
            background: var(--white);
            border: 1px solid var(--border-color);
            color: var(--text-primary);
            padding: 10px 20px;
            border-radius: var(--radius-md);
            font-size: 0.9rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all var(--transition-fast);
            cursor: pointer;
            text-decoration: none;
        }

        .export-btn:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
            transform: translateY(-1px);
        }

        .table-responsive {
            overflow-x: auto;
        }

        .tools-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1000px;
        }

        .tools-table th {
            padding: 16px 20px;
            text-align: left;
            font-weight: 600;
            color: var(--text-primary);
            border-bottom: 2px solid var(--border-color);
            background: var(--light-bg);
            font-size: 0.9rem;
            white-space: nowrap;
        }

        .tools-table th i {
            margin-right: 8px;
            color: var(--primary-color);
        }

        .tools-table td {
            padding: 16px 20px;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-primary);
            vertical-align: middle;
            font-size: 0.9rem;
        }

        .tools-table tbody tr {
            transition: background-color var(--transition-fast);
        }

        .tools-table tbody tr:hover {
            background-color: rgba(16, 185, 129, 0.03);
        }

        .tools-table tbody tr:last-child td {
            border-bottom: none;
        }

        /* Product Image with ID */
        .product-id-with-image {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .product-image-container {
            width: 50px;
            height: 50px;
            border-radius: 8px;
            overflow: hidden;
            border: 2px solid var(--border-color);
            background: var(--light-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .tools-table tbody tr:hover .product-image-container {
            border-color: var(--primary-color);
        }

        .product-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-id-info {
            flex: 1;
            min-width: 0;
        }

        .product-name {
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 4px;
            font-size: 0.95rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .product-code {
            font-size: 0.8rem;
            color: var(--text-secondary);
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .product-code i {
            color: var(--primary-color);
            font-size: 0.8rem;
        }

        /* Category Badge */
        .category-badge {
            padding: 6px 12px;
            border-radius: 16px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            white-space: nowrap;
        }

        .category-power {
            background: rgba(16, 185, 129, 0.12);
            color: var(--success-color);
            border: 1px solid rgba(16, 185, 129, 0.2);
        }

        .category-hand {
            background: rgba(59, 130, 246, 0.12);
            color: var(--secondary-color);
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        .category-measuring {
            background: rgba(168, 85, 247, 0.12);
            color: #8B5CF6;
            border: 1px solid rgba(168, 85, 247, 0.2);
        }

        .category-safety {
            background: rgba(239, 68, 68, 0.12);
            color: var(--danger-color);
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        /* Price */
        .product-price {
            font-weight: 700;
            color: var(--primary-color);
            font-size: 1rem;
            white-space: nowrap;
        }



      /* Condition-style badge untuk stok */
.stock-badge {
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

/* Warna dinamis seperti condition badge tapi untuk stok */
.stock-in {
    background: rgba(16, 185, 129, 0.12);
    color: var(--success-color);
}

.stock-low {
    background: rgba(245, 158, 11, 0.12);
    color: var(--warning-color);
}

.stock-out {
    background: rgba(239, 68, 68, 0.12);
    color: var(--danger-color);
}




        /* Features */
        .product-features {
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            font-size: 0.85rem;
            color: var(--text-secondary);
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .action-btn {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--border-color);
            background: var(--white);
            color: var(--text-secondary);
            transition: all var(--transition-fast);
            cursor: pointer;
            font-size: 0.9rem;
            text-decoration: none;
        }

        .action-btn:hover {
            transform: translateY(-1px);
            box-shadow: var(--shadow-sm);
        }

        .btn-view:hover {
            color: #3B82F6;
            border-color: #3B82F6;
            background: rgba(59, 130, 246, 0.1);
        }

        .btn-edit:hover {
            color: var(--primary-color);
            border-color: var(--primary-color);
            background: var(--primary-light);
        }

        .btn-delete:hover {
            color: #EF4444;
            border-color: #EF4444;
            background: rgba(239, 68, 68, 0.1);
        }

        /* Pagination */
        .pagination-container {
            padding: 20px 24px;
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            background: var(--light-bg);
        }

        .pagination-info {
            font-size: 0.85rem;
            color: var(--text-secondary);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .pagination-info i {
            color: var(--primary-color);
            font-size: 0.9rem;
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
            width: 36px;
            height: 36px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            background: var(--white);
            color: var(--text-primary);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.85rem;
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

        /* Footer */
        .footer-section {
            text-align: center;
            padding: 20px;
            color: var(--text-secondary);
            font-size: 0.85rem;
            margin-top: 30px;
        }

        .footer-section p {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .footer-section i {
            color: var(--primary-color);
        }

        /* CSS KONFIRMASI PASSWORD */
        .swal-popup {
            background-color: #ffffff;
            border-radius: 15px;
            padding: 2rem;
            font-family: 'Poppins', sans-serif;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25);
            text-align: center;
        }

        .swal-btn-delete {
            background: #ff3b3b;
            color: white !important;
            border-radius: 10px;
            padding: 0.6rem 1.6rem;
            font-weight: 700;
            border: none;
            box-shadow: 0 4px 12px rgba(255, 59, 59, 0.5);
            transition: transform 0.2s, box-shadow 0.2s;
            margin: 0 8px;
        }

        .swal-btn-delete:hover {
            transform: scale(1.08);
            box-shadow: 0 6px 16px rgba(255, 59, 59, 0.7);
        }

        .swal-btn-cancel {
            background: #2ed573;
            color: white !important;
            border-radius: 10px;
            padding: 0.6rem 1.6rem;
            font-weight: 700;
            border: none;
            box-shadow: 0 4px 12px rgba(46, 213, 115, 0.5);
            transition: transform 0.2s, box-shadow 0.2s;
            margin: 0 8px;
        }

        .swal-btn-cancel:hover {
            transform: scale(1.08);
            box-shadow: 0 6px 16px rgba(46, 213, 115, 0.7);
        }

        .swal-footer {
            display: flex !important;
            justify-content: center;
            gap: 16px;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .container-main {
                padding: 15px;
            }

            .filter-row {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .header-title {
                font-size: 1.5rem;
            }

            .header-section {
                padding: 20px;
            }

            .stats-container {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }

            .stat-card {
                padding: 20px;
            }

            .stat-icon {
                width: 45px;
                height: 45px;
                font-size: 1.2rem;
            }

            .stat-value {
                font-size: 1.5rem;
            }

            .action-bar {
                padding: 16px;
                flex-direction: column;
                align-items: stretch;
            }

            .search-wrapper {
                min-width: 100%;
            }

            .search-box {
                flex-direction: column;
                gap: 10px;
            }

            .search-input {
                min-width: 100%;
            }

            .search-btn {
                width: 100%;
                justify-content: center;
            }

            .action-buttons {
                width: 100%;
                justify-content: center;
            }

            .filter-container {
                padding: 20px;
            }

            .filter-row {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .filter-actions {
                flex-direction: column;
            }

            .filter-actions .btn {
                width: 100%;
                justify-content: center;
            }

            .table-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .tools-table th,
            .tools-table td {
                padding: 12px 16px;
            }

            .product-id-with-image {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }

            .product-image-container {
                width: 45px;
                height: 45px;
            }
        }

        @media (max-width: 576px) {
            .stats-container {
                grid-template-columns: 1fr;
            }

            .stat-card {
                flex-direction: column;
                text-align: center;
                gap: 12px;
            }

            .stat-icon {
                width: 40px;
                height: 40px;
                font-size: 1.1rem;
            }

            .stat-value {
                font-size: 1.3rem;
            }

            .table-header {
                padding: 16px;
            }

            .action-buttons {
                flex-wrap: wrap;
                justify-content: center;
            }

            .action-btn {
                width: 32px;
                height: 32px;
                font-size: 0.8rem;
            }

            .pagination-container {
                flex-direction: column;
                text-align: center;
                gap: 12px;
            }

            .pagination {
                flex-wrap: wrap;
                justify-content: center;
            }



        }



        /* tambahan */
.empty-state {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center; /* vertikal center */
    margin-left: 30rem;
}

/* CSS KONFIRMASI PASWAORD */
       /* Popup putih */
.swal-popup {
   background-color: #ffffff;
   border-radius: 15px;
   padding: 2rem;
   font-family: 'Poppins', sans-serif;
   box-shadow: 0 10px 25px rgba(0,0,0,0.25);
   text-align: center;
}


/* Tombol Hapus - Merah */
.swal-btn-delete {
   background: #ff3b3b;
   color: white !important;
   border-radius: 10px;
   padding: 0.6rem 1.6rem;
   font-weight: 700;
   border: none;
   box-shadow: 0 4px 12px rgba(255,59,59,0.5);
   transition: transform 0.2s, box-shadow 0.2s;
   margin: 0 8px; /* jarak kanan-kiri */
}


.swal-btn-delete:hover {
   transform: scale(1.08);
   box-shadow: 0 6px 16px rgba(255,59,59,0.7);
}


/* Tombol Batal - Hijau */
.swal-btn-cancel {
   background: #2ed573;
   color: white !important;
   border-radius: 10px;
   padding: 0.6rem 1.6rem;
   font-weight: 700;
   border: none;
   box-shadow: 0 4px 12px rgba(46,213,115,0.5);
   transition: transform 0.2s, box-shadow 0.2s;
   margin: 0 8px; /* jarak kanan-kiri */
}


.swal-btn-cancel:hover {
   transform: scale(1.08);
   box-shadow: 0 6px 16px rgba(46,213,115,0.7);
}


/* Optional: buat tombol lebih rapi saat responsive */
.swal-footer {
   display: flex !important;
   justify-content: center;
   gap: 16px; /* jarak antar tombol */
}


/* END CSS KONFIRMASI PASWAORD */

/* tombol clear (X SEARCH) */
.clear-btn-1{
   position: absolute;
   right: 110px;            /* sebelum tombol Cari */
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
}


.clear-btn-1:hover {
   color: red;
}
/* END tombol clear (X SEARCH) */


    </style>

    <main class="main-content" id="mainContent">
        <div class="container-main">
            <!-- Header -->
            <header class="header-section">
                <div class="header-content">
                    <h1 class="header-title">
                        <i class="fas fa-tools"></i>
                        Manajemen Alat Pertukangan
                    </h1>
                    <p class="header-subtitle">
                        Kelola dan pantau semua alat pertukangan yang tersedia di sistem. Pantau stok, kondisi, dan status
                        alat dengan mudah.
                    </p>
                </div>
            </header>

            <!-- Stats Cards -->
            <div class="stats-container">
                <div class="stat-card stat-card-total">
                    <div class="stat-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <div class="stat-info">
                        <h3 class="stat-value">{{ $totalAlat }}</h3>
                        <p class="stat-label">Total Alat</p>
                    </div>
                </div>
                <div class="stat-card stat-card-available">
                    <div class="stat-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-info">
                        <h3 class="stat-value">{{ $alatTersedia }}</h3>
                        <p class="stat-label">Tersedia</p>
                    </div>
                </div>
                <div class="stat-card stat-card-maintenance">
                    <div class="stat-icon">
                        <i class="fas fa-wrench"></i>
                    </div>
                    <div class="stat-info">
                        <h3 class="stat-value">{{ $stokMenipis }}</h3>
                        <p class="stat-label">Stok Menipis</p>
                    </div>
                </div>
                <div class="stat-card stat-card-broken">
                    <div class="stat-icon">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div class="stat-info">
                        <h3 class="stat-value">{{ $stokHabis }}</h3>
                        <p class="stat-label">Stok Habis</p>
                    </div>
                </div>
            </div>

            <!-- Action Bar -->
            <div class="action-bar">
                <div class="search-wrapper">
                    <form action="{{ route('admin.alat.list') }}" method="GET" class="search-box">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text"
                               name="keyword"
                               class="search-input"
                               placeholder="Cari alat berdasarkan nama,kode,atau harga..."
                               value="{{ request('keyword') }}">
                        <button class="search-btn" type="submit">
                            <i class="fas fa-search"></i>
                            Cari
                        </button>
                    </form>
                    {{-- untuk merest search --}}
    @if (request()->keyword)
        <a href="{{ route('admin.alat.list') }}" class="clear-btn-1">
            <i class="bi bi-x-lg"></i>
        </a>
    @endif
                </div>
                <div class="action-buttons">
                    <a href="{{ route('admin.alat.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i>
                        Tambah Alat
                    </a>
                </div>
            </div>
                        <!-- END Action Bar -->


        <form method="GET" action="{{ route('admin.alat.list') }}">
    <div class="filter-container">
        <div class="filter-title">
            <i class="fas fa-filter"></i>
            Filter Alat Pertukangan
        </div>

        <div class="filter-row">

            {{-- FILTER KATEGORI --}}
            <div class="filter-group">
                <label class="filter-label">Kategori Alat</label>
                <select class="filter-select" name="kategory" id="categoryFilter">
                    <option value="">Semua Kategori</option>
                    @foreach ($kategories as $kategori)
                        <option value="{{ $kategori->id }}"
                            {{ request('kategory') == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- FILTER STOK --}}
            <div class="filter-group">
                <label class="filter-label">Status Stok</label>
                <select class="filter-select" name="stock" id="stockFilter">
                    <option value="">Semua Status</option>
                    <option value="in-stock" {{ request('stock') == 'in-stock' ? 'selected' : '' }}>
                        Tersedia
                    </option>
                    <option value="low-stock" {{ request('stock') == 'low-stock' ? 'selected' : '' }}>
                        Stok Menipis
                    </option>
                    <option value="out-of-stock" {{ request('stock') == 'out-of-stock' ? 'selected' : '' }}>
                        Habis Stok
                    </option>
                </select>
            </div>

            {{-- SORT --}}
            <div class="filter-group">
                <label class="filter-label">Urutkan</label>
                <select class="filter-select" name="sort" id="sortFilter">
                    <option value="">Default</option>
                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>
                        Harga Terendah
                    </option>
                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>
                        Harga Tertinggi
                    </option>
                    <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>
                        Nama A-Z
                    </option>
                    <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>
                        Nama Z-A
                    </option>
                    <option value="date_new" {{ request('sort') == 'date_new' ? 'selected' : '' }}>
                        Terbaru
                    </option>
                    <option value="date_old" {{ request('sort') == 'date_old' ? 'selected' : '' }}>
                        Terlama
                    </option>
                </select>
            </div>

        </div>

        <div class="filter-actions">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-check"></i>
                Terapkan Filter
            </button>

            <a href="{{ route('admin.alat.list') }}" class="btn btn-secondary">
                <i class="fas fa-times"></i>
                Hapus Filter
            </a>
        </div>
    </div>
</form>


            <!-- Tools Table -->
            <div class="table-container">
                <div class="table-header">
                    <h3>
                        <i class="fas fa-list-check"></i>
                        Daftar Alat Pertukangan

                    </h3>

                </div>

                <div class="table-responsive">
                    <table class="tools-table">
                        <thead>
                            <tr>
                                <th width="250">
                                    <i class="fas fa-box"></i> Alat & Gambar
                                </th>
                                <th width="150">
                                    <i class="fas fa-tag"></i> Kategori
                                </th>
                                <th width="100">
                                    <i class="fas fa-dollar-sign"></i> Harga
                                </th>
                                <th width="120">
                                    <i class="fas fa-boxes"></i> Stok
                                </th>
                                <th width="200">
                                    <i class="fas fa-star"></i> Fitur
                                </th>
                                <th width="120">
                                    <i class="fas fa-cog"></i> Aksi
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($tools as $tool)
                                <tr>
                                    <!-- PRODUK -->
                                    <td>
                                        <div class="product-id-with-image">
                                            <div class="product-image-container">
                                                <img src="{{ asset('storage/' . $tool->image) }}"
                                                    alt="{{ $tool->name }}" class="product-image">
                                            </div>
                                            <div class="product-id-info">
                                                <div class="product-name">{{ $tool->name }}</div>
                                                <div class="product-code">
                                                    <i class="fas fa-barcode"></i>
                                                    {{ $tool->code }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- KATEGORI -->
                                    <td>
                                        <span class="category-badge category-power">
                                            {{ $tool->kategori->name ?? '-' }}
                                        </span>
                                    </td>

                                    <!-- HARGA -->
                                    <td>
                                        <div class="product-price">
                                            Rp {{ number_format($tool->price, 0, ',', '.') }}
                                        </div>
                                    </td>




{{-- stok dan badge --}}
                 <td>
                    {{-- kondisi nya --}}
  @php
    if ($tool->stock == 0) {
        $stockClass = 'stock-out';
        $stockText  = 'Habis';
    } elseif ($tool->stock < 5) {
        $stockClass = 'stock-low';
        $stockText  = 'Menipis';
    } else {
        $stockClass = 'stock-in';
        $stockText  = 'Tersedia';
    }
@endphp

<span class="stock-badge {{ $stockClass }}">
    <i class="fas fa-box"></i>
    {{ $stockText }} ({{ $tool->stock }})
</span>

</td>

                                    <!-- FITUR -->
                                    <td>
                                        @if (!empty($tool->features) && is_array($tool->features))
                                            @php
                                                $limitedFeatures = array_slice($tool->features, 0, 2);
                                            @endphp
                                            <div class="product-features">
                                                {{ implode(', ', $limitedFeatures) }}
                                                @if(count($tool->features) > 2)
                                                    <span style="">...</span>
                                                @endif
                                            </div>
                                        @else
                                            <span style="color: var(--text-secondary); font-size: 0.85rem;">-</span>
                                        @endif
                                    </td>

                                    <!-- AKSI -->
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('admin.alat.detail', $tool->id) }}"
                                               class="action-btn btn-view"
                                               title="Lihat Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            <a href="{{ route('admin.alat.edit', $tool->id) }}"
                                               class="action-btn btn-edit"
                                               title="Edit Alat">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <form action="{{ route('hapus.alat', $tool->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirmDelete(event, '{{ $tool->name }}')"
                                                  style="display: inline-block; margin: 0; padding: 0;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="action-btn btn-delete" title="Hapus Alat">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                  {{-- kalau data kosong --}}
        <tr>
            <td colspan="4" class="text-center py-4">
                <div class="empty-state">
                    <i class="bi bi-search" style="font-size: 32px; color: #9ca3af;"></i>
                    <p class="mt-2 mb-0 text-muted">
                        Data kategori tidak ditemukan
                    </p>
                </div>
            </td>
        </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if ($tools->hasPages())
                    <div class="pagination-container">
                        <div class="pagination-info">
                            <i class="fas fa-info-circle"></i>
                            Menampilkan {{ $tools->firstItem() }} - {{ $tools->lastItem() }}
                            dari {{ $tools->total() }} data
                        </div>
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <!-- PREVIOUS -->
                                <li class="page-item {{ $tools->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $tools->previousPageUrl() }}" aria-label="Previous">
                                        <i class="fas fa-chevron-left"></i>
                                    </a>
                                </li>

                                <!-- PAGE NUMBERS -->
                                @foreach ($tools->getUrlRange(1, $tools->lastPage()) as $page => $url)
                                    <li class="page-item {{ $tools->currentPage() == $page ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $url }}">
                                            {{ $page }}
                                        </a>
                                    </li>
                                @endforeach

                                <!-- NEXT -->
                                <li class="page-item {{ $tools->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $tools->nextPageUrl() }}" aria-label="Next">
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

    <script>
    

        // Filter functionality
        document.getElementById('applyFilter').addEventListener('click', function() {
            const category = document.getElementById('categoryFilter').value;
            const stock = document.getElementById('stockFilter').value;
            const sort = document.getElementById('sortFilter').value;

            // Build URL with filter parameters
            let url = new URL(window.location.href);

            if (category) url.searchParams.set('category', category);
            else url.searchParams.delete('category');

            if (stock) url.searchParams.set('stock', stock);
            else url.searchParams.delete('stock');

            if (sort) url.searchParams.set('sort', sort);
            else url.searchParams.delete('sort');

            window.location.href = url.toString();
        });

        document.getElementById('clearFilters').addEventListener('click', function() {
            let url = new URL(window.location.href);
            url.searchParams.delete('category');
            url.searchParams.delete('stock');
            url.searchParams.delete('sort');
            url.searchParams.delete('keyword');
            window.location.href = url.toString();
        });

        // Set select values from URL parameters
        window.addEventListener('load', function() {
            const urlParams = new URLSearchParams(window.location.search);

            const category = urlParams.get('category');
            if (category) document.getElementById('categoryFilter').value = category;

            const stock = urlParams.get('stock');
            if (stock) document.getElementById('stockFilter').value = stock;

            const sort = urlParams.get('sort');
            if (sort) document.getElementById('sortFilter').value = sort;
        });
    </script>

@endsection
