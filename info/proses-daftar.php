<?php

include("../konek.php");

if(isset($_POST['daftar'])){
    //ambil data di database
    $tanggal = $_POST['tanggal'];
            $judul= $_POST['judul'];
            $isi= $_POST['isi'];
    $result = mysqli_query($db, "SELECT judul FROM info WHERE judul = '$judul'");
	if(mysqli_fetch_assoc($result)){
        echo"<script>alert('Judul Berita sudah ada');
        window.location='form.php';</script>";
		return false;
	}

    if(!isset($_FILES['gambar']['tmp_name'])){
        echo '<span style="color:red"><b><u><i>Pilih file gambar</i></u></b></span>';
    }
    else
    {
        $file_name = $_FILES['gambar']['name'];
        $file_size = $_FILES['gambar']['size'];
        $file_type = $_FILES['gambar']['type'];
        $tmp_name = $_FILES['gambar']['tmp_name'];
        if ($file_size < 2048000 and ($file_type =='image/jpeg' or $file_type == 'image/png'))
        {
            $image   = addslashes(file_get_contents($_FILES['gambar']['tmp_name']));
            move_uploaded_file($tmp_name, 'uploads/'. $file_name);
            
            
            $sql = "INSERT INTO info (tanggal, judul, isi, gambar, tipe_gambar)
            VALUE ('$tanggal', '$judul', '$isi', '$image', '$file_name')";
            $query = mysqli_query($db, $sql);
            echo"<script>alert('Data Berhasil Disimpan');
        window.location='../admin.php';</script>";
        }
        else
        {
            echo '<span style="color:red"><b><u><i>Ukuruan File / Tipe File Tidak Sesuai</i></u></b></span>';
        }
    }

}else{
    die("Akses Ditolak");
}


?>