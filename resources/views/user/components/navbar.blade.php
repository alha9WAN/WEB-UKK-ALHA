<!-- NAVBAR -->
<nav class="navbar" id="navbar">
    <div class="container">
        <div class="nav-container">

            <!-- LOGO -->
            <a href="{{ url('/') }}" class="logo">
                <div class="logo-icon">
                    <i class="fas fa-tools"></i>
                </div>
                <div class="logo-text">
                    ToolRent<span class="highlight">Pro</span>
                </div>
            </a>

            <!-- MOBILE TOGGLE -->
            <button class="mobile-toggle" id="mobileToggle">
                <i class="fas fa-bars"></i>
                <i class="fas fa-times"></i>
            </button>

            <!-- LINKS -->
            <ul class="nav-links" id="navLinks">
                <li><a href="#home" class="nav-link active">Beranda</a></li>
                <li><a href="#categories" class="nav-link">Kategori</a></li>
                <li><a href="#tools" class="nav-link">Alat</a></li>
                <li><a href="#video" class="nav-link">Video</a></li>
                <li><a href="#how-it-works" class="nav-link">Cara Pinjam</a></li>
                <li><a href="#features" class="nav-link">Keunggulan</a></li>
                <li><a href="#testimonials" class="nav-link">Testimoni</a></li>
                <li><a href="#contact" class="nav-link">Kontak</a></li>
           {{-- ================= USER BELUM LOGIN ================= --}}
                       @guest
           <li class="nav-cta-mobile">
                        <a href="{{ route('show-registrasi') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-user-plus"></i>
                            Daftar Sekarang
                        </a>
                    </li>
   @endguest




    {{-- ================= USER SUDAH LOGIN ================= --}}
{{-- ================= USER SUDAH LOGIN (DATA KOSONG) ================= --}}
@auth
<li class="nav-user-menu">
    <div class="user-dropdown-container">


            <!-- TRIGGER -->
        <button class="user-dropdown-trigger" id="userMenuTrigger">
            <div class="user-avatar-small">
                @if(Auth::user()->foto)
                    <img src="{{ asset('storage/' . Auth::user()->foto) }}" alt="Avatar">
                @else
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(collect(explode(' ', Auth::user()->name))->take(2)->join(' ')) }}&background=10b981&color=fff&size=128" alt="Avatar">
                @endif
            </div>

            <span class="user-name-text">
                {{ Auth::user()->name }}
            </span>
            <i class="fas fa-chevron-down"></i>
        </button>



  <!-- DROPDOWN -->
        <div class="user-simple-dropdown" id="userSimpleDropdown">
            <div class="dropdown-user-info">
                <div class="dropdown-user-avatar">
                    @if(Auth::user()->foto)
                        <img src="{{ asset('storage/' . Auth::user()->foto) }}" alt="Avatar">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(collect(explode(' ', Auth::user()->name))->take(2)->join(' ')) }}&background=10b981&color=fff&size=128" alt="Avatar">
                    @endif
                </div>

                <div class="dropdown-user-details">
<strong>{{ ucwords(Auth::user()->name) }}</strong>
                    <small>{{ Auth::user()->email }}</small>
                </div>
            </div>

            <div class="dropdown-divider"></div>

            <a href="{{ route('halaman-dashboard-user') }}" class="dropdown-item">
                <i class="fas fa-gauge"></i> Dashboard
            </a>

            <a href="" class="dropdown-item">
                <i class="fas fa-user"></i> Profil Saya
            </a>

            <a href="#" class="dropdown-item">
                <i class="fas fa-clock"></i> Riwayat
            </a>

            <div class="dropdown-divider"></div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dropdown-item logout-item">
                    <i class="fas fa-sign-out-alt"></i> Keluar
                </button>
            </form>
        </div>
    </div>
</li>
@endauth


            </ul>
        </div>
    </div>
</nav>


