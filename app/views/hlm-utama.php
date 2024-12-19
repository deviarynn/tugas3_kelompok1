<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <!-- Menambahkan link Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: atara;
            font-weight: bold;
        }

        body {
            height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                url('assets/img/senbud.JPG') no-repeat center center/cover;
            display: flex;
            flex-direction: column;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 10px;
            width: 100%;
            max-width: 1200px;
            flex-grow: 1;
            padding: 20px;
        }

        .welcome-text {
            color: white;
            font-size: 1.5rem;
            text-align: center;
            margin-bottom: 50px;
            font-weight: bold;
        }

        .row {
            display: flex;
            justify-content: center;
            gap: 20px;
            width: 100%;
        }

        .box {
            background: rgba(255, 243, 225, 0.76);
            padding: 30px;
            text-align: center;
            border-radius: 15%;
            /* Membuat elemen menjadi lingkaran */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
            font-size: medium;
            flex: 1 1 calc(20% - 20px);
            max-width: 200px;
            height: 240px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .box:hover {
            transform: translateY(-10px);
        }

        .box img {
            width: 80px;
            height: 80px;
            margin-bottom: 15px;
            border-radius: 50%;
        }

        .box h2 {
            margin-bottom: 10px;
            font-size: 1.2rem;
            color: rgb(45, 45, 45);
            font-weight: bold;
            padding: 0.01px;
        }

        .box p  {
            font-size: 0.9rem;
            color: rgb(71, 69, 69);
            justify-content: center;
            margin-top: 1px;
            align-items: center;
            text-align: center;
        }

        footer {
            background-color: rgb(110, 73, 16);
            color: white;
            text-align: center;
            padding: 2px;
            justify-content: center;
            align-items: center;

        }


        .navbar-custom {
            background-color: rgb(167, 82, 36);
            padding: 6px;
            font-size: medium;
        }

        .navbar-brand img {
            width: 25px;
            /* Ukuran logo di navbar */
            height: 25px;
            margin-right: 10px;
            /* Spasi antara logo dan teks */
            border-radius: 90%;
            /* Membuat elemen menjadi lingkaran */
        }
    </style>
</head>
<body>
    <!-- Navbar menggunakan Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="assets/img/icons/beranda.jpg" alt="Logo">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <!-- Teks Selamat Datang -->
        <div class="welcome-text">
            <h1>Selamat Datang di Website Seni Tari dan Budaya!</h1>
        </div>

        <!-- Box untuk Dashboard -->
    <div class="row">
    <a href="/event/index" class="box">
    <h2>Events</h2>
        <img src="assets/img/icons/event.png" alt="Event">
        <p>Lihat event menarik yang akan datang.</p>
        </a>
     
        <a href="/peserta/index" class="box">
        <h2>Attendees</h2>
        <img src="assets/img/icons/peserta.png" alt="Attendees">
        <p>Daftar dan lihat peserta event</p>
        </a>

        <a href="/sponsor/index" class="box">
        <h2>Sponsorship</h2>
        <img src="assets/img/icons/sponsor.png" alt="Sponsorship">
        <p>Jelajahi peluang sponsor untuk event</p>
        </a>
        
        <a href="/organizers/index" class="box">
        <h2>Organizers</h2>
        <img src="assets/img/icons/organizers.png" alt="Organizers">
        <p>Temui penyelenggara event profesional.</p>
        </a>
    </div>

    </div>
    <!-- Footer -->
    <footer>
        <p>&copy; 2024 SI Manajemen Seni Tari dan Budaya. Dibuat oleh 2C-Kelompok1</p>
    </footer>

    <!-- Menambahkan skrip Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
