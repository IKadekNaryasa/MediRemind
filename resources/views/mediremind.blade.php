<!DOCTYPE html>
<html lang="id" class="h-full scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MediRemind - Pengingat Minum Obat Pasien HIV via WhatsApp</title>
    <meta name="description" content="MediRemind adalah aplikasi web untuk menyimpan data pasien HIV dan mengirimkan pengingat minum obat otomatis melalui WhatsApp. Tingkatkan kepatuhan minum obat ARV.">
    <meta name="keywords" content="pengingat minum obat, HIV, ARV, WhatsApp, reminder obat, kepatuhan obat">
    <meta name="author" content="MediRemind">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="MediRemind - Pengingat Minum Obat Pasien HIV">
    <meta property="og:description" content="Aplikasi web untuk menyimpan data pasien HIV dan mengirim pengingat minum obat via WhatsApp">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">

    <link rel="canonical" href="">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600,700,800&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body {
            font-family: 'Figtree', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        }

        .hero-pattern {
            background-image:
                radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .float-animation {
            animation: float 6s ease-in-out infinite;
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-8px);
        }
    </style>
</head>

<body class="antialiased flex flex-col min-h-screen bg-slate-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm py-4 sticky top-0 z-50">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-green-600 tracking-tight">
                MediRemind
            </h1>
            @auth
            <a href="{{ route('dashboard') }}" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg font-semibold transition">
                Dashboard
            </a>
            @else
            <a href="{{ route('login') }}" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg font-semibold transition">
                Login
            </a>
            @endauth

        </div>
    </nav>
    <main class="flex-grow">
        <!-- Features Section -->
        <section id="fitur" class="py-20 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-extrabold text-slate-800 mb-4">
                        Fitur Unggulan
                    </h2>
                    <p class="text-slate-600 text-lg max-w-2xl mx-auto">
                        MediRemind dilengkapi dengan berbagai fitur untuk memastikan pasien tidak melewatkan jadwal konsumsi obat
                    </p>
                </div>

                <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                    <div class="bg-gradient-to-br from-green-50 to-white p-8 rounded-2xl shadow-md card-hover border border-green-100">
                        <div class="w-16 h-16 bg-green-500 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-800 mb-3">Manajemen Pasien</h3>
                        <p class="text-slate-600 leading-relaxed">
                            Kelola data pasien HIV dengan aman dan terstruktur. Admin dapat dengan mudah memasukkan dan memantau informasi pasien.
                        </p>
                    </div>

                    <div class="bg-gradient-to-br from-green-50 to-white p-8 rounded-2xl shadow-md card-hover border border-green-100">
                        <div class="w-16 h-16 bg-green-500 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-800 mb-3">Reminder Otomatis</h3>
                        <p class="text-slate-600 leading-relaxed">
                            Pengingat otomatis dikirim via WhatsApp sesuai jadwal yang telah ditentukan, memastikan tidak ada dosis yang terlewat.
                        </p>
                    </div>

                    <div class="bg-gradient-to-br from-green-50 to-white p-8 rounded-2xl shadow-md card-hover border border-green-100">
                        <div class="w-16 h-16 bg-green-500 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-800 mb-3">Aman & Terpercaya</h3>
                        <p class="text-slate-600 leading-relaxed">
                            Data pasien tersimpan dengan aman dan hanya dapat diakses oleh admin yang berwenang untuk menjaga privasi.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- How It Works Section -->
        <section id="cara-kerja" class="py-20 bg-slate-50">
            <div class="container mx-auto px-4">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-extrabold text-slate-800 mb-4">
                        Cara Kerja MediRemind
                    </h2>
                    <p class="text-slate-600 text-lg max-w-2xl mx-auto">
                        Tiga langkah sederhana untuk memastikan pasien mendapatkan pengingat konsumsi obat secara teratur
                    </p>
                </div>

                <div class="max-w-4xl mx-auto">
                    <div class="relative">
                        <!-- Connector Line -->
                        <div class="hidden md:block absolute left-1/2 top-0 bottom-0 w-1 bg-green-200 transform -translate-x-1/2"></div>

                        <!-- Step 1 -->
                        <div class="relative mb-12 md:mb-16">
                            <div class="md:flex items-center">
                                <div class="md:w-1/2 md:pr-12 mb-6 md:mb-0 md:text-right">
                                    <span class="inline-block px-4 py-2 bg-green-500 text-white text-sm font-bold rounded-full mb-4">
                                        STEP 1
                                    </span>
                                    <h3 class="text-2xl font-bold text-slate-800 mb-3">Input Data Pasien</h3>
                                    <p class="text-slate-600 leading-relaxed">
                                        Admin memasukkan data pasien pada sistem MediRemind dengan informasi lengkap termasuk jadwal konsumsi obat ARV.
                                    </p>
                                </div>
                                <div class="hidden md:flex w-16 h-16 bg-green-500 rounded-full items-center justify-center text-white font-bold text-2xl shadow-lg z-10 flex-shrink-0">
                                    1
                                </div>
                                <div class="md:w-1/2 md:pl-12"></div>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="relative mb-12 md:mb-16">
                            <div class="md:flex items-center">
                                <div class="md:w-1/2 md:pr-12"></div>
                                <div class="hidden md:flex w-16 h-16 bg-green-500 rounded-full items-center justify-center text-white font-bold text-2xl shadow-lg z-10 flex-shrink-0">
                                    2
                                </div>
                                <div class="md:w-1/2 md:pl-12 mb-6 md:mb-0">
                                    <span class="inline-block px-4 py-2 bg-green-500 text-white text-sm font-bold rounded-full mb-4">
                                        STEP 2
                                    </span>
                                    <h3 class="text-2xl font-bold text-slate-800 mb-3">Pemrosesan Otomatis</h3>
                                    <p class="text-slate-600 leading-relaxed">
                                        Server memproses jadwal konsumsi obat setiap pasien dan menyiapkan pesan pengingat yang akan dikirimkan secara real-time.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div class="relative">
                            <div class="md:flex items-center">
                                <div class="md:w-1/2 md:pr-12 mb-6 md:mb-0 md:text-right">
                                    <span class="inline-block px-4 py-2 bg-green-500 text-white text-sm font-bold rounded-full mb-4">
                                        STEP 3
                                    </span>
                                    <h3 class="text-2xl font-bold text-slate-800 mb-3">Notifikasi WhatsApp</h3>
                                    <p class="text-slate-600 leading-relaxed">
                                        Pasien menerima notifikasi pengingat langsung di aplikasi WhatsApp mereka untuk konsumsi obat ARV tepat pada waktunya.
                                    </p>
                                </div>
                                <div class="hidden md:flex w-16 h-16 bg-green-500 rounded-full items-center justify-center text-white font-bold text-2xl shadow-lg z-10 flex-shrink-0">
                                    3
                                </div>
                                <div class="md:w-1/2 md:pl-12"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-green-600 text-slate-300 py-8">
        <div class="container mx-auto px-4 text-center">
            <p class="text-sm font-medium">
                &copy; 2026 <span class="text-green-200">MediRemind</span>. All Rights Reserved.
            </p>
            <p class="text-xs mt-2 opacity-75">
                Aplikasi Pengingat Obat Otomatis.
            </p>
        </div>
    </footer>

</body>

</html>