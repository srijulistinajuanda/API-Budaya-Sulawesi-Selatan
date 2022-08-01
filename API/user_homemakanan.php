<?php
	
	session_start();

	if(isset($_POST['submit'])){
		//tangkap data
		$uname = $_POST['uname'];
		$pwd = $_POST['pwd'];

		//koneksi database
		$servername = "localhost";
		$username = "root";
		$password ="";
		$dbname = "budayakita";

		// buat koneksi
		$conn = new mysqli($servername, $username, $password, $dbname);

		// cek user
		$sql = "SELECT * FROM user WHERE username='$uname' AND password='$pwd'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$_SESSION['uname']=$uname;
			$_SESSION['pwd']=$pwd;
		}else{
			echo " login salah";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Generate Api Key / Token </title>
</head>
<body>
	Selamat datang <?php echo $_SESSION['uname']; ?>

	<form action="user_generate_keymakanan.php" method="post">
		<input type="hidden" name="uname" value="<?php echo $_SESSION['uname']; ?>">
		<input type="hidden" name="pwd" value="<?php echo $_SESSION['pwd']; ?>">

		<input type="submit" name="submit" value="Generate Key/Token">
	</form>		
</body>
</html>