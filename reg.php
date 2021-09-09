<?php include("konek.php");
if(isset($_POST["daftar"])) {

if(regis($_POST) > 0) {
    echo "<script>
            alert('User baru berhasil ditambahkan!')
            document.location='log.php';
            </script>";
} else {
    echo mysqli_error($db);
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reg.css">
    <title>Form Registrasi</title>
</head>
<body>
    <div class="regis-box">
		<img src="gambar/avatar.jpg" class="avatar">
			<form action="" method="POST">
				<p>Username</p>
				<input type="text" name="username" id="username" placeholder="Enter Username">
				<p>Password</p>
				<input type="password" name="password" id="password" placeholder="Enter Password">
				<p>Konfirmasi Password</p>
				<input type="password" name="password2" id="password2" placeholder="Enter Konfirmasi Password">
				<button type="submit" name="daftar">Daftar</button>
			</form>
	</div>
</body>
</html>