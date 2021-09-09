<?php

$server = "localhost";
$user = "root";
$password = "";
$database="berita";

$db = mysqli_connect($server, $user, $password, $database);

if(!$db){
    die("Gagal Menyambung : ". mysqli_connect_error());
}
function regis($data){
	global $db;
	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($db, $data["password"]);
	$password2 = mysqli_real_escape_string($db, $data["password2"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($db, "SELECT username FROM tabel_daftar WHERE username = '$username'");
	if(mysqli_fetch_assoc($result)){
		echo "<script>
			alert('Username sudah terdaftar!')
			</script>";
		return false;
	}

	// cek konfirmasi password
	if($password !== $password2) {
		echo "<script>
				alert('Konfirmasi password tidak sesuai!')
				</script>";
		return false;
	}

	// enskripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan userbaru ke database
	mysqli_query($db,"INSERT iNTO tabel_daftar VALUES('', '$username', '$password')");

	return mysqli_affected_rows($db);
}


?>