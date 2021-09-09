<?php
  include("../konek.php");
?>
<html>
<body>
<head>
<title>Website Exercise GYM</title>
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<div class="container">
<form method="POST" action="proses-daftar.php" class="row g-3" enctype="multipart/form-data">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Tanggal</label>
    <input type="date" name="tanggal" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Judul</label>
    <input type="text" name="judul" class="form-control" id="inputPassword4">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label" >Isi Berita</label>
    <div class="form-floating">
  <textarea class="form-control" name="isi" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
  <label for="floatingTextarea2">Isi berita</label>
</div>
<div class="mb-3">
    <input name="gambar" type="file" class="form-control" aria-label="file example">
    <div class="invalid-feedback">Example invalid form file feedback</div>
  </div>
  </div>
  <div class="col-12">
    <button type="submit" name="daftar" class="btn btn-primary">Tambah Berita</button>
  </div>
</form>
</div>

</body>
</html>
