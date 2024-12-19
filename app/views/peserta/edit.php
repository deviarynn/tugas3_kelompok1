<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Peserta</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-zinc-100">
    <main class="flex items-center justify-center min-h-screen flex-col">

        <div class="bg-white p-8 rounded-lg shadow-md w-[40%]">
            <!-- app/views/peserta/edit.php -->
            <form action="/peserta/update/<?php echo $Attend['id_peserta']; ?>" method="POST">
                <h1 class="text-2xl font-bold mb-5 text-center text-blue-700 border-b-2 pb-7 border-blue-700 ">Edit Peserta</h1>
                <div class="flex mb-2">
                    <label for="npm" class="block text-sm font-medium text-grey-600">Nama :</label>
                </div>
                <input type="text" id="nama" name="nama_peserta" value="<?php echo $Attend['nama_peserta']; ?>" required
                    class="mb-4 mt-1 p-2 w-full border border-gray-400 rounded-md">

                <div class="flex mb-2">
                    <label for="nama" class="block text-sm font-medium text-grey-600">Email :</label>
                </div>
                <input type="email" id="email" name="email" value="<?php echo $Attend['email']; ?>" required
                    class="mb-4 mt-1 p-2 w-full border border-gray-400 rounded-md">

                <div class="flex mb-2">
                    <label for="alamat" class="block text-sm font-medium text-grey-600">No Telp :</label>
                </div>
                <input type="no_telp" id="no_telp" name="no_telp" value="<?php echo $Attend['no_telp']; ?>" required
                    class="mb-4 mt-1 p-2 w-full border border-gray-400 rounded-md">
                <div class="flex justify-end">
                    <a href="/peserta/index"
                        class="bg-orange-400  hover:bg-orange-700 text-white p-3 w-20  boder rounded-md mt-1 text-center">Batal</a>
                    <button type="submit" name="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white p-3 w-20  boder rounded-md mt-1 ml-4">Simpan</button>
                </div>
            </form>
        </div>
    </main>

</body>

</html>