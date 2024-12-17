<!-- app/views/user/create.php -->
<h2>Tambah Pengguna Baru</h2>
<form action="/user/store" method="POST">
    <label for="name">Nama:</label>
    <input type="text" name="nama_peserta" id="nama_peserta" required>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>
    <label for="email">No Telp:</label>
    <input type="nummber" name="no_telp" id="no_telp" required>
    <button type="submit">Simpan</button>
</form>
