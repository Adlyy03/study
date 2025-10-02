<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Sekolah Modern</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#f3f0ff',
                            100: '#e9e2ff',
                            200: '#d6c9ff',
                            300: '#b8a3ff',
                            400: '#977dff',
                            500: '#7c5dfa',
                            600: '#6d42f0',
                            700: '#5e2edc',
                            800: '#4e24b8',
                            900: '#000c9e',
                        },
                        secondary: {
                            50: '#fafafa',
                            100: '#f4f4f5',
                            200: '#e4e4e7',
                            300: '#d4d4d8',
                            400: '#a1a1aa',
                            500: '#71717a',
                            600: '#52525b',
                            700: '#3f3f46',
                            800: '#27272a',
                            900: '#18181b',
                        }
                    },
                    animation: {
                        'fade-in-up': 'fadeInUp 0.6s ease-out',
                        'fade-in': 'fadeIn 0.8s ease-out',
                        'slide-in-right': 'slideInRight 0.6s ease-out',
                        'bounce-slow': 'bounce 2s infinite',
                    },
                    keyframes: {
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideInRight: {
                            '0%': { opacity: '0', transform: 'translateX(30px)' },
                            '100%': { opacity: '1', transform: 'translateX(0)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body { 
            font-family: 'Inter', sans-serif; 
            scroll-behavior: smooth;
        }
        .hero-pattern {
            background-image: 
                radial-gradient(circle at 25% 25%, rgba(14, 165, 233, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, rgba(59, 130, 246, 0.1) 0%, transparent 50%);
        }
        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        .btn-primary {
            background: linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(14, 165, 233, 0.3);
        }
        .section-divider {
            background: linear-gradient(90deg, transparent, #e5e7eb, transparent);
        }
    </style>
</head>
<body class="bg-gradient-to-r from-[#977DFF] to-[#000C9E] text-white font-inter dark:bg-gradient-to-r dark:from-[#977DFF] dark:to-[#000C9E]">

    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 bg-white/10 backdrop-blur-md border-b border-white/20 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center border border-white/30">
                        <i class="fas fa-graduation-cap text-white text-lg"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-white">EduSystem</h1>
                        <p class="text-xs text-white/80">Manajemen Sekolah</p>
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="text-white/90 hover:text-white font-medium transition-colors duration-300">Beranda</a>
                    <a href="#features" class="text-white/90 hover:text-white font-medium transition-colors duration-300">Fitur</a>
                    <a href="#students" class="text-white/90 hover:text-white font-medium transition-colors duration-300">Siswa</a>
                    <a href="#about" class="text-white/90 hover:text-white font-medium transition-colors duration-300">Tentang</a>
                </div>

                <!-- Auth Buttons -->
                <div class="flex items-center space-x-3">
                    <a href="{{ route('login') }}" class="hidden sm:inline-flex items-center px-4 py-2 text-sm font-medium text-white/90 hover:text-white transition-colors duration-300">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Masuk
                    </a>
                        <a href="{{ route('register') }}" class="bg-white/20 backdrop-blur-sm border border-white/30 text-white px-4 py-2 rounded-lg text-sm font-medium inline-flex items-center hover:bg-white/30 transition-all duration-300 hover:scale-105">
                            <i class="fas fa-user-plus mr-2"></i>
                            Daftar
                        </a>
                        
                        <!-- Dark Mode Toggle -->
                        <button id="darkModeToggleWelcome" class="p-2 rounded-lg bg-white/20 backdrop-blur-sm border border-white/30 text-white hover:bg-white/30 transition-all duration-300">
                            <i class="fas fa-moon dark:hidden"></i>
                            <i class="fas fa-sun hidden dark:block"></i>
                        </button>
                        
                        <!-- Mobile menu button -->
                        <button class="md:hidden p-2 text-white/90 hover:text-white">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="pt-16 min-h-screen flex items-center relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-white/5 to-transparent"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Content -->
                <div class="animate-fade-in-up">
                    <div class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur-sm border border-white/30 text-white rounded-full text-sm font-medium mb-6">
                        <i class="fas fa-star mr-2"></i>
                        Sistem Terdepan #1 di Indonesia
                    </div>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6">
                        Sistem Manajemen
                        <span class="bg-gradient-to-r from-white to-white/80 bg-clip-text text-transparent">
                            Sekolah Modern
                        </span>
                    </h1>
                    <p class="text-lg text-white/90 mb-8 leading-relaxed">
                        Platform terintegrasi untuk mengelola data siswa, guru, dan administrasi sekolah dengan teknologi terdepan dan antarmuka yang intuitif.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#students" class="bg-white/20 backdrop-blur-sm border border-white/30 text-white px-8 py-4 rounded-lg font-semibold inline-flex items-center justify-center hover:bg-white/30 transition-all duration-300 hover:scale-105 shadow-lg">
                            <i class="fas fa-users mr-3"></i>
                            Lihat Data Siswa
                        </a>
                        <a href="#features" class="bg-transparent border-2 border-white/30 text-white px-8 py-4 rounded-lg font-semibold hover:bg-white/10 hover:border-white/50 transition-all duration-300 inline-flex items-center justify-center">
                            <i class="fas fa-play mr-3"></i>
                            Pelajari Lebih Lanjut
                        </a>
                    </div>
                </div>

                <!-- Hero Image/Illustration -->
                <div class="animate-slide-in-right">
                    <div class="relative">
                        <div class="w-full h-96 bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl flex items-center justify-center shadow-2xl">
                            <div class="text-center">
                                <i class="fas fa-school text-6xl text-white mb-4 animate-bounce-slow"></i>
                                <h3 class="text-xl font-semibold text-white">Dashboard Interaktif</h3>
                                <p class="text-white/80 mt-2">Kelola semua data dengan mudah</p>
                            </div>
                        </div>
                        <!-- Floating Cards -->
                        <div class="absolute -top-4 -left-4 bg-white/20 backdrop-blur-sm border border-white/30 rounded-lg p-4 text-white shadow-lg">
                            <i class="fas fa-chart-line text-2xl mb-2"></i>
                            <p class="text-sm font-medium">Analytics</p>
                        </div>
                        <div class="absolute -bottom-4 -right-4 bg-white/20 backdrop-blur-sm border border-white/30 rounded-lg p-4 text-white shadow-lg">
                            <i class="fas fa-shield-alt text-2xl mb-2"></i>
                            <p class="text-sm font-medium">Secure</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-white/5 backdrop-blur-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4">
                    Fitur Unggulan Sistem
                </h2>
                <p class="text-lg text-white/90 max-w-2xl mx-auto">
                    Dilengkapi dengan berbagai fitur canggih untuk memudahkan pengelolaan sekolah modern
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl p-8 shadow-lg hover:shadow-2xl hover:bg-white/15 transition-all duration-300 hover:scale-105">
                    <div class="w-12 h-12 bg-white/20 backdrop-blur-sm border border-white/30 rounded-lg flex items-center justify-center mb-6">
                        <i class="fas fa-users text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-3">Manajemen Siswa</h3>
                    <p class="text-white/90 leading-relaxed">Kelola data siswa dengan mudah, mulai dari pendaftaran hingga kelulusan dengan sistem yang terintegrasi.</p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl p-8 shadow-lg hover:shadow-2xl hover:bg-white/15 transition-all duration-300 hover:scale-105">
                    <div class="w-12 h-12 bg-white/20 backdrop-blur-sm border border-white/30 rounded-lg flex items-center justify-center mb-6">
                        <i class="fas fa-chalkboard-teacher text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-3">Portal Guru</h3>
                    <p class="text-white/90 leading-relaxed">Platform khusus untuk guru mengelola kelas, nilai, dan berkomunikasi dengan siswa dan orang tua.</p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl p-8 shadow-lg hover:shadow-2xl hover:bg-white/15 transition-all duration-300 hover:scale-105">
                    <div class="w-12 h-12 bg-white/20 backdrop-blur-sm border border-white/30 rounded-lg flex items-center justify-center mb-6">
                        <i class="fas fa-chart-bar text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-3">Laporan & Analytics</h3>
                    <p class="text-white/90 leading-relaxed">Dashboard analitik lengkap dengan laporan real-time untuk memantau perkembangan sekolah.</p>
                </div>

                <!-- Feature 4 -->
                <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl p-8 shadow-lg hover:shadow-2xl hover:bg-white/15 transition-all duration-300 hover:scale-105">
                    <div class="w-12 h-12 bg-white/20 backdrop-blur-sm border border-white/30 rounded-lg flex items-center justify-center mb-6">
                        <i class="fas fa-mobile-alt text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-3">Mobile Responsive</h3>
                    <p class="text-white/90 leading-relaxed">Akses sistem dari perangkat apapun dengan tampilan yang optimal di desktop, tablet, dan mobile.</p>
                </div>

                <!-- Feature 5 -->
                <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl p-8 shadow-lg hover:shadow-2xl hover:bg-white/15 transition-all duration-300 hover:scale-105">
                    <div class="w-12 h-12 bg-white/20 backdrop-blur-sm border border-white/30 rounded-lg flex items-center justify-center mb-6">
                        <i class="fas fa-shield-alt text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-3">Keamanan Tinggi</h3>
                    <p class="text-white/90 leading-relaxed">Sistem keamanan berlapis dengan enkripsi data dan kontrol akses yang ketat untuk melindungi informasi.</p>
                </div>

                <!-- Feature 6 -->
                <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl p-8 shadow-lg hover:shadow-2xl hover:bg-white/15 transition-all duration-300 hover:scale-105">
                    <div class="w-12 h-12 bg-white/20 backdrop-blur-sm border border-white/30 rounded-lg flex items-center justify-center mb-6">
                        <i class="fas fa-cloud text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-3">Cloud Storage</h3>
                    <p class="text-white/90 leading-relaxed">Penyimpanan data di cloud yang aman dan dapat diakses kapan saja dengan backup otomatis.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Students Section -->
    <section id="students" class="py-20 bg-white/5 backdrop-blur-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4">
                    Siswa Terdaftar Terbaru
                </h2>
                <p class="text-lg text-white/90 max-w-2xl mx-auto">
                    Lihat profil siswa yang baru bergabung dengan sistem manajemen sekolah kami
                </p>
                <div class="h-px w-24 mx-auto mt-8 bg-gradient-to-r from-transparent via-white/50 to-transparent"></div>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                <!-- Student Card 1 -->
                <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl hover:bg-white/15 transition-all duration-300 hover:scale-105">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                             alt="Ahmad Santoso" class="w-full h-48 object-cover">
                        <div class="absolute top-4 right-4 bg-green-500/90 backdrop-blur-sm text-white px-3 py-1 rounded-full text-xs font-medium">
                            Aktif
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-white mb-2">Ahmad Santoso</h3>
                        <div class="space-y-2 mb-4">
                            <div class="flex items-center text-white/90">
                                <i class="fas fa-graduation-cap w-4 mr-3 text-white"></i>
                                <span class="text-sm">Kelas 10 IPA</span>
                            </div>
                            <div class="flex items-center text-white/90">
                                <i class="fas fa-book w-4 mr-3 text-white"></i>
                                <span class="text-sm">Jurusan IPA</span>
                            </div>
                            <div class="flex items-center text-white/90">
                                <i class="fas fa-calendar w-4 mr-3 text-white"></i>
                                <span class="text-sm">Daftar: 15 Jan 2024</span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-xs bg-white/20 backdrop-blur-sm border border-white/30 text-white px-3 py-1 rounded-full">NIS: 2024001</span>
                            <button class="text-white hover:text-white/80 text-sm font-medium transition-colors duration-300">
                                Lihat Detail <i class="fas fa-arrow-right ml-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Student Card 2 -->
                <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl hover:bg-white/15 transition-all duration-300 hover:scale-105">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                             alt="Siti Nurhaliza" class="w-full h-48 object-cover">
                        <div class="absolute top-4 right-4 bg-green-500/90 backdrop-blur-sm text-white px-3 py-1 rounded-full text-xs font-medium">
                            Aktif
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-white mb-2">Siti Nurhaliza</h3>
                        <div class="space-y-2 mb-4">
                            <div class="flex items-center text-white/90">
                                <i class="fas fa-graduation-cap w-4 mr-3 text-white"></i>
                                <span class="text-sm">Kelas 11 IPS</span>
                            </div>
                            <div class="flex items-center text-white/90">
                                <i class="fas fa-book w-4 mr-3 text-white"></i>
                                <span class="text-sm">Jurusan IPS</span>
                            </div>
                            <div class="flex items-center text-white/90">
                                <i class="fas fa-calendar w-4 mr-3 text-white"></i>
                                <span class="text-sm">Daftar: 20 Feb 2024</span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-xs bg-white/20 backdrop-blur-sm border border-white/30 text-white px-3 py-1 rounded-full">NIS: 2024002</span>
                            <button class="text-white hover:text-white/80 text-sm font-medium transition-colors duration-300">
                                Lihat Detail <i class="fas fa-arrow-right ml-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Student Card 3 -->
                <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl hover:bg-white/15 transition-all duration-300 hover:scale-105">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                             alt="Budi Hartono" class="w-full h-48 object-cover">
                        <div class="absolute top-4 right-4 bg-green-500/90 backdrop-blur-sm text-white px-3 py-1 rounded-full text-xs font-medium">
                            Aktif
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-white mb-2">Budi Hartono</h3>
                        <div class="space-y-2 mb-4">
                            <div class="flex items-center text-white/90">
                                <i class="fas fa-graduation-cap w-4 mr-3 text-white"></i>
                                <span class="text-sm">Kelas 12 Teknik</span>
                            </div>
                            <div class="flex items-center text-white/90">
                                <i class="fas fa-book w-4 mr-3 text-white"></i>
                                <span class="text-sm">Jurusan Teknik</span>
                            </div>
                            <div class="flex items-center text-white/90">
                                <i class="fas fa-calendar w-4 mr-3 text-white"></i>
                                <span class="text-sm">Daftar: 10 Mar 2024</span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-xs bg-white/20 backdrop-blur-sm border border-white/30 text-white px-3 py-1 rounded-full">NIS: 2024003</span>
                            <button class="text-white hover:text-white/80 text-sm font-medium transition-colors duration-300">
                                Lihat Detail <i class="fas fa-arrow-right ml-1"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- View All Button -->
            <div class="text-center">
                <a href="{{ route('students.index') }}" class="bg-white/20 backdrop-blur-sm border border-white/30 text-white px-8 py-4 rounded-lg font-semibold inline-flex items-center hover:bg-white/30 transition-all duration-300 hover:scale-105 shadow-lg">
                    <i class="fas fa-users mr-3"></i>
                    Lihat Semua Siswa
                    <i class="fas fa-arrow-right ml-3"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-white/5 backdrop-blur-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl sm:text-4xl font-bold text-white mb-6">
                        Mengapa Memilih 
                        <span class="text-white/90">EduSystem?</span>
                    </h2>
                    <p class="text-lg text-white/90 mb-8 leading-relaxed">
                        Sistem manajemen sekolah yang dirancang khusus untuk memenuhi kebutuhan pendidikan modern di Indonesia dengan teknologi terdepan dan dukungan 24/7.
                    </p>
                    
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-white/20 backdrop-blur-sm border border-white/30 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <i class="fas fa-check text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-white mb-1">Interface Yang Intuitif</h4>
                                <p class="text-white/90">Desain yang user-friendly dan mudah dipahami oleh semua kalangan</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-white/20 backdrop-blur-sm border border-white/30 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <i class="fas fa-check text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-white mb-1">Dukungan Teknis 24/7</h4>
                                <p class="text-white/90">Tim support yang siap membantu kapan saja Anda membutuhkan</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-white/20 backdrop-blur-sm border border-white/30 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <i class="fas fa-check text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-white mb-1">Customizable & Scalable</h4>
                                <p class="text-white/90">Dapat disesuaikan dengan kebutuhan sekolah dan berkembang seiring waktu</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl p-8 shadow-lg">
                        <div class="grid grid-cols-2 gap-6">
                            <div class="text-center">
                                <div class="text-3xl font-bold text-white mb-2">500+</div>
                                <div class="text-sm text-white/90">Sekolah Terdaftar</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-white mb-2">50K+</div>
                                <div class="text-sm text-white/90">Siswa Aktif</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-white mb-2">10K+</div>
                                <div class="text-sm text-white/90">Guru Terdaftar</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-white mb-2">99.9%</div>
                                <div class="text-sm text-white/90">Uptime</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black/20 backdrop-blur-sm border-t border-white/20 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <!-- Company Info -->
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 bg-white/20 backdrop-blur-sm border border-white/30 rounded-lg flex items-center justify-center">
                            <i class="fas fa-graduation-cap text-white text-lg"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white">EduSystem</h3>
                            <p class="text-sm text-white/80">Manajemen Sekolah Modern</p>
                        </div>
                    </div>
                    <p class="text-white/90 mb-6 leading-relaxed">
                        Platform terdepan untuk mengelola sistem pendidikan dengan teknologi modern dan antarmuka yang intuitif.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-white/10 backdrop-blur-sm border border-white/20 rounded-lg flex items-center justify-center hover:bg-white/20 transition-all duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 backdrop-blur-sm border border-white/20 rounded-lg flex items-center justify-center hover:bg-white/20 transition-all duration-300">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 backdrop-blur-sm border border-white/20 rounded-lg flex items-center justify-center hover:bg-white/20 transition-all duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 backdrop-blur-sm border border-white/20 rounded-lg flex items-center justify-center hover:bg-white/20 transition-all duration-300">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="font-semibold mb-4 text-white">Menu Cepat</h4>
                    <ul class="space-y-2">
                        <li><a href="#home" class="text-white/80 hover:text-white transition-colors duration-300">Beranda</a></li>
                        <li><a href="#features" class="text-white/80 hover:text-white transition-colors duration-300">Fitur</a></li>
                        <li><a href="#students" class="text-white/80 hover:text-white transition-colors duration-300">Siswa</a></li>
                        <li><a href="#about" class="text-white/80 hover:text-white transition-colors duration-300">Tentang</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="font-semibold mb-4 text-white">Kontak</h4>
                    <ul class="space-y-3">
                        <li class="flex items-center space-x-3">
                            <i class="fas fa-envelope text-white"></i>
                            <span class="text-white/90">info@edusystem.id</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <i class="fas fa-phone text-white"></i>
                            <span class="text-white/90">+62 21 1234 5678</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <i class="fas fa-map-marker-alt text-white"></i>
                            <span class="text-white/90">Jakarta, Indonesia</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Footer -->
            <div class="border-t border-white/20 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-white/80 text-sm">
                        &copy; 2024 EduSystem. Semua hak dilindungi undang-undang.
                    </p>
                    <div class="flex space-x-6 mt-4 md:mt-0">
                        <a href="#" class="text-white/80 hover:text-white text-sm transition-colors duration-300">Kebijakan Privasi</a>
                        <a href="#" class="text-white/80 hover:text-white text-sm transition-colors duration-300">Syarat & Ketentuan</a>
                        <a href="#" class="text-white/80 hover:text-white text-sm transition-colors duration-300">Bantuan</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <button id="scrollToTop" class="fixed bottom-8 right-8 w-12 h-12 bg-white/20 backdrop-blur-sm border border-white/30 text-white rounded-full shadow-lg hover:bg-white/30 hover:scale-110 transition-all duration-300 opacity-0 invisible">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script>
        // Scroll to top functionality
        const scrollToTopBtn = document.getElementById('scrollToTop');
        
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                scrollToTopBtn.classList.remove('opacity-0', 'invisible');
            } else {
                scrollToTopBtn.classList.add('opacity-0', 'invisible');
            }
        });
        
        scrollToTopBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Dark mode functionality for welcome page
        const darkModeToggleWelcome = document.getElementById('darkModeToggleWelcome');
        const html = document.documentElement;

        // Check for saved theme preference or default to 'light'
        const currentTheme = localStorage.getItem('theme') || 'light';
        
        if (currentTheme === 'dark') {
            html.classList.add('dark');
        }

        if (darkModeToggleWelcome) {
            darkModeToggleWelcome.addEventListener('click', () => {
                html.classList.toggle('dark');
                
                // Save theme preference
                if (html.classList.contains('dark')) {
                    localStorage.setItem('theme', 'dark');
                } else {
                    localStorage.setItem('theme', 'light');
                }
            });
        }
    </script>

</body>
</html>