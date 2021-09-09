<?php 
include("konek.php");
$halaman = 6;
$result=mysqli_query($db,"SELECT * FROM info");
$jumlahinfo=mysqli_num_rows($result);
$jumlahhal=ceil($jumlahinfo/$halaman);
$aktif=(isset($_GET["hal"])) ? $_GET["hal"] : 1 ;
$awal=($halaman * $aktif) - $halaman;

$sql = "SELECT * FROM info LIMIT $awal, $halaman";
$query = mysqli_query($db, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bodi.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Web berita</title>
</head>
<body>
    <header>
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7 col-md-9 col-sm-9">
                <div class="menu-area">
                    <div class="limit-box">
                        <nav class="menu">
                            <ul class="menu-bar">
                                <li><a href="berita.php">HOME</a></li>
                                <li  class="active"><a href="trending.php">PENS</a></li>
                                <li><a href="">Health</a></li>
                                <li><a href="berita.php">Covid 19</a></li>
                                <li><a href="lain.php">Lainnya</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                <li class="login"><a style=color:black; href="log.php">Login</a></li>
            </div>
        </div>
    </div>
</header>
    <section>
        <div class="service">
            <div class="container">
               <div class="row">
                  <div class="col-md-8 offset-md-2">
                     <div class="title">
                        <h2>Berita <strong class="black">Pens</strong></h2>
                        <span>Berita trending hari ini</span>
                     </div>
                  </div>
               </div>
               <div class="row justify-content-center mt-5">
    <br>

    <?php

            while($member= mysqli_fetch_array($query)){
                echo '
                <div class="card mb-3" style="max-width: 540px;">
  <div class="col-sm-6">
    <div class="card" style="width: 500px;>
      <div class="card-body">
      <img src="info/uploads/'.$member['tipe_gambar'].'" class="img-thumbnail" alt="..." style:width="30px">
      <h5 class="card-title">'.$member['judul'].'</h5>
      <p class="card-text"><small class="text-muted">Last updated '.$member['tanggal'].'</small></p>';
      
        ?><a href="info/detail.php?judul=<?=str_replace(" ","-", $member['judul'])?>" class="btn btn-primary">Detail Berita</a>
        <?php echo '
      </div>
    </div>
  </div>';
            };
            ?>

            </tbody>
        </table>
       <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="?hal=<?= $aktif - 1; ?>">Previous</a></li>
    <li class="page-item"><a class="page-link" href="?hal=1">1</a></li>
    <li class="page-item"><a class="page-link" href="?hal=2">2</a></li>
    <li class="page-item"><a class="page-link" href="?hal=3">3</a></li>
    <li class="page-item"><a class="page-link"href="?hal=<?= $aktif + 1; ?>">Next</a></li>
  </ul>
    <nav>
    
               </div>
            </div>
         </div>
    </section>
    <section  id="contact">
          <footr>
          <div class="col-md-8 offset-md-2">
                          </div>
           <div class="footer">
              <div class="copyright">
                 <p>Copyright 2021 Althaf</p>
              </div>
           
        </div>
        </footr>
          </section>
    
</body>
</html>