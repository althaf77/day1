<?php

include("konek.php");

if(isset($_POST['daftar'])){
    //ambil data di database
    $provinsi = $_POST['provinsi'];
    $meninggal= $_POST['meninggal'];
    $perawatan= $_POST['perawatan'];
    $sembuh= $_POST['sembuh'];


    $sql = "INSERT INTO covid (provinsi, meninggal, perawatan, sembuh)
                VALUE ('$provinsi', '$meninggal', '$perawatan', '$sembuh')";
    $query = mysqli_query($db, $sql);

    if($query){
        echo"<script>alert('Data Berhasil Disimpan');
        window.location='berita.php';</script>";
    }else{
        header('Location: index.php/status=gagal');
    }
}else{
    die("Akses Ditolak");
}


?>