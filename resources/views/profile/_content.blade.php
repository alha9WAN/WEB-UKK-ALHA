  <style>
        *,a {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
text-decoration: none;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            color: #0f1825;
            min-height: 100vh;
            padding: 40px;
            position: relative;
        }

        .container {
            max-width: 1600px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
            width: 100%;
        }

        /* Premium Header */
        .header-section {
            background: rgba(255,255,255,0.85);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            padding: 40px 50px;
            margin-bottom: 40px;
            box-shadow: 0 25px 50px -12px rgba(0,0,0,0.15);
            border: 1px solid rgba(255,255,255,0.6);
        }

        .header-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 2.8rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 20px;
            background: linear-gradient(135deg, #0f1825 0%, #1e2b3c 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .header-title i {
            width: 70px;
            height: 70px;
            background: linear-gradient(145deg, #10b981, #047857);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.8rem;
            box-shadow: 0 15px 30px -8px rgba(16,185,129,0.3);
            -webkit-text-fill-color: white;
        }

        .header-subtitle {
            color: #4b5a6e;
            font-size: 1rem;
            line-height: 1.7;
            max-width: 800px;
            padding-left: 90px;
        }

        /* Layout Grid Premium */
        .profile-layout {
            display: grid;
            grid-template-columns: 400px 1fr;
            gap: 30px;
        }

        /* Sidebar Premium */
        .profile-sidebar {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            border-radius: 36px;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.2);
            height: fit-content;
        }

        .profile-cover {
            height: 130px;
            background: linear-gradient(145deg, #10b981, #047857, #065f46);
            position: relative;
            overflow: hidden;
        }

        .profile-cover::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 30% 50%, rgba(255,255,255,0.2) 0%, transparent 50%);
        }

        .profile-cover::before {
            content: '';
            position: absolute;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -50px;
            right: -50px;
        }

        /* Enhanced Avatar */
        .avatar-container {
            position: relative;
            width: 160px;
            height: 160px;
            margin: -80px auto 0;
            z-index: 20;
        }

        .avatar-wrapper {
            width: 100%;
            height: 100%;
            position: relative;
            border-radius: 50%;
            background: linear-gradient(145deg, #ffffff, #f8fafc);
            padding: 8px;
            box-shadow:
                0 0 0 6px rgba(16, 185, 129, 0.15),
                0 0 0 12px rgba(255, 255, 255, 0.3),
                0 20px 40px -10px rgba(16, 185, 129, 0.4);
            animation: photoFloat 7s ease-in-out infinite;
        }

        .avatar {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid white;
            transition: all 0.4s ease;
            animation: photoGlow 5s ease-in-out infinite alternate;
            cursor: pointer;
        }

        .avatar-status {
            position: absolute;
            bottom: 20px;
            right: 20px;
            width: 28px;
            height: 28px;
            background: #10b981;
            border-radius: 50%;
            border: 4px solid white;
            z-index: 25;
            animation: statusPulse 2.5s infinite;
            box-shadow: 0 4px 10px rgba(16, 185, 129, 0.4);
        }

        .avatar-edit {
            position: absolute;
            top: 5px;
            right: 5px;
            width: 48px;
            height: 48px;
            background: linear-gradient(145deg, #10b981, #059669);
            border-radius: 50%;
            border: none;
            color: white;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            z-index: 26;
            box-shadow: 0 10px 20px -5px rgba(16, 185, 129, 0.5);
            animation: cameraFloat 6s ease-in-out infinite;
        }

        .avatar-edit:hover {
            transform: scale(1.15) rotate(10deg);
            background: linear-gradient(145deg, #059669, #047857);
        }

        /* Profile Info */
        .profile-info {
            text-align: center;
        }

        .profile-info h2 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 2rem;
            font-weight: 700;
            color: #0f1825;
            margin: 10px 0 5px;
            letter-spacing: -0.02em;
            cursor: pointer;
        }

        .profile-badge-2{
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 10px;
            background: linear-gradient(145deg, #d1fae5, #a7f3d0);
            color: #047857;
            border-radius: 60px;
            font-weight: 600;
            font-size: 0.95rem;
            border: 1px solid rgba(16, 185, 129, 0.3);
            box-shadow: 0 4px 10px rgba(16, 185, 129, 0.1);
        }

        /* Stats Modern */
        .profile-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            padding: 20px 25px;
            border-top: 1px solid rgba(16, 185, 129, 0.1);
            border-bottom: 1px solid rgba(16, 185, 129, 0.1);
            background: rgba(209, 250, 229, 0.15);
        }

        .stat-item {
            text-align: center;
            padding: 10px 5px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 20px;
            backdrop-filter: blur(5px);
            cursor: pointer;
            transition: transform 0.2s;
        }

        .stat-item:hover {
            transform: translateY(-2px);
            background: rgba(255, 255, 255, 0.8);
        }

        .stat-value {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 1.8rem;
            font-weight: 700;
            background: linear-gradient(145deg, #10b981, #047857);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1.2;
        }

        .stat-label {
            font-size: 0.8rem;
            font-weight: 500;
            color: #4b5a6e;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Action Buttons Premium */
        .profile-actions {
            padding: 25px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .btn-premium {
            padding: 16px 24px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.95rem;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            font-family: 'Inter', sans-serif;
            position: relative;
            overflow: hidden;
        }

        .btn-premium::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .btn-premium:hover::before {
            left: 100%;
        }

        .btn-primary-premium {
            background: linear-gradient(145deg, #10b981, #047857);
            color: white;
            box-shadow: 0 15px 30px -8px rgba(16, 185, 129, 0.4);
        }

        .btn-primary-premium:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px -8px rgba(16, 185, 129, 0.6);
        }

        .btn-outline-premium {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border: 1.5px solid rgba(16, 185, 129, 0.3);
            color: #1e293b;
        }

        .btn-outline-premium:hover {
            background: white;
            border-color: #10b981;
            color: #047857;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(16, 185, 129, 0.2);
        }

        /* ===== MAIN CONTENT - SATU CARD UTUH DENGAN TATA LETAK RAPI ===== */
        .main-content-1{
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        /* Card utama yang menampung semua informasi */
        .unified-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            border-radius: 36px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
            overflow: hidden;
        }

        /* Header card dengan aksen */
        .unified-header {
            padding: 28px 32px;
            background: linear-gradient(135deg, rgba(255,255,255,0.95) 0%, rgba(240,253,244,0.95) 100%);
            border-bottom: 2px solid rgba(16, 185, 129, 0.2);
        }

        .unified-header h3 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: #0f1825;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .unified-header h3 i {
            width: 48px;
            height: 48px;
            background: linear-gradient(145deg, #10b981, #047857);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.3rem;
            box-shadow: 0 10px 20px -5px rgba(16, 185, 129, 0.4);
        }

        /* Body card dengan padding yang konsisten */
        .unified-body {
            padding: 32px;
        }

        /* Setiap seksi informasi */
        .info-section {
            margin-bottom: 40px;
        }

        .info-section:last-child {
            margin-bottom: 0;
        }

        /* Judul seksi dengan garis pemisah yang elegan */
        .section-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 1.2rem;
            font-weight: 600;
            color: #0f1825;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            padding-bottom: 12px;
            border-bottom: 2px solid;
            border-image: linear-gradient(90deg, #10b981 0%, #34d399 50%, transparent 100%);
            border-image-slice: 1;
        }

        .section-title i {
            width: 36px;
            height: 36px;
            background: rgba(16, 185, 129, 0.1);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #10b981;
            font-size: 1.1rem;
        }

        /* Grid informasi 2 kolom yang rapi */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 28px 40px;
        }

        .info-row {
            display: flex;
            flex-direction: column;
            gap: 8px;
            padding: 4px 0;
        }

        .info-label {
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #5d6e85;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .info-label i {
            color: #10b981;
            width: 20px;
            font-size: 0.95rem;
        }

        .info-value {
            font-weight: 600;
            color: #0f1825;
            font-size: 1.1rem;
            padding-left: 28px;
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        /* Badge system */
        .badge-premium {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 18px;
            border-radius: 40px;
            font-size: 0.9rem;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border: 1px solid transparent;
        }

        .badge-admin {
            background: linear-gradient(145deg, #fee2e2, #fecaca);
            color: #991b1b;
            border-color: #fca5a5;
        }

        .badge-active {
            background: linear-gradient(145deg, #d1fae5, #a7f3d0);
            color: #047857;
            border-color: #6ee7b7;
        }

        .badge-verified {
            background: linear-gradient(145deg, #dbeafe, #bfdbfe);
            color: #1e40af;
            border-color: #93c5fd;
        }

        /* Card alamat terpisah dengan gaya khusus */
        .address-premium {
            background: linear-gradient(145deg, #f0fdf4, #dcfce7);
            border-radius: 28px;
            padding: 28px 32px;
            border: 1px solid rgba(16, 185, 129, 0.25);
            box-shadow: 0 10px 25px -10px rgba(16, 185, 129, 0.2);
            margin-top: 8px;
        }

        .address-premium p {
            font-size: 1.1rem;
            line-height: 1.7;
            color: #1e293b;
            margin-bottom: 20px;
            font-weight: 500;
        }

        .address-meta {
            display: flex;
            gap: 30px;
            color: #2c3e50;
            font-size: 0.95rem;
            padding-top: 12px;
            border-top: 1px dashed rgba(16, 185, 129, 0.3);
        }

        .address-meta span {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .address-meta i {
            color: #10b981;
        }

        /* Footer Actions */
        .footer-actions {
            display: flex;
            justify-content: flex-end;
            gap: 20px;
            margin-top: 10px;
        }

        .btn-footer {
            padding: 16px 36px;
            border-radius: 28px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s;
            font-size: 1rem;
            border: none;
            cursor: pointer;
            font-family: 'Inter', sans-serif;
            box-shadow: 0 10px 25px -8px rgba(0,0,0,0.1);
        }

        .btn-footer-primary {
            background: linear-gradient(145deg, #10b981, #047857);
            color: white;
        }

        .btn-footer-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 35px -10px rgba(16, 185, 129, 0.5);
        }

        .btn-footer-secondary {
            background: white;
            border: 1.5px solid rgba(16, 185, 129, 0.3);
            color: #2c3e50;
        }

        .btn-footer-secondary:hover {
            background: #f8fafc;
            border-color: #10b981;
            color: #047857;
            transform: translateY(-2px);
        }

        /* Notification Premium */
        .notification-premium {
            position: fixed;
            top: 30px;
            right: 30px;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(15px);
            padding: 18px 32px;
            border-radius: 60px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            border: 1px solid rgba(16, 185, 129, 0.2);
            display: flex;
            align-items: center;
            gap: 15px;
            transform: translateX(500px);
            transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            z-index: 1000;
            border-left: 4px solid #10b981;
            font-weight: 500;
        }

        .notification-premium.show {
            transform: translateX(0);
        }

        .notification-premium i {
            width: 42px;
            height: 42px;
            background: linear-gradient(145deg, #10b981, #047857);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        .spinner {
            width: 22px;
            height: 22px;
            border: 3px solid rgba(255,255,255,0.4);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 0.8s linear infinite;
        }

        /* Animations */
        @keyframes photoFloat {
            0%, 100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-10px) scale(1.02); }
        }

        @keyframes photoGlow {
            0% { filter: brightness(1) contrast(1); }
            100% { filter: brightness(1.08) contrast(1.05); box-shadow: 0 0 25px rgba(16,185,129,0.5); }
        }

        @keyframes statusPulse {
            0%, 100% { transform: scale(1); background: #10b981; }
            50% { transform: scale(1.2); background: #34d399; }
        }

        @keyframes cameraFloat {
            0%, 100% { transform: translateY(0) rotate(0); }
            33% { transform: translateY(-5px) rotate(5deg); }
            66% { transform: translateY(3px) rotate(-3deg); }
        }

        @keyframes spin { to { transform: rotate(360deg); } }

        /* Responsive */
        @media (max-width: 1200px) {
            .profile-layout { grid-template-columns: 1fr; }
            body { padding: 30px; }
        }

        @media (max-width: 768px) {
            .info-grid { grid-template-columns: 1fr; }
            .footer-actions { flex-direction: column-reverse; align-items: stretch; }
            .btn-footer { justify-content: center; }
            .header-title { font-size: 2.2rem; }
            .unified-header { padding: 20px; }
            .unified-body { padding: 20px; }
            .header-subtitle { padding-left: 0; }
        }
            .gradient-text {
        background: linear-gradient(145deg, #10b981, #047857);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        color: #10b981;  /* fallback */
        font-weight: 700;
        text-rendering: geometricPrecision;
        -webkit-font-smoothing: antialiased;
        display: inline-block;
    }

    .header-title {
        font-size: 2.5rem;
        font-weight: 800;
    }

    .header-title i {
        color: #10b981;  /* ikon solid lebih tajam */
        margin-right: 10px;
        filter: drop-shadow(0 2px 5px rgba(16,185,129,0.3));
    }


    .badge-petugas {
    background: linear-gradient(145deg, #e0f2fe, #bae6fd);
    color: #075985;
    border-color: #7dd3fc;
}

.badge-user {
    background: linear-gradient(145deg, #f1f5f9, #e2e8f0);
    color: #334155;
    border-color: #cbd5e1;
}

.badge-unverified {
    background: linear-gradient(145deg, #fee2e2, #fecaca);
    color: #991b1b;
    border-color: #fca5a5;
}
    </style>
<main class="main-content" id="mainContent">

   <div class="container">
       <!-- Header -->
 <div class="header-section">
    <h1 class="header-title">
        <i class="fas fa-user-circle"></i>
            <span style="color: #000;">Profile</span>
    <span class="gradient-text">Saya</span>
    </h1>
</div>

        <!-- Premium Layout -->
        <div class="profile-layout">
            <!-- Sidebar Premium -->
            <div class="profile-sidebar">
                <div class="profile-cover"></div>
             <div class="avatar-container">
                    <div class="avatar-wrapper">
                        @if ($user->foto)
                            <img src="{{ asset('storage/' . $user->foto) }}" alt="Profile" class="avatar">
                        @else
                            <div class="avatar-default">
                                {{ strtoupper(substr($user->name, 0, 2)) }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="profile-info">
                    <h2 id="profileName">{{ $user->name }}</h2>

                </div>



                <div class="profile-actions">


                    <a href="{{ route('profile.edit') }}
" class="btn-premium btn-primary-premium">
                            <i class="fas fa-shield-alt"></i>
 Edit Profil</a>
                    <a href="{{route('email.request') }}" class="btn-premium btn-outline-premium">
                            <i class="fas fa-shield-alt"></i>
 Ganti Password
</a>

                </div>
            </div>
            <!-- MAIN CONTENT - SATU CARD UTUH DENGAN TATA LETAK RAPI -->
            <div class="main-content-1">
                <!-- Satu card besar yang menyatukan semua informasi -->
                <div class="unified-card">
                    <div class="unified-header">
                        <h3><i class="fas fa-id-card"></i> Informasi Lengkap User</h3>
                    </div>
                    <div class="unified-body">

                        <!-- SEKSI 1: Informasi Pribadi -->
                        <div class="info-section">
                            <div class="section-title">
                                <i class="fas fa-user-circle"></i> Data Pribadi
                            </div>
                            <div class="info-grid">
                                <div class="info-row">
                                    <span class="info-label"><i class="fas fa-hashtag"></i> USER ID</span>
                                    <span class="info-value">USR-2026-{{ $user->id }}</span>
                                </div>
                                <div class="info-row">
                                    <span class="info-label"><i class="fas fa-user"></i> NAMA </span>
                                    <span class="info-value">{{ $user->name }}</span>
                                </div>


                            </div>
                        </div>

                        <!-- SEKSI 2: Kontak -->
                        <div class="info-section">
                            <div class="section-title">
                                <i class="fas fa-address-book"></i> Kontak
                            </div>
                            <div class="info-grid">
                                <div class="info-row">
                                    <span class="info-label"><i class="fas fa-envelope"></i> EMAIL</span>
                                    <span class="info-value">{{ $user->email }}</span>
                                </div>
                                <div class="info-row">
                                    <span class="info-label"><i class="fas fa-phone-alt"></i> NOMOR HP</span>
                                    <span class="info-value"> {{ $user->nomor_hp }}</span>
                                </div>

                            </div>
                        </div>

                        <!-- SEKSI 3: Status & Keamanan -->
                        <div class="info-section">
                            <div class="section-title">
                                <i class="fas fa-shield-alt"></i> Status & Keamanan
                            </div>
                            <div class="info-grid">
                                <div class="info-row">
                                    <span class="info-label"><i class="fas fa-user-tag"></i> LEVEL USER</span>
                                    <span class="info-value">

                                                                        @php
    $level = $user->level;
@endphp

@if ($level === 'admin')
    <span class="badge-premium badge-admin">
        <i class="fas fa-crown"></i> Administrator
    </span>
@elseif ($level === 'petugas')
    <span class="badge-premium badge-petugas">
        <i class="fas fa-user-shield"></i> Petugas
    </span>
@else
    <span class="badge-premium badge-user">
        <i class="fas fa-user"></i> User
    </span>
@endif
                                    </span>
                                </div>


                              <div class="info-row">
    <span class="info-label">
        <i class="fas fa-check-double"></i> VERIFIKASI
    </span>
    <span class="info-value">
        @if ($user->email_verified_at)
            <span class="badge-premium badge-verified">
                <i class="fas fa-check-circle"></i>
                Terverifikasi
            </span>
        @else
            <span class="badge-premium badge-unverified">
                <i class="fas fa-times-circle"></i>
                Belum Verifikasi
            </span>
        @endif
    </span>
</div>

                                <div class="info-row">
                                    <span class="info-label"><i class="fas fa-clock"></i> TGL VERIFIKASI</span>
                                    <span class="info-value">{{ ($user->email_verified_at)->format('d M Y') ?? '-' }}</span>
                                </div>
                                <div class="info-row">
                                    <span class="info-label"><i class="fas fa-sign-in-alt"></i> TERAKHIR LOGIN</span>
                                    <span class="info-value">   @if ($user->last_seen)
            {{ $user->last_seen->translatedFormat('d M Y, H:i') }} WIB
        @else
            -
        @endif</span>
                                </div>
                                <div class="info-row">
                                    <span class="info-label"><i class="fas fa-globe"></i> LAST SEEN</span>
                                      @php
        $lastSeen = $user->last_seen;
        $isOnline = $lastSeen && $lastSeen->gt(now()->subMinutes(1));
    @endphp

                                        @if ($isOnline)

                                    <span class="info-value">Online   ({{ $lastSeen->diffForHumans() }})</span>
                                        @elseif ($lastSeen)
                                    <span class="info-value">Offline   ({{ $lastSeen->diffForHumans() }})</span>
 @else
        <span class="last-seen-text">-</span>
    @endif
                                </div>
                            </div>
                        </div>

                        <!-- SEKSI 4: Alamat -->
                        <div class="info-section">
                            <div class="section-title">
                                <i class="fas fa-map-marker-alt"></i> Alamat
                            </div>
                            <div class="address-premium">
                                <p>
{{ $user->alamat }}
                                </p>

                            </div>
                        </div>
                    </div> <!-- akhir unified-body -->
                </div> <!-- akhir unified-card -->


            </div> <!-- akhir main-content -->
        </div> <!-- akhir profile-layout -->
    </div> <!-- akhir container -->


</main>


   <script>
        // Mendapatkan elemen notifikasi
        const notification = document.getElementById('notification');
        const notificationMessage = document.getElementById('notificationMessage');

        // Fungsi untuk menampilkan notifikasi
        function showNotification(message, icon = 'check-circle') {
            notificationMessage.textContent = message;
            notification.querySelector('i').className = `fas fa-${icon}`;
            notification.classList.add('show');
            setTimeout(() => notification.classList.remove('show'), 3000);
        }

        // 1. Avatar interactions
        const avatarWrapper = document.querySelector('.avatar-wrapper');
        const avatar = document.getElementById('profileAvatar');
        const avatarEdit = document.getElementById('avatarEditBtn');

        avatar.addEventListener('click', () => {
            avatarWrapper.style.animation = 'none';
            avatarWrapper.offsetHeight; // reflow
            avatarWrapper.style.animation = 'photoFloat 1.2s ease-in-out';
            showNotification('Memperbesar foto profil', 'search');
        });

        avatarEdit.addEventListener('click', (e) => {
            e.stopPropagation();
            showNotification('Pilih foto baru dari perangkat', 'cloud-upload-alt');

            avatarEdit.style.transform = 'scale(1.2)';
            setTimeout(() => avatarEdit.style.transform = '', 300);
        });

        avatarWrapper.addEventListener('mouseenter', () => {
            avatar.style.transform = 'scale(1.02)';
        });
        avatarWrapper.addEventListener('mouseleave', () => {
            avatar.style.transform = 'scale(1)';
        });

        // 2. Button actions (Sidebar)
        document.getElementById('editProfileBtn').addEventListener('click', function() {
            const btn = this;
            const original = btn.innerHTML;
            btn.innerHTML = '<span class="spinner"></span> Memuat...';
            btn.disabled = true;

            setTimeout(() => {
                btn.innerHTML = original;
                btn.disabled = false;
                showNotification('Mode edit profil diaktifkan', 'edit');
            }, 1500);
        });

        document.getElementById('changePasswordBtn').addEventListener('click', function() {
            showNotification('Fitur ganti password akan segera dibuka', 'lock');
        });

        // 3. Footer Actions
        document.getElementById('backToListBtn').addEventListener('click', function(e) {
            e.preventDefault();
            showNotification('Kembali ke halaman daftar user', 'arrow-left');
        });

        document.getElementById('editDataUserBtn').addEventListener('click', function(e) {
            e.preventDefault();
            showNotification('Membuka form edit data user', 'edit');
        });

        // 4. Statistik interaksi
        const statItems = document.querySelectorAll('.stat-item');
        statItems.forEach(item => {
            item.addEventListener('click', () => {
                showNotification('Statistik user: ' + item.querySelector('.stat-label').textContent, 'chart-simple');
            });
        });

        // 5. Double click nama untuk salin tautan
        const profileName = document.querySelector('.profile-info h2');
        profileName.addEventListener('dblclick', () => {
            navigator.clipboard.writeText('https://dashboard.pro/user/ahmad-dani').then(() => {
                showNotification('Tautan profil disalin ke clipboard', 'share-alt');
            });
        });

        // Bonus: klik pada badge admin
        document.querySelector('.profile-badge').addEventListener('click', function() {
            showNotification('Role: Administrator dengan akses penuh', 'crown');
        });
    </script>
