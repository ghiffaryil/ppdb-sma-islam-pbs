<?php
class a_register extends a_database_jmp {
	public function register($username, $password, $email, $nama_depan, $nama_belakang, $perusahaan, $nomor_telpon){
		#INPUTAN
		$username = mysqli_real_escape_string($this->koneksi,strip_tags(trim($username)));
		$password = mysqli_real_escape_string($this->koneksi,strip_tags(trim($password)));
		$email = mysqli_real_escape_string($this->koneksi,strip_tags(trim($email)));
		$nama_depan = mysqli_real_escape_string($this->koneksi,strip_tags(trim($nama_depan)));
		$nama_belakang = mysqli_real_escape_string($this->koneksi,strip_tags(trim($nama_belakang)));
		$perusahaan = mysqli_real_escape_string($this->koneksi,strip_tags(trim($perusahaan)));
		$nomor_telpon = mysqli_real_escape_string($this->koneksi,strip_tags(trim($nomor_telpon)));
		$organisasi_kode = date("YmdHis");
		$waktu_sekarang = date("Y-m-d H:i:s");


		$password = md5($password."_alva");


		#CEK USERNAME
		$sql = "SELECT * FROM tb_data_pengguna WHERE Username = '$username' ";
		#FUNGSI
		$query = $this->koneksi->query($sql);
		$cek = mysqli_num_rows($query);

		if($cek > 0){
			return "Username Sudah Di Gunakan";
			exit();
		}


		#CEK EMAIL
		$sql = "SELECT * FROM tb_data_pengguna WHERE Email = '$email' ";
		#FUNGSI
		$query = $this->koneksi->query($sql);
		$cek = mysqli_num_rows($query);

		if($cek > 0){
			return "Email Sudah Di Gunakan";
			exit();
		}


		#CEK PERUSAHAAN
		$sql = "SELECT * FROM tb_data_organisasi WHERE Nama_Organisasi = '$perusahaan' ";
		#FUNGSI
		$query = $this->koneksi->query($sql);
		$cek = mysqli_num_rows($query);

		if($cek > 0){
			return "Nama Perusahaan Sudah Di Gunakan";
			exit();
		}



		#SQL
		$sql = "INSERT INTO `tb_data_pengguna` (
		`Id_Pengguna`,
		`Username`,
		`Password`,
		`Email`,
		`nama_depan`,
		`nama_belakang`,
		`perusahaan`,
		`nomor_telpon`,
		`Organisasi_Kode`,
		`Waktu_Simpan_Data`,
		`Status`
		) VALUES (
		NULL, 
		'$username', 
		'$password', 
		'$email',
		'$nama_depan',
		'$nama_belakang',
		'$perusahaan',
		'$nomor_telpon',
		'$organisasi_kode', 
		'$waktu_sekarang',
		'Belum Aktivasi Email');";

		#FUNGSI
		$query = $this->koneksi->query($sql);

		#HASIL
		if($query){

		#SQL AMBIL ID TERBARU
			$sql = "SELECT Id_Pengguna FROM tb_data_pengguna ORDER BY Id_Pengguna DESC LIMIT 1";

		//MEMBUAT ORGANISASI BARU

		#FUNGSI QUERY
			$query = $this->koneksi->query($sql);
			$data = mysqli_fetch_assoc($query);

			$Id_Pengguna_Owner = $data['Id_Pengguna'];

		#SQL KE DATA ORGANISASI
			$sql = "INSERT INTO `tb_data_organisasi` (
			`Organisasi_Kode`,
			`Id_Pengguna_Owner`,
			`Id_Pengguna`,
			`Nama_Organisasi`,
			`Waktu_Simpan_Data`,
			`Status`
			) VALUES (
			'$organisasi_kode',
			'$Id_Pengguna_Owner',
			'$Id_Pengguna_Owner',
			'$perusahaan',
			'$waktu_sekarang',
			'Belum Aktivasi Email');";

		#FUNGSI KE DATA ORGANISASI
			$query = $this->koneksi->query($sql);






		//MEMBUAT ROLE BARU

		#FUNGSI QUERY

