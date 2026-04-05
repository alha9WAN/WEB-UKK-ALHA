



<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi | GreenTools - Alat Pertukangan Premium</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@700;800;900&family=Montserrat:wght@600;700;800&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #10B981;
            --primary-dark: #059669;
            --primary-light: #34D399;
            --primary-extra-light: #D1FAE5;
            --secondary: #1F2937;
            --secondary-light: #4B5563;
            --white: #FFFFFF;
            --white-soft: #F9FAFB;
            --white-soft-2: #F3F4F6;
            --text: #111827;
            --text-light: #6B7280;
            --text-lighter: #9CA3AF;
            --border: #E5E7EB;
            --border-light: #F3F4F6;
            --success: #10B981;
            --warning: #F59E0B;
            --error: #EF4444;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            --shadow-md: 0 6px 12px -2px rgba(0, 0, 0, 0.08), 0 4px 8px -2px rgba(0, 0, 0, 0.05);
            --shadow-lg: 0 10px 25px -5px rgba(0, 0, 0, 0.08), 0 8px 16px -4px rgba(0, 0, 0, 0.04);
            --shadow-xl: 0 20px 40px -10px rgba(16, 185, 129, 0.12);
            --gradient-green: linear-gradient(135deg, #10B981 0%, #059669 100%);
            --gradient-white-green: linear-gradient(135deg, #FFFFFF 0%, #D1FAE5 100%);
            --gradient-soft: linear-gradient(135deg, #F9FAFB 0%, #ECFDF5 100%);
        }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #0c4a6e 0%, #065f46 30%, #064e3b 70%, #022c22 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }

        /* Animated Background */
        .animated-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -2;
        }

        .bg-circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(16, 185, 129, 0.08);
            animation: float-bg 25s infinite linear;
        }

        .bg-circle:nth-child(1) {
            width: 400px;
            height: 400px;
            top: -150px;
            left: -150px;
            animation-delay: 0s;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.12) 0%, transparent 70%);
        }

        .bg-circle:nth-child(2) {
            width: 300px;
            height: 300px;
            bottom: -100px;
            right: -100px;
            animation-delay: -5s;
            background: radial-gradient(circle, rgba(5, 150, 105, 0.1) 0%, transparent 70%);
        }

        .bg-circle:nth-child(3) {
            width: 500px;
            height: 500px;
            top: 50%;
            right: -200px;
            animation-delay: -10s;
            background: radial-gradient(circle, rgba(52, 211, 153, 0.08) 0%, transparent 70%);
        }

        @keyframes float-bg {
            0% { transform: translate(0, 0) rotate(0deg); }
            33% { transform: translate(30px, -30px) rotate(120deg); }
            66% { transform: translate(-20px, 20px) rotate(240deg); }
            100% { transform: translate(0, 0) rotate(360deg); }
        }

        /* Animated Tools Background */
        .tools-background {
            position: absolute;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
            opacity: 0.05;
        }

        .tool-bg {
            position: absolute;
            font-size: 80px;
            color: var(--primary-light);
            animation: float-tool-bg 35s infinite linear;
        }

        .tool-bg:nth-child(1) { top: 10%; left: 5%; animation-delay: 0s; }
        .tool-bg:nth-child(2) { top: 20%; right: 10%; animation-delay: -7s; }
        .tool-bg:nth-child(3) { bottom: 30%; left: 15%; animation-delay: -14s; }
        .tool-bg:nth-child(4) { bottom: 15%; right: 20%; animation-delay: -21s; }
        .tool-bg:nth-child(5) { top: 50%; left: 25%; animation-delay: -28s; }
        .tool-bg:nth-child(6) { top: 70%; right: 30%; animation-delay: -35s; }

        @keyframes float-tool-bg {
            0% { transform: translate(0, 0) rotate(0deg) scale(1); }
            25% { transform: translate(50px, -30px) rotate(90deg) scale(1.2); }
            50% { transform: translate(-40px, 40px) rotate(180deg) scale(0.8); }
            75% { transform: translate(30px, 50px) rotate(270deg) scale(1.1); }
            100% { transform: translate(0, 0) rotate(360deg) scale(1); }
        }

        /* Particle Background */
        .particles {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float-particle 15s infinite linear;
        }

        @keyframes float-particle {
            0% { transform: translateY(0) translateX(0); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(-100vh) translateX(100px); opacity: 0; }
        }

        /* Main Container */
        .login-container {
            width: 100%;
            max-width: 1200px;
            min-height: 700px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 28px;
            overflow: hidden;
            box-shadow:
                0 20px 60px rgba(0, 0, 0, 0.3),
                0 0 0 1px rgba(255, 255, 255, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            position: relative;
            opacity: 0;
            transform: translateY(30px) scale(0.95);
            animation:
                slide-up 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) 0.5s forwards,
                glow-pulse 4s infinite alternate 1.3s;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        @keyframes slide-up {
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes glow-pulse {
            0% { box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3), 0 0 0 1px rgba(255, 255, 255, 0.1), inset 0 1px 0 rgba(255, 255, 255, 0.3); }
            100% { box-shadow: 0 20px 80px rgba(16, 185, 129, 0.4), 0 0 0 1px rgba(255, 255, 255, 0.2), inset 0 1px 0 rgba(255, 255, 255, 0.4); }
        }

        /* Branding Side - Green Theme */
        .branding-side {
            background: var(--gradient-green);
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .branding-side::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle at center, rgba(255, 255, 255, 0.15) 0%, transparent 70%);
            animation: rotate-bg 20s linear infinite;
        }

        @keyframes rotate-bg {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .brand-logo {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 50px;
            position: relative;
            z-index: 1;
            animation: logo-float 3s ease-in-out infinite;
        }

        @keyframes logo-float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .logo-icon {
            width: 70px;
            height: 70px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 32px;
            box-shadow:
                0 8px 32px rgba(0, 0, 0, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.3);
            animation: icon-pulse 2s infinite;
        }

        @keyframes icon-pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .logo-text {
            font-family: 'Poppins', sans-serif;
            font-size: 36px;
            font-weight: 900;
            color: var(--white);
            letter-spacing: -0.5px;
            line-height: 1.1;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .logo-subtitle {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.9);
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-top: 5px;
            font-weight: 500;
        }

        .brand-tagline {
            font-size: 42px;
            font-weight: 800;
            color: var(--white);
            line-height: 1.2;
            margin-bottom: 30px;
            position: relative;
            z-index: 1;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            animation: fade-in-up 1s ease 0.8s both;
        }

        .brand-tagline::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 0;
            width: 100px;
            height: 4px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 2px;
            animation: expand-width 1s ease 1s both;
        }

        @keyframes fade-in-up {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes expand-width {
            from { width: 0; }
            to { width: 100px; }
        }

        .brand-description {
            color: rgba(255, 255, 255, 0.9);
            font-size: 17px;
            line-height: 1.7;
            margin-bottom: 45px;
            position: relative;
            z-index: 1;
            font-weight: 400;
            animation: fade-in-up 1s ease 1.2s both;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
            position: relative;
            z-index: 1;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 22px;
            border: 1px solid rgba(255, 255, 255, 0.15);
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            opacity: 0;
            transform: translateY(20px);
            animation: fade-in-up 0.6s ease forwards;
        }

        .feature-card:nth-child(1) { animation-delay: 1.4s; }
        .feature-card:nth-child(2) { animation-delay: 1.6s; }
        .feature-card:nth-child(3) { animation-delay: 1.8s; }
        .feature-card:nth-child(4) { animation-delay: 2s; }

        .feature-card:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-10px) scale(1.05);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }

        .feature-icon {
            width: 48px;
            height: 48px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 20px;
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }

        .feature-card:hover .feature-icon {
            background: rgba(255, 255, 255, 0.25);
            transform: rotateY(360deg);
        }

        .feature-title {
            color: var(--white);
            font-weight: 700;
            font-size: 16px;
            margin-bottom: 8px;
        }

        .feature-desc {
            color: rgba(255, 255, 255, 0.8);
            font-size: 13px;
            line-height: 1.5;
        }

        /* Login Side - White Theme */
        .login-side {
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: var(--white);
        }

        .welcome-section {
            margin-bottom: 40px;
            animation: fade-in-up 1s ease 0.5s both;
        }

        .welcome-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--primary-extra-light);
            color: var(--primary-dark);
            padding: 10px 20px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 20px;
            animation: badge-pulse 2s infinite;
        }

        @keyframes badge-pulse {
            0%, 100% { box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2); }
            50% { box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4); }
        }

        .welcome-badge i {
            font-size: 12px;
        }

        .login-title {
            font-family: 'Poppins', sans-serif;
            font-size: 40px;
            font-weight: 800;
            color: var(--text);
            margin-bottom: 10px;
            line-height: 1.2;
        }

        .login-subtitle {
            color: var(--text-light);
            font-size: 16px;
            line-height: 1.6;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 28px;
            position: relative;
            animation: fade-in-up 0.8s ease forwards;
            opacity: 0;
        }

        .form-group:nth-child(1) { animation-delay: 0.8s; }
        .form-group:nth-child(2) { animation-delay: 1s; }
        .form-group:nth-child(3) { animation-delay: 1.2s; }

        .form-label {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 10px;
            font-weight: 600;
            color: var(--secondary);
            font-size: 15px;
        }

        .form-label i {
            color: var(--primary);
            font-size: 14px;
        }

        .input-with-icon {
            position: relative;
        }

        .form-input {
            width: 100%;
            padding: 18px 55px 18px 20px;
            border: 2px solid var(--border);
            border-radius: 14px;
            font-size: 16px;
            font-weight: 500;
            color: var(--text);
            background: var(--white-soft);
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            outline: none;
        }

        .form-input:focus {
            border-color: var(--primary);
            background: var(--white);
            box-shadow:
                0 0 0 4px rgba(16, 185, 129, 0.1),
                0 4px 12px rgba(16, 185, 129, 0.2);
            transform: translateY(-2px);
        }

        .form-input:hover:not(:focus) {
            border-color: var(--primary-light);
            background: var(--white-soft-2);
        }

        .form-input::placeholder {
            color: var(--text-lighter);
            font-weight: 400;
        }

        .input-icon {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-lighter);
            font-size: 18px;
            transition: all 0.3s ease;
        }

        .form-input:focus + .input-icon {
            color: var(--primary);
            transform: translateY(-50%) scale(1.2) rotate(10deg);
        }

        .password-toggle {
            position: absolute;
            right: 50px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--text-lighter);
            cursor: pointer;
            font-size: 18px;
            padding: 5px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .password-toggle:hover {
            color: var(--primary);
            transform: translateY(-50%) scale(1.2);
        }

        /* Options Row */
        .options-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding: 10px 0;
            animation: fade-in-up 0.8s ease 1.4s both;
            opacity: 0;
        }

        .checkbox-container {
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
            user-select: none;
        }

        .checkbox-custom {
            width: 22px;
            height: 22px;
            border: 2px solid var(--border);
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            background: var(--white);
        }

        .checkbox-container:hover .checkbox-custom {
            border-color: var(--primary-light);
            transform: scale(1.1);
        }

        .checkbox-container input:checked + .checkbox-custom {
            background: var(--primary);
            border-color: var(--primary);
            animation: checkbox-check 0.3s ease;
        }

        @keyframes checkbox-check {
            0% { transform: scale(0.8); }
            50% { transform: scale(1.2); }
            100% { transform: scale(1); }
        }

        .checkbox-container input:checked + .checkbox-custom::after {
            content: '✓';
            color: white;
            font-size: 14px;
            font-weight: bold;
        }

        .remember-text {
            color: var(--text);
            font-weight: 500;
            font-size: 15px;
        }

        .forgot-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s ease;
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .forgot-link i {
            font-size: 12px;
            transition: transform 0.3s ease;
        }

        .forgot-link:hover i {
            transform: translateX(5px);
        }

        .forgot-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary);
            transition: width 0.3s ease;
        }

        .forgot-link:hover {
            color: var(--primary-dark);
        }

        .forgot-link:hover::after {
            width: 100%;
        }

        /* Login Button */
        .login-button {
            width: 100%;
            padding: 20px;
            background: var(--gradient-green);
            color: var(--white);
            border: none;
            border-radius: 14px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
            animation: fade-in-up 0.8s ease 1.6s both;
            opacity: 0;
        }

        .login-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.7s ease;
        }

        .login-button:hover::before {
            left: 100%;
        }

        .login-button:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow:
                var(--shadow-lg),
                0 10px 30px rgba(16, 185, 129, 0.4);
        }

        .login-button:active {
            transform: translateY(-2px);
        }

        /* Divider */
        .divider {
            display: flex;
            align-items: center;
            margin: 30px 0;
            color: var(--text-light);
            font-size: 14px;
            font-weight: 500;
            animation: fade-in-up 0.8s ease 1.8s both;
            opacity: 0;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(to right, transparent, var(--border), transparent);
        }

        .divider span {
            padding: 0 18px;
            background: var(--white);
        }

        /* Social Login */
        .social-login {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
            margin-bottom: 30px;
            animation: fade-in-up 0.8s ease 2s both;
            opacity: 0;
        }

        .social-button {
            padding: 16px;
            border: 2px solid var(--border-light);
            border-radius: 12px;
            background: var(--white);
            color: var(--text);
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            font-size: 15px;
        }

        .social-button:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: var(--shadow-md);
            border-color: var(--primary-light);
        }

        .social-button.google {
            color: #4285F4;
        }

        .social-button.facebook {
            color: #1877F2;
        }

        /* Register Section */
        .register-section {
            text-align: center;
            margin-top: 30px;
            padding-top: 25px;
            border-top: 1px solid var(--border-light);
            animation: fade-in-up 0.8s ease 2.2s both;
            opacity: 0;
        }

        .register-text {
            color: var(--text-light);
            font-size: 15px;
        }

        .register-link {
            color: var(--primary);
            font-weight: 700;
            text-decoration: none;
            margin-left: 8px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            position: relative;
        }

        .register-link:hover {
            color: var(--primary-dark);
        }

        .register-link i {
            font-size: 12px;
            transition: transform 0.3s ease;
        }

        .register-link:hover i {
            transform: translateX(5px);
        }

        .register-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary);
            transition: width 0.3s ease;
        }

        .register-link:hover::after {
            width: 100%;
        }

        /* Responsive Design */
        @media (max-width: 1100px) {
            .login-container {
                max-width: 1000px;
                min-height: 650px;
            }

            .branding-side,
            .login-side {
                padding: 50px;
            }

            .brand-tagline {
                font-size: 36px;
            }

            .login-title {
                font-size: 36px;
            }
        }

        @media (max-width: 900px) {
            .login-container {
                grid-template-columns: 1fr;
                max-width: 600px;
                min-height: auto;
            }

            .branding-side {
                padding: 50px 40px;
                display: none;
            }

            .login-side {
                padding: 50px 40px;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
            .login-side {
                padding: 40px 30px;
            }

            .login-title {
                font-size: 32px;
            }

            .social-login {
                grid-template-columns: 1fr;
            }

            .options-row {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }

            .welcome-badge {
                padding: 8px 16px;
                font-size: 13px;
            }
        }

        /* Notification */
        .notification {
            position: fixed;
            top: 25px;
            right: 25px;
            padding: 18px 24px;
            background: var(--white);
            border-radius: 14px;
            box-shadow: var(--shadow-xl);
            display: flex;
            align-items: center;
            gap: 14px;
            transform: translateX(150%) scale(0.9);
            transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
            z-index: 1000;
            max-width: 350px;
            border-left: 4px solid var(--primary);
        }

        .notification.show {
            transform: translateX(0) scale(1);
        }

        .notification.success {
            border-left-color: var(--success);
        }

        .notification.error {
            border-left-color: var(--error);
        }

        .notification-icon {
            font-size: 22px;
            flex-shrink: 0;
        }

        .notification.success .notification-icon {
            color: var(--success);
        }

        .notification.error .notification-icon {
            color: var(--error);
        }

        .notification-message {
            font-size: 15px;
            font-weight: 500;
            color: var(--text);
        }

        /* Loading Animation */
        .spinner {
            display: none;
            width: 22px;
            height: 22px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-top: 3px solid var(--white);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .login-button.loading .spinner {
            display: block;
        }

        .login-button.loading .button-text {
            display: none;
        }

        .login-button.loading {
            pointer-events: none;
        }

        /* Additional Info */
        .additional-info {
            font-size: 13px;
            color: var(--text-lighter);
            text-align: center;
            margin-top: 25px;
            line-height: 1.6;
            animation: fade-in-up 0.8s ease 2.4s both;
            opacity: 0;
        }

        .additional-info a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }

        .additional-info a:hover {
            text-decoration: underline;
        }


                /* CSS NOTIF VALIDASI INPUTAN */
        /* ERROR TOOLTIP DI KANAN ATAS INPUT */
.error-text {
    position: absolute;
    top: -10px;
    right: 12px;
    background: var(--error);
    color: #fff;
    font-size: 12px;
    font-weight: 600;
    padding: 6px 10px;
    border-radius: 8px;
    box-shadow: 0 6px 16px rgba(239, 68, 68, 0.25);
    white-space: nowrap;
    z-index: 10;
    animation: fadeSlide 0.3s ease-out;
}

/* Panah kecil */
.error-text::after {
    content: '';
    position: absolute;
    bottom: -6px;
    right: 14px;
    border-width: 6px 6px 0 6px;
    border-style: solid;
    border-color: var(--error) transparent transparent transparent;
}

/* Animasi halus */
@keyframes fadeSlide {
    from {
        opacity: 0;
        transform: translateY(6px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* INPUT ERROR STATE */
.form-input.error {
    border-color: var(--error);
    background: #fff5f5;
    box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.12);
}



        /* END CSS NOTIF VALIDASI INPUTAN */
    </style>
</head>
<body>


    {{-- swlart  validasi--}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('success'))
<script>
    Swal.fire({
        title: "Success!",
        text: "{{ session('success') }}",
        icon: "success",
        confirmButtonColor: '#3085d6'
    });
</script>
@endif

@if ($errors->any())
<script>
    Swal.fire({
        title: "Failed!",
        text: "Terdapat kesalahan input, mohon periksa kembali formulir.",
        icon: "error",
        confirmButtonColor: '#d33'
    });
</script>
@endif

{{-- end swlart validasi --}}
    <!-- Animated Background -->
    <div class="animated-bg">
        <div class="bg-circle"></div>
        <div class="bg-circle"></div>
        <div class="bg-circle"></div>
    </div>

    <!-- Tools Background -->
    <div class="tools-background">
        <i class="fas fa-hammer tool-bg"></i>
        <i class="fas fa-toolbox tool-bg"></i>
        <i class="fas fa-screwdriver tool-bg"></i>
        <i class="fas fa-wrench tool-bg"></i>
        <i class="fas fa-ruler-combined tool-bg"></i>
        <i class="fas fa-tools tool-bg"></i>
    </div>

    <!-- Particle Background -->
    <div class="particles" id="particles"></div>

    <!-- Notification -->
    <div id="notification" class="notification">
        <i class="fas fa-check-circle notification-icon"></i>
        <div class="notification-message">Login berhasil!</div>
    </div>

    <!-- Main Container -->
    <div class="login-container">
        <!-- Branding Side -->
        <div class="branding-side">
            <div class="brand-logo">
                <div class="logo-icon">
                    <i class="fas fa-tools"></i>
                </div>
                <div>
                    <div class="logo-text">GreenTools</div>
                    <div class="logo-subtitle">SUSTAINABLE TOOLS</div>
                </div>
            </div>

            <h1 class="brand-tagline">
                Kualitas Hijau,<br>Hasil Terbaik
            </h1>

            <p class="brand-description">
                Distributor alat pertukangan ramah lingkungan dengan kualitas premium.
                Dukung proyek Anda dengan alat terbaik yang mengutamakan keberlanjutan
                dan efisiensi energi.
            </p>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <div class="feature-title">Ramah Lingkungan</div>
                    <p class="feature-desc">Material daur ulang & hemat energi</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <div class="feature-title">Kualitas Premium</div>
                    <p class="feature-desc">Garansi 3 tahun & sertifikasi ISO</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <div class="feature-title">Pengiriman Cepat</div>
                    <p class="feature-desc">Gratis ongkir untuk order besar</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <div class="feature-title">Support 24/7</div>
                    <p class="feature-desc">Tim ahli siap membantu Anda</p>
                </div>
            </div>
        </div>

        <!-- Login Side -->
        <div class="login-side">
            <div class="welcome-section">
                <div class="welcome-badge">
                    <i class="fas fa-star"></i>
                    Supplier Terpercaya Sejak 2010
                </div>
                <h2 class="login-title">Selamat Datang</h2>
                <p class="login-subtitle">
                    Masuk ke akun Anda untuk mengakses katalog lengkap alat pertukangan
                    premium dengan harga khusus member.
                </p>
            </div>

            <form id="loginForm" action="{{ route('proses-registrasi') }}" method="POST">
                @csrf

                    <div class="form-group">
                    <label class="form-label" for="name">
                        <i class="fas fa-user-circle"></i>
                        Name Lengkap
                    </label>
                    <div class="input-with-icon">
                        <input type="text"
                               class="form-input"
                               id="name"
                               placeholder="contoh: Wahyu ari"
                               required
                               autocomplete="username" name="name" value="{{ old('name') }}">
                        <i class="fas fa-user-circle input-icon"></i>
                    </div>
                        {{-- validasi --}}
                           @error('name')
                     <small class="error-text">{{ $message }}</small>
                          @enderror
                </div>


                <div class="form-group">
                    <label class="form-label" for="email">
                        <i class="fas fa-envelope"></i>
                        Email
                    </label>
                    <div class="input-with-icon">
                        <input type="text"
                               class="form-input"
                               id="email"
                               placeholder="contoh: Wahyu@email.com"
                               required
                               autocomplete="username" name="email"value="{{ old('email') }}">
                        <i class="fas fa-envelope input-icon"></i>
                    </div>

                           {{-- validasi --}}
                            @error('email')
                     <small class="error-text">{{ $message }}</small>
                          @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">
                        <i class="fas fa-key"></i>
                        Kata Sandi
                    </label>
                    <div class="input-with-icon">
                        <input type="password"
                               class="form-input"
                               id="password"
                               placeholder="Minimal 8 karakter"
                               required
                               autocomplete="current-password" name="password" value="{{ old('password') }}">
                        <i class="fas fa-lock input-icon"></i>
                        <button type="button" class="password-toggle" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                           {{-- validasi --}}
                            @error('password')
                     <small class="error-text">{{ $message }}</small>
                          @enderror
                </div>

                <div class="options-row">

                    <a href="#" class="forgot-link">
                        Lupa kata sandi?
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <button type="submit" class="login-button" id="loginButton">
                    <div class="spinner"></div>
                    <span class="button-text">Registrasi</span>
                    <i class="fas fa-arrow-right"></i>
                </button>

                <div class="divider">
                    <span>Atau lanjutkan dengan</span>
                </div>

                <div class="social-login">
                    <button type="button" class="social-button google">
                        <i class="fab fa-google"></i>
                        Google
                    </button>
                    <button type="button" class="social-button facebook">
                        <i class="fab fa-facebook-f"></i>
                        Facebook
                    </button>
                </div>

                <div class="register-section">
                    <span class="register-text">Sudah memiliki akun?</span>
                    <a href="{{ route('login') }}" class="register-link">
                        Login Sekarang
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="additional-info">
                    Dengan masuk, Anda menyetujui
                    <a href="#">Syarat Layanan</a> dan
                    <a href="#">Kebijakan Privasi</a> kami.
                </div>
            </form>
        </div>
    </div>
<script>
document.addEventListener('DOMContentLoaded', function () {

    const loginForm = document.getElementById('loginForm');
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const notification = document.getElementById('notification');

    // Toggle password
    togglePassword.addEventListener('click', function () {
        const type = passwordInput.type === 'password' ? 'text' : 'password';
        passwordInput.type = type;

        const icon = this.querySelector('i');
        icon.classList.toggle('fa-eye');
        icon.classList.toggle('fa-eye-slash');
    });

    // Notifikasi
    function showNotification(message, type = 'error') {
        const icon = notification.querySelector('.notification-icon');
        const text = notification.querySelector('.notification-message');

        notification.className = 'notification ' + type;
        icon.className = type === 'success'
            ? 'fas fa-check-circle notification-icon'
            : 'fas fa-exclamation-circle notification-icon';

        text.textContent = message;
        notification.classList.add('show');

        setTimeout(() => notification.classList.remove('show'), 3000);
    }

    // Validasi ringan sebelum submit
    loginForm.addEventListener('submit', function (e) {
        const email = document.getElementById('email').value.trim();
        const password = passwordInput.value.trim();

        if (!email || !password) {
            e.preventDefault();
            showNotification('Email dan password wajib diisi');
        }
    });

});
</script>


</body>
</html>
