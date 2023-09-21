<?php

class a_compress_file {
	public function compress_file($file_awal, $file_baru, $kualitas) {

	    $info = getimagesize($file_awal);

	    if ($info['mime'] == 'image/jpeg') 
	        $image = imagecreatefromjpeg($file_awal);

	    elseif ($info['mime'] == 'image/gif') 
	        $image = imagecreatefromgif($file_awal);

	    elseif ($info['mime'] == 'image/png') 
	        $image = imagecreatefrompng($file_awal);

	    imagejpeg($image, $file_baru, $kualitas);

	    if (file_exists($file_baru)) {
			$result['Status'] = "Berhasil";
		}else{
			$result['Status'] = "Gagal";
			$array_keterangan_error[] = "Gagal Pada Saat Compress File";
		}
	    return $result;
	}

}
?>