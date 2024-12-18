<!-- app/views/user/index.php -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" />
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.tailwindcss.com"></script>

<head>
    <style type="text/css">
        body {
            color: #566787;
            background: #f5f5f5;
            font-family: atara;
            font-size: 13px;
        }

        .table-wrapper {
            background: #fff;
            padding: 20px 25px;
            margin: 30px 0;
            border-radius: 1px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.247);
        }

        .table-title {
            padding-bottom: 15px;
            background: linear-gradient(40deg, #2096ff, #05ffa3) !important;
            color: #fff;
            padding: 16px 30px;
            margin: -20px -25px 10px;
            border-radius: 1px 1px 0 0;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.247);
        }

        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }

        .table-title .btn-group {
            float: right;
        }

        .table-title .btn {
            color: #fff;
            float: right;
            font-size: 13px;
            border: none;
            min-width: 50px;
            border-radius: 1px;
            border: none;
            outline: none !important;
            margin-left: 10px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.247);
        }

        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }

        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }

        table.table tr th:first-child {
            width: 60px;
        }

        table.table tr th:last-child {
            width: 100px;
        }

        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }

        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table td:last-child i {
            opacity: 0.9;
            font-size: 22px;
            margin: 0 5px;
        }

        table.table td a {
            font-weight: bold;
            color: #566787;
            display: inline-block;
            text-decoration: none;
            outline: none !important;
        }

        table.table td a:hover {
            color: #2196f3;
        }

        table.table td a.edit {
            color: #ffc107;
        }

        table.table td a.delete {
            color: #f44336;
        }

        table.table td i {
            font-size: 19px;
        }

        table.table .avatar {
            border-radius: 1px;
            vertical-align: middle;
            margin-right: 10px;
        }

        .pagination {
            float: right;
            margin: 0 0 5px;
        }

        .pagination li a {
            border: none;
            font-size: 13px;
            min-width: 30px;
            min-height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 1px !important;
            text-align: center;
            padding: 0 6px;
        }

        .pagination li a:hover {
            color: #666;
        }

        .pagination li.active a,
        .pagination li.active a.page-link {
            background: #03a9f4;
        }

        .pagination li.active a:hover {
            background: #0397d6;
        }

        .pagination li.disabled i {
            color: #ccc;
        }

        .pagination li i {
            font-size: 16px;
            padding-top: 6px;
        }

        .hint-text {
            float: left;
            margin-top: 10px;
            font-size: 13px;
        }

        /* Custom checkbox */
        .custom-checkbox {
            position: relative;
        }

        .custom-checkbox input[type="checkbox"] {
            opacity: 0;
            position: absolute;
            margin: 5px 0 0 3px;
            z-index: 9;
        }

        .custom-checkbox label:before {
            width: 18px;
            height: 18px;
        }

        .custom-checkbox label:before {
            content: "";
            margin-right: 10px;
            display: inline-block;
            vertical-align: text-top;
            background: white;
            border: 1px solid #bbb;
            border-radius: 1px;
            box-sizing: border-box;
            z-index: 2;
        }

        .custom-checkbox input[type="checkbox"]:checked+label:after {
            content: "";
            position: absolute;
            left: 6px;
            top: 3px;
            width: 6px;
            height: 11px;
            border: solid #000;
            border-width: 0 3px 3px 0;
            transform: inherit;
            z-index: 3;
            transform: rotateZ(45deg);
        }

        .custom-checkbox input[type="checkbox"]:checked+label:before {
            border-color: #03a9f4;
            background: #03a9f4;
        }

        .custom-checkbox input[type="checkbox"]:checked+label:after {
            border-color: #fff;
        }

        .custom-checkbox input[type="checkbox"]:disabled+label:before {
            color: #b8b8b8;
            cursor: auto;
            box-shadow: none;
            background: #ddd;
        }

        /* Modal styles */
        .modal .modal-dialog {
            max-width: 400px;
        }

        .modal .modal-header,
        .modal .modal-body,
        .modal .modal-footer {
            padding: 20px 30px;
        }

        .modal .modal-content {
            border-radius: 1px;
        }

        .modal .modal-footer {
            background: #ecf0f1;
            border-radius: 0 0 1px 1px;
        }

        .modal .modal-title {
            display: inline-block;
        }

        .modal .form-control {
            border-radius: 1px;
            box-shadow: none;
            border-color: #dddddd;
        }

        .modal textarea.form-control {
            resize: vertical;
        }

        .modal .btn {
            border-radius: 1px;
            min-width: 100px;
        }

        .modal form label {
            font-weight: normal;
        }

        .swal2-popup {
            font-size: 1.6rem !important;
        }

        .search-box {
            float: right;
            position: relative;
            font-size: 14px;
        }

        .search-box input[type="text"] {
            height: 34px;
            padding: 5px 10px;
            border: 1px solid #ddd;
            border-radius: 20px;
            box-shadow: none;
        }

        .search-box input[type="text"]:focus {
            border: 1px solid #03a9f4;
        }

        .search-box i {
            color: #a0a5b1;
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
        }
    </style>

    <script type="text/javascript">
        $(document).ready(function() {
            // Activate tooltip
            $('[data-toggle="tooltip"]').tooltip();

            // Select/Deselect checkboxes
            var checkbox = $('table tbody input[type="checkbox"]');
            $("#selectAll").click(function() {
                if (this.checked) {
                    checkbox.each(function() {
                        this.checked = true;
                    });
                } else {
                    checkbox.each(function() {
                        this.checked = false;
                    });
                }
            });
            checkbox.click(function() {
                if (!this.checked) {
                    $("#selectAll").prop("checked", false);
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.btn-hapus');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const href = this.getAttribute('href');

                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: "btn btn-success",
                            cancelButton: "btn btn-danger"
                        },
                        buttonsStyling: true
                    });
                    swalWithBootstrapButtons.fire({
                        title: "Apakah Anda Yakin?",
                        text: "Data yang telah dihapus tidak bisa dihapus!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Hapus!!",
                        cancelButtonText: "Batal",
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = href;
                            swalWithBootstrapButtons.fire({
                                title: "Data Dihapus!",
                                text: "Data Anda telah dihapus.",
                                icon: "success",
                                timer: 1500,
                                showConfirmButton: false
                            }).then(() => {
                                window.location.href = button.href;
                            });
                        } else if (
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                            swalWithBootstrapButtons.fire({
                                title: "Dibatalkan!!",
                                text: "Data Anda kembali semula :)",
                                icon: "error"
                            });
                        }
                    });
                });
            });
        });

        $(document).ready(function() {
            $("#searchInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("table tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
    </script>

</head>

<body>
    <!-- Navbar -->
    <nav class="bg-[rgb(167,82,36)] text-white p-5 mb-4 w-full fixed top-0 left-0">
        <div class="w-full mx-auto flex items-start"> <!-- Navbar dengan elemen di kiri atas -->
            <!-- Logo dan tulisan Home di pojok kiri atas -->
            <a href="/" class="flex items-center space-x-2">
                <img src="https://media.istockphoto.com/id/498494295/id/vektor/web-ikon-tombol-beranda.jpg?s=1024x1024&w=is&k=20&c=8R9FvFO2RtBx-7o_1yoB4LCFdgnwp804FFCOOBP7aGo=" alt="home" class="h-6 w-6">
                <span class="text-md font-bold ">Dashboard</span>
            </a>
        </div>
    </nav>
    <div class="mt-16"></div>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Daftar <b>Sponsor</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="/sponsor/create" type="button" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Tambah Sponsor</span></a>
                    </div>
                </div>
            </div>
            <div class="search-box">
                <input type="text" id="searchInput" placeholder="Cari sponsor...">
                <i class="material-icons">search</i>
            </div>
            <ul>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="selectAll" />
                                    <label for="selectAll"></label>
                                </span>
                            </th>
                            <th>Nama sponsor</th>
                            <th>Nilai Sponsor</th>
                            <th>Jenis Sponsor</th>
                            <th>Action</th>
                        </tr>
                    </thead><br>
                    <tbody>
                        <?php foreach ($sponsors as $sponsor): ?>
                            <tr>
                                <td>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" id="checkbox1" name="options[]" value="1" />
                                        <label for="checkbox1"></label>
                                    </span>
                                </td>
                                <td><?= htmlspecialchars($sponsor['nama_sponsor']) ?></td>
                                <td>Rp.<?= htmlspecialchars($sponsor['nilai_sponsor']) ?></td>
                                <td><?= htmlspecialchars($sponsor['jenis_sponsor']) ?></td>
                                <td>
                                    <a href="/sponsor/edit/<?php echo $sponsor['id_sponsor']; ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                    <a href="/sponsor/delete/<?= $sponsor['id_sponsor']; ?>" class="delete btn-hapus"><i class="material-icons" title="Hapus">&#xE872;</i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </ul>
        </div>
    </div>
    <div class="mt-6 text-center">
        <a href="/" class="text-orange-700 hover:text-orange-800 font-semibold text-lg transition duration-300">
            ← Kembali ke Halaman Utama
        </a>
    </div>
</body>