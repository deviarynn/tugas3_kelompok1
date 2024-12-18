<!-- app/views/user/edit.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Organizers</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body class="bg-[#FAF3E0] text-gray-800 min-h-screen flex items-center justify-center">


    <div class="bg-white max-w-md w-full rounded-xl shadow-lg p-8 border-t-8 border-orange-700">
        <div class="flex items-center justify-center mb-6">
            <i data-feather="edit" class="text-orange-700 mr-2"></i>
            <h2 class="text-3xl text-orange-700 font-extrabold text-center">
                Edit Organizers
            </h2>
        </div>

        <form action="/user/update/<?php echo $organizer['id_penyelenggara']; ?>" method="POST" class="space-y-6">
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
            <a href="/user/index" class="text-orange-700 hover:text-orange-800 font-semibold transition duration-200">
                ← Back to List
            </a>
        </div>
    </div>

    <script>
        feather.replace();
    </script>
</body>

</html>