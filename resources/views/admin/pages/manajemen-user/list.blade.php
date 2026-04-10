
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
            width: 110%;
            max-width: 1500px;
            margin: 0 auto;
            padding: 30px;
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

        /* Action Bar - Search and Add User in Same Row */
        .action-bar {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 25px 30px;
            margin-bottom: 25px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .search-box {
            display: flex;
            gap: 12px;
            flex: 1;
        }

        .search-wrapper {
            flex: 1;
            position: relative;
        }

        .search-input {
            width: 100%;
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

        .search-btn {
            padding: 14px 28px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            border: none;
            border-radius: var(--radius-md);
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all var(--transition-normal);
            white-space: nowrap;
        }

        .search-btn:hover {
            /* background: linear-gradient(135deg, var(--primary-dark), var(--primary-color)); */
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(16, 185, 129, 0.2);
        }

        .add-user-btn {
            padding: 14px 28px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            border: none;
            border-radius: var(--radius-md);
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all var(--transition-normal);
            white-space: nowrap;
            text-decoration: none;
        }

        .add-user-btn:hover {
            /* background: linear-gradient(135deg, var(--primary-dark), var(--primary-color)); */
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(16, 185, 129, 0.2);
        }

        /* Stats Cards */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 30px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-color);
            transition: all var(--transition-normal);
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

        .stat-card-admin {
            border-left: 4px solid var(--danger-color);
        }

        .stat-card-petugas {
            border-left: 4px solid var(--secondary-color);
        }

        .stat-card-user {
            border-left: 4px solid var(--success-color);
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

        .stat-card-admin .stat-icon {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger-color);
        }

        .stat-card-petugas .stat-icon {
            background: rgba(59, 130, 246, 0.1);
            color: var(--secondary-color);
        }

        .stat-card-user .stat-icon {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success-color);
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

        /* Filter Section */
        .filter-section {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 30px;
            margin-bottom: 25px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-color);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .section-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .section-title i {
            color: var(--primary-color);
        }

        .filter-container {
            background: var(--light-bg);
            border-radius: var(--radius-md);
            padding: 25px;
            border: 1px solid var(--border-color);
        }

        .filter-title {
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1rem;
        }

        .filter-title i {
            color: var(--primary-color);
        }

        .filter-row {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
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
            gap: 10px;
            margin-top: 20px;
        }

        /* Button Styles */
        .btn {
            padding: 12px 24px;
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
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-color));
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(16, 185, 129, 0.2);
        }

        .btn-secondary {
            background: var(--white);
            color: var(--text-primary);
            border: 2px solid var(--border-color);
        }

        .btn-secondary:hover {
            background: var(--light-bg);
            border-color: var(--primary-color);
        }

        /* Data Section */
        .data-section {
            background: var(--white);
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border-color);
            margin-bottom: 40px;
        }

        .section-header {
            padding: 25px 30px;
            border-bottom: 1px solid var(--border-color);
            background: linear-gradient(to right, var(--white), var(--light-bg));
        }

        .table-subtitle {
            color: var(--text-secondary);
            font-size: 0.9rem;
            margin-top: 5px;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .user-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1000px;
        }

        .user-table th {
            padding: 18px 20px;
            text-align: left;
            font-weight: 600;
            color: var(--text-primary);
            border-bottom: 2px solid var(--border-color);
            background: var(--light-bg);
            font-size: 0.9rem;
            white-space: nowrap;
        }

        .user-table th i {
            margin-right: 8px;
            color: var(--primary-color);
        }

        .user-table td {
            padding: 18px 20px;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-primary);
            vertical-align: middle;
            font-size: 0.95rem;
        }

        .user-table tbody tr {
            transition: background-color var(--transition-fast);
        }

        .user-table tbody tr:hover {
            background-color: rgba(16, 185, 129, 0.03);
        }

        .user-table tbody tr:last-child td {
            border-bottom: none;
        }

        /* Profile Cell */
        .user-profile {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .profile-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            flex-shrink: 0;
            position: relative;
        }

        .profile-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-default {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 18px;
        }

        .online-status {
            position: absolute;
            bottom: 2px;
            right: 2px;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            border: 2px solid var(--white);
        }

        .online {
            background-color: var(--success-color);
        }

        .offline {
            background-color: var(--text-secondary);
        }

      .profile-info {
    display: flex;
    flex-direction: column;
    gap: 2px;
}


        .profile-name {
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 2px;
            font-size: 1rem;
        }

        .profile-email {
            font-size: 0.85rem;
            color: var(--text-secondary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: normal;
    line-height: 1.2;
        }

        /* Level Badge */
        .level-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            white-space: nowrap;
        }

        /* UNTUK WARNA SESAUAI LEVEL */
        .level-admin {
            background: rgba(239, 68, 68, 0.1);
            color: #EF4444;
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        .level-petugas {
            background: rgba(59, 130, 246, 0.1);
            color: var(--secondary-color);
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        .level-user {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success-color);
            border: 1px solid rgba(16, 185, 129, 0.2);
        }
                /* UNTUK WARNA SESAUAI LEVEL */


        /* Last Seen */
        .last-seen {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .last-seen-time {
            font-weight: 500;
            color: var(--text-primary);
        }

        .last-seen-status {
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .status-online {
            color: var(--success-color);
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .status-offline {
            color: var(--text-secondary);
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        /* Contact Info */
        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .phone-number {
            font-weight: 500;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .address {
            font-size: 0.85rem;
            color: var(--text-secondary);
            line-height: 1.4;
        }

        /* Action Buttons  */
        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .action-btn {
                text-decoration: none;
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--border-color);
            background: var(--white);
            color: var(--text-secondary);
            transition: all var(--transition-fast);
            cursor: pointer;
            font-size: 1rem;
        }

        .action-btn:hover {
            transform: translateY(-2px);
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
            padding: 25px 30px;
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
            width: 40px;
            height: 40px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            background: var(--white);
            color: var(--text-primary);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
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

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            justify-content: center;
            align-items: center;
        }

        .modal.show {
            display: flex;
        }

        .modal-content {
            background-color: var(--white);
            border-radius: var(--radius-lg);
            width: 90%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: var(--shadow-lg);
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .modal-header {
            padding: 25px 30px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(to right, var(--white), var(--light-bg));
        }

        .modal-header h3 {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--primary-dark);
        }

        .modal-header h3 i {
            color: var(--primary-color);
        }

        .close-modal {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-secondary);
            transition: color var(--transition-fast);
        }

        .close-modal:hover {
            color: var(--danger-color);
        }

        .modal-body {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--text-primary);
            font-size: 0.95rem;
        }

        .form-group label i {
            margin-right: 8px;
            color: var(--primary-color);
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid var(--border-color);
            border-radius: var(--radius-md);
            font-size: 0.95rem;
            transition: all var(--transition-fast);
            font-family: 'Inter', sans-serif;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }

        .form-select {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid var(--border-color);
            border-radius: var(--radius-md);
            font-size: 0.95rem;
            background-color: var(--white);
            cursor: pointer;
        }

        .form-select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }

        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-row .form-group {
            flex: 1;
            margin-bottom: 0;
        }

        .modal-footer {
            padding: 25px 30px;
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            background: linear-gradient(to right, var(--white), var(--light-bg));
        }

        .btn-success {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
        }

        .btn-success:hover {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-color));
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(16, 185, 129, 0.2);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .container-main {
                padding: 20px;
            }

            .header-section {
                padding: 30px;
            }

            .filter-row {
                flex-direction: column;
            }

            .filter-group {
                min-width: 100%;
            }
        }

        @media (max-width: 768px) {
            .header-title {
                font-size: 1.8rem;
            }

            .action-bar {
                flex-direction: column;
                align-items: stretch;
            }

            .search-box {
                flex-direction: column;
            }

            .search-btn, .add-user-btn {
                width: 100%;
                justify-content: center;
            }

            .stats-container {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .stat-card {
                padding: 20px;
            }

            .stat-icon {
                width: 50px;
                height: 50px;
                font-size: 1.3rem;
            }

            .stat-value {
                font-size: 1.7rem;
            }

            .filter-section {
                padding: 20px;
            }

            .filter-actions {
                flex-direction: column;
            }

            .filter-actions .btn {
                width: 100%;
                justify-content: center;
            }

            .pagination-container {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }

            .user-table th,
            .user-table td {
                padding: 14px 16px;
            }

            .form-row {
                flex-direction: column;
                gap: 20px;
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

            .section-header {
                padding: 20px;
            }

            .pagination {
                flex-wrap: wrap;
                justify-content: center;
            }

            .user-profile {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .profile-info {
                width: 100%;
            }

            .modal-content {
                width: 95%;
            }

            .modal-header {
                padding: 20px;
            }

            .modal-body {
                padding: 20px;
            }

            .modal-footer {
                padding: 20px;
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
.clear-btn-1{
    position: absolute;
    right: 130px;            /* sebelum tombol Cari */
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

.clear-btn-1:hover{
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
   <div class="container-main">
        <!-- Header -->
        <header class="header-section">
            <div class="header-content">
                <h1 class="header-title">
                    <i class="fas fa-users"></i>
                    Manajemen User
                </h1>
                <p class="header-subtitle">
                    Kelola semua pengguna sistem, pantau aktivitas, dan atur hak akses.
                </p>
            </div>
        </header>





        <!-- Stats Cards -->
        <div class="stats-container">
            <div class="stat-card stat-card-total">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-info">
                    <h3 class="stat-value" id="totalUsers">8</h3>
                    <p class="stat-label">Total User</p>
                </div>
            </div>
            <div class="stat-card stat-card-admin">
                <div class="stat-icon">
                    <i class="fas fa-crown"></i>
                </div>
                <div class="stat-info">
                    <h3 class="stat-value" id="totalAdmin">2</h3>
                    <p class="stat-label">Administrator</p>
                </div>
            </div>
            <div class="stat-card stat-card-petugas">
                <div class="stat-icon">
                    <i class="fas fa-user-tie"></i>
                </div>
                <div class="stat-info">
                    <h3 class="stat-value" id="totalPetugas">2</h3>
                    <p class="stat-label">Petugas</p>
                </div>
            </div>
            <div class="stat-card stat-card-user">
                <div class="stat-icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="stat-info">
                    <h3 class="stat-value" id="totalUserBiasa">4</h3>
                    <p class="stat-label">User Biasa</p>
                </div>
            </div>
        </div>


                 <!-- Action Bar -->
            <div class="action-bar">
                <div class="search-wrapper">
                    <form action="{{ route('admin.manajemenuser.list') }}" method="GET" class="search-box">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text"
                               name="keyword"
                               class="search-input"
                               placeholder="Cari user berdasarkan nama, email, atau nomor HP..."
                               value="{{ request('keyword') }}">
                        <button class="search-btn" type="submit">
                            <i class="fas fa-search"></i>
                            Cari
                        </button>
                    </form>
                    {{-- untuk merest search --}}
    @if (request()->keyword)
        <a href="{{ route('admin.manajemenuser.list') }}" class="clear-btn-1">
            <i class="bi bi-x-lg"></i>
        </a>
    @endif
                </div>
            <a href="{{ route('admin.manajemenuser.create') }}" class="add-user-btn">
    <i class="fas fa-user-plus"></i>
    Tambah User
</a>
            </div>
                        <!-- END Action Bar -->



        <!-- Filter Section -->
       <!-- Filter Section -->
<form action="{{ route('admin.manajemenuser.list') }}" method="GET">
    <div class="filter-section">
        <div class="section-header">
            <h3 class="section-title">
                <i class="fas fa-filter"></i>
                Filter Data User
            </h3>
        </div>

        <div class="filter-container">
            <div class="filter-title">
                <i class="fas fa-sliders-h"></i>
                Atur Filter
            </div>

            <div class="filter-row">
                {{-- LEVEL USER --}}
                <div class="filter-group">
                    <label class="filter-label">Level User</label>
                    <select class="filter-select" name="level">
                        <option value="">Semua Level</option>
                        <option value="admin" {{ request('level') == 'admin' ? 'selected' : '' }}>
                            Administrator
                        </option>
                        <option value="petugas" {{ request('level') == 'petugas' ? 'selected' : '' }}>
                            Petugas
                        </option>
                        <option value="user" {{ request('level') == 'user' ? 'selected' : '' }}>
                            User Biasa
                        </option>
                    </select>
                </div>

                {{-- STATUS ONLINE --}}
                <div class="filter-group">
                    <label class="filter-label">Status Online</label>
                    <select class="filter-select" name="status">
                        <option value="">Semua Status</option>
                        <option value="online" {{ request('status') == 'online' ? 'selected' : '' }}>
                            Online
                        </option>
                        <option value="offline" {{ request('status') == 'offline' ? 'selected' : '' }}>
                            Offline
                        </option>
                    </select>
                </div>

                {{-- TANGGAL BERGABUNG --}}
                <div class="filter-group">
                    <label class="filter-label">Tanggal Bergabung</label>
                    <select class="filter-select" name="date">
                        <option value="">Semua Waktu</option>
                        <option value="today" {{ request('date') == 'today' ? 'selected' : '' }}>
                            Hari Ini
                        </option>
                        <option value="week" {{ request('date') == 'week' ? 'selected' : '' }}>
                            Minggu Ini
                        </option>
                        <option value="month" {{ request('date') == 'month' ? 'selected' : '' }}>
                            Bulan Ini
                        </option>
                        <option value="year" {{ request('date') == 'year' ? 'selected' : '' }}>
                            Tahun Ini
                        </option>
                    </select>
                </div>
            </div>

            <div class="filter-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-check"></i>
                    Terapkan Filter
                </button>

                <a href="{{ route('admin.manajemenuser.list') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i>
                    Reset Filter
                </a>
            </div>
        </div>
    </div>
</form>


        <!-- Data Section -->
        <div class="data-section">
            <div class="section-header">
                <div>
                    <h3 class="section-title">
                        <i class="fas fa-list-check"></i>
                        Daftar User
                    </h3>
                    <p class="table-subtitle">Semua user yang terdaftar dalam sistem</p>
                </div>
            </div>

            <div class="table-responsive">
                <table class="user-table" id="userTable">
                    <thead>
                        <tr>
                            <th width="250">
                                <i class="fas fa-user-circle"></i> Profile
                            </th>
                            <th width="120">
                                <i class="fas fa-user-tag"></i> Level
                            </th>
                            <th width="180">
                                <i class="fas fa-clock"></i> Last Seen
                            </th>
                            <th width="230">
                                <i class="fas fa-address-book"></i> Kontak
                            </th>
                            <th width="150">
                                <i class="fas fa-cogs"></i> Aksi
                            </th>
                        </tr>
                    </thead>
                    {{-- BAGIAN SINI --}}
         <tbody id="userTableBody">
    @forelse ($data_user as $user)
        <tr>
            <td>
                <div class="user-profile">
                    <div class="profile-avatar">
                        @if ($user->foto)
                            <img src="{{ asset('storage/' . $user->foto) }}" alt="Foto">
                        @else
                            <div class="profile-default">
                                {{ strtoupper(substr($user->name, 0, 2)) }}
                            </div>
                        @endif

                        <div class="online-status offline"></div>
                    </div>

                    <div class="profile-info">
                        <div class="profile-name">{{ $user->name }}</div>
                        <div class="profile-email">{{ $user->email }}</div>
                    </div>
                </div>
            </td>

            <td>
                <span class="level-badge level-{{ $user->level }}">
                    <i class="fas fa-user"></i>
                    {{ ucfirst($user->level) }}
                </span>
            </td>

            {{-- BAGIAN FITUR LAST SEEN NYA --}}
     <td>
    <div class="last-seen">
        @php
            $lastSeen = $user->last_seen;
            $isOnline = $lastSeen && $lastSeen->gt(now()->subMinutes(1));
        @endphp

        {{-- WAKTU TERAKHIR --}}
        <span class="last-seen-time">
            @if ($lastSeen)
                {{ $lastSeen->diffForHumans() }}
            @else
                -
            @endif
        </span>

        {{-- STATUS --}}
        <span class="last-seen-status">
            @if ($isOnline)
                <span class="status-online">
                    <i class="fas fa-circle"></i> Online
                </span>
            @else
                <span class="status-offline">
                    <i class="fas fa-circle"></i> Offline
                </span>
            @endif
        </span>
    </div>
</td>


            <td>
                <div class="contact-info">
                    <span class="phone-number">
                        <i class="fas fa-phone"></i>
                        {{ $user->nomor_hp ?? '-' }}
                    </span>
                    <span class="address">
                        {{ $user->alamat ?? '-' }}
                    </span>
                </div>
            </td>

            <td>
                <div class="action-buttons">
                     <a href="{{ route('admin.manajemenuser.detail', $user->id) }}"
                                               class="action-btn btn-view"
                                               title="Lihat Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>


                  <a href="{{ route('admin.manajemenuser.edit', $user->id) }}"
                                               class="action-btn btn-edit"
                                               title="Edit Alat">
                                                <i class="fas fa-edit"></i>
                                            </a>

                        <form action="{{ route('hapus.user', $user->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirmDelete(event, '{{ $user->name }}')"
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
        <tr>
            <td colspan="5" class="text-center py-4">
                <div class="empty-state">
                    <i class="bi bi-search" style="font-size: 32px; color: #9ca3af;"></i>
                    <p class="mt-2 mb-0 text-muted">
                        Data user tidak ditemukan
                    </p>
                </div>
            </td>
        </tr>
    @endforelse
</tbody>

                </table>
            </div>

                 <!-- Pagination -->

            @if ($data_user->hasPages())
            <div class="pagination-container">
                <nav aria-label="Page navigation">
                    <ul class="pagination">

                        {{-- UNTUK KEMBALI  --}}
                          {{-- PREVIOUS --}}
            <li class="page-item {{ $data_user->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $data_user->previousPageUrl() }}">
                    <i class="fas fa-chevron-left"></i>
                </a>
            </li>

                        {{-- UNTUK NOMOR NYA --}}
                                  {{-- PAGE NUMBERS --}}
            @foreach ($data_user->getUrlRange(1, $data_user->lastPage()) as $page => $url)
                <li class="page-item {{ $data_user->currentPage() == $page ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">
                        {{ $page }}
                    </a>
                </li>
            @endforeach

                      {{-- UNTUK LANJUTAN NYA NYA --}}
                             {{-- NEXT --}}
            <li class="page-item {{ $data_user->hasMorePages() ? '' : 'disabled' }}">
                <a class="page-link" href="{{ $data_user->nextPageUrl() }}">
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

  <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Modal functionality
            const modal = document.getElementById('userModal');
            const addUserBtn = document.getElementById('addUserBtn');
            const closeModalBtn = document.getElementById('closeModal');
            const cancelBtn = document.getElementById('cancelBtn');

            function openModal() {
                modal.classList.add('show');
            }

            function closeModal() {
                modal.classList.remove('show');
                document.getElementById('userForm').reset();
            }

            addUserBtn.addEventListener('click', openModal);
            closeModalBtn.addEventListener('click', closeModal);
            cancelBtn.addEventListener('click', closeModal);

            // Close modal when clicking outside
            window.addEventListener('click', function(event) {
                if (event.target === modal) {
                    closeModal();
                }
            });

            // Search functionality (simplified for static data)
            const searchInput = document.getElementById('searchInput');
            const searchBtn = document.getElementById('searchBtn');

            function performSearch() {
                const searchTerm = searchInput.value.trim().toLowerCase();

                if (searchTerm === '') {
                    alert('Silakan masukkan kata kunci pencarian');
                    return;
                }

                alert(`Mencari user dengan kata kunci: ${searchTerm}\nFungsi pencarian penuh membutuhkan JavaScript tambahan.`);
            }

            searchBtn.addEventListener('click', performSearch);
            searchInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    performSearch();
                }
            });

            // Filter functionality (simplified for static data)
            const applyFilterBtn = document.getElementById('applyFilter');
            const clearFiltersBtn = document.getElementById('clearFilters');
            const levelFilter = document.getElementById('levelFilter');
            const statusFilter = document.getElementById('statusFilter');
            const dateFilter = document.getElementById('dateFilter');

            function applyFilters() {
                const level = levelFilter.value;
                const status = statusFilter.value;
                const date = dateFilter.value;

                let filterMessage = 'Filter diterapkan:\n';
                filterMessage += `- Level: ${level || 'Semua'}\n`;
                filterMessage += `- Status: ${status || 'Semua'}\n`;
                filterMessage += `- Tanggal: ${date || 'Semua'}\n\n`;
                filterMessage += 'Fungsi filter penuh membutuhkan JavaScript tambahan.';

                alert(filterMessage);
            }

            applyFilterBtn.addEventListener('click', applyFilters);

            clearFiltersBtn.addEventListener('click', function() {
                levelFilter.value = '';
                statusFilter.value = '';
                dateFilter.value = '';
                alert('Filter direset');
            });

            // Save user functionality
            const saveUserBtn = document.getElementById('saveUserBtn');

            saveUserBtn.addEventListener('click', function(event) {
                event.preventDefault();

                const nama = document.getElementById('nama').value.trim();
                const email = document.getElementById('email').value.trim();
                const phone = document.getElementById('phone').value.trim();
                const alamat = document.getElementById('alamat').value.trim();
                const level = document.getElementById('level').value;
                const password = document.getElementById('password').value;

                if (!nama || !email || !phone || !alamat || !level || !password) {
                    alert('Semua field harus diisi!');
                    return;
                }

                alert(`User "${nama}" berhasil ditambahkan!\n\nIni adalah simulasi. Untuk menambahkan user ke tabel, diperlukan JavaScript tambahan.`);
                closeModal();
            });
        });
    </script>
@endsection
