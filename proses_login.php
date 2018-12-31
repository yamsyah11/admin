<?php
session_start();
	include 'koneksi.php';
	$email = $_POST['email'];
	$pass = $_POST['password'];

		if (!empty($email) && !empty($pass))	{
			$sql = "SELECT * FROM user WHERE email = '$email' AND password = '$pass'";
			$query = mysqli_query($konek, $sql);
			if (mysqli_num_rows($query) != 0) {
				$row = mysqli_fetch_assoc ($query);
				$_SESSION['email'] = $email;
				$_SESSION['name'] = $row['name'];
				$_SESSION['photo'] = $row['photo'];
				header("location: ../admin/index.php");
			} else {
				echo "Email Atau Password anda Salah";
			}
		}	else {
			echo "Email atau Password Kosong";
		}
?>