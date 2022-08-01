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
		if(isset($_POST['nama_rumah']) AND isset($_POST['kota_asal']) AND isset($_POST['deskripsi'])){

			//tangkap parameter
			$nama_rumah = $_POST['nama_rumah'];
			$kota_asal= $_POST['kota_asal'];
			$deskripsi= $_POST['deskripsi'];

			//tangkap foto
			$foto_tmp = $_FILES['foto']['tmp_name'];
			$nama_foto = $_FILES['foto']['name'];

			//pindahkan dri tmp lokasi ke lokasi permanen
			move_uploaded_file($foto_tmp, 'foto/'.$nama_foto); 

			// jika metode sesuai
			$result['status'] = [
				"code" => 200,
				"decription" => '1 data dimasukkan'
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
			$sql = "INSERT INTO rumah(nama_rumah, kota_asal, foto, deskripsi) VALUES ('$nama_rumah', '$kota_asal', '$nama_foto','$deskripsi')";
			//eksekusi query
			$conn->query($sql);
			// masukkan ke array result
			$result['results'] = [
				"nama_rumah" => $nama_rumah,
				"kota_asal" => $kota_asal,
				"deskripsi" =>$deskripsi
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