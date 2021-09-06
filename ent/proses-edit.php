<?php

include("konek.php");
if(isset($_POST['simpan'])){

    $id= $_POST['id'];
    $provinsi = $_POST['provinsi'];
    $meninggal= $_POST['meninggal'];
    $perawatan= $_POST['perawatan'];
    $sembuh= $_POST['sembuh'];
    

    $sql= "UPDATE covid SET provinsi='$provinsi', meninggal='$meninggal', perawatan='$perawatan',
    sembuh='$sembuh' WHERE id=$id";
    $query= mysqli_query($db, $sql);

    if($query){
        echo"<script>alert('Data Berhasil Diubah');
        window.location='berita.php';</script>";
    } else {
        die('gagal');
    }

}else{
    die("akses dilarang");
}




?>