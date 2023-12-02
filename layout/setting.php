<?php

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