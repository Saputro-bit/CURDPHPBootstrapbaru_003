<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Data Mahasiswa</title>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <img class="navbar-brand" src="" alt="">
            <a class="navbar-brand" href="#">
                Data Mahasiswa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link active" aria-current="page" href="index.php">Tambah Mahasiswa</a>
                        <a class="nav-link" href="#">Features</a>
                        <a class="nav-link" href="#">Pricing</a>
                    </div>
                </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->
    <?php
    // Memanggil file config.php
    include "./config.php";
    // Menangkap id yang dikirim melalui button detail di index.php
    $id = $_GET['id'];
    // Melakukan query untuk mendapatkan data mahasiswa berdasarkan $id
    $mahasiswa = mysqli_query($koneksi, "select * from mahasiswa where id='$id'");
    while ($data = mysqli_fetch_assoc($mahasiswa)) {
    ?>
        <div class="container mt-5">
        <p><a href="index.php">Home</a> / Detail Mahasiswa / <?php echo $data['nama']; ?></p>
            <div class="card">
                <div class="card-header">
                <p class="fw-bold">Profil Mahasiswa</p>
                </div>
                <div class="card-body fw-bold">
                    <p>Nama   : <?php echo $data['nama']; ?></p>
                    <p>NIM    : <?php echo $data['nim'];?></p>
                    <p>Alamat : <?php echo $data['alamat'] ?></p>
                    <button class="btn btn-primary">Cetak</button>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>