<?php
  include("konek.php");
?>
<html>
<body>
<head>
<title>Website Exercise GYM</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<div class="container">
<form method="POST" action="proses-daftar.php" class="row g-3">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Provinsi</label>
    <input type="text" name="provinsi" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Meninggal</label>
    <input type="number" name="meninggal" class="form-control" id="inputPassword4">
  </div>
  <div class="col-md-6">
    <label for="inputAddress" class="form-label" >Dirawat</label>
    <input type="number" name="perawatan" class="form-control" id="inputAddress">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Sembuh</label>
    <input type="number" name="sembuh"class="form-control" id="inputEmail4">
  </div>

  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <div class="col-12">
    <button type="submit" name="daftar" class="btn btn-primary">Tambah</button>
  </div>
</form>
</div>

</body>
</html>
