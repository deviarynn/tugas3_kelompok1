<head>
    <style>
        /* Styling Global */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 30px;
            background-color: #f9f9f9;
            color: #333;
        }

        h2 {
            color: #444;
            margin-bottom: 20px;
        }

        a {
            text-decoration: none;
            color: #007BFF;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        /* Styling Table */
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #007BFF;
            color: #fff;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 1px;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #e9ecef;
            transition: background-color 0.3s ease;
        }

        .actions a {
            margin-right: 8px;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 0.9em;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .actions a.edit {
            background-color: #28a745;
            color: #fff;
        }

        .actions a.delete {
            background-color: #dc3545;
            color: #fff;
        }

        .actions a.edit:hover {
            background-color: #218838;
        }

        .actions a.delete:hover {
            background-color: #c82333;
        }

        .add-btn {
            display: inline-block;
            margin-bottom: 15px;
            padding: 10px 20px;
            background-color: #17a2b8;
            color: #fff;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .add-btn:hover {
            background-color: #138496;
        }
    </style>
</head>

<body>
    <h1>
        Daftar Organizers
    </h1>
    <a href="/user/create" class="add-btn">Tambah Organizers Baru</a>
    <table>
        <thead>
            <tr>
                <th>Id Penyelenggara</th>
                <th>Nama Penyelenggara</th>
                <th>Kontak</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($organizers as $organizer): ?>
                <tr>
                    <td><?= htmlspecialchars($organizer['id_penyelenggara']) ?></td>
                    <td><?= htmlspecialchars($organizer['nama_penyelenggara']) ?></td>
                    <td><?= htmlspecialchars($organizer['kontak']) ?></td>
                    <td><?= htmlspecialchars($organizer['email']) ?></td>
                    <td class="actions">
                        <a href="/user/edit/<?php echo $organizer['id_penyelenggara']; ?>" class="edit">Edit</a>
                        <a href="/user/delete/<?php echo $organizer['id_penyelenggara']; ?>" class="delete" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>