



<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email - ToolRentPro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #10B981;
            --primary-dark: #059669;
            --primary-light: #34D399;
            --primary-soft: #D1FAE5;
            --primary-very-soft: #ECFDF5;
            --secondary: #0F766E;
            --accent: #F59E0B;
            --accent-light: #FBBF24;
            --white: #FFFFFF;
            --light-1: #F9FAFB;
            --light-2: #F3F4F6;
            --light-3: #E5E7EB;
            --dark: #111827;
            --dark-2: #1F2937;
            --dark-3: #374151;
            --dark-4: #4B5563;
            --dark-5: #6B7280;
            --dark-6: #9CA3AF;
            --gradient-primary: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            --gradient-primary-light: linear-gradient(135deg, var(--primary-light) 0%, var(--secondary) 100%);
            --gradient-accent: linear-gradient(135deg, var(--accent) 0%, var(--accent-light) 100%);
            --shadow-sm: 0 2px 8px rgba(16, 185, 129, 0.08);
            --shadow: 0 4px 16px rgba(16, 185, 129, 0.12);
            --shadow-md: 0 8px 32px rgba(16, 185, 129, 0.16);
            --shadow-lg: 0 16px 48px rgba(16, 185, 129, 0.2);
            --shadow-xl: 0 24px 64px rgba(16, 185, 129, 0.24);
            --radius-sm: 8px;
            --radius: 12px;
            --radius-md: 16px;
            --radius-lg: 20px;
            --radius-xl: 24px;
            --radius-2xl: 32px;
            --radius-3xl: 48px;
            --radius-full: 9999px;
            --transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-slow: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, var(--primary-very-soft) 0%, var(--white) 100%);
            color: var(--dark);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .verification-container {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            max-width: 950px;
            margin: 0 auto;
        }

        .verification-card {
            background: var(--white);
            border-radius: var(--radius-3xl);
            box-shadow: var(--shadow-xl);
            overflow: hidden;
            border: 2px solid var(--light-3);
            animation: cardAppear 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            width: 100%;
            min-height: 520px;
            position: relative;
        }

        .verification-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: var(--gradient-primary);
            z-index: 2;
        }

        .verification-left {
            flex: 0 0 45%;
            background: var(--gradient-primary);
            padding: 48px 40px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            text-align: center;
            color: var(--white);
            position: relative;
            overflow: hidden;
        }

        .verification-left::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("data:image/svg+xml,%3Csvg width='120' height='120' viewBox='0 0 120 120' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
            opacity: 0.3;
        }

        .left-header {
            position: relative;
            z-index: 1;
            margin-bottom: 32px;
        }

        .logo-left {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-bottom: 32px;
        }

        .logo-icon-left {
            width: 52px;
            height: 52px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 1.8rem;
            border: 2px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
        }

        .logo-text-left {
            font-family: 'Poppins', sans-serif;
            font-weight: 800;
            font-size: 2rem;
            color: var(--white);
            letter-spacing: -0.5px;
        }

        .verification-icon {
            width: 120px;
            height: 120px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 32px;
            color: var(--white);
            font-size: 3.5rem;
            border: 4px solid rgba(255, 255, 255, 0.25);
            position: relative;
            animation: iconFloat 4s ease-in-out infinite;
            backdrop-filter: blur(10px);
        }

        .verification-icon::after {
            content: '';
            position: absolute;
            top: -8px;
            right: -8px;
            width: 32px;
            height: 32px;
            background: var(--accent);
            border-radius: 50%;
            border: 4px solid var(--primary);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .verification-icon i {
            animation: iconPulse 2s ease-in-out infinite;
        }

        .left-title {
            font-family: 'Poppins', sans-serif;
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 16px;
            position: relative;
            z-index: 1;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .left-description {
            font-size: 1.05rem;
            opacity: 0.9;
            max-width: 320px;
            position: relative;
            z-index: 1;
            line-height: 1.6;
            margin-bottom: 0;
        }

        .verification-right {
            flex: 0 0 55%;
            padding: 48px 56px;
            display: flex;
            flex-direction: column;
        }

        .right-header {
            margin-bottom: 32px;
        }

        .logo-right {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 32px;
            text-decoration: none;
        }

        .logo-icon-right {
            width: 44px;
            height: 44px;
            background: var(--gradient-primary);
            border-radius: var(--radius);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 1.4rem;
            box-shadow: var(--shadow);
        }

        .logo-text-right {
            font-family: 'Poppins', sans-serif;
            font-weight: 800;
            font-size: 1.8rem;
            color: var(--dark);
        }

        .verification-title {
            font-family: 'Poppins', sans-serif;
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 12px;
            line-height: 1.2;
        }

        .verification-subtitle {
            font-size: 1.05rem;
            color: var(--dark-5);
            margin-bottom: 32px;
            line-height: 1.6;
        }

        .alert-success {
            background: var(--primary-very-soft);
            border: 2px solid var(--primary-light);
            border-radius: var(--radius-lg);
            padding: 20px;
            margin-bottom: 28px;
            display: flex;
            align-items: center;
            gap: 16px;
            animation: fadeIn 0.3s ease-out;
            box-shadow: var(--shadow-sm);
        }

        .alert-success i {
            color: var(--primary);
            font-size: 1.5rem;
        }

        .alert-success-content {
            flex: 1;
        }

        .alert-success-title {
            font-weight: 700;
            color: var(--primary-dark);
            font-size: 1.1rem;
            margin-bottom: 4px;
        }

        .alert-success-description {
            color: var(--dark-4);
            font-size: 0.95rem;
            line-height: 1.5;
            margin: 0;
        }

        .verification-message {
            background: var(--light-1);
            border-radius: var(--radius-lg);
            padding: 24px;
            margin-bottom: 32px;
            border-left: 4px solid var(--primary);
            box-shadow: var(--shadow-sm);
        }

        .verification-message p {
            color: var(--dark-4);
            font-size: 1rem;
            line-height: 1.6;
            margin: 0;
        }

        .verification-message strong {
            color: var(--primary-dark);
            font-weight: 600;
        }

        .verification-steps {
            margin-bottom: 32px;
        }

        .step {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            margin-bottom: 20px;
            padding: 16px;
            border-radius: var(--radius);
            background: var(--light-1);
            transition: var(--transition);
            border: 1px solid transparent;
        }

        .step:hover {
            background: var(--primary-very-soft);
            border-color: var(--primary-light);
            transform: translateX(4px);
        }

        .step:last-child {
            margin-bottom: 0;
        }

        .step-number {
            width: 36px;
            height: 36px;
            background: var(--gradient-primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-weight: 700;
            font-size: 1rem;
            flex-shrink: 0;
            box-shadow: var(--shadow-sm);
        }

        .step-content {
            flex: 1;
        }

        .step-title {
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 6px;
            font-size: 1.05rem;
        }

        .step-description {
            color: var(--dark-5);
            font-size: 0.95rem;
            line-height: 1.5;
        }

        .verification-actions {
            margin-top: auto;
        }

        .action-buttons {
            display: flex;
            gap: 16px;
            margin-bottom: 24px;
        }

        .btn {
            padding: 16px 32px;
            border-radius: var(--radius);
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: var(--transition);
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            text-decoration: none;
            flex: 1;
            position: relative;
            overflow: hidden;
        }

        .btn-primary {
            background: var(--gradient-primary);
            color: var(--white);
            box-shadow: var(--shadow);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
            background: var(--gradient-primary-light);
        }

        .btn-secondary {
            background: var(--light-1);
            color: var(--dark);
            border: 2px solid var(--light-3);
        }

        .btn-secondary:hover {
            background: var(--primary-very-soft);
            border-color: var(--primary);
            color: var(--primary);
            transform: translateY(-3px);
        }

        @keyframes cardAppear {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes iconFloat {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            33% {
                transform: translateY(-10px) rotate(5deg);
            }
            66% {
                transform: translateY(5px) rotate(-5deg);
            }
        }

        @keyframes iconPulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes stepIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @media (max-width: 1024px) {
            .verification-card {
                max-width: 850px;
            }

            .verification-left {
                padding: 40px 32px;
            }

            .verification-right {
                padding: 40px 48px;
            }
        }

        @media (max-width: 900px) {
            .verification-card {
                flex-direction: column;
                min-height: auto;
                max-width: 600px;
            }

            .verification-left,
            .verification-right {
                flex: 0 0 100%;
                padding: 40px 32px;
            }

            .verification-left {
                padding-bottom: 48px;
            }

            .verification-right {
                padding-top: 48px;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }

        @media (max-width: 600px) {
            body {
                padding: 16px;
            }

            .verification-left,
            .verification-right {
                padding: 32px 24px;
            }

            .verification-title {
                font-size: 1.5rem;
            }

            .verification-subtitle {
                font-size: 1rem;
            }

            .verification-icon {
                width: 100px;
                height: 100px;
                font-size: 3rem;
            }

            .left-title {
                font-size: 1.75rem;
            }

            .logo-text-left,
            .logo-text-right {
                font-size: 1.5rem;
            }

            .logo-icon-left,
            .logo-icon-right {
                width: 44px;
                height: 44px;
                font-size: 1.5rem;
            }

            .step {
                padding: 12px;
            }
        }

        @media (max-width: 400px) {
            .verification-left,
            .verification-right {
                padding: 24px 20px;
            }

            .verification-title {
                font-size: 1.3rem;
            }

            .verification-icon {
                width: 80px;
                height: 80px;
                font-size: 2.5rem;
            }

            .btn {
                padding: 14px 24px;
                font-size: 0.95rem;
            }
        }
    </style>
</head>
<body>

    <div class="verification-container">
        <div class="verification-card">
            <div class="verification-left">
                <div class="left-header">
                    <div class="logo-left">
                        <div class="logo-icon-left">
                            <i class="fas fa-tools"></i>
                        </div>
                        <span class="logo-text-left">ToolRentPro</span>
                    </div>

                    <div class="verification-icon">
                        <i class="fas fa-envelope-open-text"></i>
                    </div>

                    <h2 class="left-title">Verifikasi Email</h2>
                    <p class="left-description">Verifikasi akun Anda</p>
                </div>


            </div>

            <div class="verification-right">
                <div class="right-header">
                    <a href="/" class="logo-right">
                        <div class="logo-icon-right">
                            <i class="fas fa-tools"></i>
                        </div>
                        <span class="logo-text-right">ToolRentPro</span>
                    </a>

                    <h1 class="verification-title">Verifikasi Email Anda</h1>
                    <p class="verification-subtitle">Selesaikan verifikasi untuk mulai menggunakan semua fitur ToolRentPro</p>
                </div>

                <div class="alert-success">
                    <i class="fas fa-check-circle"></i>
                    <div class="alert-success-content">
                        <div class="alert-success-title">Link Verifikasi Terkirim!</div>
                        <p class="alert-success-description">Kami telah mengirimkan email verifikasi ke alamat email Anda. Silakan cek inbox Anda.</p>
                    </div>
                </div>

                <div class="verification-message">
                    <p><strong>Penting:</strong> Verifikasi email diperlukan untuk mengaktifkan akun Anda. Setelah diverifikasi, Anda dapat mulai menyewa alat-alat, melihat riwayat peminjaman, dan menikmati semua fitur ToolRentPro.</p>
                </div>

                <div class="verification-steps">
                    <div class="step" style="animation: stepIn 0.5s ease-out 0.1s both;">
                        <div class="step-number">1</div>
                        <div class="step-content">
                            <h3 class="step-title">Cek Email Anda</h3>
                            <p class="step-description">Buka inbox email yang Anda daftarkan. Cari email dengan subjek "Verifikasi Email ToolRentPro".</p>
                        </div>
                    </div>

                    <div class="step" style="animation: stepIn 0.5s ease-out 0.2s both;">
                        <div class="step-number">2</div>
                        <div class="step-content">
                            <h3 class="step-title">Klik Link Verifikasi</h3>
                            <p class="step-description">Klik link "Verifikasi Email" yang terdapat di dalam email untuk mengaktifkan akun Anda.</p>
                        </div>
                    </div>

                    <div class="step" style="animation: stepIn 0.5s ease-out 0.3s both;">
                        <div class="step-number">3</div>
                        <div class="step-content">
                            <h3 class="step-title">Mulai Eksplorasi</h3>
                            <p class="step-description">Setelah diverifikasi, Anda akan diarahkan ke dashboard dan bisa mulai menyewa alat-alat.</p>
                        </div>
                    </div>
                </div>


                <div class="verification-actions">
                    <div class="action-buttons">
                          {{-- KIRIM ULANG VERFIFIKASI --}}
                        <form method="POST" action="{{ route('kirimulangverfikasi') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane"></i>
                                Kirim Ulang Email Verifikasi
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

       {{-- NOTIFIKASI --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('swal'))
<script>
    Swal.fire({
        icon: '{{ session('swal.type') }}',
        title: '<strong>{{ session('swal.title') }}</strong>',
        html: '<span class="swal-text">{{ session('swal.text') }}</span>',
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3500,
        timerProgressBar: true,
        iconColor: '#00b894', // centang hijau
        background: 'linear-gradient(145deg, #ffffff, #f7f8fb)', // putih ke abu sangat terang
        customClass: {
            popup: 'my-swal-popup'
        }
    });
</script>
@endif

<style>
/* Popup utama */
.my-swal-popup {
    margin-top: 80px;  /* jarak dari navbar */
    box-shadow: 0 12px 35px rgba(0,0,0,0.25); /* efek mengambang lebih dramatis */
    border-radius: 14px; /* sudut bulat */
    border: 1px solid #00b894; /* border tipis hijau */
    font-family: 'Poppins', sans-serif;
    font-weight: 600; /* judul agak tebal */
    padding: 18px 25px;
}

/* teks dalam popup */
.swal-text {
    color: #2d3436; /* abu tua supaya tetap kontras */
    font-weight: 500; /* sedikit tebal */
    font-size: 14px;
}

/* animasi masuk */
.swal2-popup {
    animation: slide-bounce 0.6s ease;
}

/* keyframes slide + bounce */
@keyframes slide-bounce {
    0%   { transform: translateY(-50px); opacity: 0; }
    60%  { transform: translateY(10px); opacity: 1; }
    80%  { transform: translateY(-5px); }
    100% { transform: translateY(0); }
}
</style>
{{-- END NOTIFIKASI --}}
</body>
</html>
