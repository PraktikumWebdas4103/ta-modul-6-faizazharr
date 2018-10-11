<?php
include_once "connect.php";
?>
<!DOCTYPE html>
<html>
<body>
	<?php 
	session_start();
	$nim = $_SESSION['nim']; ?>
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
		<br><br>
		<table>
			<?php
			$query = mysqli_query($conn,"SELECT * FROM `users` WHERE `nim` = '$nim'");
			while ($d = mysqli_fetch_array($query)) {
			?>
			
			<tr>
				<td>nama</td>
				<td>:</td>
				<td><?php echo $d[0]; ?></td>
			</tr>
			<tr>
				<td>nim</td>
				<td>:</td>
				<td><?php echo $d[1]; ?></td>
			</tr>
			<tr>
				<td>kelas</td>
				<td>:</td>
				<td><?php echo $d[3]; ?></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td><?php echo $d[4]; ?></td>
			</tr>
			<tr>
				<td>Hobi</td>
				<td>:</td>
				<td><?php echo $d[5]; ?></td>
			</tr>
			<tr>
				<td>Fakultas</td>
				<td>:</td>
				<td><?php echo $d[6]; ?></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><?php echo $d[7]; ?></td>
			</tr>
			<tr>
				<td><a href="kelola.php">Kembali</a></td>
			</tr>
			<?php } ?>
	</table>
</body>
</html>