<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Event Baru</title>
    <style>
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
    <!-- Menambahkan SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="outer-container">
    <h2>Tambah Event Baru</h2>
    <div class="container">
        <form id="eventForm" action="/event/store" method="POST">
            <label for="acara">Acara:</label>
            <input type="text" name="acara" id="acara" required>

            <label for="deskripsi">Deskripsi:</label>
            <input type="text" name="deskripsi" id="deskripsi" required>

            <label for="tanggal">Tanggal:</label>
            <input type="date" name="tanggal" id="tanggal" required>

            <label for="lokasi">Lokasi:</label>
            <textarea name="lokasi" id="lokasi" rows="3" required></textarea>

            <label for="peserta">Peserta:</label>
            <select name="id_peserta" id="peserta">
                <option value="">Pilih Peserta</option>
                <?php foreach ($Attends as $peserta): ?>
                    <option value="<?php echo $peserta['id_peserta']; ?>">
                        <?php echo htmlspecialchars($peserta['nama_peserta']); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="sponsor">Sponsorship:</label>
            <select name="id_sponsor" id="sponsor" required>
                <option value="">Pilih Sponsor</option>
                <?php foreach ($sponsors as $sponsor): ?>
                    <option value="<?= htmlspecialchars($sponsor['id_sponsor']) ?>">
                        <?= htmlspecialchars($sponsor['nama_sponsor']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="penyelenggara">Penyelenggara:</label>
            <select name="id_penyelenggara" id="penyelenggara" required>
                <option value="">Pilih Organization</option>
                <?php foreach ($organizers as $organizer): ?>
                    <option value="<?= htmlspecialchars($organizer['id_penyelenggara']) ?>">
                        <?= htmlspecialchars($organizer['nama_penyelenggara']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <button type="submit">Simpan</button>
        </form>
    </div>
</div>

<script>
    // Menambahkan event listener pada form submit
    document.getElementById('eventForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Mencegah form untuk submit secara normal

        // Tampilkan SweetAlert konfirmasi
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data yang Anda masukkan akan disimpan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, simpan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika diklik Ya, lanjutkan dengan submit form
                this.submit();
            }
        });
    });
</script>
</body>
</html>
