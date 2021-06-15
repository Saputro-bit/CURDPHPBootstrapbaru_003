<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
  <title>Data Mahasiswa</title>
</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Data Mahasiswa</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <a class="nav-link active" aria-current="page" href="#">Tambah Mahasiswa</a>
          <a class="nav-link" href="#">Features</a>
          <a class="nav-link" href="#">Pricing</a>
        </div>
      </div>
    </div>
  </nav>
  <!-- END NAVBAR -->

  <!-- MODAL -->
  <div class="container data-mahasiswa mt-5">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahData">
      Tambah Data
    </button>

    <!-- Modal -->
    <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form method="POST" name="form" action="tambah.php">
            <div class="modal-header">
              <h5 class="modal-title" id="tambahDataLabel">Tambah Data</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Mahasiswa" name="nama" required>
              </div>
              <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" placeholder="Masukkan NIM Mahasiswa" name="nim" required>
              </div>
              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea type="text" class="form-control" id="alamat" placeholder="Masukkan Alamat Mahasiswa" name="alamat" required></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary" value="simpan">Tambah</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- END MODAL -->

    <!-- DATA -->
    <div class="container data-mahasiswa mt-5">
      <table class="table table-striped" id="data-mhs">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama</th>
            <th scope="col">NIM</th>
            <th scope="col">Alamat</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Panggil Koneksi
          include 'config.php';

          // Buat variabel no mahasiswa
          $nomor = 1;

          // Query
          $query = mysqli_query($koneksi, "select * from mahasiswa");

          // Load and looping data
          while ($data = mysqli_fetch_array($query)) {
          ?>
            <!-- Tampilkan data -->
            <tr>
              <td><?php echo $nomor++; ?></td>
              <td><?php echo $data['nama']; ?></td>
              <td><?php echo $data['nim']; ?></td>
              <td><?php echo $data['alamat']; ?></td>
              <td>
                <a href="detail.php?id=<?php echo $data['id']; ?>" class="btn btn-success btn-sm text-white">Detail</a>
                <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-warning btn-sm text-white">EDIT</a>
                <a href="hapus.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin untuk menghapus data?')">Hapus</a>
              </td>
            </tr>
          <?php
          }
          ?>

        </tbody>
      </table>
    </div>
    <!-- END DATA -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#data-mhs').DataTable();
      })
    </script>
</body>

</html>