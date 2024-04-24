<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Galeri Foto | Aiman Fathurrahman Effendi S.</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            background-image: url('https://img.freepik.com/free-photo/natures-beauty-reflected-tranquil-mountain-waters-generative-ai_188544-7867.jpg?t=st=1713877916~exp=1713878516~hmac=87f65d34a146ce150847976ecc0d6feb8bd319f590e353f32cc9c990b92b42d8');
            background-size: cover;
            /* Tambahan styling lainnya */
        }

        /* Menambahkan efek transparansi pada card */
        .card {
            background-color: rgba(255, 255, 255, 0.8); /* Ubah nilai alpha untuk menyesuaikan tingkat transparansi */
            border: none; /* Hilangkan border agar lebih terlihat transparan */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-5">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center">Register</h2>
                        <p class="text-center">Silahkan Daftar Terlebih Dahulu</p>
                        <?php
                            // Koneksi ke database
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "ujikom"; // Ganti dengan nama database Anda

                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Periksa koneksi
                            if ($conn->connect_error) {
                                die("Koneksi gagal: " . $conn->connect_error);
                            }

                            $submit = @$_POST['submit'];
                            if($submit == 'Daftar') {
                                $username = $_POST['username'];
                                $password = $_POST['password'];
                                $email = $_POST['email'];
                                $nama_lengkap = $_POST['nama_lengkap'];
                                $alamat = $_POST['alamat'];
                                
                                // Escape input untuk mencegah SQL Injection
                                $escaped_username = $conn->real_escape_string($username);
                                $escaped_email = $conn->real_escape_string($email);
                                
                                // Query untuk memeriksa apakah username atau email sudah terpakai
                                $result = $conn->query("SELECT * FROM user WHERE username='$escaped_username' OR email='$escaped_email'");
                                
                                // Periksa jumlah baris hasil query
                                $cek = $result->num_rows;
                                
                                if($cek == 0) {
                                    // Insert data baru ke dalam database
                                    $sql = "INSERT INTO user VALUES('', '$escaped_username', '$password', '$escaped_email', '$nama_lengkap', '$alamat')";
                                    if ($conn->query($sql) === TRUE) {
                                        echo '<div class="alert alert-success" role="alert">Berhasil mendaftarkan akun!!! <a href="login.php" class="alert-link">Login</a>!</div>';
                                        echo '<meta http-equiv="refresh" content="1; url=login.php">';
                                    } else {
                                        echo "Error: " . $sql . "<br>" . $conn->error;
                                    }
                                } else {
                                    echo '<div class="alert alert-danger" role="alert">Akun atau username sudah terpakai, harap gunakan yang lain!</div>';
                                    echo '<meta http-equiv="refresh" content="2; url=daftar.php">';
                                }
                            }
                        ?>
                        <form action="daftar.php" method="post">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="alamat" required>
                            </div>
                            <button type="submit" class="btn btn-success btn-block" name="submit" value="Daftar">Daftar</button>
                            <p class="text-center mt-3">Sudah punya akun? <a href="login.php">Login</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
