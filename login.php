<?php include("connect.php"); ?>
<table>
	<form method="POST">
		<tr>
			<td>
				NIM
			</td>
			<td>
				<input type="text" name="nim" placeholder="masukan NIM">
			</td>
		</tr>
		<tr>
			<td>
				PASSWORD
			</td>
			<td>
				<input type="text" name="pass" placeholder="masukan password">
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="login" value="login">
			</td>
			<td>
				<a href="register.php">klik</a> untuk mendaftar
			</td>
		</tr>
	</form>
</table>
<?php 
session_start();
if (isset($_POST['login'])) {
	$nim = $_POST['nim'];
	$password = $_POST['pass'];
	$password = md5($password);

	$query = "SELECT * FROM `users` WHERE nim ='$nim' AND password = '$password'";
	
	$result = mysqli_query($conn, $query);

	if (mysqli_num_rows($result) > 0) {
		$_SESSION['nim'] = $nim;
		header("location: halamanawal.php");
	}else{
		echo "Anda salah ketik atau account anda belum terdaftar";
	}
}
?>