<style>
   /* ========== NAVBAR STYLES ========== */

   /* Mobile Toggle */
   .mobile-toggle {
       display: none;
       background: none;
       border: none;
       font-size: 24px;
       color: #1f2937;
       cursor: pointer;
       z-index: 100;
   }


   .mobile-toggle .fa-times {
       display: none;
   }


   .mobile-toggle.active .fa-bars {
       display: none;
   }


   .mobile-toggle.active .fa-times {
       display: inline-block;
   }















   /* ===== USER DROPDOWN SEDERHANA (BUKAN MODAL) ===== */
   .nav-user-menu {
       margin-left: 10px;
       position: static;
   }


   .user-dropdown-container {
       position: relative;
   }


   .user-dropdown-trigger {
       display: flex;
       align-items: center;
       gap: 8px;
       background: #f8fafc;
       border: 1px solid #e2e8f0;
       border-radius: 50px;
       padding: 4px 12px 4px 4px;
       cursor: pointer;
       transition: all 0.2s ease;
   }


   .user-dropdown-trigger:hover {
       border-color: #10b981;
       background: #ffffff;
   }


   .user-avatar-small {
       width: 36px;
       height: 36px;
       border-radius: 50%;
       overflow: hidden;
       border: 2px solid #ffffff;
       box-shadow: 0 2px 5px rgba(0,0,0,0.1);
   }


   .user-avatar-small img {
       width: 100%;
       height: 100%;
       object-fit: cover;
   }


   .user-name-text {
       font-weight: 800;
       color: #1f2937;
       font-size: 15px;
       max-width: 80px;
       white-space: nowrap;
       overflow: hidden;
       text-overflow: ellipsis;
   }


   .user-dropdown-trigger i {
       color: #6b7280;
       font-size: 12px;
       transition: transform 0.2s ease;
   }


   .user-dropdown-trigger.active i {
       transform: rotate(180deg);
   }


   /* Simple Dropdown (bukan modal) */
   .user-simple-dropdown {
       position: absolute;
       top: calc(100% + 10px);
       right: 0;
       width: 280px;
       background: white;
       border-radius: 12px;
       box-shadow: 0 10px 25px rgba(0,0,0,0.1);
       border: 1px solid #e2e8f0;
       opacity: 0;
       visibility: hidden;
       transform: translateY(-5px);
       transition: all 0.2s ease;
       z-index: 1000;
   }


   .user-simple-dropdown.show {
       opacity: 1;
       visibility: visible;
       transform: translateY(0);
   }


   .dropdown-user-info {
       display: flex;
       align-items: center;
       gap: 12px;
       padding: 16px;
   }


   .dropdown-user-avatar {
       width: 48px;
       height: 48px;
       border-radius: 50%;
       overflow: hidden;
       border: 2px solid #10b981;
   }


   .dropdown-user-avatar img {
       width: 100%;
       height: 100%;
       object-fit: cover;
   }


   .dropdown-user-details {
       flex: 1;
   }


   .dropdown-user-details strong {
       display: block;
       color: #1f2937;
       font-size: 16px;
       margin-bottom: 4px;
   }


   .dropdown-user-details small {
       color: #383737;
       font-weight: 500;
       font-size: 13px;
   }


   .dropdown-divider {
       height: 1px;
       background: #e2e8f0;
       margin: 8px 0;
   }


   .dropdown-item {
       display: flex;
       align-items: center;
       gap: 12px;
       padding: 12px 16px;
       color: #1f2937;
       text-decoration: none;
       font-size: 14px;
       font-weight: 500;
       transition: all 0.2s ease;
       width: 100%;
       text-align: left;
       border: none;
       background: none;
       cursor: pointer;
       box-sizing: border-box;
   }


   .dropdown-item i {
       width: 18px;
       color: #6b7280;
       font-size: 16px;
   }


   .dropdown-item:hover {
       background: #f8fafc;
       color: #10b981;
   }


   .dropdown-item:hover i {
       color: #10b981;
   }


   .logout-item {
       color: #ef4444;
   }


   .logout-item i {
       color: #ef4444;
   }


   .logout-item:hover {
       background: #fee2e2;
       color: #dc2626;
   }


   .logout-item:hover i {
       color: #dc2626;
   }


   /* ===== RESPONSIVE ===== */
   @media (max-width: 1024px) {
       .nav-links li a {
           padding: 8px 12px;
           font-size: 13px;
       }


       .user-name-text {
           max-width: 60px;
       }
   }


   @media (max-width: 768px) {
       .mobile-toggle {
           display: block;
       }


       .nav-links {
           position: fixed;
           top: 70px;
           left: 0;
           right: 0;
           background: white;
           flex-direction: column;
           align-items: flex-start;
           padding: 20px;
           gap: 10px;
           box-shadow: 0 10px 20px rgba(0,0,0,0.1);
           transform: translateY(-100%);
           opacity: 0;
           visibility: hidden;
           transition: all 0.3s ease;
           z-index: 999;
           max-height: calc(100vh - 70px);
           overflow-y: auto;
       }


       .nav-links.active {
           transform: translateY(0);
           opacity: 1;
           visibility: visible;
       }


       .nav-links li {
           width: 100%;
       }


       .nav-links li a {
           display: block;
           width: 100%;
           text-align: left;
           padding: 12px 16px !important;
           font-size: 15px;
       }


       .nav-user-menu {
           width: 100%;
           margin: 10px 0 0 0;
       }


       .user-dropdown-container {
           width: 100%;
       }


       .user-dropdown-trigger {
           width: 100%;
           justify-content: space-between;
           padding: 8px 16px;
       }


       .user-simple-dropdown {
           position: static;
           width: 100%;
           margin-top: 10px;
           box-shadow: none;
           border: 1px solid #e2e8f0;
           opacity: 1;
           visibility: visible;
           transform: none;
           display: none;
       }


       .user-simple-dropdown.show {
           display: block;
       }


       .user-name-text {
           max-width: none;
           flex: 1;
       }
   }


   /* Small phones */
   @media (max-width: 480px) {
       .logo-text {
           font-size: 18px;
       }


       .logo-icon {
           width: 35px;
           height: 35px;
           font-size: 16px;
       }
   }
