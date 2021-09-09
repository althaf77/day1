<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location: log.php");
    exit;
}
include ("konek.php"); 
$halaman = 2;
$result=mysqli_query($db,"SELECT * FROM info");
$jumlahinfo=mysqli_num_rows($result);
$jumlahhal=ceil($jumlahinfo/$halaman);
$aktif=(isset($_GET["hal"])) ? $_GET["hal"] : 1 ;
$awal=($halaman * $aktif) - $halaman;

$sql = "SELECT * FROM info LIMIT $awal, $halaman";
$query = mysqli_query($db, $sql);

if(isset($_POST["cari"])){
    $keyword=$_POST['keyword'];
    $sql= "SELECT * FROM info WHERE judul LIKE '%$keyword%'
    LIMIT $awal, $halaman";
    $query= mysqli_query($db, $sql);
}          
else{
    $sql= "SELECT * FROM info LIMIT $awal, $halaman";
    $query= mysqli_query($db, $sql);
}  // car

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="admin2.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="sidebar">

    <div class="responsive-nav">
        <div class="menu">
        <center>
        <div>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
        </svg>
        <p>Welcome</p>
        <p>Admin</p>
    </div>
        </center><br>
  <a class="active"  href="#news">Daftar berita</a>
  <a href="covid.php">Data covid</a>
  <a href="#contact">Contact</a>
  <a href="logout.php">logout</a>
  <br>

  
  <center><div class="teks-copyright">
    <p>Althaf</p>
  </div></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
<div class="content">
    <section id="home">

   <div class="container">
   <center>Daftar Berita</center>

   <div class="row justify-content-center mt-5">
   <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="?hal=<?= $aktif - 1; ?>">Previous</a></li>
    <li class="page-item"><a class="page-link" href="?hal=1">1</a></li>
    <li class="page-item"><a class="page-link" href="?hal=2">2</a></li>
    <li class="page-item"><a class="page-link" href="?hal=3">3</a></li>
    <li class="page-item"><a class="page-link"href="?hal=<?= $aktif + 1; ?>">Next</a></li>
  </ul>
  <form action= "" method="POST" class="d-flex">
        <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search"
        autocomplete="off" name="keyword">
        <button class="btn btn-outline-success" type="submit" name="cari">Search</button>
      </form>
    <nav>
    <center><a class="btn btn-info" data-bs-toggle="offcanvas" href="info/form.php" role="button" aria-controls="offcanvasExample">
    Tambah Data Baru [ + ]
                  </a><center>
    </nav>
    <br>

            <?php
            

            while($member= mysqli_fetch_array($query)){
                
                echo '
                <div class="card-group">
                <div class="card">
                <div class="card-body">
                <img src="info/uploads/'.$member['tipe_gambar'].'" class="card-img-top" alt="...">
                  <h5 class="card-title">'.$member['judul'].'</h5>
                  <p class="card-text">'.$member['isi'].'</p>
                  <p class="card-text"><small class="text-muted">Last updated '.$member['tanggal'].'</small></p>
                  <a class="btn btn-success" data-bs-toggle="offcanvas" href="info/form-edit.php?id='.$member['id'].'" role="button" aria-controls="offcanvasExample">
                  Edit
                  </a>
                  <a class="btn btn-danger" data-bs-toggle="offcanvas" href="info/hapus.php?id='.$member['id'].'" onclick="return confirm(\'yakin ingin menghapus?\')". role="button" aria-controls="offcanvasExample">
                  Hapus
                  </a>
                </div>
              </div> 
              </div>';
            };
            ?>

            </tbody>
        </table>
    
    
    </div>
            <p>Total : <?php echo mysqli_num_rows($query) ?></p>
    </div>
    
</section>
</div>
</body>
</html>
