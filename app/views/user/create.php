<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Tambah Organizers</title>
</head>

<body class="font-[Atara] text-3x p-4 bg-gradient-to-b from-[#FAF3E0] to-[#EDE0D4] text-gray-800 min-h-screen flex items-center justify-center">
    <!-- Navbar -->
    <nav class="bg-[rgb(167,82,36)] text-white p-2 mb-4 w-full fixed top-0 left-0">
        <div class="w-full mx-auto flex items-start"> <!-- Navbar dengan elemen di kiri atas -->
            <!-- Logo dan tulisan Home di pojok kiri atas -->
            <a href="/" class="flex items-center space-x-2">
                <img src="https://media.istockphoto.com/id/498494295/id/vektor/web-ikon-tombol-beranda.jpg?s=1024x1024&w=is&k=20&c=8R9FvFO2RtBx-7o_1yoB4LCFdgnwp804FFCOOBP7aGo=" alt="home" class="h-6 w-6">
                <span class="text-lg font-bold">Dashboard</span>
            </a>
        </div>
    </nav><br>

    <div class="bg-white max-w-lg w-full rounded-xl shadow-2xl p-10 border-t-8 border-orange-700">


        <div class="flex items-center justify-center mb-6">

            <svg class="h-8 w-8 text-orange-700 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 14l-4-4m0 0l-4 4m4-4v12M4 4h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2z" />
            </svg>

            <h2 class="text-3xl text-orange-700 font-extrabold">Tambah Organizers</h2>
        </div>


        <form action="/user/store" method="POST" class="space-y-6">
            <div>
                <label for="nama_penyelenggara" class="block text-lg font-semibold text-gray-700 mb-2">Nama Penyelenggara</label>
                <input type="text" id="nama_penyelenggara" name="nama_penyelenggara" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500 transition duration-300">
            </div>

            <div>
                <label for="kontak" class="block text-lg font-semibold text-gray-700 mb-2">Kontak</label>
                <input type="text" id="kontak" name="kontak" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500 transition duration-300">
            </div>

            <div>
                <label for="email" class="block text-lg font-semibold text-gray-700 mb-2">Email</label>
                <input type="email" id="email" name="email" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500 transition duration-300">
            </div>

            <button type="submit"
                class="w-full bg-orange-700 hover:bg-orange-800 text-white text-lg font-bold py-3 rounded-lg shadow-lg transition duration-300 transform hover:scale-105">
                Simpan
            </button>
        </form>

        <div class="text-center mt-8">
            <a href="/user/index" class="text-orange-700 hover:text-orange-800 font-semibold text-lg transition duration-300">
                ← Kembali ke Daftar Organizers
            </a>
        </div>
    </div>

</body>