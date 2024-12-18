<!-- app/views/user/edit.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Sponsor</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<style>
    body {
        color: #566787;
        background: #f5f5f5;
        font-family: 'Varela Round', sans-serif;
        font-size: 13px;
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
        border-radius: 3px;
        font-size: 14px;
    }

    .modal .modal-footer {
        background: #ecf0f1;
        border-radius: 0 0 3px 3px;
    }

    .modal .modal-title {
        display: inline-block;
    }

    .modal .form-control {
        border-radius: 2px;
        box-shadow: none;
        border-color: #dddddd;
    }

    .modal textarea.form-control {
        resize: vertical;
    }

    .modal .btn {
        border-radius: 2px;
        min-width: 100px;
    }

    .modal form label {
        font-weight: normal;
    }

    .swal2-popup {
            font-size: 1.6rem !important;
    }
</style>

<script>

    document.addEventListener('DOMContentLoaded', function() {
        const createButtons = document.querySelectorAll('.btn-info');

        document.getElementById('sponsor-update').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission
            const href = this.getAttribute('/sponsor/index');

            // Display SweetAlert confirmation
            Swal.fire({
                title: 'Berhasil!',
                text: 'Data telah diperbarui.',
                icon: 'success',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with form submission
                    fetch('/sponsor/update/<?php echo $sponsor['id_sponsor']; ?>', {
                            method: 'POST',
                            body: new FormData(this)
                        })
                        .then(() => {
                            // Redirect to index page
                            window.location.href = '/sponsor/index';
                        })
                        .catch(error => {
                            // Show error message
                            Swal.fire(
                                'Gagal!',
                                'Terjadi kesalahan saat memperbarui data.',
                                'error'
                            );
                        });
                    }
                })
            });
        });

</script>

<body>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Sponsor</h4>
            </div>
            <div class="modal-body">
                <form action="/sponsor/update/<?php echo $sponsor['id_sponsor']; ?>" id="sponsor-update" method="POST">
                    <div class="form-group">
                        <label for="nama_sponsor">Nama Sponsor:</label>
                        <input type="text" class="form-control" id="nama_sponsor" name="nama_sponsor" value="<?php echo $sponsor['nama_sponsor']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nilai_sponsor">Nilai Sponsor:</label>
                        <input type="decimal" class="form-control" id="nilai_sponsor" name="nilai_sponsor" value="<?php echo $sponsor['nilai_sponsor']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_sponsor">Jenis Sponsor:</label>
                        <input type="text" class="form-control" id="jenis_sponsor" name="jenis_sponsor" value="<?php echo $sponsor['jenis_sponsor']; ?>" required>
                    </div>
                    <div class="modal-footer">
                        <a href="/sponsor/index" type="button" class="btn btn-default" data-dismiss="modal">Kembali</a>
                        <button type="submit" class="btn btn-info">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>