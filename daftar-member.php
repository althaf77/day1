<?php 
include("konek.php");
?>

<html>
<head>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <center>Daftar member</center>
    <div class="row justify-content-center mt-5">
    <nav>
    <a href="form.php">Tambah Member Baru [ + ]</a>
    </nav>
    <br>

    <div class="table-responsive">
        <table id="table-datables" class="table" border="1">
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
            $sql= "SELECT * FROM covid";
            $query= mysqli_query($db, $sql);
            $no=1;

            while($member= mysqli_fetch_array($query)){
                echo "<tr>";

                echo "<td>".$no++. "</td>";
                echo "<td>".$member['provinsi']."</td>";
                echo "<td>".$member['meninggal']."</td>";
                echo "<td>".$member['perawatan']."</td>";
                echo "<td>".$member['sembuh']."</td>";

                echo "<td>";
                echo "<a href='form-edit.php?id=".$member['id']."'>edit</a> | ";
                echo "<a href='hapus.php?id=".$member['id']."'>hapus</a> | ";
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
</body>
</html>