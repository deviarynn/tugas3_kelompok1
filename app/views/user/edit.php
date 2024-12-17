<!-- app/views/user/edit.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Organizers</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }

        .container {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
            max-width: 400px;
            margin: auto;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
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
</head>

<body>
    <div class="container">
        <h2>
            <center>Edit Organizers</center>
        </h2>
        <form action="/user/update/<?php echo $organizer['id_penyelenggara']; ?>" method="POST">
            <label for="nama_penyelenggara">Nama Penyelenggara:</label>
            <input type="text" id="nama" name="nama_penyelenggara" value="<?php echo $organizer['nama_penyelenggara']; ?>" required>

            <label for="kontak">Kontak:</label>
            <input type="text" id="kontak" name="kontak" value="<?php echo $organizer['kontak']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $organizer['email']; ?>" required>

            <button type="submit">Update</button>
        </form>
        <a href="/user/index">Back to List</a>
</body>

</html>