        document.addEventListener('DOMContentLoaded', function() {
            // ===== MOBILE NAVIGATION FIXED =====
            const mobileToggle = document.getElementById('mobileToggle');
            const navLinks = document.getElementById('navLinks');
            const navbar = document.getElementById('navbar');

            if (mobileToggle && navLinks) {
                // Toggle mobile menu dengan X icon
                mobileToggle.addEventListener('click', function(e) {
                    e.stopPropagation();
                    navLinks.classList.toggle('active');
                    mobileToggle.classList.toggle('active');

                    // Toggle body scroll
                    if (navLinks.classList.contains('active')) {
                        document.body.style.overflow = 'hidden';
                    } else {
                        document.body.style.overflow = '';
                    }
                });

                // Close menu ketika klik link
                document.querySelectorAll('.nav-link').forEach(link => {
                    link.addEventListener('click', () => {
                        navLinks.classList.remove('active');
                        mobileToggle.classList.remove('active');
                        document.body.style.overflow = '';
                    });
                });

                // Close menu ketika klik di luar
                document.addEventListener('click', function(event) {
                    if (!navLinks.contains(event.target) && !mobileToggle.contains(event.target)) {
                        navLinks.classList.remove('active');
                        mobileToggle.classList.remove('active');
                        document.body.style.overflow = '';
                    }
                });
            }

            // ===== STICKY NAVBAR =====
            window.addEventListener('scroll', () => {
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });

            // ===== VIDEO PLAYER FUNCTIONALITY =====
            const videoPlayer = document.querySelector('.video-player');
            const videoOverlay = document.getElementById('videoOverlay');
            const videoPlayBtn = document.getElementById('videoPlayBtn');

            if (videoPlayBtn && videoPlayer) {
                videoPlayBtn.addEventListener('click', function() {
                    // Change the video src to autoplay
                    const currentSrc = videoPlayer.src;
                    if (!currentSrc.includes('autoplay=1')) {
                        videoPlayer.src = currentSrc.includes('?')
                            ? currentSrc + '&autoplay=1'
                            : currentSrc + '?autoplay=1';
                    }

                    // Play the video
                    videoPlayer.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');

                    // Hide overlay
                    videoOverlay.classList.add('hidden');
                });

                // Show overlay when video ends
                videoPlayer.addEventListener('ended', function() {
                    videoOverlay.classList.remove('hidden');
                });
            }

            // ===== TESTIMONIAL SLIDER =====
            const testimonialSlides = document.querySelectorAll('.testimonial-slide');
            const sliderDots = document.querySelectorAll('.slider-dot');
            let currentSlide = 0;

            function showSlide(index) {
                testimonialSlides.forEach(slide => {
                    slide.classList.remove('active');
                });

                sliderDots.forEach(dot => {
                    dot.classList.remove('active');
                });

                testimonialSlides[index].classList.add('active');
                sliderDots[index].classList.add('active');
                currentSlide = index;
            }

            sliderDots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    showSlide(index);
                });
            });

            setInterval(() => {
                let nextSlide = currentSlide + 1;
                if (nextSlide >= testimonialSlides.length) {
                    nextSlide = 0;
                }
                showSlide(nextSlide);
            }, 5000);

            // ===== FORM SUBMISSION =====
            const contactForm = document.getElementById('contactForm');
            if (contactForm) {
                contactForm.addEventListener('submit', function(e) {
                    e.preventDefault();

                    // Get form data
                    const formData = new FormData(this);
                    const name = formData.get('name');

                    // Show success message
                    alert(`Terima kasih ${name}! Pesan Anda telah dikirim. Kami akan menghubungi Anda dalam 1x24 jam.`);

                    // Reset form
                    contactForm.reset();

                    // Smooth scroll to top
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
            }

            // ===== SMOOTH SCROLLING =====
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;

                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        e.preventDefault();
                        const navbarHeight = navbar.offsetHeight;
                        const targetPosition = targetElement.offsetTop - navbarHeight - 20;

                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // ===== TOOLS FILTER =====
            const filterBtns = document.querySelectorAll('.filter-btn');
            const toolCards = document.querySelectorAll('.tool-card');

            filterBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    // Update active button
                    filterBtns.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');

                    const filter = this.getAttribute('data-filter');

                    // Filter cards with animation
                    toolCards.forEach(card => {
                        const cardCategory = card.getAttribute('data-category');

                        if (filter === 'all' || cardCategory === filter) {
                            card.style.display = 'flex';
                            setTimeout(() => {
                                card.style.opacity = '1';
                                card.style.transform = 'translateY(0)';
                            }, 10);
                        } else {
                            card.style.opacity = '0';
                            card.style.transform = 'translateY(20px)';
                            setTimeout(() => {
                                card.style.display = 'none';
                            }, 300);
                        }
                    });
                });
            });

            // ===== ANIMATED COUNTERS =====
            const statNumbers = document.querySelectorAll('.stat-number');
            const statsSection = document.querySelector('.stats-section');
            let counted = false;

            function animateCounters() {
                if (counted) return;

                const rect = statsSection.getBoundingClientRect();
                if (rect.top < window.innerHeight - 100) {
                    statNumbers.forEach(stat => {
                        const target = parseInt(stat.getAttribute('data-count'));
                        let current = 0;
                        const increment = target / 50;
                        const timer = setInterval(() => {
                            current += increment;
                            if (current >= target) {
                                stat.textContent = target + (stat.textContent.includes('%') ? '%' : '');
                                clearInterval(timer);
                            } else {
                                stat.textContent = Math.floor(current) + (stat.textContent.includes('%') ? '%' : '');
                            }
                        }, 30);
                    });
                    counted = true;
                }
            }

            window.addEventListener('scroll', animateCounters);
            animateCounters();

            // ===== RENT BUTTON FUNCTIONALITY =====
            const rentBtns = document.querySelectorAll('.btn-rent');
            rentBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const toolTitle = this.closest('.tool-card').querySelector('.tool-title').textContent;
                    const toolPrice = this.closest('.tool-card').querySelector('.price-amount').textContent;

                    alert(`Anda akan menyewa:\n\n${toolTitle}\nHarga: ${toolPrice}/hari\n\nSilakan lanjutkan ke halaman checkout untuk menyelesaikan pemesanan.`);
                });
            });

            // ===== DETAIL BUTTON FUNCTIONALITY =====
            const detailBtns = document.querySelectorAll('.btn-detail');
            detailBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const toolCard = this.closest('.tool-card');
                    const toolTitle = toolCard.querySelector('.tool-title').textContent;
                    const toolDescription = toolCard.querySelector('.tool-description').textContent;

                    alert(`Detail Alat:\n\n${toolTitle}\n\n${toolDescription}\n\nUntuk informasi lebih lengkap, hubungi customer service kami.`);
                });
            });

            // ===== VIEW ALL BUTTON =====
            const viewAllBtn = document.querySelector('.btn-view-all');
            if (viewAllBtn) {
                viewAllBtn.addEventListener('click', function() {
                    alert('Membuka halaman katalog dengan semua alat yang tersedia...');
                    // In a real implementation, this would redirect to a catalog page
                });
            }

            // ===== ACTIVE NAV LINK ON SCROLL =====
            const sections = document.querySelectorAll('section[id]');
            const navItems = document.querySelectorAll('.nav-link');

            function highlightNavLink() {
                let scrollY = window.pageYOffset;

                sections.forEach(section => {
                    const sectionHeight = section.offsetHeight;
                    const sectionTop = section.offsetTop - 150;
                    const sectionId = section.getAttribute('id');

                    if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
                        navItems.forEach(item => {
                            item.classList.remove('active');
                            if (item.getAttribute('href') === `#${sectionId}`) {
                                item.classList.add('active');
                            }
                        });
                    }
                });
            }

            window.addEventListener('scroll', highlightNavLink);
        });

