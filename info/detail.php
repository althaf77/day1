<?php include("../konek.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../body1.css">
    
    <title>Berita | <?= $judul ?></title>
<?php 
$url=$_GET['judul'];
$judul=str_replace("-"," ",$url);

?>
</head>
<body>
 <?php
 
 $sql= "SELECT * FROM info WHERE judul='$judul'";
 $query= mysqli_query($db, $sql);
 $member=mysqli_fetch_array($query);
 ?>
  <header>
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7 col-md-9 col-sm-9">
                <div class="menu-area">
                    <div class="limit-box">
                        <nav class="menu">
                            <ul class="menu-bar">
                                <li class="active"><a href="../trending.php">Back</a></li>
                                <li><a href="../berita.php">Home</a></li>
                                <li><a href="#utama">Health</a></li>
                                <li><a href="#contact">contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<br>
 <div class="container">    
     <center><h1 style=color:navy;>Detail Berita</h1></center>
  <div class="row content">
    <div> 
      <h4 style=text-align:center;><?= $member['judul'] ?></h4>
      <center><img src="uploads/<?= $member['tipe_gambar']?>" style=width:400px;></center>
      <p style=text-align:justify;><?= $member['isi'] ?></p>
    </div>
  </div>
</div>
</body>
</html>