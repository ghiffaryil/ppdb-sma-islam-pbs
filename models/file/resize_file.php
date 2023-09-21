<?php

class a_resize_file {
	public function resize_file($folder_awal, $nama_file_awal, $folder_baru, $nama_file_baru, $panjang_file ,$tinggi_file){
		$array_keterangan_error = array();

		$informasi_file = explode(".", $nama_file_awal);
		$tipe_file = strtolower(end($informasi_file));

		if(($tipe_file <> "jpg") AND ($tipe_file <> "jpeg") AND ($tipe_file <> "png")){
			$array_keterangan_error[] = "Tipe File Yang Hanya Bisa di Resize Adalah : jpg, jpeg dan png";
			if(!empty($array_keterangan_error)){
				$result['Keterangan_Error'] = $array_keterangan_error;
			}
			$result['Status'] = "Gagal";
			return $result;
		}
		
		$folder_file_lama = $folder_awal.$nama_file_awal;
		$folder_file_baru = $folder_baru.$nama_file_baru;

		list( $panjang, $tinggi ) = getimagesize($folder_file_lama);
		$kualitas_panjang = $panjang / $panjang_file;
		$new_panjang = $panjang / $kualitas_panjang;
		$kualitas_tinggi = $tinggi / $tinggi_file;			
		$new_tinggi = $tinggi / $kualitas_tinggi;
		$thumb = imagecreatetruecolor($new_panjang, $new_tinggi);

		if($tipe_file == "png"){
			$source = imagecreatefrompng($folder_file_lama);
		}elseif(($tipe_file == "jpg") OR ($tipe_file == "jpeg")){
			$source = imagecreatefromjpeg($folder_file_lama);
		}

		imagecopyresized($thumb, $source, 0, 0, 0, 0, $new_panjang, $new_tinggi, $panjang, $tinggi);
		if($tipe_file == "png"){
			imagepng($thumb, $folder_file_baru.".".$tipe_file);
		}elseif(($tipe_file == "jpg") OR ($tipe_file == "jpeg")){
			imagejpeg($thumb, $folder_file_baru.".".$tipe_file);
		}
		imagedestroy($thumb);
		imagedestroy($source);

		if (file_exists($folder_baru.$nama_file_baru.".".$tipe_file)) {
			$result['Status'] = "Berhasil";
		}else{
			$result['Status'] = "Gagal";
			$array_keterangan_error[] = "Gagal Pada Saat Resize File";
		}

		if(!empty($array_keterangan_error)){
			$result['Keterangan_Error'] = $array_keterangan_error;
		}


		return $result;
	}
}
?>