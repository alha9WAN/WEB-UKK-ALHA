@extends('user.index')
@section('title', 'Home')

@section('konten')


    <!-- HERO - DIPERBAIKI DENGAN GAMBAR -->
    <section id="home" class="hero">
        <div class="hero-bg"></div>
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1 class="hero-title">
                        Sewa Alat <span class="text-gradient">Pertukangan</span> Professional
                    </h1>
                    <p class="hero-subtitle">
                        Bor, Gerinda, Mesin Potong, dan ratusan alat berkualitas tinggi.
                        Siap antar dalam 2 jam untuk area Jakarta dengan garansi 100%.
                    </p>

                    <div class="hero-buttons">
                        <a href="{{ route('halaman-list-alat') }}" class="btn btn-primary btn-lg">
                            <i class="fas fa-tools"></i>
                            Lihat Semua Alat
                        </a>

                    </div>

                    <div class="hero-features">
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Garansi 100%</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-shipping-fast"></i>
                            <span>Delivery 2 Jam</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-headset"></i>
                            <span>Support 24/7</span>
                        </div>
                    </div>
                </div>

                <!-- HERO VISUAL DENGAN GAMBAR -->
                <div class="hero-visual">
                    <img src="{{ asset('user-img/home0.jpg') }}"
                         alt="Alat Pertukangan Professional" class="hero-image">
                    <div class="hero-image-overlay"></div>

                </div>
            </div>
        </div>
    </section>

    <!-- VIDEO SECTION -->
    <section id="video" class="video-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Demo <span class="text-gradient">Penggunaan</span></h2>
                <p class="section-subtitle">Lihat bagaimana alat-alat kami bekerja dengan optimal untuk berbagai proyek konstruksi</p>
            </div>

            <div class="video-container">
                <div class="video-wrapper">
                    <iframe class="video-player"
                            src="instal tema wordpres manual(di hosting rumah web).mp4"
                            title="Demo Penggunaan Alat Pertukangan"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                    </iframe>

                    <div class="video-overlay" id="videoOverlay">
                        <button class="video-play-btn" id="videoPlayBtn">
                            <i class="fas fa-play"></i>
                        </button>
                        <div class="video-overlay-text">
                            <h3>Demo Alat Professional</h3>
                            <p>Tonton demo penggunaan alat-alat berkualitas kami</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="video-content">
                <div class="video-features">
                    <div class="video-feature-item">
                        <div class="video-feature-icon">
                            <i class="fas fa-video"></i>
                        </div>
                        <div class="video-feature-text">
                            <h4>Video Tutorial Lengkap</h4>
                            <p>Panduan penggunaan alat yang aman dan efektif</p>
                        </div>
                    </div>

                    <div class="video-feature-item">
                        <div class="video-feature-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="video-feature-text">
                            <h4>Training Gratis</h4>
                            <p>Konsultasi dan training penggunaan alat untuk pemula</p>
                        </div>
                    </div>

                    <div class="video-feature-item">
                        <div class="video-feature-icon">
                            <i class="fas fa-safety-certificate"></i>
                        </div>
                        <div class="video-feature-text">
                            <h4>Safety First</h4>
                            <p>Demonstrasi prosedur keselamatan yang benar</p>
                        </div>
                    </div>
                </div>

                <div class="video-features">
                    <div class="video-feature-item">
                        <div class="video-feature-icon">
                            <i class="fas fa-tools"></i>
                        </div>
                        <div class="video-feature-text">
                            <h4>Tips & Trik</h4>
                            <p>Rahasia penggunaan alat untuk hasil maksimal</p>
                        </div>
                    </div>

                    <div class="video-feature-item">
                        <div class="video-feature-icon">
                            <i class="fas fa-maintenance"></i>
                        </div>
                        <div class="video-feature-text">
                            <h4>Perawatan Alat</h4>
                            <p>Cara merawat alat agar tetap awet dan optimal</p>
                        </div>
                    </div>

                    <div class="video-feature-item">
                        <div class="video-feature-icon">
                            <i class="fas fa-question-circle"></i>
                        </div>
                        <div class="video-feature-text">
                            <h4>Q&A Session</h4>
                            <p>Tanya jawab dengan ahli alat pertukangan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- STATS -->
    <!-- <section class="stats-section">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number" data-count="500">0</div>
                    <div class="stat-label">Alat Tersedia</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number" data-count="2500">0</div>
                    <div class="stat-label">Pelanggan</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number" data-count="98">0%</div>
                    <div class="stat-label">Kepuasan</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number" data-count="2">0</div>
                    <div class="stat-label">Jam Delivery</div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- KONTEN YANG TELAH ADA (CATEGORIES, TOOLS, HOW IT WORKS, ETC) -->
    <!-- CATEGORIES -->
    <section id="categories" class="category-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Kategori <span class="text-gradient">Alat</span></h2>
                <p class="section-subtitle">Temukan alat yang tepat untuk proyek Anda dari berbagai kategori kami</p>
            </div>

            <div class="categories-grid">
                @foreach ($kategoris as $kategori)
                <!-- Category 1 -->
                <div class="category-card">
                    <div class="category-image">
                        <div class="category-image-bg"></div>
                        <img src="{{ $kategori->image
                                ? asset('storage/' .$kategori->image)
                                : asset('assets/img/no-image.png') }}"
                             alt="Power Tools" class="category-img">
                    </div>
                    <div class="category-content">
                        <h3>{{ $kategori->name }}</h3>
                        <p>   {{ $kategori->description ?? 'Deskripsi kategori belum tersedia.' }}</p>
                        <div class="category-badge">{{ $kategori->tools_count }} Alat Tersedia</div>
                    </div>
                </div>

