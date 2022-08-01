<?php

	$key = $_GET['key'];

	//koneksi database
	$servername = "localhost";
	$username = "root";
	$password ="";
	$dbname = "budayakita";

	// buat koneksi
	$conn = new mysqli($servername, $username, $password, $dbname);

	// cek user
	$sql = "SELECT * FROM user WHERE key_token='$key'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		echo " key/token valid";
	}else{
		echo " key/token not valid";
	}

?>