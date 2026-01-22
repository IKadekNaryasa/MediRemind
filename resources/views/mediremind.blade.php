<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

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
    <meta property="og:url" content="{{ url('/') }}">

    <link rel="canonical" href="{{ url('/') }}">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased flex flex-col min-h-screen bg-slate-50">

    <nav class="bg-green-500 shadow-sm py-4">
        <div class="container mx-auto px-4 flex justify-center">
            <h1 class="text-2xl font-bold text-white tracking-tight">
                <a href="{{ route('login') }}">
                    MediRemind
                </a>
            </h1>
        </div>
    </nav>

    <main class="flex-grow container mx-auto px-4 py-12">
        <div class="mb-4">
            @if(session('success'))
            <div x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                {{ session('success') }}
            </div>
            @endif
        </div>

        @if($errors->has('errors'))
        <div x-data="{ show: true }"
            x-show="show"
            x-transition
            x-init="setTimeout(() => show = false, 3000)"
            class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            {{ $errors->first('errors') }}
        </div>
        @endif
        <div class="text-center mb-16">
            <h1 class="text-5xl md:text-6xl font-extrabold text-green-600 mb-4">
                MediRemind
            </h1>
            <p class="text-slate-600 text-lg max-w-2xl mx-auto">
                Aplikasi berbasi web yang digunakan untuk pengelolaan data pasien HIV dan Sistem pengingat otomatis untuk minum obat via WhatsApp.
            </p>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">

            <div class="bg-white p-8 rounded-2xl shadow-md border-t-4 border-green-500 transition hover:shadow-lg">
                <span class="inline-block px-3 py-1 text-xs font-bold uppercase tracking-wider text-green-700 bg-green-100 rounded-full mb-4">
                    Step 1
                </span>
                <h3 class="text-xl font-bold text-slate-800 mb-3">Mendaftarkan Pasien pada Sistem</h3>
                <p class="text-slate-600 leading-relaxed">
                    Admin mendaftarkan pasien pada sistem <strong>MediRemind</strong> agar bisa mendapat reminder otomatis melalui WhatsApp secara berkala.
                </p>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-md border-t-4 border-green-500 transition hover:shadow-lg">
                <span class="inline-block px-3 py-1 text-xs font-bold uppercase tracking-wider text-green-700 bg-green-100 rounded-full mb-4">
                    Step 2
                </span>
                <h3 class="text-xl font-bold text-slate-800 mb-3">Sistem Memproses Otomatis</h3>
                <p class="text-slate-600 leading-relaxed">
                    Server akan memproses jadwal minum obat setiap pasien dan menyiapkan pesan pengingat yang akan dikirimkan secara real-time.
                </p>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-md border-t-4 border-green-500 transition hover:shadow-lg md:col-span-2 md:max-w-md md:mx-auto">
                <span class="inline-block px-3 py-1 text-xs font-bold uppercase tracking-wider text-green-700 bg-green-100 rounded-full mb-4">
                    Step 3
                </span>
                <h3 class="text-xl font-bold text-slate-800 mb-3">Notifikasi Reminder</h3>
                <p class="text-slate-600 leading-relaxed">
                    Pasien mendapat notifikasi reminder langsung di aplikasi WhatsApp mereka untuk minum obat ARV tepat pada waktunya.
                </p>
            </div>

        </div>
    </main>

    <footer class="bg-green-600 text-slate-300 py-8">
        <div class="container mx-auto px-4 text-center">
            <p class="text-sm font-medium">
                &copy; {{ date('Y') }} <span class="text-green-400">MediRemind</span>. All Rights Reserved.
            </p>
            <p class="text-xs mt-2 opacity-50">
                Aplikasi Pengingat Obat Otomatis.
            </p>
        </div>
    </footer>

</body>

</html>