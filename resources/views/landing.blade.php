<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

    <!-- Navbar -->
    <nav class="bg-white shadow-md p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-2xl font-bold text-purple-600">LogoAplikasi</a>
            <ul class="flex space-x-6 font-medium">
                <li><a href="#" class="hover:text-purple-600 transition">Beranda</a></li>
                <li><a href="#" class="hover:text-purple-600 transition">Fitur</a></li>
                <li><a href="#" class="hover:text-purple-600 transition">Tentang</a></li>
            </ul>
            <a href="#" class="bg-purple-600 text-white px-5 py-2 rounded-full font-semibold hover:bg-purple-700 transition shadow-lg">Login</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="container mx-auto px-6 py-20 text-center">
        <h1 class="text-5xl font-extrabold text-gray-900 leading-tight mb-6">
            Bangun Sesuatu yang <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-purple-700">Luar Biasa</span>
        </h1>
        <p class="text-lg text-gray-600 mb-10 max-w-2xl mx-auto">
            Pengalaman digital yang intuitif dan berpusat pada pengguna dimulai dari sini. Kembangkan aplikasimu dengan cepat dan efisien.
        </p>
        <a href="#" class="bg-purple-600 text-white px-8 py-3 rounded-full text-lg font-semibold hover:bg-purple-700 transition shadow-xl inline-block">
            Mulai Sekarang
        </a>
        <a href="#" class="ml-4 text-purple-600 font-semibold hover:underline">
            Pelajari Lebih Lanjut &rarr;
        </a>
    </header>

    <!-- Feature Section Dummy -->
    <section class="bg-white py-16">
        <div class="container mx-auto text-center px-6">
            <h2 class="text-3xl font-bold mb-10">Kenapa Memilih Kami?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-6 bg-purple-50 rounded-xl shadow-sm border border-purple-100">
                    <div class="text-purple-600 text-4xl mb-4">🚀</div>
                    <h3 class="text-xl font-bold mb-2">Cepat</h3>
                    <p class="text-gray-600">Performa optimal untuk user experience terbaik.</p>
                </div>
                <div class="p-6 bg-purple-50 rounded-xl shadow-sm border border-purple-100">
                    <div class="text-purple-600 text-4xl mb-4">🎨</div>
                    <h3 class="text-xl font-bold mb-2">Desain UI/UX Modern</h3>
                    <p class="text-gray-600">Tampilan memanjakan mata dan sangat intuitif.</p>
                </div>
                <div class="p-6 bg-purple-50 rounded-xl shadow-sm border border-purple-100">
                    <div class="text-purple-600 text-4xl mb-4">⚙️</div>
                    <h3 class="text-xl font-bold mb-2">Sistem Handal</h3>
                    <p class="text-gray-600">Mudah dimonitor dan dikembangkan (scalable).</p>
                </div>
            </div>
        </div>
    </section>

</body>
</html>
