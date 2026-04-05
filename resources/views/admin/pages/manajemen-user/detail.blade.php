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
        }

        body {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            color: var(--text-primary);
            line-height: 1.6;
            min-height: 100vh;
            padding: 40px 30px;
        }

        .container-main {
            max-width: 1400px;
            margin: 0 auto;
            width: 100%;
        }

        /* HEADER SECTION - SAMA PERSIS DENGAN TAMBAH DATA */
        .header-section {
            background: var(--white);
            border-radius: var(--radius-xl);
            padding: 50px 60px;
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
        }

        .header-section::after {
            content: '';
            position: absolute;
            bottom: -80px;
            left: -80px;
            width: 200px;
            height: 200px;
            background: rgba(16, 185, 129, 0.05);
            border-radius: 50%;
        } */

        .header-title {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: var(--primary-darker);
            display: flex;
            align-items: center;
            gap: 20px;
            position: relative;
            z-index: 1;
        }

        .header-title i {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            box-shadow: var(--shadow-lg);
        }

        .header-subtitle {
            color: var(--text-secondary);
            font-size: 1rem;
            line-height: 1.7;
            max-width: 900px;
            position: relative;
            z-index: 1;
        }

        /* FORM CONTAINER - SAMA PERSIS DENGAN TAMBAH DATA */
        .form-container {
            background: var(--white);
            border-radius: var(--radius-xl);
            overflow: hidden;
            box-shadow: var(--shadow-xl);
            border: 1px solid var(--border-light);
            margin-bottom: 50px;
            position: relative;
            width: 100%;
        }

        .form-header {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            padding: 35px 60px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .form-header::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .form-header h2 {
            font-size: 1.5rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 20px;
            position: relative;
            z-index: 1;
        }

        .form-header h2 i {
            width: 55px;
            height: 55px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
        }

        /* FORM CONTENT */
        .form-content {
            padding: 50px 60px;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 40px;
            margin-bottom: 40px;
        }

        .detail-group {
            margin-bottom: 30px;
        }

        .detail-group.full-width {
            grid-column: 1 / -1;
        }

        .detail-label {
            display: block;
            margin-bottom: 12px;
            font-weight: 600;
            color: var(--primary-darker);
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .detail-label i {
            color: var(--primary-color);
            font-size: 0.9rem;
            width: 20px;
        }

        .detail-value {
            width: 100%;
            padding: 18px 25px;
            border: 2px solid var(--border-color);
            border-radius: var(--radius-md);
            background: var(--light-bg);
            color: var(--text-primary);
            font-size: 1rem;
            font-weight: 500;
            font-family: 'Plus Jakarta Sans', sans-serif;
            word-break: break-word;
        }

        /* BADGE LEVEL */
        .level-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 28px;
            border-radius: 50px;
            font-size: 0.95rem;
            font-weight: 600;
        }

        .level-admin {
            background: rgba(239, 68, 68, 0.1);
            color: #EF4444;
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        .level-petugas {
            background: rgba(59, 130, 246, 0.1);
            color: #3B82F6;
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        .level-user {
            background: rgba(16, 185, 129, 0.1);
            color: var(--primary-darker);
            border: 1px solid rgba(16, 185, 129, 0.2);
        }
        /* END BADGE LEVEL */

        /* STATUS BADGE */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 28px;
            border-radius: 50px;
            font-size: 0.95rem;
            font-weight: 600;
        }

        .status-active {
            background: rgba(16, 185, 129, 0.1);
            color: var(--primary-darker);
            border: 1px solid rgba(16, 185, 129, 0.2);
        }

        .status-inactive {
            background: rgba(239, 68, 68, 0.1);
            color: #EF4444;
            border: 1px solid rgba(239, 68, 68, 0.2);
        }


        /* STATUS VERFIKASI */
        .status-verified {
            background: rgba(59, 130, 246, 0.1);
            color: #3B82F6;
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        .status-unverified {
            background: rgba(245, 158, 11, 0.1);
            color: #F59E0B;
            border: 1px solid rgba(245, 158, 11, 0.2);
        }
                /* END STATUS VERFIKASI */


        /* PROFILE AVATAR */
        .profile-avatar-section {
            display: flex;
            align-items: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .profile-avatar-large {
            width: 120px;
            height: 120px;
            border-radius: 20px;
            overflow: hidden;
            position: relative;
            box-shadow: var(--shadow-lg);
            border: 4px solid white;
        }

        .profile-avatar-large img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* .profile-avatar-default {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 48px;
            font-weight: 700;
        } */


        /* UNTUK LOGIC STATUS */
        .online-status {
            position: absolute;
            bottom: 8px;
            right: 8px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 3px solid white;
        }

        .online {
            background: var(--success-color);
        }

        .offline {
            background: var(--text-secondary);
        }
                /* UNTUK LOGIC STATUS */


        .profile-info-detail {
            flex: 1;
        }

        .profile-name-large {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-darker);
            margin-bottom: 10px;
        }

        .profile-meta {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .profile-meta-item {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--text-secondary);
            font-size: 0.95rem;
        }

        .profile-meta-item i {
            color: var(--primary-color);
            width: 18px;
        }

        /* ADDRESS CARD */
        .address-card {
            background: var(--primary-lighter);
            border-radius: var(--radius-lg);
            padding: 25px;
            border: 1px solid rgba(16, 185, 129, 0.2);
        }

        .address-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 15px;
            color: var(--primary-darker);
            font-weight: 600;
        }

        .address-header i {
            color: var(--primary-color);
            font-size: 1.1rem;
        }

        .address-text {
            color: var(--text-primary);
            font-size: 1rem;
            line-height: 1.7;
            margin-bottom: 15px;
        }

        .address-meta {
            display: flex;
            gap: 25px;
            flex-wrap: wrap;
            color: var(--text-secondary);
            font-size: 0.9rem;
        }

        .address-meta span {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .address-meta i {
            color: var(--primary-color);
        }

        /* ACTIVITY TIMELINE */
        .activity-timeline {
            margin-top: 20px;
        }

        .timeline-item {
            display: flex;
            gap: 20px;
            padding: 20px 0;
            border-bottom: 1px solid var(--border-light);
        }

        .timeline-item:last-child {
            border-bottom: none;
        }

        .timeline-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background: var(--primary-lighter);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        .timeline-content {
            flex: 1;
        }

        .timeline-title {
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 6px;
            font-size: 1rem;
        }

        .timeline-desc {
            color: var(--text-secondary);
            font-size: 0.95rem;
            margin-bottom: 8px;
        }

        .timeline-time {
            color: var(--text-light);
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .timeline-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px;
            background: var(--light-bg);
            border-radius: 20px;
            font-size: 0.75rem;
            color: var(--text-secondary);
        }

/* LAST SEEN TEXT */
.last-seen-text {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-weight: 600;
    font-size: 0.9rem;
}

/* ONLINE */
.last-seen-online {
    color: #10B981; /* hijau */
}

/* OFFLINE */
.last-seen-offline {
    color: #6B7280; /* abu */
}

/* ICON */
.last-seen-text i {
    font-size: 8px;
}

        /* ACTION BUTTONS - DI BAWAH */
        .form-actions {
            padding: 40px 60px;
            border-top: 1px solid var(--border-light);
            display: flex;
            justify-content: space-between;
            gap: 25px;
        }
 .btn-primary:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-xl);
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

        .btn {
            padding: 20px 40px;
            border-radius: var(--radius-md);
            font-weight: 600;
            font-size: 1.1rem;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 15px;
            border: none;
            text-decoration: none;
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-width: 200px;
            justify-content: center;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            border: none;
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow-lg);
        }

        .btn-primary:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-xl);
        }

        .btn-secondary {
            background: var(--white);
            border: 2px solid var(--border-color);
            color: var(--text-primary);
        }

        .btn-secondary:hover {
            background: var(--light-bg);
            border-color: var(--primary-color);
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
        }

        /* RESPONSIVE */
        @media (max-width: 992px) {
            .detail-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .header-section,
            .form-content,
            .form-actions {
                padding: 40px;
            }

            .profile-avatar-section {
                flex-direction: column;
                text-align: center;
            }

            .profile-meta {
                justify-content: center;
            }
        }

        @media (max-width: 768px) {
            body {
                padding: 30px 20px;
            }

            .header-title {
                font-size: 1.8rem;
            }

            .header-title i {
                width: 60px;
                height: 60px;
                font-size: 1.3rem;
            }

            .form-header h2 {
                font-size: 1.4rem;
            }

            .form-actions {
                flex-direction: column-reverse;
            }

            .form-actions .btn {
                width: 100%;
                min-width: auto;
            }

            .profile-name-large {
                font-size: 1.6rem;
            }
        }

        @media (max-width: 576px) {
            .header-section,
            .form-content,
            .form-actions {
                padding: 30px 25px;
            }

            .header-title {
                font-size: 1.5rem;
            }

            .profile-avatar-large {
                width: 100px;
                height: 100px;
            }

            .profile-name-large {
                font-size: 1.4rem;
            }

            .address-meta {
                flex-direction: column;
                gap: 10px;
            }
        }



    </style>
