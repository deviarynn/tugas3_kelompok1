<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data Peserta</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
</head>

<body>
    <div class=" p-16">
        <div class="bg-gray-50 rounded-[10px] w-full p-4 shadow-md  items-center">
            <div class="flex justify-between">
                <h1 class="font-bold text-2xl text-sky-600 drop-shadow-md">Daftar Peserta</h1>
                <a href="/user/create"
                    class="border-2 rounded-md border-green-500 bg-green-400 pl-3 pr-3 hover:bg-green-700 hover:text-white">Tambah
                    Peserta Baru</a>
            </div>
            <div class="pt-5 pb-5 flex items-center justify-center w-full overflow-x-auto">
                <table class=" border-white pb-auto w-full table table-zebra">

                    <tr class="bg-slate-400 text-white border-b text-center text-lg ">
                        <th>Id Peserta</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No Handphone</th>
                        <th>Opsi</th>
                    </tr>

                    <!-- app/views/user/index.php -->
                    <?php foreach ($Attends as $peserta): ?>
                    <tr class="pointer border-b hover:bg-gray-300 text-center">
                        <td class="py-2"><?= htmlspecialchars($peserta['id_peserta']) ?></td>
                        <td class="py-2"><?= htmlspecialchars($peserta['nama_peserta']) ?></td>
                        <td class="py-2"><?= htmlspecialchars($peserta['email']) ?> </td>
                        <td class="py-2"><?= htmlspecialchars($peserta['no_telp']) ?></td>
                        <td class="text-center gap-2 flex justify-center">
                            <a class="bg-blue-600 text-gray-200 hover:bg-blue-800 btn p-2 pl-3 pr-3 rounded-md"
                                href="/user/edit/<?php echo $peserta['id_peserta']; ?>">
                                <i class="ri-edit-line"></i>
                            </a>
                            <a class="bg-red-500 text-gray-200 hover:bg-red-700 btn p-2 pl-3 pr-3 rounded-md"
                                href="/user/delete/<?php echo $peserta['id_peserta']; ?>"
                                onclick="return confirm('Are you sure?')"><i class="ri-delete-bin-7-line"></i>
                            </a>
                        </td>
                        <img src="" alt="">
                        <?php endforeach; ?>
                    </tr>

                </table>
            </div>
        </div>
            <div class="flex items-center justify-center">
                <a class="text-center pt-6 text-blue-600" href="#">
                    <---- Kembali ke halaman utama </a>
            </div>
    </div>

</body>

</html>