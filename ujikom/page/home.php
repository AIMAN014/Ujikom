<style>
        .hero-section {
            background-image: url('https://img.freepik.com/free-photo/majestic-mountain-peak-tranquil-winter-landscape-generated-by-ai_188544-15662.jpg?w=1380&t=st=1713876061~exp=1713876661~hmac=732d32db72e6b60df4bafcb594ab2a3188baccb3b1695d8386b1e7a675129881');
            background-size: cover;
            background-position: center;
            color: #fff;
            padding: 100px 0;
            text-align: center;
        }

        .hero-section h1 {
            font-size: 3.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .hero-section p {
            font-size: 1.25rem;
            margin-bottom: 40px;
        }

        .hero-section .btn {
            font-size: 1.25rem;
            padding: 10px 30px;
        }

        .features-section {
            background-color: #f8f9fa;
            padding: 80px 0;
            text-align: center; 
        }

        .feature-icon {
            font-size: 4rem;
            color: #007bff;
            margin-bottom: 20px;
        }
        .feature-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .feature-description {
            font-size: 1.1rem;
            color: #666;
        }
        /* Tambahkan kelas baru untuk warna hitam */
        .btn-black {
            color: #000;
        }
    </style>
<div class="container-fluid hero-section">
        <div class="row">
            <div class="text-center">
                <h1 class="display-4">Selamat Datang di Galeri Foto!</h1>
                <p class="lead">Temukan dan bagikan momen berharga Anda dengan galeri foto kami.</p>
                <?php if(!isset($_SESSION['user_id'])): ?>
                <!-- Tambahkan kelas btn-black pada kedua tombol -->
                <a href="login.php" class="btn btn-secondary btn-lg btn-black">Login Sekarang</a>
                <a href="daftar.php" class="btn btn-secondary btn-lg btn-black">Daftar Sekarang</a>
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <!-- Your image or other content here -->
            </div>
        </div>
    </div>
