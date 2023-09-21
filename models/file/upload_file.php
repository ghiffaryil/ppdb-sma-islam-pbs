<?php

class a_upload_file {
	public function upload_file($post_file, $nama_file = NULL , $folder_penyimpanan = NULL, $format_file = array() ,$maksimum_ukuran_file = 100000000){
		$array_keterangan_error = array();
		$folder_penyimpanan = $folder_penyimpanan;
		$tipe_file = strtolower(pathinfo($folder_penyimpanan . basename($post_file["name"]),PATHINFO_EXTENSION));
		$target_penyimpanan_file = $folder_penyimpanan . $nama_file.".".$tipe_file;
		$status_upload = 1;
		

		if ($post_file["size"] > $maksimum_ukuran_file) {
			$status_upload = 0;
			$array_keterangan_error[] = "File Melebihi Ukuran Maksimum File Yakni : ".($maksimum_ukuran_file/1000000)." MB";
		}

		$list_format_file = "";
		foreach ($format_file as $info_format_file) {
			$list_format_file = $list_format_file.$info_format_file.",";
		}
		if($list_format_file <> ""){
			$list_format_file = substr($list_format_file, 0,-1);
		}

		if (!(in_array($tipe_file, $format_file, TRUE))) {
			$status_upload = 0;
			$array_keterangan_error[] = "Format File Tidak di Izinkan, Format File Yang di Izinkan : ".$list_format_file;
		}

		if ($status_upload == 0) {
			$result['Status'] = "Gagal";
			if(!empty($array_keterangan_error)){
				$result['Keterangan_Error'] = $array_keterangan_error;
			}
		} else {
			if (move_uploaded_file($post_file["tmp_name"], $target_penyimpanan_file)) {
				$result['Status'] = "Sukses";
			} else {
				$result['Status'] = "Gagal";
				if(!empty($array_keterangan_error)){
					$result['Keterangan_Error'] = $array_keterangan_error;
				}
			}
		}

		return $result;
	}

	public function upload_file_index($post_file, $post_index_file = 0, $nama_file = NULL , $folder_penyimpanan = NULL, $format_file = array() ,$maksimum_ukuran_file = 100000000){
		$array_keterangan_error = array();
		$folder_penyimpanan = $folder_penyimpanan;
		$tipe_file = strtolower(pathinfo($folder_penyimpanan . basename($post_file["name"][$post_index_file]),PATHINFO_EXTENSION));
		$target_penyimpanan_file = $folder_penyimpanan . $nama_file.".".$tipe_file;
		$status_upload = 1;
		

		if ($post_file["size"][$post_index_file] > $maksimum_ukuran_file) {
			$status_upload = 0;
			$array_keterangan_error[] = "File Melebihi Ukuran Maksimum File Yakni : ".($maksimum_ukuran_file/1000000)." MB";
		}

		$list_format_file = "";
		foreach ($format_file as $info_format_file) {
			$list_format_file = $list_format_file.$info_format_file.",";
		}
		if($list_format_file <> ""){
			$list_format_file = substr($list_format_file, 0,-1);
		}

		if (!(in_array($tipe_file, $format_file, TRUE))) {
			$status_upload = 0;
			$array_keterangan_error[] = "Format File Tidak di Izinkan, Format File Yang di Izinkan : ".$list_format_file;
		}

		if ($status_upload == 0) {
			$result['Status'] = "Gagal";
			if(!empty($array_keterangan_error)){
				$result['Keterangan_Error'] = $array_keterangan_error;
			}
		} else {
			if (move_uploaded_file($post_file["tmp_name"][$post_index_file], $target_penyimpanan_file)) {
				$result['Status'] = "Sukses";
			} else {
				$result['Status'] = "Gagal";
				if(!empty($array_keterangan_error)){
					$result['Keterangan_Error'] = $array_keterangan_error;
				}
			}
		}

		return $result;
	}
}
?>
