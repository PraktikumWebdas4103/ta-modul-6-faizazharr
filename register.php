<?php
	$errornim="";
	$errornama="";
	$errorkelas="";
	$errorjk="";
	$errorpass="";
	$errorrepass="";
	$errorhobi="";
	$errorfakultas="";
	$erroralamat="";
	
	if (isset($_POST['regis'])) {
		$nama = $_POST['nama'];
		$nim = $_POST['nim'];
		$kelas = $_POST['kelas'];
		$jk = $_POST['jk'];
		$password = $_POST['password'];
		$repass = $_POST['repass'];
		$hobi = $_POST['hobi'];
		$fakultas = $_POST['fakultas'];
		$alamat = $_POST['alamat'];

		$n = strlen($nim);
		$m = strlen($nama);

		if ($n != 10 || $m>25 || is_null($jk)|| is_null($nama)|| is_null($nim)|| is_null($password)|| is_null($repass) || is_null($fakultas) || is_null($hobi) || is_null($alamat)) {
				
				if ($n != 10 || !is_numeric($nim)) {
					$errornim = "Maaf Nim Harus 10 digit dan berbentuk angka";
				}if ($m > 25 || !preg_match('/^[a-z][A-Z]*$/', $nama)) {
					$errornama = "Maaf panjang nama harus kurang dari 25 karakter dan berupa huruf dan angka";
				}if (is_null($kelas)) {
					$errorkelas = "Form kelas harus terisi";
				}if (is_null($jk)) {
					$errorjk = "Form jenis kelamin harus terisi";
				}if (is_null($password) || $password !=$repass) {
					$errorpass = "KETIK ULANG PASSWORD";
				}if (is_null($repass)) {
					$errorrepass = "KETIK ULANG PASSWORD";
				}if (is_null($fakultas)) {
					$errorfakultas = "Form Fakultas harus terisi";
				}if (is_null($hobi)) {
					$errorhobi = "Form Hobi harus terisi";
				}if (is_null($alamat)) {
					$erroralamat = "Form Alamat harus terisi";
				}
		}else{
			$password = md5($password);
			session_start();
			$_SESSION['nim'] =$nim;
			$_SESSION['nama'] =$nama;
			$_SESSION['password'] =$password;
			$_SESSION['kelas'] =$kelas;
			$_SESSION['jk'] =$jk;
			$_SESSION['fakultas'] =$fakultas;
			$_SESSION['hobi'] =$hobi;
			$_SESSION['alamat'] =$alamat;
			header("location: regisproses.php");
		}
	}
?>
<table>
	<form method="POST">
		<tr>
			<td>
				NAMA
			</td>
			<td>:</td>
			<td>
				<input type="text" name="nama">
			</td>
			<td>
				<span style="color: blue"><?php echo $errornama; ?></span>
			</td>
		</tr>
		<tr>
			<td>
				NIM
			</td>
			<td>:</td>
			<td>
				<input type="number" name="nim">
			</td>
			<td>
				<span style="color: blue"><?php echo $errornim; ?></span>
			</td>
		</tr>
		<tr>
			<td>
				PASSWORD
			</td>
			<td>:</td>
			<td>
				<input type="text" name="password">
			</td>
			<td>
				<span style="color: blue"><?php echo $errorpass; ?></span>
			</td>
		</tr>
		<tr>
			<td>
				RE-PASSWORD
			</td>
			<td>:</td>
			<td>
				<input type="text" name="repass">
			</td>
			<td>
				<span style="color: blue"><?php echo $errorrepass; ?></span>
			</td>
		</tr>
		<tr>
			<td>
				KELAS
			</td>
			<td>:</td>
			<td>D3MI-41-01 <input type="radio" name="kelas" value="D3MI-41-01"></td>
			<td>
				<span style="color: blue"><?php echo $errorkelas; ?></span>
			</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>D3MI-41-02 <input type="radio" name="kelas" value="D3MI-41-02"></td>
		</tr>
		<tr>
			<td>
				Jenis Kelamin
			</td>
			<td>:</td>
			<td>LAKI-LAKI <input type="radio" name="jk" value="LAKI-LAKI">
			</td>
			<td>
				<span style="color: blue"><?php echo $errorjk; ?></span>
			</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>PEREMPUAN <input type="radio" name="jk" value="PEREMPUAN">
			</td>
		</tr>
		<tr>
			<td>
				HOBI
			</td>
			<td>:</td>
				<td><input type="checkbox" name="hobi" value="Desain" >Desain</td>
			<td>
				<span style="color: blue"><?php echo $errorhobi; ?></span>
			</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><input type="checkbox" name="hobi" value="Sepak" >Sepak</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><input type="checkbox" name="hobi" value="Ngisi" >Ngisi</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><input type="checkbox" name="hobi" value="Makan" >Makan</td>
		</tr>
		<tr>
			<td>
				FAKULTAS
			</td>
			<td>:</td>
			<td>
				<select name="fakultas">
					<option value="Fakultas Ilmu Terapan" required="">Fakultas Ilmu Terapan</option>
				</select>
			</td>
			<td>
				<span style="color: blue"><?php echo $errorfakultas; ?></span>
			</td>
		</tr>
		<tr>
			<td>
				ALAMAT
			</td>
			<td>
				:
			</td>
			<td>
				<textarea name="alamat"></textarea>
			</td>
			<td>
				<span style="color: blue"><?php echo $erroralamat; ?></span>
			</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>
				<input type="submit" name="regis" value="regis">
			</td>
		</tr>
	</form>
</table>