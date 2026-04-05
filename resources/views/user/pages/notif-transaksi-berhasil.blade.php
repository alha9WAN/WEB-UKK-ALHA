<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Pembayaran Berhasil - MedikCareRent</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800;14..32,900&family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #F0F9FF 0%, #E8F0FA 100%);
            min-height: 100vh;
            padding: 24px;
            position: relative;
        }

        /* Animated Background */
        .bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
            pointer-events: none;
        }

        .bg-animation .orb {
            position: absolute;
            background: radial-gradient(circle, rgba(16,185,129,0.08) 0%, rgba(16,185,129,0) 70%);
            border-radius: 50%;
            animation: floatOrb 25s infinite ease-in-out;
        }

        @keyframes floatOrb {
            0%, 100% { transform: translateY(0) translateX(0) scale(1); }
            33% { transform: translateY(-40px) translateX(20px) scale(1.05); }
            66% { transform: translateY(20px) translateX(-20px) scale(0.98); }
        }

        .notification-wrapper {
            max-width: 620px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        /* Main Card with Glassmorphism Effect */
        .main-card {
            background: rgba(255,255,255,0.98);
            backdrop-filter: blur(0px);
            border-radius: 56px;
            box-shadow: 0 35px 70px -25px rgba(0, 0, 0, 0.2), 0 0 0 1px rgba(16,185,129,0.1);
            overflow: hidden;
            animation: cardReveal 0.7s cubic-bezier(0.2, 0.9, 0.4, 1.2);
            transition: all 0.3s ease;
        }

        @keyframes cardReveal {
            from {
                opacity: 0;
                transform: scale(0.96) translateY(30px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        /* Header Success with Wave Effect */
        .success-header {
            background: linear-gradient(135deg, #059669 0%, #10B981 40%, #34D399 100%);
            padding: 44px 28px 38px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .success-header::before {
            content: "";
            position: absolute;
            bottom: -20px;
            left: 0;
            width: 100%;
            height: 50px;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120"><path fill="%23ffffff" fill-opacity="1" d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,120L1360,120C1280,120,1120,120,960,120C800,120,640,120,480,120C320,120,160,120,80,120L0,120Z"></path></svg>') no-repeat bottom;
            background-size: cover;
            opacity: 0.15;
            pointer-events: none;
        }

        .success-header::after {
            content: "";
            position: absolute;
            top: -30%;
            right: -20%;
            width: 280px;
            height: 280px;
            background: radial-gradient(circle, rgba(255,255,255,0.3) 0%, rgba(255,255,255,0) 70%);
            border-radius: 50%;
            animation: glowPulse 4s infinite;
        }

        @keyframes glowPulse {
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.2); opacity: 0.8; }
        }

        .icon-circle {
            width: 96px;
            height: 96px;
            background: rgba(255,255,255,0.2);
            backdrop-filter: blur(12px);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            border: 2px solid rgba(255,255,255,0.5);
            animation: iconBounce 0.8s cubic-bezier(0.34, 1.2, 0.64, 1);
        }

        @keyframes iconBounce {
            0% { transform: scale(0); opacity: 0; }
            40% { transform: scale(1.15); }
            100% { transform: scale(1); opacity: 1; }
        }

        .icon-circle i {
            font-size: 3.2rem;
            color: white;
            filter: drop-shadow(0 4px 8px rgba(0,0,0,0.1));
        }

        .success-header h1 {
            font-family: 'Poppins', sans-serif;
            font-size: 2rem;
            font-weight: 800;
            color: white;
            margin-bottom: 8px;
            letter-spacing: -0.3px;
            animation: fadeUp 0.6s ease-out 0.2s both;
        }

        .success-header p {
            color: rgba(255,255,255,0.92);
            font-size: 0.95rem;
            font-weight: 500;
            animation: fadeUp 0.6s ease-out 0.3s both;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Content */
        .content {
            padding: 32px 32px 36px;
        }

        /* Transaction Card */
        .tx-card {
            background: linear-gradient(135deg, #F8FAFF 0%, #FFFFFF 100%);
            border-radius: 32px;
            padding: 18px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 28px;
            border: 1px solid rgba(16,185,129,0.15);
            box-shadow: 0 4px 12px rgba(0,0,0,0.02);
            transition: all 0.3s;
        }

        .tx-card:hover {
            border-color: rgba(16,185,129,0.3);
            box-shadow: 0 8px 20px rgba(16,185,129,0.08);
        }

        .tx-label {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #4B5563;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .tx-label i {
            color: #10B981;
            font-size: 1.2rem;
        }

        .tx-code {
            font-family: monospace;
            font-weight: 800;
            font-size: 1rem;
            background: linear-gradient(135deg, #F0FDF4, #FFFFFF);
            padding: 8px 20px;
            border-radius: 60px;
            color: #059669;
            letter-spacing: 0.8px;
            border: 1px solid #D1FAE5;
            box-shadow: 0 2px 6px rgba(0,0,0,0.02);
        }

        /* Status Badge with Animation */
        .status-wrapper {
            text-align: center;
            margin-bottom: 32px;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 14px;
            background: linear-gradient(135deg, #FFF8ED 0%, #FFF4E5 100%);
            padding: 12px 32px;
            border-radius: 100px;
            border: 1px solid #FDE68A;
            animation: statusPulse 2s infinite;
            transition: all 0.3s;
        }

        @keyframes statusPulse {
            0%, 100% { box-shadow: 0 0 0 0 rgba(245,158,11,0.2); transform: scale(1); }
            50% { box-shadow: 0 0 0 8px rgba(245,158,11,0.08); transform: scale(1.02); }
        }

        .status-badge i {
            color: #F59E0B;
            font-size: 1.2rem;
            animation: rotateIcon 2s linear infinite;
        }

        @keyframes rotateIcon {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .status-badge span {
            font-weight: 700;
            color: #B45309;
            background: #FFEDD5;
            padding: 6px 20px;
            border-radius: 60px;
            font-size: 0.9rem;
        }

        /* Steps Section - Enhanced */
        .steps-section {
            background: linear-gradient(135deg, #FFFFFF 0%, #FEFEFE 100%);
            border-radius: 36px;
            padding: 28px;
            margin-bottom: 28px;
            border: 1px solid #EEF2F8;
            box-shadow: 0 8px 24px rgba(0,0,0,0.04);
        }

        .steps-title {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 28px;
            padding-bottom: 16px;
            border-bottom: 2px solid #EFF3F8;
        }

        .steps-title i {
            font-size: 1.5rem;
            color: #10B981;
            background: linear-gradient(135deg, #E4F5ED, #D1FAE5);
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 28px;
        }

        .steps-title h3 {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 1.25rem;
            color: #1F2A3E;
        }

        /* Step Cards */
        .step-list {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .step-card {
            display: flex;
            align-items: flex-start;
            gap: 20px;
            background: #FFFFFF;
            padding: 20px;
            border-radius: 28px;
            transition: all 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
            border: 1px solid #F0F4F9;
            cursor: pointer;
            animation: stepReveal 0.5s ease forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        .step-card:nth-child(1) { animation-delay: 0.1s; }
        .step-card:nth-child(2) { animation-delay: 0.2s; }
        .step-card:nth-child(3) { animation-delay: 0.3s; }

        @keyframes stepReveal {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .step-card:hover {
            transform: translateX(8px) scale(1.01);
            border-color: #10B981;
            box-shadow: 0 12px 28px rgba(16,185,129,0.12);
        }

        .step-number {
            width: 56px;
            height: 56px;
            background: linear-gradient(135deg, #10B981, #059669);
            border-radius: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 800;
            font-size: 1.6rem;
            flex-shrink: 0;
            box-shadow: 0 8px 20px rgba(16,185,129,0.3);
            transition: all 0.3s;
        }

        .step-card:hover .step-number {
            transform: scale(1.05);
            box-shadow: 0 12px 28px rgba(16,185,129,0.4);
        }

        .step-info {
            flex: 1;
        }

        .step-info h4 {
            font-weight: 800;
            font-size: 1.05rem;
            margin-bottom: 8px;
            color: #111827;
        }

        .step-info p {
            font-size: 0.85rem;
            color: #6B7280;
            line-height: 1.5;
        }

        .step-status {
            display: inline-block;
            font-size: 0.7rem;
            padding: 5px 14px;
            border-radius: 40px;
            margin-top: 10px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .step-status.waiting {
            background: #FEF3C7;
            color: #B45309;
            animation: softBlink 1.5s infinite;
        }

        .step-status.done {
            background: #D1FAE5;
            color: #065F46;
        }

        .step-status.active {
            background: #FEF3C7;
            color: #B45309;
            animation: softBlink 1.2s infinite;
        }

        @keyframes softBlink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.65; }
        }

        /* Info Note */
        .info-note {
            background: linear-gradient(135deg, #F0FDF4 0%, #ECFDF5 100%);
            border-radius: 28px;
            padding: 18px 22px;
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 28px;
            border: 1px solid #BBF7D0;
            transition: all 0.3s;
        }

        .info-note i {
            color: #10B981;
            font-size: 1.5rem;
            animation: bellShake 3s infinite;
        }

        @keyframes bellShake {
            0%, 100% { transform: rotate(0deg); }
            10%, 30%, 50% { transform: rotate(10deg); }
            20%, 40% { transform: rotate(-10deg); }
        }

        .info-note p {
            font-size: 0.85rem;
            color: #166534;
            font-weight: 500;
            line-height: 1.4;
        }

        /* Dashboard Button */
        .dashboard-btn {
            background: linear-gradient(135deg, #0F172A 0%, #1E293B 100%);
            color: white;
            border: none;
            padding: 20px 28px;
            border-radius: 60px;
            font-weight: 800;
            font-size: 1.05rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 14px;
            width: 100%;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
            position: relative;
            overflow: hidden;
        }

        .dashboard-btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .dashboard-btn:hover::before {
            width: 300px;
            height: 300px;
        }

        .dashboard-btn:hover {
            background: linear-gradient(135deg, #10B981 0%, #059669 100%);
            transform: translateY(-4px);
            box-shadow: 0 20px 35px -12px rgba(16,185,129,0.4);
        }

        .dashboard-btn i {
            font-size: 1.2rem;
            transition: transform 0.3s;
        }

        .dashboard-btn:hover i {
            transform: translateX(6px);
        }

        /* Footer Navigation */
        .bottom-nav {
            background: #F9FBFE;
            padding: 20px 28px;
            display: flex;
            justify-content: space-between;
            gap: 16px;
            border-top: 1px solid #EEF2F8;
        }

        .nav-icon-btn {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            padding: 12px 8px;
            background: transparent;
            border: none;
            border-radius: 32px;
            font-size: 0.75rem;
            font-weight: 600;
            color: #6B7280;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .nav-icon-btn i {
            font-size: 1.4rem;
            color: #9CA3AF;
            transition: all 0.3s;
        }

        .nav-icon-btn:hover {
            background: #F0F9FF;
            transform: translateY(-3px);
        }

        .nav-icon-btn:hover i {
            color: #10B981;
            transform: scale(1.1);
        }

        /* Toast Notification */
        .toast-message {
            position: fixed;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%) translateY(100px);
            background: #1F2937;
            color: white;
            padding: 14px 28px;
            border-radius: 80px;
            display: flex;
            align-items: center;
            gap: 14px;
            font-size: 0.85rem;
            z-index: 1000;
            transition: transform 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            pointer-events: none;
            backdrop-filter: blur(8px);
            background: rgba(31,41,55,0.95);
        }

        .toast-message.show {
            transform: translateX(-50%) translateY(0);
        }

        /* Confetti Canvas */
        #confetti-canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1001;
        }

        @media (max-width: 550px) {
            body { padding: 16px; }
            .content { padding: 24px 20px; }
            .step-card { padding: 16px; gap: 14px; }
            .step-number { width: 44px; height: 44px; font-size: 1.3rem; }
            .steps-section { padding: 20px; }
        }
    </style>
</head>
<body>
    <canvas id="confetti-canvas"></canvas>
    <div class="bg-animation">
        <div class="orb" style="width: 400px; height: 400px; top: -150px; left: -100px; animation-duration: 28s;"></div>
        <div class="orb" style="width: 280px; height: 280px; bottom: -50px; right: -80px; animation-duration: 22s;"></div>
        <div class="orb" style="width: 200px; height: 200px; top: 45%; left: 75%; animation-duration: 19s;"></div>
        <div class="orb" style="width: 150px; height: 150px; bottom: 30%; left: 10%; animation-duration: 25s;"></div>
    </div>

    <div class="notification-wrapper">
        <div class="main-card">
            <div class="success-header">
                <div class="icon-circle">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h1>Pembayaran Berhasil!</h1>
            </div>

            <div class="content">
                <div class="tx-card">
                    <div class="tx-label">
                        <i class="fas fa-qrcode"></i>
                        <span>Kode Transaksi</span>
                    </div>
<div class="tx-code">{{ $order_id }}</div>
                </div>

                <div class="status-wrapper">
                    <div class="status-badge" id="statusBadge">
                        <i class="fas fa-hourglass-half"></i>
                        <span>Menunggu Persetujuan Petugas</span>
                    </div>
                </div>

                <div class="steps-section">
                    <div class="steps-title">
                        <i class="fas fa-list-check"></i>
                        <h3>Langkah Selanjutnya</h3>
                    </div>
                    <div class="step-list">
                        <div class="step-card" id="step1">
                            <div class="step-number">1</div>
                            <div class="step-info">
                                <h4>Cek Status di Dashboard / Riwayat</h4>
                                <p>Login ke akun, buka menu "Riwayat Peminjaman" untuk melihat status terbaru pesanan Anda.</p>
                            </div>
                        </div>
                        <div class="step-card" id="step2">
                            <div class="step-number">2</div>
                            <div class="step-info">
                                <h4>Menunggu Persetujuan Petugas</h4>
                                <p>Petugas akan memverifikasi pesanan Anda. Proses ini membutuhkan waktu 1x24 jam. Notifikasi akan dikirim di dashboard anda.</p>
                            </div>
                        </div>
                        <div class="step-card" id="step3">
                            <div class="step-number">3</div>
                            <div class="step-info">
                                <h4>Pesanan Disetujui & Diproses</h4>
                                <p>Setelah disetujui petugas, status akan berubah menjadi <strong style="color:#10B981;">✓ Disetujui Petugas</strong>. Barang akan segera dikirim ke alamat Anda.</p>
                            </div>
                        </div>
                    </div>
                </div>


                                        <a href="{{ route('halaman-dashboard-user') }}" class="dashboard-btn" style="text-decoration: none;" id="dashboardRedirectLink">
    <i class="fas fa-chart-line"></i>
    Buka Dashboard / Riwayat Peminjaman
    <i class="fas fa-arrow-right"></i>
</a>

            </div>


        </div>
    </div>

    <div id="toastMsg" class="toast-message">
        <i class="fas fa-info-circle"></i>
        <span id="toastText"></span>
    </div>

    <script>
        // Simple Confetti Effect
        function triggerConfetti() {
            const canvas = document.getElementById('confetti-canvas');
            const ctx = canvas.getContext('2d');
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;

            let particles = [];
            for (let i = 0; i < 120; i++) {
                particles.push({
                    x: Math.random() * canvas.width,
                    y: Math.random() * canvas.height - canvas.height,
                    size: Math.random() * 8 + 4,
                    color: `hsl(${Math.random() * 60 + 120}, 70%, 55%)`,
                    speed: Math.random() * 5 + 3,
                    rotation: Math.random() * 360
                });
            }

            let animationId;
            let startTime = Date.now();

            function animate() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                let allDone = true;
                for (let p of particles) {
                    p.y += p.speed;
                    if (p.y < canvas.height + 50) allDone = false;
                    ctx.save();
                    ctx.translate(p.x, p.y);
                    ctx.rotate(p.rotation * Math.PI / 180);
                    ctx.fillStyle = p.color;
                    ctx.fillRect(-p.size/2, -p.size/2, p.size, p.size);
                    ctx.restore();
                }
                if (!allDone && Date.now() - startTime < 3000) {
                    animationId = requestAnimationFrame(animate);
                } else {
                    cancelAnimationFrame(animationId);
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                }
            }
            animate();
        }

        function showToast(message, isSuccess = false) {
            const toast = document.getElementById('toastMsg');
            const toastText = document.getElementById('toastText');
            toastText.innerText = message;
            toast.classList.add('show');
            if (isSuccess) {
                toast.style.background = 'rgba(16,185,129,0.95)';
                toast.style.backdropFilter = 'blur(8px)';
            } else {
                toast.style.background = 'rgba(31,41,55,0.95)';
            }
            setTimeout(() => {
                toast.classList.remove('show');
            }, 3000);
        }

        let isApproved = false;

        function updateToApproved() {
            if (isApproved) return;
            isApproved = true;

            const statusBadge = document.getElementById('statusBadge');
            statusBadge.innerHTML = '<i class="fas fa-check-circle" style="color:#10B981; animation: none;"></i><span style="background:#D1FAE5; color:#065F46;">✓ Disetujui Petugas</span>';
            statusBadge.style.animation = 'none';
            statusBadge.style.borderColor = '#10B981';

            document.getElementById('step1Status').innerHTML = '✓ Selesai - Cek Dashboard';
            document.getElementById('step1Status').className = 'step-status done';

            document.getElementById('step2Status').innerHTML = '✓ Disetujui Petugas';
            document.getElementById('step2Status').className = 'step-status done';

            document.getElementById('step3Status').innerHTML = '✨ Sedang Diproses & Dikirim';
            document.getElementById('step3Status').className = 'step-status active';

            const step3Card = document.getElementById('step3');
            step3Card.style.border = '2px solid #10B981';
            step3Card.style.background = 'linear-gradient(135deg, #F0FDF4, #FFFFFF)';

            triggerConfetti();
            showToast('🎉 Selamat! Pesanan Anda telah disetujui petugas! Barang akan segera diproses dan dikirim.', true);
        }

        const profileBtn = document.getElementById('profileNavBtn');
        const dashboardBtn = document.getElementById('dashboardNavBtn');
        const historyBtn = document.getElementById('historyNavBtn');
        const mainDashboardBtn = document.getElementById('dashboardRedirectBtn');

        function handleNavigation(page) {
            if (page === 'Profile') {
                showToast('👤 Profile: Wan M Alhayyu | No. 0967887653456', false);
            } else if (page === 'Dashboard') {
                if (!isApproved) {
                    showToast('📊 Dashboard - Status: Menunggu Persetujuan Petugas. Pantau terus perkembangannya!', false);
                } else {
                    showToast('✅ Dashboard - Status: Disetujui Petugas. Barang sedang diproses pengiriman.', true);
                }
            } else if (page === 'Riwayat') {
                if (!isApproved) {
                    showToast('📋 Riwayat Peminjaman: Transaksi TRX-20260324-BYSIDP masih menunggu persetujuan petugas.', false);
                } else {
                    showToast('📋 Riwayat: Transaksi telah disetujui! Silakan lihat detail pengiriman di halaman riwayat.', true);
                }
            }
        }

        profileBtn.addEventListener('click', () => handleNavigation('Profile'));
        dashboardBtn.addEventListener('click', () => handleNavigation('Dashboard'));
        historyBtn.addEventListener('click', () => handleNavigation('Riwayat'));
        mainDashboardBtn.addEventListener('click', () => handleNavigation('Dashboard'));

        mainDashboardBtn.addEventListener('dblclick', () => {
            if (!isApproved) {
                updateToApproved();
                showToast('🎉 (Demo) Admin menyetujui pesanan! Status berubah menjadi Disetujui Petugas.', true);
            } else {
                showToast('Pesanan sudah disetujui, sedang dalam proses pengiriman.', false);
            }
        });

        const stepCards = document.querySelectorAll('.step-card');
        stepCards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateX(8px) scale(1.01)';
            });
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateX(0) scale(1)';
            });
        });

        setTimeout(() => {
            showToast('📌 Ikuti langkah 1, 2, 3 di atas. Klik tombol dashboard untuk cek status peminjaman!', false);
        }, 800);

        console.log('💡 Tips: Double klik tombol "Buka Dashboard" untuk simulasi persetujuan petugas dengan animasi confetti!');

        window.addEventListener('resize', () => {
            const canvas = document.getElementById('confetti-canvas');
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        });
    </script>
</body>
</html>
