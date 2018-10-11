<?php include("connect.php")?>
<!DOCTYPE html>
<html>
<body>
	<center>
		<table border="1">
			<tr>
				<td>
					<a href="halamanawal.php">HOME</a>
				</td>
				<td>
					<a href="posting.php">posting</a>
				</td>
				<td>
					<a href="daftarpostingan.php">daftar postingan</a>
				</td>
				<td>
					<a href="semuaposting.php">Semua posting</a>
				</td>
				<td>
					<a href="editprofile.php">edit profile</a>
				</td>
				<td>
					<a href="logout.php">logout</a>
				</td>
			</tr>
		</table>
	</center>
	<table>
		<form method="POST">
			<?php
			session_start();
				$nim = $_SESSION['nim'];
				$query = mysqli_query($conn,"SELECT `nama`, `nim`,`kelas`,`jenis_kelamin`,`hobi`,`fakultas`,`alamat` FROM `users` WHERE `nim` = '$nim'");
				while ($d = mysqli_fetch_array($query)) {
				?>
				<tr>
					<td>Nim :</td>
					<td><input type="hidden" name="nim" value="<?php echo $d['nim']; ?>"></td>
				</tr>
				<tr>
					<td>Nama :</td>
					<td><input type="text" name="nama" value="<?php echo $d['nama']; ?>"></td>
				</tr>
				<tr>
					<td>Kelas :</td>
					<td><input type="text" name="kelas" value="<?php echo $d['kelas']; ?>"></td>
				</tr>
				<tr>
					<td>Jenis Kelamin :</td>
					<td><input type="text" name="jk" value="<?php echo $d['jenis_kelamin']; ?>"></td>
				</tr>
				<tr>
					<td>hobi :</td>
					<td><input type="text" name="hobi" value="<?php echo $d['hobi']; ?>"></td>
				</tr>
				<tr>
					<td>fakultas :</td>
					<td><input type="text" name="fakultas" value="<?php echo $d['fakultas']; ?>"></td>
				</tr>
				<tr>
					<td>Alamat :</td>
					<td><input type="text" name="alamat" value="<?php echo $d['alamat']; ?>"></td>
				</tr>
				<tr>
					<td><input type="submit" name="edit" value="Update"></td>
				</tr>
				<?php } ?>
		</form>
	</table>
</body>
</html>
<?php
if (isset($_POST['edit'])) {
	$nim = $_POST['nim'];
	$_SESSION['nim'] = $nim;
	$nama = $_POST['nama'];
	$kelas = $_POST['kelas'];
	$jk = $_POST['jk'];
	$hobi = $_POST['hobi'];
	$fakultas = $_POST['fakultas'];
	$alamat = $_POST['alamat'];
	$query = "UPDATE `users` SET `nama`='$nama',`kelas`='$kelas',`jenis_kelamin`='$jk',`hobi`='$hobi',`fakultas`='$fakultas',`alamat`='$alamat' WHERE `nim` = '$nim'";
	if (mysqli_query($conn,$query)) {
		echo "DATA BERHASIL DI UPDATE <br>";
		echo "<a href='halamanawal.php'>KLIK</a> untuk kembali ke halaman awal";
	} else {
		echo "Error Dalam update Data! <br>";
		echo "<a href='halamanawal.php'>KLIK</a> untuk kembali ke halama nawal";
	}
}
?>