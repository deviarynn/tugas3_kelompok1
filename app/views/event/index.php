<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Event</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="font-[Atara] text-3x p-4" style="background: url('https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcR4qdJ13yBvftklN8_fUPQEC_ZW-YIQ2zX1kJlLLrsps6HXEas2') no-repeat center center/cover;">

    <!-- Navbar -->
    <nav class="bg-[rgb(167,82,36)] text-white p-2 mb-4 w-full fixed top-0 left-0">
        <div class="w-full mx-auto flex items-start">
            <a href="/" class="flex items-center space-x-2">
                <img src="https://media.istockphoto.com/id/498494295/id/vektor/web-ikon-tombol-beranda.jpg?s=1024x1024&w=is&k=20&c=8R9FvFO2RtBx-7o_1yoB4LCFdgnwp804FFCOOBP7aGo=" alt="home" class="h-6 w-6">
                <span class="text-lg font-bold">Dashboard</span>
            </a>
        </div>
    </nav>

    <!-- Content -->
    <div class="mt-16">
        <h2 class="text-center font-bold text-white text-3xl mb-4">DAFTAR EVENT SENI TARI DAN BUDAYA</h2>
        <hr class="mb-4">

        <div class="overflow-x-auto mt-5">
            <div class="p-4 bg-white border border-gray-300 rounded-md">
                <a href="/event/create" class="text-white bg-black py-2 px-3 rounded-md text-sm hover:bg-gray-800">Tambah Event Baru</a><br><br>
                <table id="eventTable" class="table-auto w-full border-collapse border border-gray-300 text-m">
                    <thead>
                        <tr class="bg-[rgb(202,170,41)] text-white">
                            <th class="border border-gray-300 p-2">Acara</th>
                            <th class="border border-gray-300 p-2">Deskripsi</th>
                            <th class="border border-gray-300 p-2">Tanggal</th>
                            <th class="border border-gray-300 p-2">Lokasi</th>
                            <th class="border border-gray-300 p-2">Nama Peserta</th>
                            <th class="border border-gray-300 p-2">Nama Sponsor</th>
                            <th class="border border-gray-300 p-2">Nama Penyelenggara</th>
                            <th class="border border-gray-300 p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($events as $event): ?>
                            <tr class="odd:bg-white even:bg-gray-100 hover:bg-gray-200">
                                <td class="border border-gray-300 p-2"><?= htmlspecialchars($event['acara']) ?></td>
                                <td class="border border-gray-300 p-2"><?= htmlspecialchars($event['deskripsi']) ?></td>
                                <td class="border border-gray-300 p-2"><?= htmlspecialchars($event['tanggal']) ?></td>
                                <td class="border border-gray-300 p-2"><?= htmlspecialchars($event['lokasi']) ?></td>
                                <td class="border border-gray-300 p-2"><?= htmlspecialchars($event['nama_peserta']) ?></td>
                                <td class="border border-gray-300 p-2"><?= htmlspecialchars($event['nama_sponsor']) ?></td>
                                <td class="border border-gray-300 p-2"><?= htmlspecialchars($event['nama_penyelenggara']) ?></td>
                                <td class="border border-gray-300 p-2 text-center">
                                    <div class="flex justify-center items-center space-x-2">
                                        <button class="edit-btn bg-green-600 text-white py-1 px-2 rounded text-xs hover:bg-green-600" data-url="/event/edit/<?php echo $event['id_event']; ?>">Edit</button>
                                        <button class="delete-btn bg-red-700 text-white py-1 px-2 rounded text-xs hover:bg-red-600" data-url="/event/delete/<?php echo $event['id_event']; ?>">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Inisialisasi DataTables -->
    <script>
        $(document).ready(function() {
            $('#eventTable').DataTable({
                "language": {
                    "lengthMenu": "Showing _MENU_ entries",
                    "zeroRecords": "Tidak ada data yang ditemukan",
                    "info": "Show _START_ to _END_ of _TOTAL_ entries",
                    "infoEmpty": "Tidak ada data tersedia",
                    "infoFiltered": "(difilter dari total _MAX_ data)",
                    "search": "Search:",
                    "paginate": {
                        "first": "Awal",
                        "last": "Akhir",
                        "next": "Berikutnya",
                        "previous": "Sebelumnya"
                    }
                },
                "pageLength": 10,
                "ordering": false
            });

            // SweetAlert untuk tombol Edit
            $('.edit-btn').on('click', function(e) {
                e.preventDefault();
                const url = $(this).data('url');
                Swal.fire({
                    title: 'Edit Data',
                    text: "Apakah Anda yakin ingin mengedit data ini?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Edit!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });

            // SweetAlert untuk tombol Hapus
            $('.delete-btn').on('click', function(e) {
                e.preventDefault();
                const url = $(this).data('url');
                Swal.fire({
                    title: 'Hapus Data',
                    text: "Apakah Anda yakin ingin menghapus data ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });
        });
    </script>

</body>
</html>
