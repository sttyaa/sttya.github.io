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
    }

    .table {
      text-align: center;
    }
  </style>
</head>

<body>
  <div class="mx-auto">
    <div class="card">
      <div class="card-header text-center text-white" style="background-color: #11009E;">
        Data Warga Desa Medayu
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
        <table class="table table-striped table-hover">
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
                  <a href="edit.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-success"><i class="bi bi-pencil-square"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                          <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                          <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg></i></button></a>
                  <a href="datadesamedayu.php?op=delete&id=<?php echo $id ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><button type="button" class="btn btn-danger"><i class="bi bi-trash3-fill"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                          <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                        </svg></i></button></a>
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