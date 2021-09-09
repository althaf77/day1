<?php 
include('../konek.php');


if(isset($_GET['id'])) 
{
    $result = mysqli_query($db,"SELECT * FROM info WHERE id='".$_GET['id']."'");
    $member = mysqli_fetch_array($result);
    header("Content-type: " . $member["tipe_gambar"]);
    echo $member["gambar"];
}
else{
    echo 'gagal';
}

?>