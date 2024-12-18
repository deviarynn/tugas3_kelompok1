<!-- app/views/user/create.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tambah Peserta</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-zinc-100">
    <main class="flex items-center justify-center min-h-screen flex-col">
        <div class="bg-white p-8 rounded-lg shadow-md w-[40%]">
            <h1 class="text-2xl font-bold mb-5 text-center text-blue-500 border-b-2 pb-7 border-blue-600">Tambah Peserta Baru</h1>
            <form action="/user/store" method="POST">
                <div class="mb-2 flex">
                    <label for="name" class="block text-sm font-medium text-grey-600">Nama :</label>
                </div>
                <input type="text" name="nama_peserta" id="nama_peserta" required
                    class="w-full border rounded-md border-gray-400 mb-4 mt-1 p-2 ">

                <div class="mb-2 flex">
                    <label for="email" class="block text-sm font-medium text-grey-600">Email:</label>
                </div>
                <input type="email" name="email" id="email" required
                    class="w-full border rounded-md border-gray-400 mb-4 mt-1 p-2 ">

                <div class="mb-2 flex">
                    <label for="email" class="block text-sm font-medium text-grey-600">No Telp:</label>
                </div>
                <input type="nummber" name="no_telp" id="no_telp" required required
                    class="w-full border rounded-md border-gray-400 mb-4 mt-1 p-2 ">
                <div class="flex justify-end">
                    <button type="submit" name="submit" id="submit"
                        class="bg-blue-500 hover:bg-blue-700 rounded-md  text-white p-3 w-20  boder mt-1 ml-4"> Simpan</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>