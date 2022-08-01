<?php
	
	//header hasil berbentuk json
	header("Content-Type:application/json");
	// tangkap metode
	$method = $_SERVER['REQUEST_METHOD'];
	// variable hasil
	$result = array();
	//cek metode
	if($method== 'DELETE'){

		parse_str(file_get_contents("php://input"), $_DELETE);
		//echo $_DELETE['nama'];
		// pengecekan parameter
		if(isset($_DELETE['id_makanan'])){

			//tangkap parameter
			$id_makanan= $_DELETE['id_makanan'];

			// jika metode sesuai
			$result['status'] = [
				"code" => 200,
				"decription" => '1 data dihapus'
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
			$sql = "DELETE FROM makanan WHERE id_makanan='$id_makanan'";

			//eksekusi query
			$conn->query($sql);
			// masukkan ke array result
			$result['results'] = [
				"id_makanan" => $id_makanan
			];
			
			}else{
				$result['status'] = [
					"code" => 300,
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