<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard UKK')</title>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">



    <!-- CSS Utama -->
    <link rel="stylesheet" href="{{ asset('admin-css/dashboard.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <!-- Chart JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>


{{-- jgn di bungkus continer --}}
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



/* keyframes slide + bounce */
@keyframes slide-bounce {
    0%   { transform: translateY(-50px); opacity: 0; }
    60%  { transform: translateY(10px); opacity: 1; }
    80%  { transform: translateY(-5px); }
    100% { transform: translateY(0); }
}
</style>
{{-- END NOTIFIKASI --}}


{{-- JS KONFIRMASI HAPUS --}}
<script>
    function confirmDelete(event, kategoriName) {
    event.preventDefault();

    Swal.fire({
        title: 'Hapus Kategori?',
        html: `Anda akan menghapus kategori: <strong>${kategoriName}</strong>`,
        icon: 'warning',
        iconColor: '#ff3b3b', // icon merah
        showCancelButton: true,
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal',
        buttonsStyling: false, // wajib false untuk pakai custom CSS
        customClass: {
            popup: 'swal-popup',
            confirmButton: 'swal-btn-delete',
            cancelButton: 'swal-btn-cancel'
        },
        showClass: {
            popup: 'animate__animated animate__zoomIn'
        },
        hideClass: {
            popup: 'animate__animated animate__zoomOut'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            event.target.submit();
        }
    });

    return false;
}

</script>

{{-- END JS KONFIRMASI HAPUS --}}

<!-- Modal Notifikasi - Data di HTML, bukan JS -->
<div class="notification-modal" id="notificationModal">
    <div class="notification-header">
        <h3>
            <i class="fas fa-bell"></i>
            Notifikasi
            <span class="notification-badge-count" id="notifCount">3</span>
        </h3>
        <button class="notification-close" id="closeNotifBtn">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <div class="notification-body">
        <ul class="notification-list" id="notificationList">
            <!-- Notifikasi 1 - Belum Dibaca -->
            <li class="notification-item unread" data-id="1">
                <div class="notification-icon borrow">
                    <i class="fas fa-handshake"></i>
                </div>
                <div class="notification-content">
                    <div class="notification-title">Peminjaman Baru</div>
                    <div class="notification-desc">Budi Santoso meminjam Bor Listrik</div>
                    <div class="notification-time">
                        <i class="far fa-clock"></i> 5 menit lalu
                    </div>
                </div>
            </li>

        </ul>
    </div>

    <div class="notification-footer">

        <button class="close-btn" id="closeFooterBtn">Tutup</button>
    </div>
</div>

    {{-- Navbar --}}
    @include('user.pages.dashboard-user.components.navbar')

    {{-- Sidebar --}}
    @include('user.pages.dashboard-user.components.sidebar')

    <div class="layout">


        {{-- Konten --}}
        <main class="content">
            @yield('konten-ds')
        </main>

    </div>




    <!-- JS -->
    <script src="{{ asset('admin-js/dashboard.js') }}"></script>

</body>

</html>
<style>
    /* Notifikasi Modal */
.notification-modal {
    position: fixed;
    top: 80px;
    right: 20px;
    width: 380px;
    background: white;
    border-radius: 20px;
    box-shadow: 0 20px 35px -10px rgba(0, 0, 0, 0.2);
    border: 1px solid #e2e8f0;
    z-index: 1100;
    transform: translateX(400px);
    transition: transform 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    overflow: hidden;
}

.notification-modal.active {
    transform: translateX(0);
}

.notification-header {
    padding: 18px 20px;
    background: linear-gradient(135deg, #10b981, #059669);
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: white;
}

.notification-header h3 {
    font-size: 1.1rem;
    font-weight: 600;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 8px;
}

.notification-badge-count {
    background: rgba(255,255,255,0.25);
    padding: 2px 10px;
    border-radius: 30px;
    font-size: 0.8rem;
}

.notification-close {
    background: rgba(255,255,255,0.2);
    border: none;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    color: white;
    cursor: pointer;
}

.notification-body {
    max-height: 450px;
    overflow-y: auto;
}

.notification-list {
    list-style: none;
    margin: 0;
    padding: 0;
}

.notification-item {
    display: flex;
    gap: 12px;
    padding: 14px 16px;
    border-bottom: 1px solid #e2e8f0;
    cursor: pointer;
    transition: all 0.2s;
}

.notification-item:hover {
    background: rgba(16, 185, 129, 0.08);
}

.notification-item.unread {
    background: rgba(16, 185, 129, 0.08);
    position: relative;
}

.notification-item.unread::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 3px;
    background: #10b981;
}

