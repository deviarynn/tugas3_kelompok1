<!-- app/views/user/edit.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>
    <form action="/user/update/<?php echo $Attend['id_peserta']; ?>" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="nama" name="nama_peserta" value="<?php echo $Attend['nama_peserta']; ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $Attend['email']; ?>" required>
        <br>
        <label for="email">No Telp:</label>
        <input type="no_telp" id="no_telp" name="no_telp" value="<?php echo $Attend['no_telp']; ?>" required>
        <br>
        <button type="submit">Update</button>
    </form>
    <a href="/user/index">Back to List</a>
</body>
</html>