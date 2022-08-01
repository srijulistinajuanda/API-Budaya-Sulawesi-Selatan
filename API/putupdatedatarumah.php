<?php

	//header hasil berbentuk json
	header("Content-Type:application/json");
	// tangkap metode
	$method = $_SERVER['REQUEST_METHOD'];
	// variable hasil
	$result = array();
	//cek metode
	if($method== 'PUT'){

		//var _dump(file_get_contents("php://input"));
		parse_str(file_get_contents("php://input"), $_PUT);
		//var_dump($_PUT);
		//echo $_PUT['nama'];

		// pengecekan parameter
		if(isset($_PUT['nama_rumah']) AND isset($_PUT['kota_asal']) AND isset($_PUT['deskripsi']) AND isset($_PUT['id_rumah'])){

			//tangkap parameter
			$nama_rumah= $_PUT['nama_rumah'];
			$kota_asal = $_PUT['kota_asal'];
			$deskripsi= $_PUT['deskripsi'];
			$id_rumah= $_PUT['id_rumah'];

			// jika metode sesuai
			$result['status'] = [
				"code" => 200,
				"decription" => '1 data diupdate'
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
			$sql = "UPDATE rumah SET nama_rumah='$nama_rumah', kota_asal='$kota_asal' WHERE id_rumah='$id_rumah'";

			//eksekusi query
			$conn->query($sql);
			// masukkan ke array result
			$result['results'] = [
				"nama_rumah" => $nama_rumah,
				"kota_asal" => $kota_asal
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