.notification-icon {
    width: 40px;
    height: 40px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.notification-icon.borrow { background: rgba(59, 130, 246, 0.15); color: #3b82f6; }
.notification-icon.return { background: rgba(16, 185, 129, 0.15); color: #10b981; }
.notification-icon.warning { background: rgba(245, 158, 11, 0.15); color: #f59e0b; }
.notification-icon.danger { background: rgba(239, 68, 68, 0.15); color: #ef4444; }
.notification-icon.info { background: rgba(139, 92, 246, 0.15); color: #8b5cf6; }

.notification-content { flex: 1; }
.notification-title { font-weight: 600; font-size: 0.9rem; margin-bottom: 4px; }
.notification-desc { font-size: 0.8rem; color: #64748b; margin-bottom: 6px; }
.notification-time { font-size: 0.7rem; color: #94a3b8; display: flex; gap: 4px; }

.notification-footer {
    padding: 12px 16px;
    border-top: 1px solid #e2e8f0;
    display: flex;
    justify-content: space-between;
    background: white;
}

.mark-all-btn {
    background: none;
    border: none;
    color: #10b981;
    font-size: 0.8rem;
    cursor: pointer;
}

.close-btn {
    background: #10b981;
    color: white;
    border: none;
    padding: 6px 20px;
    border-radius: 20px;
    font-size: 0.8rem;
    cursor: pointer;
}

@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
@keyframes fadeOutDown {
    from { opacity: 1; transform: translateY(0); }
    to { opacity: 0; transform: translateY(20px); }
}
/* Notifikasi Modal */
.notification-modal {
    position: fixed;
    top: 80px;
    right: 20px;
    width: 380px;
    background: var(--bg-card, white);
    border-radius: 20px;
    box-shadow: 0 20px 35px -10px rgba(0, 0, 0, 0.2);
    border: 1px solid var(--border-light, #e2e8f0);
    z-index: 1100;
    transform: translateX(400px);
    transition: transform 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    overflow: hidden;
}

.notification-modal.active {
    transform: translateX(0);
}

.notification-header {
    padding: 18px 20px;
    background: linear-gradient(135deg, #10b981, #059669);
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: white;
}

.notification-header h3 {
    font-size: 1.1rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
    margin: 0;
}

.notification-badge-count {
    background: rgba(255,255,255,0.25);
    padding: 2px 10px;
    border-radius: 30px;
    font-size: 0.8rem;
}

.notification-close {
    background: rgba(255,255,255,0.2);
    border: none;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    color: white;
    cursor: pointer;
    transition: all 0.2s;
}

.notification-close:hover {
    background: rgba(255,255,255,0.3);
    transform: rotate(90deg);
}

.notification-body {
    max-height: 450px;
    overflow-y: auto;
}

.notification-list {
    list-style: none;
    margin: 0;
    padding: 0;
}

.notification-item {
    display: flex;
    gap: 12px;
    padding: 14px 16px;
    border-bottom: 1px solid var(--border-light, #e2e8f0);
    transition: all 0.2s;
    cursor: pointer;
}

.notification-item:hover {
    background: rgba(16, 185, 129, 0.08);
    transform: translateX(-3px);
}

.notification-item.unread {
    background: rgba(16, 185, 129, 0.08);
    position: relative;
}

.notification-item.unread::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 3px;
    background: #10b981;
}

.notification-icon {
    width: 40px;
    height: 40px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.notification-icon.borrow { background: rgba(59, 130, 246, 0.15); color: #3b82f6; }
.notification-icon.return { background: rgba(16, 185, 129, 0.15); color: #10b981; }
.notification-icon.warning { background: rgba(245, 158, 11, 0.15); color: #f59e0b; }
.notification-icon.danger { background: rgba(239, 68, 68, 0.15); color: #ef4444; }
.notification-icon.info { background: rgba(139, 92, 246, 0.15); color: #8b5cf6; }

.notification-content {
    flex: 1;
}

.notification-title {
    font-weight: 600;
    font-size: 0.9rem;
    color: var(--text-primary, #1e293b);
    margin-bottom: 4px;
}

.notification-desc {
    font-size: 0.8rem;
    color: var(--text-secondary, #64748b);
    margin-bottom: 6px;
    line-height: 1.4;
}

.notification-time {
    font-size: 0.7rem;
    color: var(--text-muted, #94a3b8);
    display: flex;
    align-items: center;
    gap: 4px;
}

.notification-footer {
    padding: 12px 16px;
    border-top: 1px solid var(--border-light, #e2e8f0);
    display: flex;
    justify-content: space-between;
    background: var(--bg-card, white);
}

.mark-all-btn {
    background: none;
    border: none;
    color: #10b981;
    font-size: 0.8rem;
    cursor: pointer;
    font-weight: 500;
}

.mark-all-btn:hover {
    text-decoration: underline;
}

.close-btn {
    background: #10b981;
    color: white;
    border: none;
    padding: 6px 20px;
    border-radius: 20px;
    font-size: 0.8rem;
    cursor: pointer;
    transition: all 0.2s;
}

.close-btn:hover {
    background: #059669;
}

.empty-notification {
    text-align: center;
    padding: 50px 20px;
    color: #94a3b8;
}

.empty-notification i {
    font-size: 3rem;
    margin-bottom: 12px;
    opacity: 0.5;
}

@media (max-width: 576px) {
    .notification-modal {
        width: calc(100% - 20px);
        right: 10px;
        top: 70px;
    }
}
</style>

{{-- JS NOTIF --}}
<script>
// ==================== NOTIFIKASI - HANYA INTERAKSI ====================

// Update badge count (hitung dari class .unread di HTML)
function updateNotifBadge() {
    const unreadItems = document.querySelectorAll('#notificationList .notification-item.unread');
    const unreadCount = unreadItems.length;

    const badge = document.querySelector('.nav-notification-badge');
    const notifCountSpan = document.getElementById('notifCount');

    if (badge) {
        badge.textContent = unreadCount;
        badge.style.display = unreadCount > 0 ? 'flex' : 'none';
    }
    if (notifCountSpan) notifCountSpan.textContent = unreadCount;
}

// Toast notifikasi
function showToastNotif(message) {
    let toast = document.createElement('div');
    toast.innerHTML = `<i class="fas fa-check-circle"></i> ${message}`;
    toast.style.cssText = `
        position: fixed;
        bottom: 20px;
        right: 20px;
        background: #10b981;
        color: white;
        padding: 10px 20px;
        border-radius: 10px;
        font-size: 0.85rem;
        z-index: 1200;
        animation: fadeInUp 0.3s ease;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    `;
    document.body.appendChild(toast);
    setTimeout(() => {
        toast.style.animation = 'fadeOutDown 0.3s ease';
        setTimeout(() => toast.remove(), 300);
    }, 2000);
}

// Tandai semua dibaca
function markAllRead() {
    const unreadItems = document.querySelectorAll('#notificationList .notification-item.unread');
    unreadItems.forEach(item => {
        item.classList.remove('unread');
    });
    updateNotifBadge();
    showToastNotif('Semua notifikasi telah ditandai dibaca');
}

// Setup klik item notifikasi
function setupNotifClick() {
    document.querySelectorAll('#notificationList .notification-item').forEach(item => {
        // Hapus listener lama agar tidak double
        if (item._clickHandler) {
            item.removeEventListener('click', item._clickHandler);
        }

        const handler = () => {
            if (item.classList.contains('unread')) {
                item.classList.remove('unread');
                updateNotifBadge();
                const title = item.querySelector('.notification-title')?.innerText || 'Notifikasi';
                showToastNotif(`Dibaca: ${title}`);
            }
        };

        item._clickHandler = handler;
        item.addEventListener('click', handler);
    });
}

// Buka modal notifikasi
function openNotificationModal() {
    const modal = document.getElementById('notificationModal');
    if (modal) {
        modal.classList.add('active');
        updateNotifBadge();
        setupNotifClick();
    }
}

// Tutup modal notifikasi
function closeNotificationModal() {
    const modal = document.getElementById('notificationModal');
    if (modal) {
        modal.classList.remove('active');
    }
}

// ==================== INISIALISASI ====================
document.addEventListener('DOMContentLoaded', function() {
    // Inisialisasi badge
    updateNotifBadge();

    // Event listeners notifikasi
    const notifBtn = document.getElementById('notificationButton');
    const closeNotifBtn = document.getElementById('closeNotifBtn');
    const closeFooterBtn = document.getElementById('closeFooterBtn');
    const markAllReadBtn = document.getElementById('markAllReadBtn');

    if (notifBtn) {
        notifBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            openNotificationModal();
        });
    }

    if (closeNotifBtn) closeNotifBtn.addEventListener('click', closeNotificationModal);
    if (closeFooterBtn) closeFooterBtn.addEventListener('click', closeNotificationModal);
    if (markAllReadBtn) markAllReadBtn.addEventListener('click', markAllRead);

    // Klik di luar modal tutup
    document.addEventListener('click', (e) => {
        const modal = document.getElementById('notificationModal');
        const notifBtnElem = document.getElementById('notificationButton');
        if (modal?.classList.contains('active') &&
            !modal.contains(e.target) &&
            e.target !== notifBtnElem &&
            !notifBtnElem?.contains(e.target)) {
            closeNotificationModal();
        }
    });
});

// Animasi style jika belum ada
if (!document.querySelector('#notifToastStyle')) {
    const styleToastNotif = document.createElement('style');
    styleToastNotif.id = 'notifToastStyle';
    styleToastNotif.textContent = `
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeOutDown {
            from { opacity: 1; transform: translateY(0); }
            to { opacity: 0; transform: translateY(20px); }
        }
    `;
    document.head.appendChild(styleToastNotif);
}
</script>
