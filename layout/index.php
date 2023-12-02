<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/bootstrap.css">
  <style>
    .banner {
      background: url("/img/img1.jpg") no-repeat center center;
      background-size: cover;
      padding-top: 17%;
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
    
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg p-3 navbar-dark shadow fixed-top" style="background-color: #11009E;">
    <div class="container">
      <a class="navbar-brand" href="#">Desa Medayu</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tambahdata.php">Tambah</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="datadesamedayu.php">Data Desa</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid banner">
    <div class="container text-center">
      <h3 class="display-1">Desa Medayu</h3>
      <h4 class="display-7">Medayu adalah sebuah desa di kecamatan Suruh, Semarang, Jawa Tengah, Indonesia.</h4>
    </div>
  </div>
  <script src="../js/jQuery.js"></script>
  <script src="../js/bootstrap.js"></script>
</body>

</html>