<main class="main-content" id="mainContent">


    <div class="container-main">
        <!-- HEADER - SAMA PERSIS DENGAN TAMBAH DATA -->
        <div class="header-section">
            <h1 class="header-title">
                <i class="fas fa-user-circle"></i>
                Detail User
            </h1>
            <p class="header-subtitle">
                Informasi lengkap pengguna, data pribadi, status akun, dan riwayat aktivitas dalam sistem.
            </p>
        </div>

        <!-- MAIN CONTENT - SAMA PERSIS DENGAN TAMBAH DATA -->
        <div class="form-container">
            <!-- FORM HEADER - SAMA PERSIS -->
            <div class="form-header">
                <h2><i class="fas fa-id-card"></i> Profil User</h2>
            </div>

            <!-- FORM CONTENT -->
            <div class="form-content">
                <!-- PROFILE AVATAR SECTION -->
                <div class="profile-avatar-section" style="margin-bottom: 40px;">
                    <div class="profile-avatar-large">
                  @if ($data_user->foto)
    <img src="{{ asset('storage/' . $data_user->foto) }}" alt="User Avatar">
@else
    <div class="profile-avatar-default">
        {{ strtoupper(substr($data_user->name, 0, 2)) }}
    </div>
@endif

                    </div>



                    <div class="profile-info-detail">
                        <div class="profile-name-large">  {{ $data_user->name }}</div>
                        <div class="profile-meta">
                            <span class="profile-meta-item">
                                <i class="fas fa-envelope"></i>  {{ $data_user->email }}
                            </span>
                            <span class="profile-meta-item">
                                <i class="fas fa-phone"></i>   {{ $data_user->nomor_hp }}
                            </span>
                            <span class="profile-meta-item">
                                <i class="fas fa-calendar"></i>   {{ $data_user->created_at->format('d M Y') }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- DETAIL GRID 2 KOLOM -->
                <div class="detail-grid">
                    <!-- KOLOM KIRI -->
                    <div>
                        <!-- Informasi Pribadi -->
                        <div class="detail-group">
                            <div class="detail-label">
                                <i class="fas fa-user"></i>
                                Informasi Pribadi
                            </div>
                            <div style="display: flex; flex-direction: column; gap: 12px;">
                                <div style="display: flex; align-items: baseline; padding: 8px 0; border-bottom: 1px dashed var(--border-light);">
                                    <span style="width: 120px; color: var(--text-secondary);">User ID</span>
                                    <span style="font-weight: 600; color: var(--text-primary);">USR-2026-{{ $data_user->id }}</span>
                                </div>
                                <div style="display: flex; align-items: baseline; padding: 8px 0; border-bottom: 1px dashed var(--border-light);">
                                    <span style="width: 120px; color: var(--text-secondary);">Nama Lengkap</span>
                                    <span style="font-weight: 600; color: var(--text-primary);">{{ $data_user->name }}</span>
                                </div>

                            </div>
                        </div>

                        <!-- Kontak -->
                        <div class="detail-group" style="margin-top: 40px;">
                            <div class="detail-label">
                                <i class="fas fa-address-book"></i>
                                Kontak
                            </div>
                            <div style="display: flex; flex-direction: column; gap: 12px;">
                                <div style="display: flex; align-items: baseline; padding: 8px 0; border-bottom: 1px dashed var(--border-light);">
                                    <span style="width: 120px; color: var(--text-secondary);">Email</span>
                                    <span style="font-weight: 600; color: var(--text-primary);">{{ $data_user->email }}</span>
                                </div>
                                <div style="display: flex; align-items: baseline; padding: 8px 0; border-bottom: 1px dashed var(--border-light);">
                                    <span style="width: 120px; color: var(--text-secondary);">Nomor HP</span>
                                    <span style="font-weight: 600; color: var(--text-primary);">{{ $data_user->nomor_hp }}</span>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- KOLOM KANAN -->
                    <div>
                        <!-- Informasi Akun -->
                        <div class="detail-group">
                            <div class="detail-label">
                                <i class="fas fa-shield-alt"></i>
                                Informasi Akun
                            </div>
                            <div style="display: flex; flex-direction: column; gap: 16px;">

                                {{-- LEVEL --}}
                                <div style="display: flex; align-items: center; padding: 8px 0; border-bottom: 1px dashed var(--border-light);">
                                    <span style="width: 140px; color: var(--text-secondary);">Level User</span>

                                 @php
    $level = $data_user->level;
@endphp

@if ($level === 'admin')
    <span class="level-badge level-admin">
        <i class="fas fa-crown"></i> Administrator
    </span>
@elseif ($level === 'petugas')
    <span class="level-badge level-petugas">
        <i class="fas fa-user-shield"></i> Petugas
    </span>
@else
    <span class="level-badge level-user">
        <i class="fas fa-user"></i> User
    </span>
@endif

                                </div>


                                {{-- <div style="display: flex; align-items: center; padding: 8px 0; border-bottom: 1px dashed var(--border-light);">
                                    <span style="width: 140px; color: var(--text-secondary);">Status Akun</span>
                                    <span class="status-badge status-active">
                                        <i class="fas fa-circle"></i>
                                        Aktif
                                    </span>
                                </div> --}}

                                {{--  VERIFIKASI EMAIL --}}
                                <div style="display: flex; align-items: center; padding: 8px 0; border-bottom: 1px dashed var(--border-light);">
                                    <span style="width: 140px; color: var(--text-secondary);">Verifikasi Email</span>
                                                           @if ($data_user->email_verified_at)
    <span class="status-badge status-verified">
        <i class="fas fa-check-circle"></i> Terverifikasi
    </span>
@else
    <span class="status-badge status-unverified">
        <i class="fas fa-times-circle"></i> Belum Verifikasi
    </span>
@endif
                                </div>



{{-- kapan emial tervrivikasi --}}
                                <div style="display: flex; align-items: baseline; padding: 8px 0; border-bottom: 1px dashed var(--border-light);">
                                    <span style="width: 140px; color: var(--text-secondary);">Email Terverifikasi</span>
                                    <span style="font-weight: 600; color: var(--text-primary);">{{ ($data_user->email_verified_at)->format('d M Y') ?? '-' }}
</span>
                                </div>

                                {{-- TERAHIKR LOGIN --}}
                             <div style="display: flex; align-items: baseline; padding: 8px 0; border-bottom: 1px dashed var(--border-light);">
    <span style="width: 140px; color: var(--text-secondary);">Terakhir Login</span>
    <span style="font-weight: 600; color: var(--text-primary);">
        @if ($data_user->last_seen)
            {{ $data_user->last_seen->translatedFormat('d M Y, H:i') }} WIB
        @else
            -
        @endif
    </span>
</div>





{{-- LAST SEEN --}}
{{-- LAST SEEN --}}
<div style="display: flex; align-items: baseline; padding: 8px 0; border-bottom: 1px dashed var(--border-light);">
    <span style="width: 140px; color: var(--text-secondary);">Last Seen</span>

    @php
        $lastSeen = $data_user->last_seen;
        $isOnline = $lastSeen && $lastSeen->gt(now()->subMinutes(1));
    @endphp

    @if ($isOnline)
        <span class="last-seen-text last-seen-online">
            <i class="fas fa-circle"></i>
            Online ({{ $lastSeen->diffForHumans() }})
        </span>
    @elseif ($lastSeen)
        <span class="last-seen-text last-seen-offline">
            <i class="fas fa-circle"></i>
            Offline ({{ $lastSeen->diffForHumans() }})
        </span>
    @else
        <span class="last-seen-text">-</span>
    @endif
</div>




                            </div>
                        </div>
                    </div>
                </div>

                <!-- ALAMAT - FULL WIDTH -->
                <div class="detail-group full-width">
                    <div class="detail-label">
                        <i class="fas fa-map-marker-alt"></i>
                        Alamat
                    </div>
                    <div class="address-card">
                        <div class="address-header">
                            <i class="fas fa-home"></i>
                            Alamat Lengkap
                        </div>
                        <div class="address-text">
                          {{ $data_user->alamat }}
                        </div>

                    </div>
                </div>

                <!-- AKTIVITAS TERAKHIR - FULL WIDTH -->
                <!-- <div class="detail-group full-width" style="margin-top: 30px;">
                    <div class="detail-label">
                        <i class="fas fa-history"></i>
                        Aktivitas Terakhir
                    </div>
                    <div class="activity-timeline">
                        <div class="timeline-item">
                            <div class="timeline-icon">
                                <i class="fas fa-sign-in-alt"></i>
                            </div>
                            <div class="timeline-content">
                                <div class="timeline-title">Login ke Sistem</div>
                                <div class="timeline-desc">Berhasil login menggunakan email</div>
                                <div class="timeline-time">
                                    <i class="fas fa-clock"></i> Hari ini, 10:23 WIB
                                    <span class="timeline-badge">
                                        <i class="fas fa-globe"></i> 192.168.1.100
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-icon">
                                <i class="fas fa-edit"></i>
                            </div>
                            <div class="timeline-content">
                                <div class="timeline-title">Update Profil</div>
                                <div class="timeline-desc">Memperbarui informasi nomor telepon</div>
                                <div class="timeline-time">
                                    <i class="fas fa-clock"></i> Kemarin, 15:42 WIB
                                </div>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-icon">
                                <i class="fas fa-plus-circle"></i>
                            </div>
                            <div class="timeline-content">
                                <div class="timeline-title">Tambah Produk</div>
                                <div class="timeline-desc">Menambahkan produk baru "Laptop Gaming ASUS ROG"</div>
                                <div class="timeline-time">
                                    <i class="fas fa-clock"></i> 20 Mar 2024, 09:15 WIB
                                </div>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-icon">
                                <i class="fas fa-key"></i>
                            </div>
                            <div class="timeline-content">
                                <div class="timeline-title">Ganti Password</div>
                                <div class="timeline-desc">Password berhasil diperbarui</div>
                                <div class="timeline-time">
                                    <i class="fas fa-clock"></i> 15 Mar 2024, 11:30 WIB
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>

            <!-- ACTION BUTTONS - DI BAWAH -->
            <div class="form-actions">
                    <a href="{{ route('admin.manajemenuser.list') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>
                   <a href="{{ route('admin.manajemenuser.edit', $data_user->id) }}" class="btn btn-primary">
                    <i class="fas fa-edit"></i> Edit User
                </a>

            </div>
        </div>
    </div>

</main>
@endsection
