<?php  
include('connect.php');
	session_start();
	$nim = $_SESSION['nim'];
	$nama = $_SESSION['nama'];
	$kelas = $_SESSION['kelas'];
	$password = $_SESSION['password'];
	$jk = $_SESSION['jk'];
	$fakultas = $_SESSION['fakultas'];
	$hobi = $_SESSION['hobi'];
	$alamat = $_SESSION['alamat'];

	$sql = "INSERT INTO users(nama,nim,password,kelas,jenis_kelamin,hobi,fakultas,alamat) VALUES ('$nama','$nim','$password','$kelas','$jk','$hobi','$fakultas','$alamat')";

			if(mysqli_query($conn,$sql)) {
				echo "<center>SELAMAT ANDA TERDAFTAR</center>";
				echo "<a href='login.php'>klik</a> untuk ke halaman login";
			}else{
				echo "Error: ".$sql."<br><br>".$conn->error;
			}
			$conn->close();
			session_destroy();
?>
