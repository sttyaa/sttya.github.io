<?php

include("koneksi.php");
include("header.php");

$nik = "";
$nama_lengkap = "";
$jenis_kelamin = "";
$tempat_lahir = "";
$tanggal_lahir = "";
$agama = "";
$alamat = "";
$sukses = "";
$error = "";

if (isset($_GET['op'])) {
  $op = $_GET['op'];
} else {
  $op = "";
}

if ($op == 'delete') {
  $id = $_GET['id'];
  $sql1 = "DELETE FROM data_desa WHERE id = '$id'";
  $q1 = mysqli_query($koneksi, $sql1);
  if ($q1) {
    $sukses = "Data berhasil dihapus";
  } else {
    $error = "Data gagal dihapus";
  }
}

if ($op == 'edit') {
  $id = $_GET['id'];
  $sql1 = "SELECT * FROM data_desa WHERE id = '$id'";
  $q1 = mysqli_query($koneksi, $sql1);
  $r1 = mysqli_fetch_array($q1);
  $nik = $r1['nik'];
  $nama_lengkap = $r1['nama_lengkap'];
  $jenis_kelamin = $r1['jenis_kelamin'];
  $tempat_lahir = $r1['tempat_lahir'];
  $tanggal_lahir = $r1['tanggal_lahir'];
  $agama = $r1['agama'];
  $alamat = $r1['alamat'];

  if ($nik == '') {
    $error = "Data tidak ditemukan";
  }
}

if (isset($_POST['simpan'])) { //Create
  $nik = $_POST['nik'];
  $nama_lengkap = $_POST['nama_lengkap'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $tempat_lahir = $_POST['tempat_lahir'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $agama = $_POST['agama'];
  $alamat = $_POST['alamat'];

  if ($nik && $nama_lengkap && $jenis_kelamin && $tempat_lahir && $tanggal_lahir && $agama && $alamat) {
    if ($op == 'edit') { //Update
      $sql1 = "UPDATE data_desa SET nik='$nik', nama_lengkap='$nama_lengkap',jenis_kelamin='$jenis_kelamin', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', agama='$agama', alamat='$alamat' WHERE id = '$id'";
      $q1 = mysqli_query($koneksi, $sql1);
      if ($q1) {
        $sukses = "Berhasil Memperbarui Data";
      } else {
        $error = "Gagal Memperbarui Data";
      }
    } else { //Insert
      $sql1 = "INSERT INTO data_desa (nik, nama_lengkap, jenis_kelamin, tempat_lahir, tanggal_lahir, agama, alamat) VALUES('$nik', '$nama_lengkap', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$agama', '$alamat')";
      $q1 = mysqli_query($koneksi, $sql1);
      if ($q1) {
        $sukses = "Berhasil Memasukkan Data";
      } else {
        $error = "Gagal Memasukkan Data";
      }
    }
  } else {
    $error = "Silahkan Lengkapi Data";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/bootstrap.css">
  <style>
    .mx-auto {
      width: 1000px;
    }

    .card {
      margin-top: 10px;
    }
  </style>
</head>

<body>
  <!-- Card -->
  <div class="mx-auto">
    <!-- Memasukkan Data -->
    <div class="card">
      <div class="card-header text-center text-white" style="background-color: #4942E4">
        Tambah / Edit Data
      </div>
      <div class="card-body">
        <?php //Alert Error
        if ($error) {
        ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $error ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php
        }
        ?>
        <?php //Alert Sukses
        if ($sukses) {
        ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $sukses ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php
        }
        ?>
        <form action="" method="post">
          <!-- NIK -->
          <div class="mb-3 row">
            <label for="nik" class="col-sm-2 col-form-label">NIK</label>
            <div class="col-sm-10">
              <input type="text" name="nik" id="nik" class="form-control" value="<?php echo $nik ?>">
            </div>
          </div>
          <!-- Nama Lengkap -->
          <div class="mb-3 row">
            <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
            <div class="col-sm-10">
              <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="<?php echo $nama_lengkap ?>">
            </div>
          </div>
          <!-- Jenis Kelamin -->
          <div class="mb-3 row">
            <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-10">
              <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="laki-laki" <?php if ($jenis_kelamin == "laki_laki") echo "selected" ?>>Laki-laki</option>
                <option value="perempuan" <?php if ($jenis_kelamin == "perempuan") echo "selected" ?>>Perempuan</option>
              </select>
            </div>
          </div>
          <!-- Tempat Lahir -->
          <div class="mb-3 row">
            <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
            <div class="col-sm-10">
              <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="<?php echo $tempat_lahir ?>">
            </div>
          </div>
          <!-- Tanggal Lahir -->
          <div class="mb-3 row">
            <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-10">
              <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="<?php echo $tanggal_lahir ?>">
            </div>
          </div>
          <!-- Agama -->
          <div class="mb-3 row">
            <label for="agama" class="col-sm-2 col-form-label">Agama</label>
            <div class="col-sm-10">
              <input type="text" name="agama" id="agama" class="form-control" value="<?php echo $agama ?>">
            </div>
          </div>
          <!-- Alamat -->
          <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="alamat" id="alamat" rows="3" value="<?php echo $alamat ?>"></textarea>
            </div>
          </div>
          <!-- Button -->
          <div class="col-12">
            <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>

    <!-- Output Data -->
    <div class="card">
      <div class="card-header text-center">
        Data Warga Desa Medayu
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">NIK</th>
              <th scope="col">Nama</th>
              <th scope="col">Jenis Kelamin</th>
              <th scope="col">Tempat Lahir</th>
              <th scope="col">Tanggal Lahir</th>
              <th scope="col">Agama</th>
              <th scope="col">Alamat</th>
              <th scope="col">Aksi</th>
            </tr>
          <tbody>
            <?php
            $sql2 = "SELECT * FROM data_desa order by id desc";
            $q2 = mysqli_query($koneksi, $sql2);
            $urut = 1;
            while ($r2 = mysqli_fetch_array($q2)) {
              $id = $r2['id'];
              $nik = $r2['nik'];
              $nama_lengkap = $r2['nama_lengkap'];
              $jenis_kelamin = $r2['jenis_kelamin'];
              $tempat_lahir = $r2['tempat_lahir'];
              $tanggal_lahir = $r2['tanggal_lahir'];
              $agama = $r2['agama'];
              $alamat = $r2['alamat'];

            ?>
              <tr>
                <th scope="row"><?php echo $urut++ ?></th>
                <td scope="row"><?php echo $nik ?></td>
                <td scope="row"><?php echo $nama_lengkap ?></td>
                <td scope="row"><?php echo $jenis_kelamin ?></td>
                <td scope="row"><?php echo $tempat_lahir ?></td>
                <td scope="row"><?php echo $tanggal_lahir ?></td>
                <td scope="row"><?php echo $agama ?></td>
                <td scope="row"><?php echo $alamat ?></td>
                <td scope="row">
                  <a href="datadesa.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                  <a href="datadesa.php?op=delete&id=<?php echo $id ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><button type="button" class="btn btn-danger">Delete</button></a>

                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
          </thead>
        </table>
      </div>
    </div>
  </div>
  <script src="../js/jQuery.js"></script>
  <script src="../js/bootstrap.js"></script>
</body>

</html>