<?php
include "db_connect.php";

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
	header("Location: home.php");
	exit();
}
?>
<!DOCTYPE html>
<html>

<head>
	<style>
		.img-logo {
			max-height: 160px;
			margin-bottom: 20px;
		}
	</style>

	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="stylel.css">

</head>

<body>
	<form action="login.php" method="post">
		<center>
			<img src="../kabmadina.jpg" alt="Logo Aplikasi" class="img-logo">
			<h4 class="h4 text-gray-900">LOGIN SI ADMINISTRASI DESA PADANG BULAN</h4>
		</center>

		<?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
		<label>Username</label>
		<input type="text" name="uname" placeholder="Username"><br>

		<label>Password</label>
		<input type="password" name="password" placeholder="Password"><br>

		<button type="submit">Login</button>
	</form>
</body>

</html>