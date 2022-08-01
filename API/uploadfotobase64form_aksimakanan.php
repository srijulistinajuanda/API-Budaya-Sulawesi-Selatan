<?php

	if(isset($_FILES['foto'])){

		//data biasa
		$nama_makanan = $_POST['nama_makanan'];
		$kota_asal = $_POST['kota_asal'];
		$deskripsi= $_POST['deskripsi'];

		//data gambar
		$file_name = $_FILES['foto']['name'];
		$file_tmp = $_FILES['foto']['tmp_name'];

		// inisialisasi data gambar
		$data_gambar = file_get_contents($file_tmp);
		$data_parts = pathinfo($file_name);
		$data_extension = $data_parts['extension'];

		// ubah gambar ke string
		$gambar_base64 = base64_encode($data_gambar);

		// var_dump($gambar_base64);die;

		$inputPost = array(
			'nama_makanan' => $nama_makanan,
			'kota_asal' => $kota_asal,
			'deskripsi'=>$deskripsi,
			'stringfoto' => $gambar_base64,
			'extfoto' => $data_extension
		);

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://localhost/projectuas/uploadfotobase64makanan.php", 
			CURLOPT_RETURNTRANSFER => true , 
			CURLOPT_TIMEOUT => 30, 
			CURLOPT_POST => true, 
			CURLOPT_POSTFIELDS => $inputPost, 
		));


		// eksekusi curl
		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if($err){
			echo $err;
		}else{
			echo $response;
		}

	}
?>