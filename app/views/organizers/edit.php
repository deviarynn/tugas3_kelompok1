<!-- app/views/user/edit.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Organizers</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body class="font-[Atara] text-3x p-4 bg-[#FAF3E0] text-gray-800 min-h-screen flex items-center justify-center">
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

    <div class="bg-white max-w-md w-full rounded-xl shadow-lg p-8 border-t-8 border-orange-700">
        <div class="flex items-center justify-center mb-6">
            <i data-feather="edit" class="text-orange-700 mr-2"></i>
            <h2 class="text-3xl text-orange-700 font-extrabold text-center">
                Edit Organizers
            </h2>
        </div>

        <form action="/organizers/update/<?php echo $organizer['id_penyelenggara']; ?>" method="POST" class="space-y-6">
            <div>
                <label for="nama_penyelenggara" class="block text-gray-700 font-semibold mb-2">
                    Nama Penyelenggara:
                </label>
                <input type="text" id="nama_penyelenggara" name="nama_penyelenggara"
                    value="<?php echo $organizer['nama_penyelenggara']; ?>" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
            </div>

            <div>
                <label for="kontak" class="block text-gray-700 font-semibold mb-2">
                    Kontak:
                </label>
                <input type="text" id="kontak" name="kontak" value="<?php echo $organizer['kontak']; ?>" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
            </div>

            <div>
                <label for="email" class="block text-gray-700 font-semibold mb-2">
                    Email:
                </label>
                <input type="email" id="email" name="email" value="<?php echo $organizer['email']; ?>" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
            </div>


            <button type="submit"
                class="w-full bg-orange-700 hover:bg-orange-800 text-white font-bold py-3 rounded-lg shadow-lg transition-transform transform hover:scale-105">
                Update
            </button>
        </form>

        <div class="text-center mt-6">
            <a href="/organizers/index" class="text-orange-700 hover:text-orange-800 font-semibold transition duration-200">
                ← Back to List
            </a>
        </div>
    </div>

    <script>
        feather.replace();
    </script>
</body>

</html>