@endforeach
            </div>
        </div>
    </section>

    <!-- NEW CTA SECTION -->
    <section class="cta-image-section">
        <div class="container">
            <div class="cta-image-content">
                <div class="cta-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80"
                         alt="Alat Pertukangan Professional" class="cta-image">
                    <div class="cta-image-overlay"></div>
                    <div class="cta-image-badge">MULAI SEWA SEKARANG</div>
                    <div class="cta-image-text">
                        <h4>Alat Premium Siap Pakai</h4>
                        <p>Kondisi terawat & bergaransi</p>
                    </div>
                </div>

                <div class="cta-text-content">
                    <h2 class="text-gradient">Mengapa Memilih Kami?</h2>
                    <p>Kami memberikan solusi terbaik untuk kebutuhan alat pertukangan Anda dengan layanan terpadu dan kualitas terjamin.</p>

                    <div class="cta-features">
                        <div class="cta-feature-item">
                            <div class="cta-feature-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div class="cta-feature-text">
                                <h4>Garansi 100%</h4>
                                <p>Semua alat dijamin berfungsi optimal saat disewa</p>
                            </div>
                        </div>

                        <div class="cta-feature-item">
                            <div class="cta-feature-icon">
                                <i class="fas fa-truck"></i>
                            </div>
                            <div class="cta-feature-text">
                                <h4>Delivery 2 Jam</h4>
                                <p>Pengiriman cepat untuk area Jakarta dan sekitarnya</p>
                            </div>
                        </div>

                        <div class="cta-feature-item">
                            <div class="cta-feature-icon">
                                <i class="fas fa-tools"></i>
                            </div>
                            <div class="cta-feature-text">
                                <h4>Alat Premium</h4>
                                <p>Hanya alat berkualitas tinggi dari brand terpercaya</p>
                            </div>
                        </div>

                        <div class="cta-feature-item">
                            <div class="cta-feature-icon">
                                <i class="fas fa-headset"></i>
                            </div>
                            <div class="cta-feature-text">
                                <h4>Support 24/7</h4>
                                <p>Tim support siap membantu kapan saja Anda butuh</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ALAT - IMPROVED WITH PHOTOS -->
    <section id="tools" class="tools-section">
        <div class="tools-bg"></div>
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Alat <span class="text-gradient">Premium</span> Kami</h2>
                <p class="section-subtitle">Pilih dari ratusan alat berkualitas dengan kondisi terbaik dan harga terjangkau</p>
            </div>

            <div class="tools-filter">
                <button class="filter-btn active" data-filter="all">
                    <i class="fas fa-tools"></i>
                    <span>Semua Alat</span>
                </button>
                <button class="filter-btn" data-filter="electric">
                    <i class="fas fa-bolt"></i>
                    <span>Alat Listrik</span>
                </button>
                <button class="filter-btn" data-filter="manual">
                    <i class="fas fa-hammer"></i>
                    <span>Alat Manual</span>
                </button>
                <button class="filter-btn" data-filter="safety">
                    <i class="fas fa-box"></i>
                    <span>Perlengkapan</span>
                </button>
            </div>


            <div class="tools-grid">
                @foreach($tools as $tool)
                <div class="tool-card" data-category="{{ strtolower($tool->category_type ?? 'all') }}">
                    <div class="tool-badge recommended">
                        <i class="fas fa-star"></i>
                        <span>{{ $tool->kategori->name ?? 'Umum' }}</span>
                    </div>

                    <div class="tool-img">
                        <img src="{{ $tool->image
                            ? asset('storage/' . $tool->image)
                            : asset('assets/img/no-image.png') }}"
                             alt="{{ $tool->name }}">
                        <div class="tool-img-overlay"></div>
                    </div>

                    <div class="tool-content">
                        <div class="tool-header">
                            <div class="tool-title-wrapper">
                                <h3 class="tool-title">{{ $tool->name }}</h3>
                            </div>
                            <div class="tool-price-wrapper">
                                <div class="tool-price">
                                    Rp {{ number_format($tool->price, 0, ',', '.') }}
                                    <span class="price-unit">/hari</span>
                                </div>
                            </div>
                        </div>

                        <div class="tool-stock">
                            <div class="stock-info">
                                <i class="fas fa-box"></i>
                                <span class="stock-text">
                                    Stok: <strong>{{ $tool->stock }}</strong>
                                </span>

                                @if ($tool->stock > 5)
                                    <span class="stock-status available">
                                        <span class="stock-dot"></span> Tersedia
                                    </span>
                                @elseif ($tool->stock > 0)
                                    <span class="stock-status limited">
                                        <span class="stock-dot"></span> Terbatas
                                    </span>
                                @else
                                    <span class="stock-status out">
                                        <span class="stock-dot"></span> Habis
                                    </span>
                                @endif
                            </div>
                        </div>

                        <p class="tool-description">
                            {{ Str::limit($tool->description, 120, '...') }}
                        </p>

                        <div class="tool-specs">
                            @php
                                $features = is_array($tool->features) ? $tool->features : (json_decode($tool->features, true) ?? []);
                            @endphp
                            @forelse (array_slice($features, 0, 4) as $feature)
                                <div class="spec">
                                    <i class="fas fa-check-circle"></i>
                                    <span>{{ $feature }}</span>
                                </div>
                            @empty
                                <div class="spec">
                                    <i class="fas fa-minus-circle"></i>
                                    <span>Tidak ada fitur</span>
                                </div>
                            @endforelse
                        </div>

                        <div class="tool-actions">
                            {{-- ini --}}
                         <a href="{{ route('orders.create', $tool->id) }}" class="btn-rent">
    <i class="fas fa-shopping-cart"></i>
    <span>Pinjam</span>
