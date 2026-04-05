<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #10B981;
            --primary-dark: #0da271;
            --primary-light: #d1fae5;
            --white: #ffffff;
            --light-bg: #f9fafb;
            --text-dark: #1f2937;
            --text-light: #6b7280;
            --border: #e5e7eb;
            --error: #ef4444;
            --success: #10B981;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--light-bg);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            max-width: 500px;
        }

        .logo {
            margin-bottom: 30px;
            text-align: center;
        }

        .logo-icon {
            font-size: 48px;
            color: var(--primary);
            margin-bottom: 10px;
        }

        .logo-text {
            color: var(--text-dark);
            font-size: 24px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .card {
            background-color: var(--white);
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            width: 100%;
            overflow: hidden;
            border: 1px solid var(--border);
        }

        .card-header {
            background-color: var(--white);
            color: var(--text-dark);
            padding: 30px 30px 10px;
            text-align: center;
            border-bottom: 1px solid var(--border);
        }

        .card-header h1 {
            font-size: 28px;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .card-header p {
            color: var(--text-light);
            font-size: 16px;
            line-height: 1.5;
        }

        .card-body {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--text-dark);
            font-size: 15px;
        }

        .input-container {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary);
            font-size: 18px;
        }

        .form-input {
            width: 100%;
            padding: 15px 15px 15px 50px;
            border: 2px solid var(--border);
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s;
            background-color: var(--white);
            color: var(--text-dark);
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px var(--primary-light);
        }

        .form-input::placeholder {
            color: var(--text-light);
            opacity: 0.7;
        }

        .submit-btn {
            background-color: var(--primary);
            color: var(--white);
            border: none;
            padding: 16px 30px;
            border-radius: 10px;
            font-size: 17px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
        }

        .submit-btn:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(16, 185, 129, 0.3);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .submit-btn:disabled {
            background-color: #9ca3af;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .help-text {
            margin-top: 20px;
            text-align: center;
            color: var(--text-light);
            font-size: 14px;
            line-height: 1.6;
            padding: 0 10px;
        }

        .back-link {
            display: inline-block;
            margin-top: 25px;
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            text-align: center;
            width: 100%;
            padding: 12px;
            transition: all 0.3s;
            border-radius: 8px;
        }

        .back-link:hover {
            color: var(--primary-dark);
            background-color: var(--primary-light);
            text-decoration: none;
        }

        .notification {
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 25px;
            display: none;
            align-items: center;
            gap: 12px;
        }

        .notification.success {
            background-color: var(--primary-light);
            color: var(--text-dark);
            border: 1px solid var(--primary);
        }

        .notification.error {
            background-color: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        .notification-icon {
            font-size: 20px;
        }

        .input-error {
            color: var(--error);
            font-size: 14px;
            margin-top: 5px;
            display: none;
            align-items: center;
            gap: 5px;
        }

        .info-box {
            background-color: var(--primary-light);
            border-left: 4px solid var(--primary);
            padding: 15px;
            border-radius: 0 8px 8px 0;
            margin-top: 30px;
        }

        .info-box p {
            margin-bottom: 8px;
            color: var(--text-dark);
            font-size: 14px;
            line-height: 1.5;
        }

        .info-box strong {
            color: var(--primary-dark);
        }

        .password-strength {
            margin-top: 10px;
            display: none;
        }

        .strength-bar {
            height: 6px;
            background-color: var(--border);
            border-radius: 3px;
            overflow: hidden;
            margin-top: 5px;
        }

        .strength-fill {
            height: 100%;
            width: 0%;
            transition: width 0.3s, background-color 0.3s;
            border-radius: 3px;
        }

        .strength-text {
            font-size: 12px;
            color: var(--text-light);
            margin-top: 3px;
        }

        @media (max-width: 768px) {
            .card-header, .card-body {
                padding: 25px;
            }

            .card-header h1 {
                font-size: 24px;
            }

            .logo-text {
                font-size: 20px;
            }
        }

        @media (max-width: 480px) {
            .card-header, .card-body {
                padding: 20px;
            }

            .card-header h1 {
                font-size: 22px;
            }

            .submit-btn {
                padding: 14px 20px;
                font-size: 16px;
            }

            body {
                padding: 15px;
            }
        }

                     /* css validasi */
        .input-error {
    border-color: var(--error) !important;
    background: #fff5f5;
}

.error-text {
    font-size: 12px;
    color: var(--error);
    margin-top: 6px;
    display: block;
}
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <div class="logo-icon">
                <i class="fas fa-lock"></i>
            </div>
            <div class="logo-text">SecureAccess</div>
        </div>

        <div class="card">
            <div class="card-header">
                <h1>Reset Password</h1>
                <p>Masukkan email Anda untuk menerima link reset password</p>
            </div>

            <div class="card-body">
                <div id="notification" class="notification">
                    <i class="notification-icon"></i>
                    <span class="notification-text"></span>
                </div>

                <form id="resetForm" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="form-label">Alamat Email</label>
                        <div class="input-container">
                            <i class="fas fa-envelope input-icon"></i>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-input"
                                placeholder="nama@contoh.com"
                                required  value="{{ old('email') }}"

                            >
                        </div>
                        <!-- untuk tulisan eror validasi -->
                            {{-- validasi --}}
                            @error('email')
                     <small class="error-text">{{ $message }}</small>
                          @enderror
                    </div>

                    <button type="submit" class="submit-btn">
                        <i class="fas fa-paper-plane"></i>
                        <span>Kirim Link Reset</span>
                    </button>
                </form>

                <div class="help-text">
                    <i class="fas fa-info-circle" style="color: var(--primary); margin-right: 5px;"></i>
                    Link reset password akan dikirim ke email Anda.
                    Periksa folder spam jika Anda tidak menemukannya dalam beberapa menit.
                </div>

                <div class="info-box">
                    <p><strong>Perhatian:</strong></p>
                    <p>• Pastikan Anda memasukkan email yang terdaftar di akun Anda</p>
                    <p>• Setelah reset, pastikan untuk menggunakan password yang kuat</p>
                </div>

                <a href="{{ route('login') }}" class="back-link">
                    <i class="fas fa-arrow-left"></i> Kembali ke halaman login
                </a>
            </div>
        </div>
    </div>


</body>
</html>
