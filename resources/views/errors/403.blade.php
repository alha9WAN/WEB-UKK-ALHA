<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akses Ditolak - 403 Forbidden</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #22C55E;
            --primary-dark: #16A34A;
            --primary-darker: #15803D;
            --primary-light: #4ADE80;
            --primary-extra-light: #DCFCE7;
            --white: #FFFFFF;
            --gray-50: #FAFAFA;
            --gray-100: #F5F5F5;
            --gray-200: #E5E5E5;
            --gray-300: #D4D4D4;
            --gray-400: #A3A3A3;
            --gray-500: #737373;
            --gray-600: #525252;
            --gray-700: #404040;
            --gray-800: #262626;
            --gray-900: #171717;
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.08);
            --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 12px 32px rgba(0, 0, 0, 0.12);
            --shadow-xl: 0 20px 50px rgba(0, 0, 0, 0.15);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #F0FDF4 0%, #ECFDF5 100%);
            color: var(--gray-800);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            line-height: 1.6;
        }

        .error-container {
            max-width: 1000px;
            width: 100%;
            background: var(--white);
            border-radius: 28px;
            padding: 64px;
            text-align: center;
            box-shadow: var(--shadow-xl);
            border: 1px solid var(--gray-200);
            position: relative;
            overflow: hidden;
        }

        .error-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, var(--primary-light), var(--primary), var(--primary-dark));
        }

        .error-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 48px;
            position: relative;
        }

        .error-icon-container {
            position: relative;
            margin-bottom: 32px;
        }

        .error-icon-wrapper {
            width: 140px;
            height: 140px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            box-shadow:
                0 20px 40px rgba(34, 197, 94, 0.25),
                inset 0 -4px 8px rgba(0, 0, 0, 0.1),
                inset 0 4px 8px rgba(255, 255, 255, 0.3);
            position: relative;
            z-index: 1;
        }

        .error-icon-wrapper::before {
            content: '';
            position: absolute;
            inset: -6px;
            background: linear-gradient(135deg, var(--primary-light), var(--primary));
            border-radius: 50%;
            z-index: -1;
            opacity: 0.3;
            filter: blur(8px);
        }

        .error-icon {
            font-size: 56px;
            color: var(--white);
            text-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .error-code {
            font-size: 160px;
            font-weight: 900;
            line-height: 1;
            color: var(--primary-darker);
            margin-bottom: 8px;
            letter-spacing: -2px;
            position: relative;
            display: inline-block;
        }

        .error-code::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 4px;
            background: linear-gradient(to right, transparent, var(--primary), transparent);
            border-radius: 2px;
        }

        .error-title {
            font-size: 44px;
            font-weight: 800;
            margin-bottom: 16px;
            color: var(--gray-900);
            letter-spacing: -0.5px;
        }

        .error-subtitle {
            font-size: 20px;
            color: var(--gray-600);
            font-weight: 500;
            margin-bottom: 48px;
            max-width: 680px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.8;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 32px;
            margin-bottom: 48px;
        }

        .info-card {
            background: var(--white);
            border-radius: 20px;
            padding: 36px;
            text-align: left;
            border: 1px solid var(--gray-200);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .info-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
            border-color: var(--primary);
        }

        .info-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 6px;
            height: 100%;
            background: var(--primary);
        }

        .card-header {
            display: flex;
            align-items: center;
            margin-bottom: 24px;
        }

        .card-icon {
            width: 56px;
            height: 56px;
            background: var(--primary-extra-light);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            color: var(--primary-dark);
            font-size: 24px;
            border: 2px solid var(--primary-light);
        }

        .card-title {
            font-size: 22px;
            font-weight: 700;
            color: var(--gray-900);
        }

        .info-list {
            list-style: none;
            padding-left: 0;
        }

        .info-list li {
            padding: 12px 0;
            padding-left: 32px;
            position: relative;
            color: var(--gray-600);
            border-bottom: 1px solid var(--gray-100);
        }

        .info-list li:last-child {
            border-bottom: none;
        }

        .info-list li::before {
            content: '✓';
            position: absolute;
            left: 0;
            top: 12px;
            width: 20px;
            height: 20px;
            background: var(--primary-light);
            border-radius: 50%;
            color: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
        }

        .action-section {
            margin-bottom: 48px;
        }

        .action-title {
            font-size: 24px;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 32px;
        }

        .button-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .btn {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 18px 24px;
            font-size: 16px;
            font-weight: 600;
            text-decoration: none;
            border-radius: 14px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            border: none;
            gap: 12px;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            box-shadow: 0 6px 20px rgba(34, 197, 94, 0.25);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(34, 197, 94, 0.35);
        }

        .btn-secondary {
            background: var(--white);
            color: var(--primary-dark);
            border: 2px solid var(--primary-light);
            box-shadow: var(--shadow-sm);
        }

        .btn-secondary:hover {
            background: var(--primary-extra-light);
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(34, 197, 94, 0.2);
        }

        .btn-outline {
            background: transparent;
            color: var(--gray-600);
            border: 2px solid var(--gray-300);
        }

        .btn-outline:hover {
            background: var(--gray-50);
            border-color: var(--primary);
            color: var(--primary-dark);
            transform: translateY(-3px);
        }

        .btn-icon {
            font-size: 18px;
        }

        .alert-card {
            display: flex;
            align-items: center;
            background: var(--primary-extra-light);
            border-radius: 18px;
            padding: 28px;
            margin: 40px 0;
            border-left: 6px solid var(--primary);
            border-right: 6px solid var(--primary);
        }

        .alert-icon {
            min-width: 56px;
            height: 56px;
            background: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 24px;
            color: var(--primary-dark);
            font-size: 24px;
            box-shadow: var(--shadow-md);
            border: 2px solid var(--primary-light);
        }

        .alert-content {
            text-align: left;
            flex: 1;
        }

        .alert-title {
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 8px;
            font-size: 18px;
        }

        .alert-text {
            color: var(--gray-600);
            font-size: 15px;
            line-height: 1.6;
        }

        .contact-section {
            padding-top: 48px;
            border-top: 1px solid var(--gray-200);
        }

        .contact-title {
            font-size: 24px;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 36px;
            text-align: center;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 28px;
        }

        .contact-item {
            background: var(--gray-50);
            border-radius: 18px;
            padding: 28px;
            text-align: center;
            border: 1px solid var(--gray-200);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .contact-item:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
            border-color: var(--primary);
        }

        .contact-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-light), var(--primary));
        }

        .contact-icon {
            width: 64px;
            height: 64px;
            background: linear-gradient(135deg, var(--primary-light), var(--primary));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: var(--white);
            font-size: 28px;
            box-shadow: 0 8px 20px rgba(34, 197, 94, 0.3);
        }

        .contact-label {
            font-size: 14px;
            color: var(--gray-500);
            margin-bottom: 8px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .contact-value {
            font-size: 18px;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 8px;
        }

        .contact-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
            display: inline-block;
            padding: 4px 0;
        }

        .contact-link:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        @media (max-width: 1024px) {
            .error-container {
                padding: 48px 40px;
            }

            .info-grid {
                grid-template-columns: 1fr;
                gap: 28px;
            }
        }

        @media (max-width: 768px) {
            .error-code {
                font-size: 120px;
            }

            .error-title {
                font-size: 36px;
            }

            .error-subtitle {
                font-size: 18px;
            }

            .error-icon-wrapper {
                width: 120px;
                height: 120px;
            }

            .error-icon {
                font-size: 48px;
            }

            .button-container {
                grid-template-columns: 1fr;
            }

            .contact-grid {
                grid-template-columns: 1fr;
            }

            .alert-card {
                flex-direction: column;
                text-align: center;
            }

            .alert-icon {
                margin-right: 0;
                margin-bottom: 20px;
            }
        }

        @media (max-width: 480px) {
            .error-code {
                font-size: 100px;
            }

            .error-title {
                font-size: 32px;
            }

            .error-subtitle {
                font-size: 16px;
            }

            .error-container {
                padding: 40px 28px;
                border-radius: 24px;
            }

            .info-card {
                padding: 28px;
            }

            .card-header {
                flex-direction: column;
                text-align: center;
            }

            .card-icon {
                margin-right: 0;
                margin-bottom: 16px;
            }

            .btn {
                padding: 16px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-header">
            <div class="error-icon-container">
                <div class="error-icon-wrapper">
                    <i class="fas fa-lock error-icon"></i>
                </div>
            </div>

            <div class="error-code">403</div>

            <h1 class="error-title">Akses Ditolak</h1>

            <p class="error-subtitle">
                Maaf, Anda tidak memiliki izin untuk mengakses halaman ini.
                Halaman ini memerlukan hak akses khusus yang tidak dimiliki oleh akun Anda.
            </p>
        </div>



        <div class="action-section">
            <h3 class="action-title">Tindakan Selanjutnya</h3>
            <div class="button-container">
                <a href="{{ url('/') }}" class="btn btn-primary">
                    <i class="fas fa-home btn-icon"></i>
                    <span>Halaman Utama</span>
                </a>

            

                <button onclick="location.reload()" class="btn btn-outline">
                    <i class="fas fa-redo-alt btn-icon"></i>
                    <span>Muat Ulang</span>
                </button>
            </div>
        </div>

        <div class="alert-card">
            <div class="alert-icon">
                <i class="fas fa-shield-alt"></i>
            </div>
            <div class="alert-content">
                <div class="alert-title">Perhatian Keamanan</div>
                <div class="alert-text">
                    Untuk alasan keamanan sistem, detail spesifik tentang batasan akses tidak ditampilkan secara publik.
                    Jika Anda merasa ini adalah kesalahan atau memerlukan akses khusus, silakan hubungi tim dukungan kami.
                </div>
            </div>
        </div>


    </div>


</body>
</html>
