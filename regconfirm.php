<?php
	if(isset($_POST['msgb'])){
		$cuser = $_POST['cuser'];
		$cpass = $_POST['cpass'];
		
		$apikey = md5($cuser.$cpass.$cuser);
		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "budayakita";
		$conn = new mysqli($servername, $username, $password, $dbname);
		
		$useraddquery = "INSERT INTO user(username, password, key_token) VALUES ('$cuser', '$cpass', '$apikey')";
		$conn->query($useraddquery);
		
		header("Location: login");
	}else{
		echo '<script>alert("FATAL ERROR! You are not supposed to be here. Go anywhere else!")</script>';
		echo "<script>location.href = 'http://localhost/project';</script>";
	}
?>