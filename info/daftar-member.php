<?php 
include("../konek.php");
?>

<html>
<head>
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <center>Daftar berita</center>
    <div class="row justify-content-center mt-5">
    <nav>
    <center><a class="btn btn-info" data-bs-toggle="offcanvas" href="form.php" role="button" aria-controls="offcanvasExample">
    Tambah Member Baru [ + ]
                  </a><center>
    </nav>
    <br>

            <?php
            $sql= "SELECT * FROM info";
            $query= mysqli_query($db, $sql);
            $no=1;

            while($member= mysqli_fetch_array($query)){
                
                echo '
                <div class="card-group">
                <div class="card">
                <div class="card-body">
                  <h5 class="card-title">'.$member['judul'].'</h5>
                  <p class="card-text">'.$member['isi'].'</p>
                  <p class="card-text"><small class="text-muted">Last updated '.$member['tanggal'].'</small></p>
                  <a class="btn btn-success" data-bs-toggle="offcanvas" href="form-edit.php?id='.$member['id'].'" role="button" aria-controls="offcanvasExample">
                  Edit
                  </a>
                  <a class="btn btn-danger" data-bs-toggle="offcanvas" href="hapus.php?id='.$member['id'].'" onclick="return confirm(\'yakin ingin menghapus?\')". role="button" aria-controls="offcanvasExample">
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
    
    </div>
</body>
</html>