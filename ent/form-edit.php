<?php
include("konek.php");

if ( !isset($_GET['id'])){
  header('Location: daftar-member.php');
}

$id = $_GET['id'];

$sql= "SELECT * FROM covid WHERE id=$id";
$query= mysqli_query($db, $sql);
$member= mysqli_fetch_assoc($query);


if(mysqli_num_rows($query) < 1){
    die("Data Tidak ada");
}


?>
<html>
<body>
<head>
<title>Data Covid 19</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<div class="container">
<form method="POST" action="proses-edit.php" class="row g-3">

<input type="hidden" name="id" value="<?php echo $member['id'] ?>"/>

  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Provinsi</label>
    <input type="text" name="provinsi" class="form-control" id="inputEmail4" value="<?php echo $member['provinsi'] ?>"/>
  </div>

  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Meninggal</label>
    <input type="number" name="meninggal" class="form-control" id="inputPassword4" value="<?php echo $member['meninggal'] ?>"/>
  </div>
  <div class="col-md-6">
    <label for="inputAddress" class="form-label" >Dirawat</label>
    <input type="number" name="perawatan" class="form-control" id="inputAddress" value="<?php echo $member['perawatan'] ?>" />
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Sembuh</label>
    <input type="number" name="sembuh" class="form-control" id="inputEmail4" value="<?php echo $member['sembuh'] ?>"/>
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
    <button type="submit" name="simpan" class="btn btn-primary">Simpan Perubahan</button>
  </div>
</form>
</div>

</body>
</html>
