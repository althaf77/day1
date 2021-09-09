<?php
include("../konek.php");

if ( !isset($_GET['id'])){
  header('Location: daftar-member.php');
}

$id = $_GET['id'];

$sql= "SELECT * FROM info WHERE id=$id";
$query= mysqli_query($db, $sql);
$member= mysqli_fetch_assoc($query);


if(mysqli_num_rows($query) < 1){
    die("Data Tidak ada");
}


?>
<html>
<body>
<head>
<title>Website Exercise GYM</title>
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<div class="container">
<form method="POST" action="proses-edit.php" class="row g-3" enctype="multipart/form-data">

<input type="hidden" name="id" value="<?php echo $member['id'] ?>"/>
<input type="hidden" name="lama" value="<?php echo $member['tipe_gambar'] ?>"/>

  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Tanggal</label>
    <input type="date" name="tanggal" class="form-control" id="inputEmail4" value="<?php echo $member['tanggal'] ?>"/>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Judul</label>
    <input type="text" name="judul" class="form-control" id="inputPassword4" value="<?php echo $member['judul'] ?>"/>
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label" >Isi Berita</label>
    <div class="form-floating">
  <textarea class="form-control" name="isi" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">
   .<?php echo $member['isi']?>. </textarea>
  <label for="floatingTextarea2">Isi berita</label>
</div>
<div class="mb-3">
    <img  src="uploads/.<?php echo $member['tipe_gambar']?>.">
    <input name="gambar" type="file" class="form-control" aria-label="file example">
    <div class="invalid-feedback">Example invalid form file feedback</div>
  </div>
  </div>
  <div class="col-12">
    <button type="submit" name="simpan" class="btn btn-primary">Simpan Perubahan</button>
  </div>
</form>
</div>

</body>
</html>
