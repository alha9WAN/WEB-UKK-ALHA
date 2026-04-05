@extends('user.index')
@section('title', 'Order Alat')

@section('konten')
 <style>
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
.ktp-upload-container{
    position: relative;
}

.form-group{
    position: relative;
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


        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #00C853;
            --primary-dark: #00A84A;
            --primary-light: #80E27E;
            --secondary: #1A237E;
            --secondary-dark: #0F1555;
            --secondary-light: #534BAE;
            --gradient: linear-gradient(135deg, #00C853, #1A237E);
            --gradient-hover: linear-gradient(135deg, #00B248, #151F6D);
            --gradient-light: linear-gradient(135deg, #80E27E, #534BAE);
            --dark: #0B1120;
            --light: #FFFFFF;
            --gray-50: #F8FAFC;
            --gray-100: #F1F5F9;
            --gray-200: #E2E8F0;
            --gray-300: #CBD5E1;
            --gray-400: #94A3B8;
            --gray-500: #64748B;
            --gray-600: #475569;
            --gray-700: #334155;
            --gray-800: #1E293B;
            --success: #10B981;
            --warning: #F59E0B;
            --error: #EF4444;

            --shadow-sm: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            --shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -2px rgba(0, 0, 0, 0.02);
            --shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 10px 10px -5px rgba(0, 0, 0, 0.02);
            --shadow-xl: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
            --shadow-gradient: 0 15px 30px -10px rgba(0, 200, 83, 0.25), 0 15px 30px -10px rgba(26, 35, 126, 0.25);

            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-xl: 24px;
            --radius-2xl: 32px;
            --radius-full: 9999px;

            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            font-family: 'Inter', sans-serif;
            background:#FFFFFF;
            color: var(--gray-700);
            min-height: 100vh;
            line-height: 1.6;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 28px;
        }

        /* Navbar Premium */
        .navbar {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(203, 213, 225, 0.3);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 85px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            font-size: 1.85rem;
            font-weight: 800;
            font-family: 'Space Grotesk', sans-serif;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.5px;
        }

        .logo-icon {
            width: 48px;
            height: 48px;
            background: var(--gradient);
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.6rem;
            transform: rotate(5deg);
            transition: var(--transition);
            box-shadow: var(--shadow-gradient);
        }

        .logo:hover .logo-icon {
            transform: rotate(0deg) scale(1.1);
        }

        .nav-links {
            display: flex;
            gap: 40px;
            list-style: none;
        }

        .nav-link {
            text-decoration: none;
            color: var(--gray-600);
            font-weight: 600;
            padding: 8px 0;
            position: relative;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.95rem;
        }

        .nav-link i {
            color: var(--gray-400);
            transition: var(--transition);
        }

        .nav-link:hover {
            color: var(--primary);
        }

        .nav-link:hover i {
            color: var(--primary);
        }

        .nav-link.active {
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--gradient);
            border-radius: var(--radius-full);
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 6px 6px 6px 20px;
            background: white;
            border-radius: var(--radius-full);
            cursor: pointer;
            transition: var(--transition);
            border: 1px solid var(--gray-200);
            box-shadow: var(--shadow-sm);
        }

        .user-profile:hover {
            border-color: var(--primary);
            box-shadow: var(--shadow-md), 0 0 0 3px rgba(0, 200, 83, 0.1);
        }

        .user-avatar {
            width: 42px;
            height: 42px;
            background: var(--gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1rem;
        }

        .user-info {
            line-height: 1.3;
        }

        .user-name {
            font-weight: 700;
            font-size: 0.9rem;
            color: var(--gray-800);
        }

        .user-badge {
            font-size: 0.7rem;
            color: var(--primary);
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* Page Header */
        .page-header {
            padding: 48px 0 24px;
            text-align: center;
        }

        .page-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 12px;
            font-family: 'Space Grotesk', sans-serif;
            letter-spacing: -0.02em;
            line-height: 1.2;
        }

        .gradient-text {
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: inline-block;
        }

        .page-description {
            font-size: 1.2rem;
            color: var(--gray-500);
            max-width: 600px;
            margin: 0 auto;
        }

        /* Steps Modern */
        .steps-container {
            margin: 40px 0 48px;
        }

.steps {
    display: flex;
    background: white;
    padding: 28px 36px;
    border-radius: var(--radius-2xl);
    box-shadow: var(--shadow-lg);
    border: 1px solid rgba(203, 213, 225, 0.4);
    position: relative;
    overflow: hidden;
    min-height: 200px; /* Sesuaikan dengan tinggi konten */
}

        .steps::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--gradient);
        }

        .step {
            text-align: center;
            position: relative;
            flex: 1;
            padding: 0 15px;
        }

        .step:not(:last-child)::after {
            content: '→';
            position: absolute;
            top: 35px;
            right: -20px;
            font-size: 1.8rem;
            font-weight: 300;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            opacity: 0.4;
        }

        .step-number {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, rgba(0, 200, 83, 0.08), rgba(26, 35, 126, 0.08));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            font-weight: 800;
            font-size: 1.8rem;
            color: var(--secondary);
            border: 2px solid transparent;
            position: relative;
            transition: var(--transition);
        }

        .step-number::before {
            content: '';
            position: absolute;
            inset: -2px;
            border-radius: 50%;
            padding: 2px;
            background: var(--gradient);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
        }

        .step.active .step-number {
            background: var(--gradient);
            color: white;
        }

        .step.active .step-number::before {
            display: none;
        }

        .step-title {
            font-weight: 700;
            color: var(--gray-800);
            margin-bottom: 4px;
            font-size: 1.1rem;
        }

        .step-description {
            color: var(--gray-500);
            font-size: 0.9rem;
        }

        /* Main Layout */
        .rental-layout {
            display: grid;
            grid-template-columns: 1.3fr 0.9fr;
            gap: 32px;
            margin: 40px 0;
        }

        /* Form Card */
        .form-card {
            background: white;
            border-radius: var(--radius-2xl);
            padding: 36px;
            box-shadow: var(--shadow-xl);
            border: 1px solid rgba(203, 213, 225, 0.4);
            position: relative;
            overflow: hidden;
        }

        .form-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: var(--gradient);
        }

        .form-header {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 32px;
            padding-bottom: 24px;
            border-bottom: 2px solid var(--gray-100);
        }

        .form-header-icon {
            width: 60px;
            height: 60px;
            background: var(--gradient-light);
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.8rem;
        }

        .form-header h2 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--gray-800);
            font-family: 'Space Grotesk', sans-serif;
        }

        .form-header p {
            color: var(--gray-500);
            font-size: 1rem;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
            margin-bottom: 28px;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--gray-700);
            font-size: 0.95rem;
        }

        .form-label i {
            color: var(--primary);
            margin-right: 8px;
            width: 18px;
        }

        .form-control {
            width: 100%;
            padding: 16px 20px;
            border: 2px solid var(--gray-200);
            border-radius: var(--radius-md);
            font-size: 0.95rem;
            transition: var(--transition);
            background: white;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(0, 200, 83, 0.1);
        }

        /* Upload KTP Styles */
        .ktp-upload-container {
            border: 2px dashed var(--gray-300);
            border-radius: var(--radius-lg);
            padding: 30px;
            text-align: center;
            cursor: pointer;
            transition: var(--transition);
            background: var(--gray-50);
            position: relative;
            overflow: hidden;
        }

        .ktp-upload-container:hover {
            border-color: var(--primary);
            background: linear-gradient(135deg, rgba(0, 200, 83, 0.03), rgba(26, 35, 126, 0.02));
        }

        /* CSS untuk Preview KTP dengan Animasi dan Efek Membesarkan */

