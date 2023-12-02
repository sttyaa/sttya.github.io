<?php
include("koneksi.php");
include("setting.php");
include("header.php");
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
      margin-bottom: 30px;
    }
    .btn-custom{
      background-color: #11009E;
    }
  </style>
</head>

<body>
  <div class="mx-auto">
    <!-- Memasukkan Data -->
    <div class="card">
      <div class="card-header text-center text-white" style="background-color: #11009E;">
        Edit Data
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
              <input type="text" name="nik" id="nik" class="form-control shadow-sm" value="<?php echo $nik ?>" readonly>
            </div>
          </div>
          <!-- Nama Lengkap -->
          <div class="mb-3 row">
            <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
            <div class="col-sm-10">
              <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control shadow-sm" value="<?php echo $nama_lengkap ?>">
            </div>
          </div>
          <!-- Jenis Kelamin -->
          <div class="mb-3 row">
            <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-10">
              <select name="jenis_kelamin" id="jenis_kelamin" class="form-control shadow-sm">
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
              <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control shadow-sm" value="<?php echo $tempat_lahir ?>">
            </div>
          </div>
          <!-- Tanggal Lahir -->
          <div class="mb-3 row">
            <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-10">
              <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control shadow-sm" value="<?php echo $tanggal_lahir ?>">
            </div>
          </div>
          <!-- Agama -->
          <div class="mb-3 row">
            <label for="agama" class="col-sm-2 col-form-label">Agama</label>
            <div class="col-sm-10">
              <input type="text" name="agama" id="agama" class="form-control shadow-sm" value="<?php echo $agama ?>">
            </div>
          </div>
          <!-- Alamat -->
          <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
              <textarea class="form-control shadow-sm" name="alamat" id="alamat" rows="3"><?php echo $alamat ?></textarea>
            </div>
          </div>
          <!-- Button -->
          <div class="col-12 text-end">
            <input type="submit" name="simpan" value="Simpan Data" class="btn btn-custom text-white">
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="../js/jQuery.js"></script>
  <script src="../js/bootstrap.js"></script>
</body>

</html>