		#SQL KE DATA ROLE
			$sql = "INSERT INTO `tb_data_role` (
			`Id_Role`,
			`Organisasi_Kode`,
			`Nama_Role`,
			`Deskripsi_Role`,
			`Waktu_Simpan_Data`,
			`Status`
			) VALUES (
			NULL,
			'$organisasi_kode',
			'Administrator',
			'Administrator',
			'$waktu_sekarang',
			'Aktif');";

		#FUNGSI KE DATA ROLE
			$query = $this->koneksi->query($sql);





		//MEMBUAT ROLE CRUD BARU
			$sql = "SELECT Id_Role FROM tb_data_role ORDER BY Id_Role DESC LIMIT 1";
			$query = $this->koneksi->query($sql);
			$data_id_role_terbaru = mysqli_fetch_array($query);
			$id_role_terbaru = $data_id_role_terbaru['Id_Role'];

		//UPDATE ID ROLE PADA DATA PENGGUNA
			$sql = "UPDATE tb_data_pengguna SET Id_Role = '$id_role_terbaru' WHERE Id_Pengguna = '$Id_Pengguna_Owner'";
			$query = $this->koneksi->query($sql);
			

		#FUNGSI QUERY

		#SQL KE DATA ROLE CRUD Lead
			$sql = "INSERT INTO `tb_data_role_crud` (
			`Id_Role_CRUD`,
			`Id_Role`,
			`Organisasi_Kode`,
			`Nama_Modul`,
			`Deskripsi_Modul`,
			`Create`,
			`Read`,
			`Update`,
			`Delete`
			) VALUES (
			NULL,
			'$id_role_terbaru',
			'$organisasi_kode',
			'ALVA_CRM_Lead',
			'Untuk Mengakses Permission ALVA CRM Lead',
			'Iya',
			'Iya',
			'Iya',
			'Iya');";
			$query = $this->koneksi->query($sql);

		#SQL KE DATA ROLE CRUD Account
			$sql = "INSERT INTO `tb_data_role_crud` (
			`Id_Role_CRUD`,
			`Id_Role`,
			`Organisasi_Kode`,
			`Nama_Modul`,
			`Deskripsi_Modul`,
			`Create`,
			`Read`,
			`Update`,
			`Delete`
			) VALUES (
			NULL,
			'$id_role_terbaru',
			'$organisasi_kode',
			'ALVA_CRM_Account',
			'Untuk Mengakses Permission ALVA CRM Account',
			'Iya',
			'Iya',
			'Iya',
			'Iya');";
			$query = $this->koneksi->query($sql);

		#SQL KE DATA ROLE CRUD Contact
			$sql = "INSERT INTO `tb_data_role_crud` (
			`Id_Role_CRUD`,
			`Id_Role`,
			`Organisasi_Kode`,
			`Nama_Modul`,
			`Deskripsi_Modul`,
			`Create`,
			`Read`,
			`Update`,
			`Delete`
			) VALUES (
			NULL,
			'$id_role_terbaru',
			'$organisasi_kode',
			'ALVA_CRM_Contact',
			'Untuk Mengakses Permission ALVA CRM Contact',
			'Iya',
			'Iya',
			'Iya',
			'Iya');";
			$query = $this->koneksi->query($sql);

		#SQL KE DATA ROLE CRUD Potential
			$sql = "INSERT INTO `tb_data_role_crud` (
			`Id_Role_CRUD`,
			`Id_Role`,
			`Organisasi_Kode`,
			`Nama_Modul`,
			`Deskripsi_Modul`,
			`Create`,
			`Read`,
			`Update`,
			`Delete`
			) VALUES (
			NULL,
			'$id_role_terbaru',
			'$organisasi_kode',
			'ALVA_CRM_Potential',
			'Untuk Mengakses Permission ALVA CRM Potential',
			'Iya',
			'Iya',
			'Iya',
			'Iya');";
			$query = $this->koneksi->query($sql);

		#SQL KE DATA ROLE CRUD Task
			$sql = "INSERT INTO `tb_data_role_crud` (
			`Id_Role_CRUD`,
			`Id_Role`,
			`Organisasi_Kode`,
			`Nama_Modul`,
			`Deskripsi_Modul`,
			`Create`,
			`Read`,
			`Update`,
			`Delete`
			) VALUES (
			NULL,
			'$id_role_terbaru',
			'$organisasi_kode',
			'ALVA_CRM_Task',
			'Untuk Mengakses Permission ALVA CRM Task',
			'Iya',
			'Iya',
			'Iya',
			'Iya');";
			$query = $this->koneksi->query($sql);

		#SQL KE DATA ROLE CRUD ALVA_Inventory_Item
			$sql = "INSERT INTO `tb_data_role_crud` (
			`Id_Role_CRUD`,
			`Id_Role`,
			`Organisasi_Kode`,
			`Nama_Modul`,
			`Deskripsi_Modul`,
			`Create`,
			`Read`,
			`Update`,
			`Delete`
			) VALUES (
			NULL,
			'$id_role_terbaru',
			'$organisasi_kode',
			'ALVA_Inventory_Item',
			'Untuk Mengakses Permission ALVA Inventory Item',
			'Iya',
			'Iya',
			'Iya',
			'Iya');";
			$query = $this->koneksi->query($sql);	


		#SQL KE DATA ROLE CRUD ALVA_Inventory_Gudang
			$sql = "INSERT INTO `tb_data_role_crud` (
			`Id_Role_CRUD`,
			`Id_Role`,
			`Organisasi_Kode`,
			`Nama_Modul`,
			`Deskripsi_Modul`,
			`Create`,
			`Read`,
			`Update`,
			`Delete`
			) VALUES (
			NULL,
			'$id_role_terbaru',
			'$organisasi_kode',
			'ALVA_Inventory_Gudang',
			'Untuk Mengakses Permission ALVA Inventory Gudang',
			'Iya',
			'Iya',
			'Iya',
			'Iya');";
			$query = $this->koneksi->query($sql);	



		#SQL KE DATA ROLE CRUD ALVA_Inventory_Barang_Masuk
			$sql = "INSERT INTO `tb_data_role_crud` (
			`Id_Role_CRUD`,
			`Id_Role`,
			`Organisasi_Kode`,
			`Nama_Modul`,
			`Deskripsi_Modul`,
			`Create`,
			`Read`,
			`Update`,
			`Delete`
		) VALUES (
		NULL,
		'$id_role_terbaru',
		'$organisasi_kode',
		'ALVA_Inventory_Barang_Masuk',
		'Untuk Mengakses Permission ALVA Inventory Barang Masuk',
		'Iya',
		'Iya',
		'Iya',
		'Iya');";
		$query = $this->koneksi->query($sql);	


		#SQL KE DATA ROLE CRUD ALVA_Inventory_Barang_Keluar
		$sql = "INSERT INTO `tb_data_role_crud` (
		`Id_Role_CRUD`,
		`Id_Role`,
		`Organisasi_Kode`,
		`Nama_Modul`,
		`Deskripsi_Modul`,
		`Create`,
		`Read`,
		`Update`,
		`Delete`
	) VALUES (
	NULL,
	'$id_role_terbaru',
	'$organisasi_kode',
	'ALVA_Inventory_Barang_Keluar',
	'Untuk Mengakses Permission ALVA Inventory Barang Keluar',
	'Iya',
	'Iya',
	'Iya',
	'Iya');";
	$query = $this->koneksi->query($sql);




		#SQL KE DATA ROLE CRUD ALVA_Inventory_Internal_Transfer
		$sql = "INSERT INTO `tb_data_role_crud` (
		`Id_Role_CRUD`,
		`Id_Role`,
		`Organisasi_Kode`,
		`Nama_Modul`,
		`Deskripsi_Modul`,
		`Create`,
		`Read`,
		`Update`,
		`Delete`
	) VALUES (
	NULL,
	'$id_role_terbaru',
	'$organisasi_kode',
	'ALVA_Inventory_Internal_Transfer',
	'Untuk Mengakses Permission ALVA Inventory Internal Transfer',
	'Iya',
	'Iya',
	'Iya',
	'Iya');";
	$query = $this->koneksi->query($sql);		


		#SQL KE DATA ROLE CRUD ALVA_Inventory_Track_Serial_Number
		$sql = "INSERT INTO `tb_data_role_crud` (
		`Id_Role_CRUD`,
		`Id_Role`,
		`Organisasi_Kode`,
		`Nama_Modul`,
		`Deskripsi_Modul`,
		`Create`,
		`Read`,
		`Update`,
		`Delete`
	) VALUES (
	NULL,
	'$id_role_terbaru',
	'$organisasi_kode',
	'ALVA_Inventory_Track_Serial_Number',
	'Untuk Mengakses Permission Track Serial Number',
	'Iya',
	'Iya',
	'Iya',
	'Iya');";
	$query = $this->koneksi->query($sql);	

	#SQL KE DATA ROLE CRUD ALVA_Survey_Survey
		$sql = "INSERT INTO `tb_data_role_crud` (
		`Id_Role_CRUD`,
		`Id_Role`,
		`Organisasi_Kode`,
		`Nama_Modul`,
		`Deskripsi_Modul`,
		`Create`,
		`Read`,
		`Update`,
		`Delete`
	) VALUES (
	NULL,
	'$id_role_terbaru',
	'$organisasi_kode',
	'ALVA_Survey_Survey',
	'Untuk Mengakses Permission Survey',
	'Iya',
	'Iya',
	'Iya',
	'Iya');";
	$query = $this->koneksi->query($sql);					






	$result = "Sukses";				
}else{
	$result = "Gagal";
}

		#RETURN
return $result;
}
}
?>