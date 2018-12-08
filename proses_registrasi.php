<?php 
include "koneksi.php"; 
if (isset($_POST['register'])) {
	$name = $_POST['firstName'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirmPassword = $_POST['confirmPassword'];

	if(strlen($password) >= 5 && strlen($password) <= 15)
	{
		if($confirmPassword == $password)
		{
			$query = mysqli_query($konek, "INSERT INTO user (nama, username, password, level) VALUES ('$name', '$username', '$password', '1')");
			header("Location: login.php");
		}
		else
		{
			echo "<script>alert('konfirmasi password keliru jon');document.location.href = 'register.php';</script>";
		}
	}
	else
	{
		echo "<script>alert('Password harus  minimal 5 karakter ');document.location.href = 'register.php';</script>";
	}
} 
else {
	echo "<script>alert('Pendaftaran $nama gagal.');document.location.href = 'register.php';</script>";
}
?>
<!-- 
	// if (strlen($username1) > 10){// mengecek form tidak boleh lebih dari 10 
	// 	echo "<script>alert('username tidak boleh lebih dari 10 karakter');document.location.href = 'login.php';</script>";
	// }
	// else {
	// 	if (strlen($password1) > 25 || strlen($konfirmasi_password) < 6){//password harus 6-25 karakter
	// 		echo "<script>alert('Password harus antara 6-25 karakter');document.location.href = 'login.php';</script>";
	// 	}
	// 	else {
	// 		if ($password1 == $konfirmasi_password){//untuk mengecek apakah form password dan form konfirmasi password sudah sama
	// 			$sql_get = mysqli_query ("SELECT * FROM user WHERE username = '$username1'");
	// 			$num_row = mysqli_num_rows($sql_get);
	// 			if ($num_row == 0) {//fungsi script ini adalah untuk mengecek ketersediaan username, jika tidak tersedia maka program akan berjalan
	// 				$password1 = md5($password1);
	// 				$level = 2;
	// 				$sql_insert = mysqli_query("INSERT INTO user (nama, username, password, level) VALUES ('$nama', '$username1','$password1','$level')");
	// 				echo "<script>alert('Pendaftaran $nama berhasil. Silahkan Login');document.location.href = 'login.php';</script>";
	// 			}
	// 			else {
	// 				echo "<script>alert('Username yang kamu masukan sudah terdaftar');document.location.href = 'login.php';</script>";
	// 			}
	// 		}
	// 		else {
	// 			echo "<script>alert('Password yang kamu masukan tidak sama!');document.location.href = 'login.php';</script>";
	// 		}
	// 	}
	// } -->