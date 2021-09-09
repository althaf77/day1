<?php
session_start();
include("konek.php");
if(isset($_COOKIE['login'])){
    if($_COOKIE['login'] == 'true'){
        $_SESSION['login'] = true ;
    }
}

if(isset($_SESSION["login"])){
    header("Location: admin.php");
    exit;
}
if(isset($_POST["regis"])){
    header("Location: reg.php");
}

if(isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($db, "SELECT * FROM tabel_daftar WHERE username = '$username'");

    // cek username
    if(mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])){

            if(isset($_POST['ingat'])){
                setcookie('login','true',time() + 60);
            }
            echo"<script>alert('Login berhasil');
            window.location='admin.php';</script>";
        }
    }
    $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="log.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>Form Login Admin</title>
</head>
<body>
    <div class="login-box">
		<img src="gambar/avatar.jpg" class="avatar">

			<?php if (isset($error)) : ?>
				<p style="color: red; font-style: italic;">Username / Password salah</p>
			<?php endif; ?>

			<form action="" method="post">
				<p>Username</p>
				<input type="text" name="username" id="username" placeholder="Enter Username">
				<p>Password</p>
				<input type="password" name="password" id="password" placeholder="Enter Password">
                <div class="form-check">
                <input name="ingat" style=width:15px; class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Remember Me
                </label>
</div>

				<p><button type="submit" name="login">Masuk</button></p>
				<p><button type="submit" name="regis">Daftar</button></p>
			</form>
	</div>
</body>
</html>