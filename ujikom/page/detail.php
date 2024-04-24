<?php 
error_reporting(E_ERROR | E_PARSE); // Menonaktifkan tampilan warning
$details=mysqli_query($conn, "SELECT * FROM foto INNER JOIN user ON foto.user_id=user.user_id WHERE foto.foto_id='$_GET[id]'");
$data=mysqli_fetch_array($details);
$likes=mysqli_num_rows(mysqli_query($conn, "SELECT * FROM like_foto WHERE foto_id='$_GET[id]'"));
$cek=mysqli_num_rows(mysqli_query($conn, "SELECT * FROM like_foto WHERE foto_id='$_GET[id]' AND user_id='$_SESSION[user_id]'"));
?>
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <img src="uploads/<?= $data['lokasi_file'] ?>" alt="<?= $data['judul_foto'] ?>" class="object-fit-cover">
                <div class="card-body">
                    <h3 class="card-title mb-0"><?= $data['judul_foto'] ?> 
                        <button class="btn btn-sm <?php echo ($cek==0) ? 'btn-outline-primary' : 'btn-primary'; ?>" onclick="likeFunction('<?php echo $data['foto_id']; ?>')">
                            <i class="fas fa-thumbs-up"></i> 
                            <?php echo ($cek==0) ? 'Like' : 'Dislike'; ?> <?= $likes ?>
                        </button>
                    </h3>
                    <small class="text-muted mb-3">by:<?= $data['username'] ?>, <?= $data['tanggal_unggah'] ?></small>
                    <p><?= $data['deskripsi_foto'] ?></p>
                    <?php 
                        //ambil data komentar
                        $submit=@$_POST['submit'];
                        if ($submit=='Kirim'){
                            $komentar=@$_POST['isi_komentar'];
                            $foto_id=@$_POST['foto_id'];
                            $user_id=@$_SESSION['user_id'];
                            $tanggal=date('Y-m-d');
                            $komen=mysqli_query($conn, "INSERT INTO komentar_foto VALUES('', '$foto_id', '$user_id', '$komentar', '$tanggal')");
                            header("Location: ?url=detail&&id=$foto_id");
                        }

                    ?>
                    <form action="?url=detail" method="post">
                        <div class="form-group d-flex flex-row">
                            <input type="hidden" name="foto_id" value="<?= $data['foto_id'] ?>">
                            <a href="?url=home" class="btn btn-secondary">Kembali</a>
                            <?php if(isset($_SESSION['user_id'])): ?>
                            <input type="text" name="isi_komentar" class="form-control" placeholder="Ketikan komentar...">
                            <input type="submit" value="Kirim" name="submit" class="btn btn-secondary">
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header bg-dark text-light">
                    <h5 class="card-title">Komentar</h5>
                </div>
                <div class="card-body">
                    <?php
                        $komen=mysqli_query($conn, "SELECT * FROM komentar_foto INNER JOIN user ON komentar_foto.user_id=user.user_id INNER JOIN foto ON komentar_foto.foto_id=foto.foto_id WHERE komentar_foto.foto_id='$_GET[id]'");
                        foreach($komen as $koment):
                    ?>
                        <div class="border-bottom mb-3 pb-3">
                            <p class="fw-bold"><?= $koment['username'] ?></p>
                            <p><?= $koment['isi_komentar'] ?></p>
                            <p class="text-muted small"><?= $koment['tanggal_komentar'] ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function likeFunction(id) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                location.reload(); // reload the page after like/dislike
            }
        };
        xhttp.open("GET", "?url=like&&id=" + id, true);
        xhttp.send();
    }
</script>