/* Container preview dengan efek hover */
.ktp-preview {
    display: none;
    margin-top: 20px;
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-md);
    position: relative;
    border: 2px solid var(--primary-light);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    cursor: pointer;
}

.ktp-preview.active {
    display: block;
    animation: slideUpFade 0.4s ease-out;
}

/* Animasi masuk */
@keyframes slideUpFade {
    0% {
        opacity: 0;
        transform: translateY(20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Container gambar dengan efek zoom */
.ktp-preview {
    position: relative;
    overflow: hidden;
}

.ktp-preview img {
    width: 100%;
    max-height: 180px;
    object-fit: cover;
    display: block;
    transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Efek hover membesarkan gambar */
.ktp-preview:hover img {
    transform: scale(1.08);
}

/* Overlay dengan animasi fade */
.ktp-preview-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
    padding: 20px 15px 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: white;
    opacity: 0.9;
    transition: all 0.3s ease;
    transform: translateY(0);
}

/* Overlay muncul lebih jelas saat hover */
.ktp-preview:hover .ktp-preview-overlay {
    opacity: 1;
    background: linear-gradient(to top, rgba(0,0,0,0.9), rgba(0,0,0,0.3));
    padding-bottom: 20px;
}

/* Nama file dengan efek */
.ktp-preview-name {
    font-size: 0.9rem;
    font-weight: 500;
    max-width: 200px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    transform: translateX(0);
    transition: transform 0.3s ease;
}

.ktp-preview:hover .ktp-preview-name {
    transform: translateX(5px);
}

/* Tombol hapus dengan animasi */
.ktp-preview-remove {
    background: rgba(255,255,255,0.2);
    border: none;
    color: white;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    display: flex;
    align-items: center;
    justify-content: center;
    backdrop-filter: blur(4px);
    transform: scale(1);
}

.ktp-preview-remove:hover {
    background: var(--error);
    transform: scale(1.15) rotate(90deg);
    box-shadow: 0 4px 12px rgba(239, 68, 68, 0.4);
}

.ktp-preview-remove i {
    transition: transform 0.3s ease;
}

.ktp-preview-remove:hover i {
    transform: rotate(90deg);
}

/* Efek loading saat gambar dimuat */
.ktp-preview img.loading {
    opacity: 0.5;
    filter: blur(2px);
}

.ktp-preview img.loaded {
    animation: imageLoaded 0.5s ease-out;
}

@keyframes imageLoaded {
    0% {
        opacity: 0.5;
        filter: blur(2px);
        transform: scale(1.02);
    }
    100% {
        opacity: 1;
        filter: blur(0);
        transform: scale(1);
    }
}

/* Efek pulse saat pertama kali muncul */
.ktp-preview.active {
    animation: pulseGlow 2s ease-out;
}

@keyframes pulseGlow {
    0% {
        box-shadow: 0 0 0 0 rgba(0, 200, 83, 0.4);
    }
    50% {
        box-shadow: 0 0 0 10px rgba(0, 200, 83, 0);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(0, 200, 83, 0);
    }
}

/* Efek untuk upload container saat berhasil upload */
.ktp-upload-container.success {
    border-color: var(--success);
    background: linear-gradient(135deg, rgba(16, 185, 129, 0.05), rgba(16, 185, 129, 0.02));
    animation: successPulse 1s ease;
}

@keyframes successPulse {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.02);
        border-color: var(--success);
    }
    100% {
        transform: scale(1);
    }
}
        .ktp-upload-container.dragover {
            border-color: var(--primary);
            background: linear-gradient(135deg, rgba(0, 200, 83, 0.08), rgba(26, 35, 126, 0.05));
            transform: scale(1.02);
        }

        .ktp-upload-icon {
            font-size: 3.5rem;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 15px;
        }

        .ktp-upload-text {
            font-weight: 600;
            color: var(--gray-700);
            margin-bottom: 8px;
        }

        .ktp-upload-hint {
            color: var(--gray-500);
            font-size: 0.85rem;
        }

        .ktp-preview {
            display: none;
            margin-top: 20px;
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-md);
            position: relative;
            border: 2px solid var(--primary-light);
        }

        .ktp-preview img {
            width: 120%;
            max-height: 200px;
            object-fit: cover;
            display: block;
        }

        .ktp-preview.active {
            display: block;
        }

        .ktp-preview-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        .ktp-preview-name {
            font-size: 0.9rem;
            font-weight: 500;
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .ktp-preview-remove {
            background: rgba(255,255,255,0.2);
            border: none;
            color: white;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(4px);
        }

        .ktp-preview-remove:hover {
            background: var(--error);
            transform: scale(1.1);
        }

        .ktp-file-input {
            display: none;
        }

        /* Alat List - Langsung Tampil */
        .alat-list {
            margin-top: 8px;
            border: 2px solid var(--gray-200);
            border-radius: var(--radius-lg);
            overflow: hidden;
            background: white;
        }

        .alat-item {
            display: flex;
            align-items: center;
            padding: 18px 22px;
            border-bottom: 1px solid var(--gray-200);
            cursor: pointer;
            transition: var(--transition);
            gap: 18px;
        }

        .alat-item:last-child {
            border-bottom: none;
        }

        .alat-item:hover {
            background: linear-gradient(135deg, rgba(0, 200, 83, 0.03), rgba(26, 35, 126, 0.02));
        }

        .alat-item.selected {
            background: linear-gradient(135deg, rgba(0, 200, 83, 0.08), rgba(26, 35, 126, 0.04));
            border-left: 6px solid var(--primary);
        }

        .alat-radio {
            width: 22px;
            height: 22px;
            accent-color: var(--primary);
            margin-right: 4px;
        }

        .alat-avatar {
            width: 64px;
            height: 64px;
            background: linear-gradient(135deg, rgba(0, 200, 83, 0.1), rgba(26, 35, 126, 0.1));
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--secondary);
            font-size: 2.2rem;
            flex-shrink: 0;
        }

        .alat-info {
            flex: 1;
        }

        .alat-info h4 {
            font-weight: 700;
            color: var(--gray-800);
            margin-bottom: 6px;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alat-meta {
            display: flex;
            gap: 24px;
            font-size: 0.95rem;
        }

        .alat-price {
            font-weight: 700;
            color: var(--primary);
            background: rgba(0, 200, 83, 0.08);
            padding: 4px 12px;
            border-radius: var(--radius-full);
        }

        .alat-stock {
            color: var(--gray-500);
            background: var(--gray-100);
            padding: 4px 12px;
            border-radius: var(--radius-full);
        }

        .alat-stock i {
            color: var(--primary);
            margin-right: 6px;
        }

        .alat-badge {
            background: var(--secondary);
            color: white;
            font-size: 0.7rem;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: var(--radius-full);
            letter-spacing: 0.5px;
        }

        .alat-badge.populer {
            background: var(--primary);
        }

        .quantity-control {
            display: flex;
            align-items: center;
            gap: 8px;
            background: var(--gray-100);
            padding: 6px;
            border-radius: var(--radius-md);
            width: fit-content;
        }

        .quantity-btn {
            width: 44px;
            height: 44px;
            border: none;
            background: white;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
            color: var(--gray-700);
            font-weight: 700;
            font-size: 1.3rem;
            box-shadow: var(--shadow-sm);
        }

        .quantity-btn:hover {
            background: var(--gradient);
            color: white;
            transform: scale(1.05);
        }

        .quantity-input {
            width: 70px;
            text-align: center;
            padding: 10px;
            border: 2px solid var(--gray-200);
            border-radius: var(--radius-sm);
            font-weight: 700;
            font-size: 1.1rem;
        }

        .stock-info {
            background: var(--gray-100);
            padding: 8px 18px;
            border-radius: var(--radius-full);
            font-size: 0.95rem;
        }

        .btn {
            padding: 18px 36px;
            border-radius: var(--radius-md);
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition);
            border: none;
            font-size: 1.1rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            text-decoration: none;
            position: relative;
            overflow: hidden;
        }

        .btn-primary {
            background: var(--gradient);
            color: white;
            box-shadow: var(--shadow-gradient);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 25px 40px -10px rgba(0, 200, 83, 0.5), 0 25px 40px -10px rgba(26, 35, 126, 0.5);
        }

        .btn-full {
            width: 100%;
        }

        .btn-large {
            padding: 20px 40px;
        }

        /* Product Card */
        .product-card {
            background: white;
            border-radius: var(--radius-2xl);
            padding: 36px;
            box-shadow: var(--shadow-xl);
            border: 1px solid rgba(203, 213, 225, 0.4);
            position: sticky;
            top: 110px;
            height: fit-content;
            overflow: hidden;
        }

        .product-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 220px;
            background: linear-gradient(135deg, rgba(0, 200, 83, 0.05), rgba(26, 35, 126, 0.05));
            z-index: 0;
        }

        .product-image-container {
            position: relative;
            width: 100%;
            height: 260px;
            border-radius: var(--radius-lg);
            overflow: hidden;
            margin-bottom: 28px;
            box-shadow: var(--shadow-lg);
            border: 4px solid white;
            z-index: 1;
            transition: var(--transition); /* Tambahkan transisi untuk efek hover */
        }

        /* Efek hover pada container gambar */
        .product-image-container:hover {
            transform: scale(1.02); /* Membesar sedikit saat hover */
            box-shadow: var(--shadow-xl); /* Tambah bayangan lebih besar */
        }

        .product-image {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Pastikan gambar menutupi area dengan proporsi yang baik */
            display: block;
            transition: var(--transition); /* Transisi untuk efek halus */
        }

        /* Efek tambahan pada gambar itu sendiri (opsional) */
        .product-image-container:hover .product-image {
            transform: scale(1.05); /* Membuat gambar sedikit lebih besar di dalam container */
        }

        .product-placeholder {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--gray-100), var(--gray-200));
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            color: var(--gray-400);
            gap: 12px;
        }

        .product-placeholder i {
            font-size: 4.5rem;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .product-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: var(--gradient);
            color: white;
            padding: 8px 20px;
            border-radius: var(--radius-full);
            font-size: 0.9rem;
            font-weight: 700;
            z-index: 2;
            box-shadow: var(--shadow-lg);
        }

        .product-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
            position: relative;
            z-index: 1;
        }

        .product-title {
            font-size: 2rem;
            font-weight: 800;
            color: var(--gray-800);
            font-family: 'Space Grotesk', sans-serif;
        }

        .product-category {
            background: linear-gradient(135deg, rgba(0, 200, 83, 0.1), rgba(26, 35, 126, 0.1));
            color: var(--secondary);
            padding: 6px 16px;
            border-radius: var(--radius-full);
            font-size: 0.9rem;
            font-weight: 700;
            border: 1px solid rgba(26, 35, 126, 0.2);
        }

        .product-description {
            color: var(--gray-500);
            margin-bottom: 28px;
            line-height: 1.7;
            font-size: 1rem;
            position: relative;
            z-index: 1;
        }

        /* Product Features Grid dengan Kotak dan Icon Centang */
        .product-features-grid {
            margin-bottom: 25px;
            padding: 20px;
            background: linear-gradient(135deg, #ffffff, #f8fafc);
            border-radius: var(--radius-lg);
            border: 1px solid rgba(0, 200, 83, 0.15);
            position: relative;
            z-index: 1;
            box-shadow: var(--shadow-sm);
        }

        .product-features-grid h4 {
            font-size: 1rem;
            color: var(--gray-700);
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
        }

        .product-features-grid h4 i {
            color: var(--primary);
            font-size: 1.1rem;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .feature-box {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 12px;
            background: white;
            border-radius: var(--radius-md);
            border: 1px solid var(--gray-200);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .feature-box::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 3px;
            height: 100%;
            background: var(--gradient);
            opacity: 0;
            transition: var(--transition);
        }

        .feature-box:hover {
            transform: translateY(-2px);
            border-color: var(--primary-light);
            box-shadow: 0 8px 20px -8px rgba(0, 200, 83, 0.25);
        }

        .feature-box:hover::before {
            opacity: 1;
        }

        .feature-icon {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, rgba(0, 200, 83, 0.1), rgba(26, 35, 126, 0.05));
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        .feature-content {
            flex: 1;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .feature-check {
            color: var(--primary);
            font-size: 0.9rem;
            display: inline-flex;
            flex-shrink: 0;
        }

        .feature-text {
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--gray-700);
            line-height: 1.3;
        }

        /* Responsive untuk features */
        @media (max-width: 480px) {
            .features-grid {
                grid-template-columns: 1fr;
            }

            .feature-box {
                padding: 10px 12px;
            }
        }

        .rental-details {
            background: linear-gradient(135deg, rgba(0, 200, 83, 0.03), rgba(26, 35, 126, 0.03));
            border-radius: var(--radius-lg);
            padding: 28px;
            margin: 28px 0;
            border: 1px solid rgba(203, 213, 225, 0.4);
            position: relative;
            z-index: 1;
        }

        .detail-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 18px;
            padding-bottom: 18px;
            border-bottom: 1px dashed var(--gray-300);
        }

        .detail-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .detail-label {
            color: var(--gray-500);
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .detail-label i {
            color: var(--primary);
            width: 20px;
        }

        .detail-value {
            font-weight: 700;
            color: var(--gray-800);
        }

        .total-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 24px;
            padding-top: 24px;
            border-top: 2px solid var(--gray-300);
        }

        .total-label {
            font-weight: 700;
            color: var(--gray-700);
            font-size: 1.2rem;
        }

        .total-price {
            font-weight: 800;
            font-size: 2.2rem;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .calculation {
            background: white;
            border-radius: var(--radius-md);
            padding: 18px;
            margin-top: 18px;
            font-size: 0.95rem;
            border: 1px solid var(--gray-200);
        }

        .calc-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            color: var(--gray-600);
        }

        .calc-item:last-child {
            margin-bottom: 0;
            font-weight: 700;
            color: var(--primary);
        }

        .info-box {
            margin-top: 28px;
            padding: 20px;
            background: linear-gradient(135deg, #E8EAF6, #C5CAE9);
            border-radius: var(--radius-md);
            border-left: 4px solid var(--secondary);
        }

        .info-box-content {
            display: flex;
            gap: 14px;
        }

        .info-box i {
            color: var(--secondary);
            font-size: 1.4rem;
        }

        .info-text h4 {
            color: var(--secondary);
            margin-bottom: 6px;
            font-size: 1rem;
        }

        .info-text p {
            color: var(--gray-600);
            font-size: 0.9rem;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .rental-layout {
                grid-template-columns: 1fr;
            }

            .product-card {
                position: static;
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .steps {
                flex-direction: column;
                gap: 35px;
            }

            .step:not(:last-child)::after {
                content: '↓';
                top: auto;
                bottom: -25px;
                right: 50%;
                transform: translateX(50%);
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full-width {
                grid-column: span 1;
            }

            .footer-content {
                grid-template-columns: 1fr;
            }

            .page-title {
                font-size: 2.8rem;
            }
        }
    </style>

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


         <main>
        <div class="container">
            <!-- Page Header -->
            <div class="page-header">
                <h1 class="page-title">
                    <span class="gradient-text">Peminjaman</span> Alat
                </h1>
                <p class="page-description">
                    Proses cepat, aman, dan terpercaya untuk kebutuhan proyek Anda
                </p>
            </div>




            <!-- Rental Form & Product Info -->
            <div class="rental-layout">
                <!-- Form Section -->
                <div class="form-card">
                    <div class="form-header">
                        <div class="form-header-icon">
                            <i class="fas fa-file-signature"></i>
                        </div>
                        <div>
                            <h2>Formulir Peminjaman</h2>
                            <p>Isi data dengan lengkap dan benar</p>
                        </div>
                    </div>

                    {{-- 1.BAGIAN FROM TAMBAH DATA (UTAMA) --}}
<form action="{{ route('orders.store', $tool->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
                            <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label"><i class="fas fa-user"></i> Nama Lengkap *</label>
                                <input value="{{ old('name') }}" name="name" type="text" class="form-control @error('name') error @enderror" id="fullName"  placeholder="Masukkan nama lengkap" required>

  @error('name')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label"><i class="fas fa-envelope"></i> Email *</label>
                                <input value="{{ old('email') }}" name="email" type="email" class="form-control @error('email') error @enderror" id="email"  placeholder="contoh@email.com" required>

  @error('email')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label"><i class="fas fa-phone"></i> No. HP *</label>
                                <input value="{{ old('phone') }}" name="phone" type="tel" class="form-control @error('phone') error @enderror" id="phone"  placeholder="08xxxxxxxxxx" required>

  @error('phone')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label"><i class="fas fa-id-card"></i> NIK *</label>
                                <input value="{{ old('nik') }}" name="nik" type="text" class="form-control @error('nik') error @enderror" id="nik" maxlength="16" placeholder="16 digit NIK" required>

  @error('nik')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                            </div>

                            {{-- 1.ID YANG HARUS ADA  --}}
                            <div class="form-group">
                                <label class="form-label"><i class="fas fa-calendar"></i> Tanggal Pinjam *</label>
                                <input value="{{ old('start_date') }}"  name="start_date" type="date" class="form-control @error('start_date') error @enderror" id="startDate"required>

  @error('start_date')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                            </div>
                            {{-- 2.ID YANG HARUS ADA  --}}
                            <div class="form-group">
                                <label class="form-label"><i class="fas fa-calendar-check"></i> Tanggal Kembali *</label>
                                <input value="{{ old('end_date') }}"  name="end_date" type="date" class="form-control @error('end_date') error @enderror" id="endDate"  required>

  @error('end_date')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                            </div>

                                                        {{-- 3.ID YANG HARUS ADA  --}}
                            <div class="form-group full-width">
                                <label class="form-label"><i class="fas fa-cubes"></i> Jumlah Alat *</label>
                                <div style="display: flex; align-items: center; flex-wrap: wrap; gap: 15px;">
                                    <div class="quantity-control">
                                        {{-- INI UNTUK MENGURANGKAN --}}
                                        <button type="button" class="quantity-btn" onclick="changeQty(-1)">−</button>
                                        {{-- BAGIAN INPUTAN NYA --}}
                                        <input type="number" value="{{ old('quantity', 1) }}" class="quantity-input @error('quantity') error @enderror" id="quantity" name="quantity"  min="1" max="{{ $tool->stock }}" readonly>


                                        {{-- INI UNTUK MENBAHKAN --}}
                                        <button type="button" class="quantity-btn" onclick="changeQty(1)">+</button>
                                    </div>
                                    <span class="stock-info" id="stockInfo">
                                        <i class="fas fa-box"></i> Stok tersedia: <span id="stockValue">{{$tool->stock}}</span>
                                    </span>
                                </div>
                                  @error('quantity')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                            </div>

                            <!-- Upload KTP Section -->
                           <!-- Upload KTP Section -->
<div class="form-group full-width">
    <label class="form-label">
        <i class="fas fa-id-card"></i> Foto KTP *
    </label>

    <div class="ktp-upload-container @error('ktp_image') error @enderror"
        id="ktpUploadContainer"
        onclick="document.getElementById('ktpFile').click()">

        <div class="ktp-upload-icon">
            <i class="fas fa-cloud-upload-alt"></i>
        </div>

        <div class="ktp-upload-text">
            Klik atau seret foto KTP ke sini
        </div>

        <div class="ktp-upload-hint">
            Format: JPG, PNG (Maks. 2MB)
        </div>

        <input
            name="ktp_image"
            type="file"
            class="ktp-file-input"
            id="ktpFile"
            accept=".jpg,.jpeg,.png"
            onchange="handleKTPUpload(this)">
    </div>

    {{-- ERROR DIPINDAH KE LUAR --}}
    @error('ktp_image')
        <small class="error-text">{{ $message }}</small>
    @enderror


    <!-- Preview KTP -->
    <div class="ktp-preview" id="ktpPreview">
        <img src="" alt="Preview KTP" id="ktpPreviewImage">

        <div class="ktp-preview-overlay">
            <span class="ktp-preview-name" id="ktpFileName">
                ktp-ahmad.jpg
            </span>

            <button type="button"
                class="ktp-preview-remove"
                onclick="removeKTP()">

                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
</div>

                            <div class="form-group full-width">
                                <label class="form-label"><i class="fas fa-map-marker-alt"></i> Alamat Pengiriman *</label>
                                <textarea name="address" class="form-control @error('address') error @enderror" id="address" rows="3" placeholder="Masukkan alamat lengkap" required>{{ old('address') }}</textarea>

  @error('address')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                            </div>

                            <div class="form-group full-width">
                                <label class="form-label"><i class="fas fa-sticky-note"></i> Catatan</label>
                                <textarea   name="notes" class="form-control @error('notes') error @enderror" id="notes" rows="8" placeholder="Contoh: butuh aksesoris tambahan, antar sebelum jam 10">{{ old('notes') }}</textarea>
  @error('notes')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-full btn-large">
                            <i class="fas fa-paper-plane"></i> Ajukan Peminjaman
                        </button>

                        {{-- TAMBAHAN --}}
<input type="hidden" id="pricePerDay" name="price" value="{{ $tool->price }}">
                    </form>
                                        {{-- 1.END  --}}

                </div>


                {{-- 2.BAGIAN MENPILKAN INFO DATA ALAT ALAT NYA --}}

                <!-- Product Info Card dengan Gambar dan Fitur Kotak Icon Centang -->
                <div class="product-card" id="productInfoCard">

                    <div class="product-image-container">
                        <!-- Gambar Produk -->
                        <img src="{{ $tool->image
                            ? asset('storage/' . $tool->image)
                            : asset('assets/img/no-image.png') }}"
                             alt="{{ $tool->name }}"
                             alt="Bor Listrik 14mm"
                             class="product-image"
                             id="productImage"
                             onerror="this.src='https://via.placeholder.com/400x300?text=Image+Not+Found'">

                        <!-- Badge Produk -->
                        <div class="product-badge" id="productBadge">{{ $tool->kategori->name ?? 'Umum' }}</div>
                    </div>

                    <div id="productDetails">
                        <div class="product-header">
                            <h2 class="product-title" id="productName">  {{ $tool->name  }}</h2>
                        </div>

                        <!-- Deskripsi Produk -->
                        <p class="product-description" id="productDesc">
                            {{ Str::limit($tool->description, 120, '...') }}
                        </p>

                        <!-- FITUR DENGAN 4 KOTAK DAN ICON CENTANG (PLACEHOLDER) -->
                        <div class="product-features-grid" id="productFeatures">
                            <h4><i class="fas fa-crown"></i> Keunggulan Produk</h4>
                            <div class="features-grid" id="featuresGrid">
                                <!-- Fitur 1 -->
   @php
    $features = is_array($tool->features)
        ? $tool->features
        : (json_decode($tool->features, true) ?? []);
@endphp

<div class="features-grid">

@forelse (array_slice($features, 0, 4) as $feature)
    <div class="feature-box">
        <div class="feature-content">
            <span class="feature-check">
                <i class="fas fa-check-circle"></i>
            </span>
            <span class="feature-text">{{ $feature }}</span>
        </div>
    </div>
@empty
    <div class="feature-box">
        <div class="feature-content">
            <span class="feature-check">
                <i class="fas fa-minus-circle"></i>
            </span>
            <span class="feature-text">Tidak ada fitur</span>
        </div>
    </div>
@endforelse

</div>


                            </div>
                        </div>

                        {{-- 2.END --}}

                {{-- 3.BAGIAN DETAIL MENGHTIUNG OTOMATIS BEBARPA HARI DAN JUMLAH ALAT YG DIPINJAM --}}
                        <div class="rental-details">

                               <!-- Kode Produk -->
                            <div class="detail-item" id="productCodeRow">
                                <span class="detail-label"><i class="fas fa-barcode"></i> Kode</span>
                                <span class="detail-value" id="productCode"> {{ $tool->code  }}</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label"><i class="fas fa-tag"></i> Harga/hari</span>
                                <span class="detail-value" id="displayPrice"> Rp {{ number_format($tool->price, 0, ',', '.') }}
</span>
                            </div>

                            {{-- 1.BGAIN 1 HARUS ADA ID NYA(INIUNTUK QTY) --}}
                            <div class="detail-item">
                                <span class="detail-label"><i class="fas fa-cubes"></i> Jumlah</span>
                                <span class="detail-value" id="displayQty">
                                    <span id="qtyDisplay">1</span> barang
                                </span>
                            </div>

                        {{-- 2.BGAIN 2 HARUS ADA ID NYA(INI UNTUK MENPILKAN PERHITUNG JS DIPINJAMAN SAMAPI KAPANNYA) --}}
                            <div class="detail-item">
                                <span class="detail-label"><i class="fas fa-clock"></i> Durasi</span>
                                <span class="detail-value" id="displayDuration">
                                    <span id="durationDisplay">4</span> hari
                                </span>
                            </div>

                            <div class="detail-item">
                                <span class="detail-label"><i class="fas fa-box"></i> Stok</span>
                                <span class="detail-value" id="displayStock">
                                    <span id="stockDisplay"> {{$tool->stock}}</span> tersedia
                                </span>
                            </div>






                        {{-- 3.BGAIN 3 HARUS ADA ID NYA(INI UNTUK PERHITUNGAN QTY,HARGA,HARI NYA  ) --}}

                            <div class="calculation" id="calculation">
                                <div class="calc-item">
                                    <span>Harga × Jumlah × Durasi</span>
                                    <span id="calcFormula">Rp75.000 × 1 × 4</span>
                                </div>
                                <div class="calc-item">
                                    <span>Total</span>
                                    <span id="calcTotal">Rp300.000</span>
                                </div>
                            </div>
                        </div>

                            {{-- 4BGAIN 4 HARUS ADA ID NYA(INI UNTUK MENAPILAKAN TOTAL PERHITUNGAN JS NYA) --}}

                            <div class="total-section">
                                <span class="total-label">Total Biaya</span>
                                <span class="total-price" id="displayTotal">Rp300.000</span>
                            </div>
                        {{-- 3.RND --}}

                        <div class="info-box">
                            <div class="info-box-content">
                                <i class="fas fa-info-circle"></i>
                                <div class="info-text">
                                    <h4>Informasi Penting</h4>
<p>Penyewa bertanggung jawab penuh atas keamanan dan kondisi alat selama masa peminjaman.</p>                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
    //    JS UNTUK TOMBOL MENAMBAH MENGURANI QTY
    function changeQty(amount) {

    let qtyInput = document.getElementById("quantity");
    let stock = parseInt(document.getElementById("stockValue").innerText);

    let currentQty = parseInt(qtyInput.value);

    let newQty = currentQty + amount;

    if (newQty < 1) {
        newQty = 1;
    }

    if (newQty > stock) {
        newQty = stock;
    }

    qtyInput.value = newQty;

    updateCalculation();
}
// END


// JS UNTUK MENGHITUNG TANGGAL PINJAMAN DAN KEMBALI
function calculateDays() {

    let start = document.getElementById("startDate").value;
    let end = document.getElementById("endDate").value;

    if (!start || !end) {
        return 0;
    }

    let startDate = new Date(start);
    let endDate = new Date(end);

    let timeDiff = endDate - startDate;

    let days = timeDiff / (1000 * 60 * 60 * 24);

    if (days < 1) {
        days = 1;
    }

    return days;
}

// END


// UNTUK MENGHTIUNG SEMUA PERHITUNGAN
function updateCalculation() {

    // BAGIAN 1 UNTUK MENGIUNG TOTAL
    let price = parseInt(document.getElementById("pricePerDay").value);
    let qty = parseInt(document.getElementById("quantity").value);

    let days = calculateDays();

    let total = price * qty * days;

        // BAGIAN 1 UNTUK MENGIUNG TOTAL


    // BAGIAN 2 UNTUK MERUBAH DATA YANG TELAH DIHITUNGL

    document.getElementById("qtyDisplay").innerText = qty;

    document.getElementById("durationDisplay").innerText = days;

    document.getElementById("displayTotal").innerText =
        "Rp " + total.toLocaleString("id-ID");

    document.getElementById("calcFormula").innerText =
        "Rp " + price.toLocaleString("id-ID") + " × " + qty + " × " + days;

    document.getElementById("calcTotal").innerText =
        "Rp " + total.toLocaleString("id-ID");
            // BAGIAN 2 UNTUK MERUBAH DATA YANG TELAH DIHITUNGL

}
// END


// TAMBAAN TERAHKIR
document.getElementById("startDate").addEventListener("change", updateCalculation);
document.getElementById("endDate").addEventListener("change", updateCalculation);

document.addEventListener("DOMContentLoaded", function () {
    updateCalculation();
});



// UNTUK FOTO
// FUNGSI UNTUK HANDLE UPLOAD KTP
function handleKTPUpload(input) {
    const file = input.files[0];
    if (!file) return;

    // Element-element yang dibutuhkan
    const preview = document.getElementById('ktpPreview');
    const previewImage = document.getElementById('ktpPreviewImage');
    const fileName = document.getElementById('ktpFileName');

    // Buat URL preview
    const imageUrl = URL.createObjectURL(file);

    // Tampilkan preview
    previewImage.src = imageUrl;
    fileName.textContent = file.name;
    preview.classList.add('active');
}

// FUNGSI UNTUK HAPUS GAMBAR
function removeKTP() {
    const input = document.getElementById('ktpFile');
    const preview = document.getElementById('ktpPreview');
    const previewImage = document.getElementById('ktpPreviewImage');
    const fileName = document.getElementById('ktpFileName');

    // Reset
    input.value = '';
    previewImage.src = '';
    fileName.textContent = '';
    preview.classList.remove('active');
}

// TAMBAHKAN EVENT UNTUK TOMBOL HAPUS (inisialisasi setelah DOM siap)
document.addEventListener('DOMContentLoaded', function() {
    const removeBtn = document.querySelector('.ktp-preview-remove');
    if (removeBtn) {
        removeBtn.addEventListener('click', function(e) {
            e.preventDefault();
            removeKTP();
        });
    }
});
    </script>
@endsection
