<!-- app/views/user/create.php -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" />
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style type="text/css">
    body {
        color: #566787;
        background: #f5f5f5;
        font-family: "Varela Round", sans-serif;
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
</style>

<script type="text/javascript">
    
    document.addEventListener('DOMContentLoaded', function() {
        const createButtons = document.querySelectorAll('.btn-success');

        document.getElementById('sponsor-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission
            const href = this.getAttribute('/sponsor/index');

            // Display SweetAlert confirmation
            Swal.fire({
                title: 'Berhasil!',
                text: 'Data telah ditambahkan.',
                icon: 'success',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with form submission
                    fetch('/sponsor/store', {
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
                                'Terjadi kesalahan saat menambahkan data.',
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
                <h4 class="modal-title">Tambah Sponsor</h4>
            </div>
            <div class="modal-body">
                <form id="sponsor-form" action="/sponsor/store" method="POST">
                    <div class="form-group">
                        <label for="nama_sponsor">Nama Sponsor:</label>
                        <input type="text" class="form-control" name="nama_sponsor" id="nama_sponsor" required><br>
                    </div>
                    <div class="form-group">
                        <label for="nilai_sponsor">Nilai Sponsor:</label>
                        <input type="decimal" class="form-control" name="nilai_sponsor" id="nilai_sponsor" required><br>
                    </div>
                    <div class="form-group">
                        <label for="jenis_sponsor">Jenis Sponsor:</label>
                        <input type="text" class="form-control" name="jenis_sponsor" id="jenis_sponsor" required><br>
                    </div>
                    <div class="modal-footer">
                        <a href="/sponsor/index" type="button" class="btn btn-default" data-dismiss="modal">Kembali</a>
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>