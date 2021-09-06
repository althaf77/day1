<?php 

include("konek.php");

if(isset($_GET['id'])){

    $id=$_GET['id'];

    $sql= "DELETE FROM covid WHERE id=$id";
    $query=mysqli_query($db, $sql);

    if($query){
        echo"<script>alert('Data Berhasil Dihapus');
        window.location='berita.php';</script>";
    }else{
        die("data tidak ada");
    }
}else{
    ("akses ditolak");
}

?>