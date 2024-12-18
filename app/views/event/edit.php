<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Event</title>
    <style>
        /* Tambahkan gaya seperti pada kode sebelumnya */
        body {
            background: url('https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcR4qdJ13yBvftklN8_fUPQEC_ZW-YIQ2zX1kJlLLrsps6HXEas2') no-repeat center center/cover;
            font-family: atara;
            padding: 40px 20px;
            margin: 0;
        }

        .outer-container {
            background-color:rgb(249, 243, 228);
            border: 1px solid #ddd;
            padding: 30px;
            border-radius: 5px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 2px solid #ddd;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .container {
            background-color:rgb(202,170,41);
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }

        input[type="text"],
        input[type="date"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
    <!-- Tambahkan SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="outer-container">
        <h2>Edit Event</h2>
        <div class="container">
            <form id="editForm" action="/event/update/<?php echo $event['id_event']; ?>" method="POST">
                <!-- Input Acara -->
                <label for="acara">Acara:</label>
                <input type="text" id="acara" name="acara" value="<?php echo htmlspecialchars($event['acara']); ?>" required>

                <!-- Input Deskripsi -->
                <label for="deskripsi">Deskripsi:</label>
                <input type="text" id="deskripsi" name="deskripsi" value="<?php echo htmlspecialchars($event['deskripsi']); ?>" required>

                <!-- Input Tanggal -->
                <label for="tanggal">Tanggal:</label>
                <input type="date" id="tanggal" name="tanggal" value="<?php echo htmlspecialchars($event['tanggal']); ?>" required>

                <!-- Input Lokasi -->
                <label for="lokasi">Lokasi:</label>
                <textarea name="lokasi" id="lokasi" rows="3" cols="40" required><?php echo htmlspecialchars($event['lokasi']); ?></textarea>

                <!-- Dropdown Attendees -->
                <label for="id_peserta">Attendees:</label>
                <select name="id_peserta" id="id_peserta">
                    <?php foreach ($Attends as $peserta): ?>
                        <option value="<?php echo $peserta['id_peserta']; ?>"
                            <?php echo ($peserta['id_peserta'] == $event['id_peserta']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($peserta['nama_peserta']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <!-- Dropdown Sponsorship -->
                <label for="id_sponsor">Sponsorship:</label>
                <select name="id_sponsor" id="id_sponsor">
                    <?php foreach ($sponsors as $sponsor): ?>
                        <option value="<?php echo $sponsor['id_sponsor']; ?>"
                            <?php echo ($sponsor['id_sponsor'] == $event['id_sponsor']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($sponsor['nama_sponsor']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <!-- Dropdown Organizer -->
                <label for="id_penyelenggara">Organizer:</label>
                <select name="id_penyelenggara" id="id_penyelenggara">
                    <?php foreach ($organizers as $organizer): ?>
                        <option value="<?php echo $organizer['id_penyelenggara']; ?>"
                            <?php echo ($organizer['id_penyelenggara'] == $event['id_penyelenggara']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($organizer['nama_penyelenggara']); ?>
                        </option>
                    <?php endforeach; ?>
                </select><br><br>

                <!-- Tombol Submit -->
                <button type="button" id="updateButton">Update</button>
            </form>
            <!-- Link Back -->
            <a href="/event/index">Back to List</a>
        </div>
    </div>

    <script>
        // Tambahkan event listener ke tombol Update
        document.getElementById('updateButton').addEventListener('click', function() {
            // Tampilkan dialog konfirmasi SweetAlert2
            Swal.fire({
                title: 'Update Data',
                text: "Apa kamu yakin update data ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, update sekarang!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit form jika pengguna mengonfirmasi
                    document.getElementById('editForm').submit();
                }
            });
        });
    </script>
</body>
</html>
