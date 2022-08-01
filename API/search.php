<?php

	//header hasil berbentuk json
	header("Content-Type:application/json");
	
	$header = apache_request_headers();
	$key = $header['key'];
	// tangkap metode
	$method = $_SERVER['REQUEST_METHOD'];
	// variable hasil
	$result = array();
	//cek metode
	if($method== 'GET'){

		// pengecekan parameter
		if(isset($_GET['q'])){
			//tangkap parameter
			$q = $_GET['q'];
			$cat = $_GET['cat'];

			// jika metode sesuai
			$result['status'] = [
				"code" => 200,
				"decription" => 'Request Valid'
			];

			// Start : koneksi database
			$servername = "localhost";
			$username = "root";
			$password ="";
			$dbname = "budayakita";
			//buat koneksi
			$conn = new mysqli($servername, $username, $password, $dbname);
			// End 	: koneksi database

			$sql = "SELECT * FROM user WHERE key_token='$key'";
			$user = $conn->query($sql);

			if ($user->num_rows > 0) {

				echo $cat;

				//buat query
				if($cat=='makanan'){
					$sql = "SELECT * FROM makanan WHERE nama_makanan LIKE '%$q%'";
				}elseif($cat=='tari'){
					$sql = "SELECT * FROM tari WHERE nama_tari LIKE '%$q%'";
				}elseif($cat=='pakaian') {
					$sql = "SELECT * FROM pakaian WHERE nama_pakaian LIKE '%$q%'";
				}elseif($cat=='rumah'){
					$sql = "SELECT * FROM rumah WHERE nama_rumah LIKE '%$q%'";
				}
				
				//eksekusi query
				$hasil_query = $conn->query($sql);
				// masukkan ke array result
				$result['results'] = $hasil_query->fetch_all(MYSQLI_ASSOC);
				
				}else{
					$result['status'] = [
						"code" => 400,
						"decription" => 'Parameter InValid'
					];
				}
			}else{
			
				$result['status'] = [
					"code" => 400,
					"decription" => 'Request Not Valid'
				];
			}
	}else{
		
		$result['status'] = [
			"code" => 400,
			"decription" => 'Request Not Valid'
		];
	}

	//tampilkan data dalam format json
	echo json_encode($result)
?>