<?php
#---------------------------------------------
#FUNGSI CREATE
#---------------------------------------------
class a_cookie extends a_database_jmp{

#---------------------------------------------
#FUNGSI READ
#---------------------------------------------
	###READ DATA BERDASARKAN ID
	function cookie_login($username, $password){
		#INPUTAN
		$username = mysqli_real_escape_string($this->koneksi,strip_tags(trim($username)));
		$password = mysqli_real_escape_string($this->koneksi,strip_tags(trim($password)));
	

		#SQL
		$sql = "SELECT * FROM tb_data_pengguna WHERE (Username = '$username' OR Email = '$username') AND Password = '$password' AND Status = 'Aktif' ";

		#FUNGSI
		$query = $this->koneksi->query($sql);
		$hitung = mysqli_num_rows($query);
		$hasil = array();

		#HASIL
		if($hitung > 0 ){
			$result = "Sukses";				

			$hasil = mysqli_fetch_assoc($query);
		}else{
			$result = "Gagal";
			$hasil = "Gagal";
		}

		#RETURN
		return array($result,$hasil);
	}

	###READ DATA BERDASARKAN ID
	function cookie_login_aplikasi_webview($id_pengguna, $username){
		#INPUTAN
		$username = mysqli_real_escape_string($this->koneksi,strip_tags(trim($username)));
		$id_pengguna = mysqli_real_escape_string($this->koneksi,strip_tags(trim($id_pengguna)));
	

		#SQL
		$sql = "SELECT * FROM tb_data_pengguna WHERE Id_Pengguna = '$id_pengguna' AND Username = '$username' AND Status = 'Aktif' ";

		#FUNGSI
		$query = $this->koneksi->query($sql);
		$hitung = mysqli_num_rows($query);
		$hasil = array();

		#HASIL
		if($hitung > 0 ){
			$result = "Sukses";				

			$hasil = mysqli_fetch_assoc($query);
		}else{
			$result = "Gagal";
			$hasil = "Gagal";
		}

		#RETURN
		return array($result,$hasil);
	}

}
?>