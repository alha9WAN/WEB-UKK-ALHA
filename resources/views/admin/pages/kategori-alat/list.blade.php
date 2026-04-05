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


           .dark-mode {
            /* Dark Theme */
            --bg-primary: var(--gray-900);
            --bg-secondary: var(--gray-800);
            --bg-tertiary: var(--gray-700);
            --bg-card: var(--gray-800);
            --bg-gradient: linear-gradient(135deg, var(--gray-900) 0%, var(--gray-800) 100%);

            --text-primary: var(--gray-50);
            --text-secondary: var(--gray-200);
            --text-tertiary: var(--gray-300);
            --text-muted: var(--gray-400);

            --border-light: var(--gray-700);
            --border-medium: var(--gray-600);
            --border-dark: var(--gray-500);

            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px 2px rgba(0, 0, 0, 0.2);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.3), 0 2px 4px -1px rgba(0, 0, 0, 0.2);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.3), 0 4px 6px -2px rgba(0, 0, 0, 0.2);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.3), 0 10px 10px -5px rgba(0, 0, 0, 0.2);
            --shadow-primary: 0 10px 30px -5px rgba(16, 185, 129, 0.3);
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
    width: 150%;
    max-width: 1500px; /* atau 1600px */
    margin: 0 auto;
    padding: 30px;
    display: flex;
}
        /* Sembunyikan semua halaman kecuali yang aktif */
        .container-main:not(.active-page) {
            display: none;
        }

        .active-page {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
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

        /* Navigation Tabs */
        .nav-tabs {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .nav-tab {
            padding: 15px 30px;
            background: var(--white);
            border: 2px solid var(--border-color);
            border-radius: var(--radius-lg);
            font-weight: 600;
            color: var(--text-secondary);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all var(--transition-normal);
            cursor: pointer;
        }

        .nav-tab:hover {
            background: var(--primary-light);
            border-color: var(--primary-color);
            color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .nav-tab.active {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            border-color: var(--primary-color);
        }

        .nav-tab i {
            font-size: 1.1rem;
        }

        /* Stats Cards */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 30px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-color);
            transition: transform var(--transition-normal),
                        box-shadow var(--transition-normal);
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

        .stat-card-active {
            border-left: 4px solid var(--success-color);
        }

        .stat-card-products {
            border-left: 4px solid var(--secondary-color);
        }

        .stat-card-new {
            border-left: 4px solid var(--info-color);
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

        .stat-card-active .stat-icon {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success-color);
        }

        .stat-card-products .stat-icon {
            background: rgba(59, 130, 246, 0.1);
            color: var(--secondary-color);
        }

        .stat-card-new .stat-icon {
            background: rgba(6, 182, 212, 0.1);
            color: var(--info-color);
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

        /* Action Bar */
        .action-bar {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 25px 30px;
            margin-bottom: 30px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .search-wrapper {
            flex: 1;
            max-width: 1500px;
            position: relative;
        }

        .search-box {
            position: relative;
            display: flex;
            gap: 10px;
        }

        .search-input {
            flex: 1;
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

        /* Tombol Search yang Benar */
        .search-btn {
            padding: 14px 24px;
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
        }

        .search-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(16, 185, 129, 0.2);
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        /* Button Styles */
        .btn {
            padding: 14px 28px;
            border-radius: var(--radius-md);
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all var(--transition-normal);
            display: flex;
            align-items: center;
            gap: 10px;
            border: none;
            font-family: 'Inter', sans-serif;
            text-decoration: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            position: relative;
            overflow: hidden;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(16, 185, 129, 0.2);
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
        /* end Action Bar */

        /* Category Table */
        .table-container {
            background: var(--white);
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border-color);
            margin-bottom: 40px;
        }

        .table-header {
            padding: 25px 30px;
            border-bottom: 1px solid var(--border-color);
            background: linear-gradient(to right, var(--white), var(--light-bg));
        }

        .table-header h3 {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .table-header h3 i {
            color: var(--primary-color);
            font-size: 1.2rem;
        }

        .table-subtitle {
            color: var(--text-secondary);
            font-size: 0.9rem;
            margin-top: 5px;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .category-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1000px;
        }

        .category-table th {
            padding: 20px;
            text-align: left;
            font-weight: 600;
            color: var(--text-primary);
            border-bottom: 2px solid var(--border-color);
            background: var(--light-bg);
            font-size: 0.9rem;
            white-space: nowrap;
        }

        .category-table th i {
            margin-right: 8px;
            color: var(--primary-color);
        }

        .category-table td {
            padding: 20px;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-primary);
            vertical-align: middle;
            font-size: 0.95rem;
        }

        .category-table tbody tr {
            transition: background-color var(--transition-fast);
        }

        .category-table tbody tr:hover {
            background-color: rgba(16, 185, 129, 0.03);
        }

        .category-table tbody tr:last-child td {
            border-bottom: none;
        }

        /* Category Info Cell */
        .category-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .category-image {
            width: 70px;
            height: 70px;
            border-radius: var(--radius-md);
            overflow: hidden;
            border: 2px solid var(--border-color);
            background: var(--light-bg);
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all var(--transition-normal);
        }

        .category-table tbody tr:hover .category-image {
            border-color: var(--primary-color);
            transform: scale(1.05);
        }

        .category-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .category-image i {
            font-size: 1.8rem;
            color: var(--text-secondary);
        }

        .category-details {
            flex: 1;
        }

        .category-name {
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 6px;
            font-size: 1.05rem;
        }

        .category-code {
            font-size: 0.85rem;
            color: var(--text-secondary);
            display: flex;
            align-items: center;
            gap: 6px;
            font-family: 'Courier New', monospace;
        }

        .category-code i {
            color: var(--primary-color);
            font-size: 0.8rem;
        }

        /* Category Description */
        .category-description {
            color: var(--text-secondary);
            line-height: 1.5;
            max-width: 400px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Status Badge */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .status-active {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success-color);
        }

        .status-inactive {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger-color);
        }

        .status-badge i {
            font-size: 0.7rem;
        }

        /* Product Count */
        .product-count {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            background: rgba(59, 130, 246, 0.1);
            color: var(--secondary-color);
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .product-count i {
            font-size: 0.8rem;
        }

        /* Action Buttons */
        .action-buttons-cell {
            display: flex;
            gap: 10px;
        }

        .action-btn {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--border-color);
            background: var(--white);
            color: var(--text-secondary);
            transition: all var(--transition-fast);
            cursor: pointer;
            font-size: 1rem;
            text-decoration: none;
        }

        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
        }

        .btn-view:hover {
            color: var(--secondary-color);
            border-color: var(--secondary-color);
            background: rgba(59, 130, 246, 0.1);
        }

        .btn-edit:hover {
            color: var(--primary-color);
            border-color: var(--primary-color);
            background: var(--primary-light);
        }

        .btn-delete:hover {
            color: var(--danger-color);
            border-color: var(--danger-color);
            background: rgba(239, 68, 68, 0.1);
        }

        /* Pagination */
        .pagination-container {
            padding: 30px;
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
            gap: 5px;
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
            width: 42px;
            height: 42px;
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

        /* Footer */
        .footer-section {
            text-align: center;
            padding: 30px;
            color: var(--text-secondary);
            font-size: 0.9rem;
            border-top: 1px solid var(--border-color);
            margin-top: 40px;
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

        /* Form Container */
        .form-container {
            background: var(--white);
            border-radius: var(--radius-xl);
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border-color);
            margin-bottom: 40px;
        }

        .form-header {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            padding: 30px 40px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .form-header::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .form-header h2 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .form-header p {
            position: relative;
            z-index: 1;
            opacity: 0.9;
        }

        .form-content {
            padding: 40px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
            margin-bottom: 40px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: var(--text-primary);
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-label i {
            color: var(--primary-color);
            font-size: 0.9rem;
            width: 20px;
        }

        .required {
            color: #EF4444;
            margin-left: 4px;
        }

        .input-group {
            position: relative;
        }

        .form-input {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid var(--border-color);
            border-radius: var(--radius-md);
            background: var(--white);
            color: var(--text-primary);
            font-size: 0.95rem;
            transition: var(--transition-normal);
            font-family: 'Inter', sans-serif;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.15);
        }

        .form-input.has-icon {
            padding-left: 48px;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
            font-size: 1rem;
        }

        .form-textarea {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid var(--border-color);
            border-radius: var(--radius-md);
            background: var(--white);
            color: var(--text-primary);
            font-size: 0.95rem;
            resize: vertical;
            min-height: 120px;
            transition: var(--transition-normal);
            line-height: 1.5;
            font-family: 'Inter', sans-serif;
        }

        .form-textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.15);
        }

        /* File Upload */
        .file-upload-area {
            border: 2px dashed var(--border-color);
            border-radius: var(--radius-md);
            padding: 40px 20px;
            text-align: center;
            cursor: pointer;
            transition: var(--transition-normal);
            background: var(--light-bg);
            position: relative;
            overflow: hidden;
        }

        .file-upload-area:hover {
            border-color: var(--primary-color);
            background: rgba(16, 185, 129, 0.02);
        }

        .upload-icon {
            font-size: 2.8rem;
            color: var(--primary-color);
            margin-bottom: 16px;
            opacity: 0.8;
        }

        .upload-text {
            color: var(--text-primary);
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 8px;
        }

        .upload-subtext {
            color: var(--text-secondary);
            font-size: 0.9rem;
            margin-bottom: 20px;
        }

        .upload-btn {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: var(--radius-md);
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: var(--transition-normal);
            font-size: 0.95rem;
            font-family: 'Inter', sans-serif;
        }

        .upload-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .file-input {
            display: none;
        }

        /* Image Preview */
        .image-preview-container {
            margin-top: 25px;
        }

        .image-preview {
            position: relative;
            display: inline-block;
            border-radius: var(--radius-md);
            overflow: hidden;
            box-shadow: var(--shadow-md);
        }

        .preview-image {
            width: 160px;
            height: 160px;
            object-fit: cover;
        }

        /* Helper Text */
        .helper-text {
            font-size: 0.85rem;
            color: var(--text-secondary);
            margin-top: 8px;
            display: flex;
            align-items: flex-start;
            gap: 6px;
            line-height: 1.4;
        }

        .helper-text i {
            color: var(--primary-color);
            margin-top: 2px;
            flex-shrink: 0;
        }

        /* Form Actions */
        .form-actions {
            padding: 30px 40px;
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            gap: 20px;
            background: linear-gradient(to right, var(--light-bg), var(--white));
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .container-main {
                padding: 20px;
            }

            .header-section {
                padding: 30px;
            }

            .action-bar {
                flex-direction: column;
                align-items: stretch;
            }

            .search-wrapper {
                max-width: 100%;
            }

            .action-buttons {
                width: 100%;
                justify-content: space-between;
            }
        }

        @media (max-width: 768px) {
            .header-title {
                font-size: 1.8rem;
            }

            .stats-container {
                grid-template-columns: 1fr;
            }

            .nav-tabs {
                flex-direction: column;
            }

            .nav-tab {
                width: 100%;
            }

            .action-buttons {
                flex-direction: column;
                gap: 15px;
            }

            .btn, .search-btn {
                width: 100%;
                justify-content: center;
            }

            .pagination-container {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }

            .category-info {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .category-image {
                width: 56px;
                height: 56px;
            }

            .action-buttons-cell {
                flex-direction: column;
            }

            .action-btn {
                width: 100%;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 25px;
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

            .form-content {
                padding: 25px;
            }

            .form-actions {
                flex-direction: column;
            }
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
.clear-btn {
    position: absolute;
    right: 110px;            /* sebelum tombol Cari */
    top: 55%;
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

.clear-btn:hover {
    color: red;
}
/* END tombol clear (X SEARCH) */


/* forelse nya */
.empty-state {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 6px;
}
/* forelse nya */

    </style>

    <main class="main-content" id="mainContent">

    <!-- Halaman Utama: Daftar Kategori -->
    <div class="container-main active-page" id="list-page">
        <!-- Header -->
        <header class="header-section">
            <div class="header-content">
                <h1 class="header-title">
                    <i class="fas fa-layer-group"></i>
                    Manajemen Kategori Produk
                </h1>
                <p class="header-subtitle">
                    Kelola dan organisasi kategori produk Anda dengan mudah. Tambah, edit, dan hapus kategori sesuai kebutuhan bisnis.
                </p>
            </div>
        </header>

        <!-- Action Bar -->
        <div class="action-bar">
        <div class="search-wrapper">
    <form action="{{ route('admin.kategori.list') }}" method="GET" class="search-box">
        <i class="fas fa-search search-icon"></i>

        <input type="text"
               name="keyword"
               class="search-input"
               placeholder="Cari kategori berdasarkan nama atau kode..."
               value="{{ request('keyword') }}">

        <button class="search-btn" type="submit">
            <i class="fas fa-search"></i>
            Cari
        </button>
    </form>

    {{-- untuk merest search --}}
    @if (request()->keyword)
        <a href="{{ route('admin.kategori.list') }}" class="clear-btn">
            <i class="bi bi-x-lg"></i>
        </a>
    @endif
</div>


     <div class="action-buttons">
    <a href="{{ route('admin.kategori.create') }}" class="btn btn-primary">
        <i class="fas fa-plus-circle"></i>
        Tambah Kategori
    </a>
</div>

        </div>

        <!-- Category Table -->
        <div class="table-container">
            <div class="table-header">
                <h3>
                    <i class="fas fa-list-check"></i>
                    Daftar Kategori Produk
                </h3>
                <p class="table-subtitle">Semua kategori yang terdaftar dalam sistem</p>
            </div>

            <div class="table-responsive">
                <table class="category-table">
                    <thead>
                        <tr>
                            <th width="150">
                                <i class="fas fa-image"></i> Gambar
                            </th>
                            <th width="250">
                                <i class="fas fa-tag"></i> Nama Kategori
                            </th>
                            <th>
                                <i class="fas fa-align-left"></i> Deskripsi
                            </th>
                            <th width="180">
                                <i class="fas fa-cogs"></i> Aksi
                            </th>
                        </tr>
                    </thead>
                    {{-- bagian ini --}}
<tbody>
    @forelse ($data_kategori as $kategori)
        <tr>
            <td>
                <div class="category-info">
                    <div class="category-image">
                        <img
                            src="{{ $kategori->image
                                ? asset('storage/' . $kategori->image)
                                : asset('assets/img/no-image.png') }}"
                            alt="{{ $kategori->name }}">
                    </div>
                </div>
            </td>

            <td>
                <strong>{{ $kategori->name }}</strong>
            </td>

            <td>
                <div class="category-description">
                    {{ $kategori->description }}
                </div>
            </td>

            <td>
                <div class="action-buttons-cell">
                    {{-- <button class="action-btn btn-view" title="Lihat Detail">
                        <i class="fas fa-eye"></i>
                    </button> --}}

                    <a href="{{ route('admin.kategori.edit', $kategori->id) }}"
                       title="Edit Kategori">
                        <button type="button" class="action-btn btn-edit">
                            <i class="fas fa-edit"></i>
                        </button>
                    </a>

                    <form action="/admin/kategori/{{ $kategori->id }}"
                          method="POST"
                          onsubmit="return confirmDelete(event, '{{ $kategori->name }}')">
                        @csrf
                        @method('DELETE')
                        <button class="action-btn btn-delete" title="Delete Kategori">
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

            {{-- bagian ini --}}

                </table>
            </div>

            <!-- Pagination -->

            @if ($data_kategori->hasPages())
            <div class="pagination-container">
                <nav aria-label="Page navigation">
                    <ul class="pagination">

                        {{-- UNTUK KEMBALI  --}}
                          {{-- PREVIOUS --}}
            <li class="page-item {{ $data_kategori->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $data_kategori->previousPageUrl() }}">
                    <i class="fas fa-chevron-left"></i>
                </a>
            </li>

                        {{-- UNTUK NOMOR NYA --}}
                                  {{-- PAGE NUMBERS --}}
            @foreach ($data_kategori->getUrlRange(1, $data_kategori->lastPage()) as $page => $url)
                <li class="page-item {{ $data_kategori->currentPage() == $page ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">
                        {{ $page }}
                    </a>
                </li>
            @endforeach

                      {{-- UNTUK LANJUTAN NYA NYA --}}
                             {{-- NEXT --}}
            <li class="page-item {{ $data_kategori->hasMorePages() ? '' : 'disabled' }}">
                <a class="page-link" href="{{ $data_kategori->nextPageUrl() }}">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </li>
                    </ul>
                </nav>
            </div>
            @endif


            <!-- END Pagination -->




        </div>


    </div>






</main>
@endsection
