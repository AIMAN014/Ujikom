<?php 
    include 'koneksi.php'; 
    session_start(); 
?>
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
                        <h2 class="text-center">Login</h2>
                        <p class="text-center">Silahkan Masuk Ke Akun Anda</p>
                        <?php
                            $submit=@$_POST['submit'];
                            if($submit=='Login'){
                                $username=$_POST['username'];
                                $password=$_POST['password'];
                                $sql=mysqli_query($conn, "SELECT * FROM user WHERE Username='$username' AND Password='$password'");
                                $cek=mysqli_num_rows($sql);
                                if($cek!=0){
                                    $sesi=mysqli_fetch_array($sql);
                                    echo '<div class="alert alert-success" role="alert">Login berhasil!</div>';
                                    $_SESSION['username']=$sesi['username'];
                                    $_SESSION['user_id']=$sesi['user_id'];
                                    $_SESSION['email']=$sesi['email'];
                                    $_SESSION['nama_lengkap']=$sesi['nama_lengkap'];
                                    echo '<meta http-equiv="refresh" content="0.8; url=./">';
                                }else{
                                    echo '<div class="alert alert-danger" role="alert">Login gagal! Username atau password salah.</div>';
                                    echo '<meta http-equiv="refresh" content="2; url=login.php">';
                                }
                            }
                        ?>
                        <form action="login.php" method="post">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                            <button type="submit" class="btn btn-success btn-block" name="submit" value="Login">Login</button>
                            <p class="text-center mt-3">Belum punya akun? <a href="daftar.php">Register</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
