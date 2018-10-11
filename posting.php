<?php include("connect.php") ?>
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
<form method="post" enctype="multipart/form-data">
    <p>FOTO:</p>
    <input type="file" name="Filename"> 
    <p>Description</p>
    <textarea rows="20" cols="80" name="postingan"></textarea>
    <br/>
    <input TYPE="submit" name="upload" value="posting"/>
</form>
<?php 
	session_start();
	if (isset($_POST['upload'])) {
		$nim = $_SESSION['nim'];
		
		$target = "foto";
		$target = $target . basename( $_FILES['Filename']['name']);
		
		$Filename = $_POST['Filename'];
		$postingan = $_POST['postingan'];
		$post = count(explode(" ", $postingan));
		$pic=($_FILES['Filename']['name']);
		if ($post < 30) {
			echo "kolom deskripsi harus lebih dari 30 kata";
		}else{
			mysqli_query($conn,"INSERT INTO posting (nim,foto,post)
			VALUES ('$nim','$Filename', '$postingan')") ;
		}
		if(move_uploaded_file($_FILES['Filename']['tmp_name'], $target)) {
		    echo "The file ". basename( $_FILES['uploadedfile']['Filename']). " has been uploaded, and your information has been added to the directory<br>";
		    echo "<a href='halamanawal.php'></a> to move to HOME";
		} else {
		    echo "Sorry, there was a problem uploading your file.";
		}
	}
?>