</a>

                         <a href="{{ route('halaman-detail-alat', $tool->id) }}" class="btn-detail">
    <i class="fas fa-eye" style="color: #000"></i>
    <span>Detail</span>
</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="text-center mt-8">
                <a href="{{ route('halaman-list-alat') }}" class="btn btn-primary btn-lg btn-view-all">
                    <i class="fas fa-eye"></i>
                    <span>Lihat Semua Alat</span>
                </a>
            </div>
        </div>
    </section>

    <!-- HOW IT WORKS -->
    <section id="how-it-works" class="how-it-works">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Cara <span class="text-gradient">Mudah</span> Meminjam</h2>
                <p class="section-subtitle">Hanya 4 langkah sederhana untuk mendapatkan alat yang Anda butuhkan</p>
            </div>

            <div class="steps-container">
                <div class="step-card">
                    <div class="step-number">1</div>
                    <div class="step-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3>Pilih Alat</h3>
                    <p>Telusuri katalog kami dan pilih alat yang sesuai dengan kebutuhan proyek Anda</p>
                </div>

                <div class="step-card">
                    <div class="step-number">2</div>
                    <div class="step-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <h3>Booking Online</h3>
                    <p>Isi formulir pemesanan dengan detail waktu dan durasi sewa yang diinginkan</p>
                </div>

                <div class="step-card">
                    <div class="step-number">3</div>
                    <div class="step-icon">
                        <i class="fas fa-comments-dollar"></i>
                    </div>
                    <h3>Konfirmasi & Bayar</h3>
                    <p>Admin akan menghubungi untuk konfirmasi dan proses pembayaran yang mudah</p>
                </div>

                <div class="step-card">
                    <div class="step-number">4</div>
                    <div class="step-icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    <h3>Alat Diantar</h3>
                    <p>Alat akan diantar ke lokasi Anda dalam waktu 2 jam untuk area Jakarta</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURES -->
    <section id="features" class="section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Keunggulan <span class="text-gradient">ToolRent</span></h2>
                <p class="section-subtitle">Mengapa ribuan profesional memilih layanan kami</p>
            </div>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Garansi 100%</h3>
                    <p>Semua alat bergaransi dan dijamin berfungsi dengan baik saat disewa</p>
                </div>


                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3>Support 24/7</h3>
                    <p>Tim support siap membantu kapan saja melalui WhatsApp dan telepon</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <h3>Alat Premium</h3>
                    <p>Hanya alat berkualitas tinggi dari brand terpercaya yang kami sediakan</p>
                </div>



                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-user-friends"></i>
                    </div>
                    <h3>Konsultasi Gratis</h3>
                    <p>Konsultasi gratis untuk pemilihan alat yang tepat untuk proyek Anda</p>
                </div>
            </div>
        </div>
    </section>

    <!-- TESTIMONIALS -->
    <section id="testimonials" class="testimonials-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Testimoni <span class="text-gradient">Pelanggan</span></h2>
                <p class="section-subtitle">Apa kata ribuan pelanggan yang telah menggunakan layanan kami</p>
            </div>

            <div class="testimonial-track">
                <div class="testimonial-slide active">
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            <p class="testimonial-text">
                                "Saya sudah 2 tahun menjadi pelanggan setia ToolRent. Alat selalu dalam kondisi prima, harga terjangkau, dan delivery super cepat. Sangat recommended untuk kontraktor!"
                            </p>
                        </div>
                        <div class="testimonial-author">
                            <div class="author-avatar">BS</div>
                            <div class="author-info">
                                <h4>Budi Santoso</h4>
                                <p>Kontraktor Bangunan - Jakarta</p>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="testimonial-slide">
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            <p class="testimonial-text">
                                "Sebagai pemilik usaha home renovation, ToolRent sangat membantu. Alat lengkap, kondisi terawat, dan admin sangat responsif. Pengiriman selalu tepat waktu!"
                            </p>
                        </div>
                        <div class="testimonial-author">
                            <div class="author-avatar">SD</div>
                            <div class="author-info">
                                <h4>Sari Dewi</h4>
                                <p>Pemilik Renovasi Rumah - Tangerang</p>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slider-nav">
                <button class="slider-dot active"></button>
                <button class="slider-dot"></button>
            </div>
        </div>
    </section>

    <!-- CONTACT -->
    <section id="contact" class="section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Hubungi <span class="text-gradient">Kami</span></h2>
                <p class="section-subtitle">Punya pertanyaan atau ingin berkonsultasi? Tim kami siap membantu Anda</p>
            </div>

            <div class="contact-grid">
                <div class="contact-form-wrapper">
                    <h3>Kirim Pesan ke Kami</h3>
                    <form id="contactForm" method="POST" action="#">
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Jenis Pesan</label>
                            <select class="form-control" name="type" required>
                                <option value="">Pilih jenis pesan</option>
                                <option value="konsultasi">Konsultasi Alat</option>
                                <option value="pertanyaan">Pertanyaan Umum</option>
                                <option value="kerjasama">Kerjasama Bisnis</option>
                                <option value="komplain">Keluhan/Saran</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Pesan</label>
                            <textarea class="form-control" name="message" rows="5" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn-full">
                            <i class="fas fa-envelope"></i>
                            Kirim Pesan
                        </button>
                    </form>
                </div>

                <div class="contact-info">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <div class="info-content">
                            <h4>WhatsApp</h4>
                            <p>+62 812 3456 7890</p>
                            <small>Respon dalam 5 menit</small>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="info-content">
                            <h4>Telepon</h4>
                            <p>(021) 1234 5678</p>
                            <small>Senin - Minggu, 24 jam</small>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="info-content">
                            <h4>Lokasi Kantor</h4>
                            <p>Jl. Industri Raya No. 123</p>
                            <p>Jakarta Barat 11730</p>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="info-content">
                            <h4>Jam Operasional</h4>
                            <p><strong>Senin - Jumat:</strong> 08:00 - 22:00</p>
                            <p><strong>Sabtu - Minggu:</strong> 09:00 - 20:00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
