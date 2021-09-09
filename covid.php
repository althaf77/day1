<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location: log.php");
    exit;
}
include ("konek.php"); 
            $halaman=3;
            $result = mysqli_query($db, "SELECT * FROM covid");
            $jumlahcovid=mysqli_num_rows($result);
            $jumlahhalaman= ceil($jumlahcovid / $halaman);
            $aktif = (isset($_GET["page"])) ? $_GET["page"] : 1 ;
            $awal = ($halaman * $aktif) - $halaman;



            $sql= "SELECT * FROM covid LIMIT $awal, $halaman";
            $query= mysqli_query($db, $sql);
            $no=1;


        if(isset($_POST["cari"])){
            $keyword=$_POST['keyword'];
            $sql= "SELECT * FROM covid WHERE provinsi LIKE '%$keyword%' OR 
            meninggal LIKE '%$keyword%'
            LIMIT $awal, $halaman";
            $query= mysqli_query($db, $sql);
        }          
        else{
            $sql= "SELECT * FROM covid LIMIT $awal, $halaman";
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
<link rel="stylesheet" type="text/css" href="DataTables/dataTables.bootstrap.css">
<script type="text/javascript" language="javascript" src="DataTables/jquery-3.3.1.min.js"></script>
<script type="text/javascript" language="javascript" src="DataTables/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="DataTables/dataTables.bootstrap.js"></script>
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
  <a href="admin.php">Daftar berita</a>
  <a class="active"  href="covid.php">Data covid</a>
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
   <center>Daftar Covid</center>
   <div class="row justify-content-center mt-5">
   <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="?page=<?= $aktif - 1; ?>">Previous</a></li>
    <li class="page-item"><a class="page-link" href="?page=1">1</a></li>
    <li class="page-item"><a class="page-link" href="?page=2">2</a></li>
    <li class="page-item"><a class="page-link" href="?page=3">3</a></li>
    <li class="page-item"><a class="page-link"href="?page=<?= $aktif + 1; ?>">Next</a></li>
  </ul>
  <form action= "" method="POST" class="d-flex">
        <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search"
        autocomplete="off" name="keyword">
        <button class="btn btn-outline-success" type="submit" name="cari">Search</button>
      </form>
   <nav>
    <a href="formcovid.php">Tambah Data Baru [ + ]</a>
    </nav>
    <br>

    <div class="table-responsive ">
        <table id="table-datables " class="table table-paginate" border="1">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Provinsi</th>
                    <th>Meninggal</th>
                    <th>Dirawat</th>
                    <th>Sembuh</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
            <?php

            

            while($member= mysqli_fetch_array($query)){
                echo "<tr>";

                echo "<td>".$no++. "</td>";
                echo "<td>".$member['provinsi']."</td>";
                echo "<td>".$member['meninggal']."</td>";
                echo "<td>".$member['perawatan']."</td>";
                echo "<td>".$member['sembuh']."</td>";

                echo "<td>";
                echo "<a href='form-edit.php?id=".$member['id']."'>edit</a> | ";
                echo '<a href="hapus.php?id='.$member['id'].'" onclick="return confirm(\'yakin ingin menghapus?\')". >hapus</a> |';
                echo "</td>";
                echo "</tr>";

            }
            ?>

            </tbody>
        </table>
    
    
    </div>
            <p>Total : <?php echo mysqli_num_rows($query) ?></p>
    </div>
            </div>
        </div>
    
</section>
</div>
<script src="bootstrap/js/jquery-3.6.0.min.js"> 
</body>
</html>
