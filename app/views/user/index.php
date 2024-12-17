<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
</head>

<body>
    <div class=" p-16">
        <div class="bg-gray-50 rounded-[10px] w-full p-4 shadow-md  items-center">
            <h1 class="font-bold text-2xl text-sky-600 drop-shadow-md">Daftar Peserta</h1>
            <a href="/user/create" class="border-2 rounded-sm border-green-300 bg-green-400">Tambah Peserta Baru</a>
            <div class="pt-5 pb-5 flex items-center justify-center w-full overflow-x-auto">
                <table class=" border-white pb-auto w-full table table-zebra">

                    <tr class="bg-slate-400 text-white  text-center text-lg">
                        <th>Id Peserta</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No Handphone</th>
                        <th>Opsi</th>
                    </tr>

                    <!-- app/views/user/index.php -->
                    <?php foreach ($Attends as $peserta): ?>
                    <tr class="pointer hover:bg-gray-300 text-center">
                        <td><?= htmlspecialchars($peserta['id_peserta']) ?></td>
                        <td><?= htmlspecialchars($peserta['nama_peserta']) ?></td>
                        <td><?= htmlspecialchars($peserta['email']) ?> </td>
                        <td><?= htmlspecialchars($peserta['no_telp']) ?></td>
                        <td class="text-center">
                            <a class="bg-blue-600 text-gray-200 hover:bg-blue-800 btn"
                                href="/user/edit/<?php echo $peserta['id_peserta']; ?>">
                                <i class="ri-edit-line"></i>
                            </a>
                            <a class="bg-red-500 text-gray-200 hover:bg-red-700 btn "
                                href="/user/delete/<?php echo $peserta['id_peserta']; ?>"
                                onclick="return confirm('Are you sure?')"><i class="ri-delete-bin-7-line"></i></a>
                        </td>
                        <?php endforeach; ?>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</body>

</html>