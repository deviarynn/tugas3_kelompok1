<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Daftar Organizers</title>

    <script>
        function searchOrganizer() {
            const input = document.getElementById('search-input').value.toLowerCase();
            const rows = document.querySelectorAll('#organizer-table tbody tr');

            rows.forEach(row => {
                const name = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                row.style.display = name.includes(input) ? '' : 'none';
            });
        }

        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `/organizers/delete/${id}`;
                }
            });
        }
    </script>
</head>

<body class="font-[Atara] text-3x p-4 bg-gradient-to-b from-[#FAF3E0] to-[#EDE0D4] text-gray-800 min-h-screen p-8">
    <!-- Navbar -->
    <nav class="bg-[rgb(167,82,36)] text-white p-2 mb-4 w-full fixed top-0 left-0">
        <div class="w-full mx-auto flex items-start">
            <a href="/" class="flex items-center space-x-2">
                <img src="https://media.istockphoto.com/id/498494295/id/vektor/web-ikon-tombol-beranda.jpg?s=1024x1024&w=is&k=20&c=8R9FvFO2RtBx-7o_1yoB4LCFdgnwp804FFCOOBP7aGo=" alt="home" class="h-6 w-6">
                <span class="text-lg font-bold">Dashboard</span>
            </a>
        </div>
    </nav><br>

    <h1 class="text-3xl text-orange-700 font-extrabold mb-4 text-center">Daftar Organizers</h1>

    <div class="mb-6 flex justify-between items-center px-6">
        <a href="/organizers/create" class="bg-orange-700 text-white px-4 py-2 rounded-lg font-bold hover:bg-orange-800 transition duration-300 shadow-lg transform hover:scale-105">
            Tambah Organizers Baru
        </a>

        <div class="flex items-center">
            <input id="search-input" type="text" placeholder="Cari Organizers..."
                class="px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500 transition duration-300">
            <button onclick="searchOrganizer()"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg font-bold hover:bg-blue-700 transition duration-300 ml-3 shadow-lg">
                Cari
            </button>
        </div>
    </div>

    <table id="organizer-table" class="w-full border-collapse shadow-lg rounded-lg overflow-hidden mx-auto bg-white">
        <thead>
            <tr class="bg-orange-700 text-white text-left uppercase text-sm tracking-wider">
                <th class="py-3 px-4">Id Penyelenggara</th>
                <th class="py-3 px-4">Nama Penyelenggara</th>
                <th class="py-3 px-4">Kontak</th>
                <th class="py-3 px-4">Email</th>
                <th class="py-3 px-4 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($organizers as $organizer): ?>
                <tr class="hover:bg-gray-100 transition duration-300">
                    <td class="py-3 px-4 border-b"><?= htmlspecialchars($organizer['id_penyelenggara']) ?></td>
                    <td class="py-3 px-4 border-b"><?= htmlspecialchars($organizer['nama_penyelenggara']) ?></td>
                    <td class="py-3 px-4 border-b"><?= htmlspecialchars($organizer['kontak']) ?></td>
                    <td class="py-3 px-4 border-b"><?= htmlspecialchars($organizer['email']) ?></td>
                    <td class="py-3 px-4 border-b text-center">
                        <a href="/organizers/edit/<?php echo $organizer['id_penyelenggara']; ?>" class="inline-block bg-green-600 text-white px-3 py-1 rounded-lg text-sm font-semibold hover:bg-green-700 transition duration-300 mr-2">
                            Edit
                        </a>
                        <a href="javascript:void(0);" class="inline-block bg-red-600 text-white px-3 py-1 rounded-lg text-sm font-semibold hover:bg-red-700 transition duration-300"
                            onclick="confirmDelete(<?php echo $organizer['id_penyelenggara']; ?>)">
                            Delete
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>