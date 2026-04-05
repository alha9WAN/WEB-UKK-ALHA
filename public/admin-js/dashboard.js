
        // DOM Elements
        const themeToggle = document.getElementById('themeToggle');
        const themeIcon = themeToggle.querySelector('i');
        const navMenuToggle = document.getElementById('navMenuToggle');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        const mainContent = document.getElementById('mainContent');
        const navUserProfile = document.getElementById('navUserProfile');
        const profileLink = document.getElementById('profileLink');
        const profileModal = document.getElementById('profileModal');
        const closeProfileModal = document.getElementById('closeProfileModal');
        const editProfileBtn = document.getElementById('editProfileBtn');
        const saveProfileBtn = document.getElementById('saveProfileBtn');
        const fab = document.getElementById('fab');
        const logoutBtn = document.getElementById('logoutBtn');
        const notificationButton = document.getElementById('notificationButton');
        const navSearchInput = document.querySelector('.nav-search-input');
        const notificationContainer = document.getElementById('notificationContainer');

        // Initialize Chart
        let borrowingChart;

        // Theme Toggle
        function toggleTheme() {
            const isDark = document.body.classList.toggle('dark-mode');

            if (isDark) {
                themeIcon.classList.replace('fa-moon', 'fa-sun');
                localStorage.setItem('theme', 'dark');
                showNotification('Mode gelap diaktifkan', 'info');
            } else {
                themeIcon.classList.replace('fa-sun', 'fa-moon');
                localStorage.setItem('theme', 'light');
                showNotification('Mode terang diaktifkan', 'info');
            }

            updateChartColors();
        }

        // Load saved theme
        function loadTheme() {
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme === 'dark') {
                document.body.classList.add('dark-mode');
                themeIcon.classList.replace('fa-moon', 'fa-sun');
            }
        }

        // Sidebar Toggle
        function toggleSidebar() {
            const isActive = sidebar.classList.toggle('active');
            sidebarOverlay.classList.toggle('active');

            const menuIcon = navMenuToggle.querySelector('i');
            if (isActive) {
                menuIcon.classList.replace('fa-bars', 'fa-times');
            } else {
                menuIcon.classList.replace('fa-times', 'fa-bars');
            }
        }

        // Profile Modal
        function openProfileModal() {
            profileModal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeProfileModalFunc() {
            profileModal.classList.remove('active');
            document.body.style.overflow = '';
        }

        // Initialize Chart with animation
        function initChart() {
            const ctx = document.getElementById('borrowingChart').getContext('2d');

            const gradient = ctx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, 'rgba(16, 185, 129, 0.3)');
            gradient.addColorStop(1, 'rgba(16, 185, 129, 0.05)');

            borrowingChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['1', '5', '10', '15', '20', '25', '30'],
                    datasets: [{
                        label: 'Jumlah Peminjaman',
                        data: [5, 9, 8, 12, 10, 14, 13],
                        borderColor: '#10b981',
                        backgroundColor: gradient,
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#10b981',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 2,
                        pointRadius: 5,
                        pointHoverRadius: 7
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: getComputedStyle(document.documentElement).getPropertyValue('--bg-card'),
                            titleColor: getComputedStyle(document.documentElement).getPropertyValue('--text-primary'),
                            bodyColor: getComputedStyle(document.documentElement).getPropertyValue('--text-secondary'),
                            borderColor: getComputedStyle(document.documentElement).getPropertyValue('--border-light'),
                            borderWidth: 1,
                            padding: 12,
                            cornerRadius: 8
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                color: getComputedStyle(document.documentElement).getPropertyValue('--border-light'),
                                drawBorder: false
                            },
                            ticks: {
                                color: getComputedStyle(document.documentElement).getPropertyValue('--text-tertiary')
                            }
                        },
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: getComputedStyle(document.documentElement).getPropertyValue('--border-light'),
                                drawBorder: false
                            },
                            ticks: {
                                color: getComputedStyle(document.documentElement).getPropertyValue('--text-tertiary')
                            }
                        }
                    },
                    animation: {
                        duration: 2000,
                        easing: 'easeInOutQuart'
                    }
                }
            });
        }

        // Update chart colors for theme
        function updateChartColors() {
            if (!borrowingChart) return;

            const ctx = borrowingChart.ctx;
            const gradient = ctx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, 'rgba(16, 185, 129, 0.3)');
            gradient.addColorStop(1, 'rgba(16, 185, 129, 0.05)');

            borrowingChart.data.datasets[0].backgroundColor = gradient;
            borrowingChart.options.scales.x.grid.color = getComputedStyle(document.documentElement).getPropertyValue('--border-light');
            borrowingChart.options.scales.x.ticks.color = getComputedStyle(document.documentElement).getPropertyValue('--text-tertiary');
            borrowingChart.options.scales.y.grid.color = getComputedStyle(document.documentElement).getPropertyValue('--border-light');
            borrowingChart.options.scales.y.ticks.color = getComputedStyle(document.documentElement).getPropertyValue('--text-tertiary');
            borrowingChart.options.plugins.tooltip.backgroundColor = getComputedStyle(document.documentElement).getPropertyValue('--bg-card');
            borrowingChart.options.plugins.tooltip.titleColor = getComputedStyle(document.documentElement).getPropertyValue('--text-primary');
            borrowingChart.options.plugins.tooltip.bodyColor = getComputedStyle(document.documentElement).getPropertyValue('--text-secondary');
            borrowingChart.options.plugins.tooltip.borderColor = getComputedStyle(document.documentElement).getPropertyValue('--border-light');

            borrowingChart.update('none');
        }

        // Show notification
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = 'notification';

            const icon = type === 'error' ? 'fa-exclamation-circle' :
                        type === 'warning' ? 'fa-exclamation-triangle' :
                        type === 'success' ? 'fa-check-circle' : 'fa-info-circle';

            notification.innerHTML = `
                <i class="fas ${icon}"></i>
                <span>${message}</span>
            `;

            notificationContainer.appendChild(notification);

            setTimeout(() => notification.classList.add('show'), 10);

            setTimeout(() => {
                notification.classList.remove('show');
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.parentNode.removeChild(notification);
                    }
                }, 300);
            }, 4000);
        }

        // Animate progress bars
        function animateProgressBars() {
            const progressBars = document.querySelectorAll('.card-progress-bar');

            progressBars.forEach(bar => {
                const width = bar.style.width;
                bar.style.width = '0%';

                setTimeout(() => {
                    bar.style.width = width;
                }, 500);
            });
        }

        // Handle FAB click
        function handleFabClick() {
            // Create ripple effect
            const ripple = document.createElement('div');
            ripple.style.cssText = `
                position: absolute;
                width: 100px;
                height: 100px;
                background: rgba(16, 185, 129, 0.2);
                border-radius: 50%;
                transform: scale(0);
                animation: ripple 0.6s ease-out;
                top: 50%;
                left: 50%;
                margin-top: -50px;
                margin-left: -50px;
                pointer-events: none;
            `;

            fab.appendChild(ripple);

            setTimeout(() => {
                if (ripple.parentNode) {
                    ripple.parentNode.removeChild(ripple);
                }
            }, 600);

            showNotification('Fitur: Tambah peminjaman baru akan dibuka', 'info');
        }

        // Handle logout
        function handleLogout() {
            if (confirm('Apakah Anda yakin ingin logout?')) {
                showNotification('Logout berhasil!', 'success');
                setTimeout(() => {
                    window.location.href = '#';
                }, 1500);
            }
        }

        // Initialize everything
        function init() {
            // Load saved theme
            loadTheme();

            // Initialize chart
            setTimeout(() => {
                initChart();
                animateProgressBars();
            }, 500);

            // Event Listeners
            themeToggle.addEventListener('click', toggleTheme);
            navMenuToggle.addEventListener('click', toggleSidebar);
            sidebarOverlay.addEventListener('click', toggleSidebar);
            navUserProfile.addEventListener('click', openProfileModal);
            profileLink.addEventListener('click', (e) => {
                e.preventDefault();
                openProfileModal();
                toggleSidebar();
            });
            closeProfileModal.addEventListener('click', closeProfileModalFunc);
            editProfileBtn.addEventListener('click', () => {
                showNotification('Fitur edit profil akan segera hadir!', 'info');
            });
            saveProfileBtn.addEventListener('click', () => {
                showNotification('Profil berhasil disimpan!', 'success');
                closeProfileModalFunc();
            });
            fab.addEventListener('click', handleFabClick);
            logoutBtn.addEventListener('click', handleLogout);
            notificationButton.addEventListener('click', () => {
                showNotification('Anda memiliki 5 notifikasi baru', 'info');
            });

            // Close modal when clicking outside
            profileModal.addEventListener('click', (e) => {
                if (e.target === profileModal) {
                    closeProfileModalFunc();
                }
            });

            // Close sidebar when clicking on nav link on mobile
            document.querySelectorAll('.nav-link').forEach(link => {
                link.addEventListener('click', () => {
                    if (window.innerWidth <= 992 && sidebar.classList.contains('active')) {
                        toggleSidebar();
                    }
                });
            });

            // Animate elements on scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            // Observe elements for animation
            document.querySelectorAll('.card, .tool-card, .activity-item, .welcome-stat').forEach(el => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(20px)';
                el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(el);
            });

            // Show welcome notification
            setTimeout(() => {
                showNotification('Selamat datang di ToolGreen Dashboard!', 'success');
            }, 1000);
        }

        // Initialize when DOM is loaded
        document.addEventListener('DOMContentLoaded', init);