</style>


<script>
   // Mobile Toggle
   const mobileToggle = document.getElementById('mobileToggle');
   const navLinks = document.getElementById('navLinks');


   if (mobileToggle) {
       mobileToggle.addEventListener('click', (e) => {
           e.stopPropagation();
           mobileToggle.classList.toggle('active');
           navLinks.classList.toggle('active');
       });
   }


   // User Dropdown Sederhana (BUKAN MODAL)
   const userTrigger = document.getElementById('userMenuTrigger');
   const userDropdown = document.getElementById('userSimpleDropdown');


   if (userTrigger && userDropdown) {
       userTrigger.addEventListener('click', (e) => {
           e.stopPropagation();
           e.preventDefault();


           // Toggle class active pada trigger dan dropdown
           userTrigger.classList.toggle('active');
           userDropdown.classList.toggle('show');
       });


       // Close dropdown when clicking outside
       document.addEventListener('click', (e) => {
           if (!userTrigger.contains(e.target) && !userDropdown.contains(e.target)) {
               userTrigger.classList.remove('active');
               userDropdown.classList.remove('show');
           }
       });


       // Prevent dropdown from closing when clicking inside it
       userDropdown.addEventListener('click', (e) => {
           e.stopPropagation();
       });
   }


   // Close mobile menu when clicking a link
   document.querySelectorAll('.nav-link').forEach(link => {
       link.addEventListener('click', () => {
           if (window.innerWidth <= 768) {
               mobileToggle?.classList.remove('active');
               navLinks?.classList.remove('active');
           }
       });
   });


   // Handle logout
   function handleLogout() {
       alert('Logout berhasil!');
       // Implementasi logout disini
       console.log('Logout clicked');
   }
</script>
