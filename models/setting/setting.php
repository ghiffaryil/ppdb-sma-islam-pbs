<?php 
class a_setting {
	public $tanggal_sekarang;
	public $waktu_sekarang;

	public function waktu_sekarang(){
		return $this->waktu_sekarang = date("Y-m-d H:i:s");
	}

	public function tanggal_sekarang(){
		return $this->waktu_sekarang = date("Y-m-d");
	}
}

function tanggal_indonesia($tanggal){
	if (DateTime::createFromFormat('Y-m-d', $tanggal) !== FALSE) {	
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$potong_tanggal = $tanggal;
	$potong_tanggal = explode('-', $potong_tanggal);
	
	return $potong_tanggal[2] . ' ' . $bulan[ (int)$potong_tanggal[1] ] . ' ' . $potong_tanggal[0];
	}else{
		return "";
	}
}

function tanggal_ulang_tahun($tanggal){
	if (DateTime::createFromFormat('Y-m-d', $tanggal) !== FALSE) {	
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$potong_tanggal = $tanggal;
	$potong_tanggal = explode('-', $potong_tanggal);
	
	return $potong_tanggal[2] . ' ' . $bulan[ (int)$potong_tanggal[1] ];
	}else{
		return "";
	}
}

function bulan_tahun_indonesia($tanggal){
	if (DateTime::createFromFormat('Y-m', $tanggal) !== FALSE) {	
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$potong_tanggal = $tanggal;
	$potong_tanggal = explode('-', $potong_tanggal);
	
	return $bulan[(int)$potong_tanggal[1]].', '.$potong_tanggal[0];
	}
	else{
		return "";
	}
}

function tanggal_dan_waktu_24_jam_indonesia($tanggal_dan_waktu){
	
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$potong_tanggal = $tanggal_dan_waktu;
	$potong_tanggal = substr($potong_tanggal, 0,11);
	$potong_tanggal = explode('-', $potong_tanggal);


	$potong_waktu = $tanggal_dan_waktu;
	$potong_waktu = substr($potong_waktu, 11,8);
	
	return $potong_tanggal[2] . ' ' . $bulan[ (int)$potong_tanggal[1] ] . ' ' . $potong_tanggal[0] . ' ' . $potong_waktu;
	
}

function hari_tanggal_dan_waktu_24_jam_indonesia($tanggal_dan_waktu){
	
	$daftar_hari = array(
	 'Sunday' => 'Minggu',
	 'Monday' => 'Senin',
	 'Tuesday' => 'Selasa',
	 'Wednesday' => 'Rabu',
	 'Thursday' => 'Kamis',
	 'Friday' => 'Jumat',
	 'Saturday' => 'Sabtu'
	);
	$date = substr($tanggal_dan_waktu, 0,10);
	$namahari = date('l', strtotime($date));


	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);

	$potong_tanggal = $tanggal_dan_waktu;
	$potong_tanggal = substr($potong_tanggal, 0,11);
	$potong_tanggal = explode('-', $potong_tanggal);


	$potong_waktu = $tanggal_dan_waktu;
	$potong_waktu = substr($potong_waktu, 11,8);
	
	return $daftar_hari[$namahari] .', '. $potong_tanggal[2] . ' ' . $bulan[ (int)$potong_tanggal[1] ] . ' ' . $potong_tanggal[0] . ' ' . $potong_waktu;
	
}

function hari_dan_tanggal_indonesia($tanggal_dan_waktu){
	
	$daftar_hari = array(
	 'Sunday' => 'Minggu',
	 'Monday' => 'Senin',
	 'Tuesday' => 'Selasa',
	 'Wednesday' => 'Rabu',
	 'Thursday' => 'Kamis',
	 'Friday' => 'Jumat',
	 'Saturday' => 'Sabtu'
	);
	$date = substr($tanggal_dan_waktu, 0,10);
	$namahari = date('l', strtotime($date));


	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);

	$potong_tanggal = $tanggal_dan_waktu;
	$potong_tanggal = substr($potong_tanggal, 0,11);
	$potong_tanggal = explode('-', $potong_tanggal);

	
	return $daftar_hari[$namahari] .', '. $potong_tanggal[2] . ' ' . $bulan[ (int)$potong_tanggal[1] ] . ' ' . $potong_tanggal[0];
	
}

function tanggal_tipe_1($tanggal){
	if (DateTime::createFromFormat('Y-m-d', $tanggal) !== FALSE) {	
	"2020-02-02";
	$pilih_tanggal = substr($tanggal, 8,2);
	$pilih_bulan = substr($tanggal, 5,2);
	$pilih_tahun = substr($tanggal, 0,4);
	return $pilih_tanggal."/".$pilih_bulan."/".$pilih_tahun;
	}else{
		return "";
	}
}


function format_rupiah($angka,$tampilkan_berapa_desimal = 0){
	if($angka == ""){
		$angka = 0;
	}else{
		$angka = $angka;
	}

	$string_angka = strval($angka);
	$array_string_angka = explode(".", $string_angka);

	if(isset($array_string_angka[0])){
		$angka_bulat = $array_string_angka[0];
	}

	$angka_desimal = "";
	if(isset($array_string_angka[1])){
		if($tampilkan_berapa_desimal == 0){
			$angka_desimal = "";
		}else{
			$angka_desimal = $array_string_angka[1];

			if($tampilkan_berapa_desimal != 0){
				$angka_desimal = substr($angka_desimal, 0, $tampilkan_berapa_desimal);
			}
		}
	}

	if((isset($array_string_angka[1])) && ($tampilkan_berapa_desimal <> 0)){
		$angka_akhir = $angka_bulat.".".$angka_desimal;
	}else{
		$angka_akhir = $angka_bulat;
	}



	//$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	$hasil_rupiah = "Rp " . number_format($angka_akhir,$tampilkan_berapa_desimal,',','.');
	return $hasil_rupiah;
 
}

function format_desimal($angka,$tampilkan_berapa_desimal = 0){
	if($angka == ""){
		$angka = 0;
	}else{
		$angka = $angka;
	}

	$string_angka = strval($angka);
	$array_string_angka = explode(".", $string_angka);

	if(isset($array_string_angka[0])){
		$angka_bulat = $array_string_angka[0];
	}

	if(isset($array_string_angka[1])){
		if($tampilkan_berapa_desimal == 0){
			$angka_desimal = "";
		}else{
			$angka_desimal = $array_string_angka[1];

			if($tampilkan_berapa_desimal != 0){
				$angka_desimal = substr($angka_desimal, 0, $tampilkan_berapa_desimal);
			}
		}
	}

	if((isset($array_string_angka[1])) && ($tampilkan_berapa_desimal <> 0)){
		$angka_akhir = $angka_bulat.".".$angka_desimal;
	}else{
		$angka_akhir = $angka_bulat;
	}



	//$hasil_angka = "Rp " . number_format($angka,2,',','.');
	$hasil_angka = number_format($angka_akhir,$tampilkan_berapa_desimal,'.','');
	return $hasil_angka;
 
}


?>