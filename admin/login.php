<?php

include "db_connect.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("location: index.php?error=Username is required");
		exit();
	}else if(empty($pass)){
		header("location: index.php?error=Password is required");
		exit();
	}else{
		$sql = "SELECT * FROM tb_admin WHERE username='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
			if ($row['username'] === $uname && $row['password'] === $pass) {
				$_SESSION['username'] = $row['username'];
				$_SESSION['id'] = $row['id'];
				header("location: home.php");
				exit();
			}else {
				header("location: index.php?error=Incorect Username or Password");
				exit();
			}		
		}else{
			header("location: index.php?error=Incorect Username or Password");
			exit();
		}
	}

}else{
	header("location: index.php");
	exit();
}
