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
		if(isset($_PUT['nama_pakaian']) AND isset($_PUT['kota_asal']) AND isset($_PUT['deskripsi']) AND isset($_PUT['id_pakaian'])){

			//tangkap parameter
			$nama_pakaian= $_PUT['nama_pakaian'];
			$kota_asal = $_PUT['kota_asal'];
			$deskripsi= $_PUT['deskripsi'];
			$id_pakaian= $_PUT['id_pakaian'];

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
			$sql = "UPDATE pakaian SET nama_pakaian='$nama_pakaian', kota_asal='$kota_asal' WHERE id_pakaian='$id_pakaian'";

			//eksekusi query
			$conn->query($sql);
			// masukkan ke array result
			$result['results'] = [
				"nama_pakaian" => $nama_pakaian,
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