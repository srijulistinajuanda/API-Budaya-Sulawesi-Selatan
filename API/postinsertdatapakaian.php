<?php

	//header hasil berbentuk json
	header("Content-Type:application/json");
	// tangkap metode
	$method = $_SERVER['REQUEST_METHOD'];
	// variable hasil
	$result = array();
	//cek metode
	if($method== 'POST'){

		// pengecekan parameter
		if(isset($_POST['nama_pakaian']) AND isset($_POST['kota_asal']) AND isset($_POST['deskripsi'])){

			//tangkap parameter
			$nama_pakaian= $_POST['nama_pakaian'];
			$kota_asal= $_POST['kota_asal'];
			$deskripsi= $_POST['deskripsi'];

			
			// jika metode sesuai
			$result['status'] = [
				"code" => 200,
				"decription" => '1 data  berhasil dimasukkan'
			];

			// Start : koneksi database
			$servername = "localhost";
			$username = "root";
			$password ="";
			$dbname = "budayakita";
			//buat koneksi
			$conn = new mysqli($servername, $username, $password, $dbname);
			// End 	: koneksi database

			//buat query
			$sql = "INSERT INTO pakaian (nama_pakaian, kota_asal, deskripsi) VALUES ('$nama_pakaian', '$kota_asal', '$deskripsi')";
			//eksekusi query
			$conn->query($sql);
			// masukkan ke array result
			$result['results'] = [
				"nama_pakaian" => $nama_pakaian,
				"kota_asal" => $kota_asal,
				"deskripsi"=>$deskripsi
			];
			
			}else{
				$result['status'] = [
					"code" => 400,
					"decription" => 'Parameter InValid'
				];
			}
	}else{
		
		$result['status'] = [
			"code" => 400,
			"decription" => 'Method Not Valid'
		];
	}

	//tampilkan data dalam format json
	echo json_encode($result)
?>