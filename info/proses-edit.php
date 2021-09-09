<?php

include("../konek.php");
if(isset($_POST['simpan'])){

    $id= $_POST['id'];
    $tanggal = $_POST['tanggal'];
    $judul= $_POST['judul'];
    $isi= $_POST['isi'];
    

    $sql= "UPDATE info SET tanggal='$tanggal', judul='$judul', isi='$isi' WHERE id=$id";
    $query= mysqli_query($db, $sql);

    if($query){
        echo"<script>alert('Data Berhasil Disimpan');
        window.location='../admin.php';</script>";
    } else {
        die('gagal');
    }

}else{
    die("akses dilarang");
}




?>