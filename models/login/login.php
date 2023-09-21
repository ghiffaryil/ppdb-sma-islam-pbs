<?php
class a_login extends a_database_jmp{
	public function login($username, $password){
		#INPUTAN
		$username = mysqli_real_escape_string($this->koneksi,strip_tags(trim($username)));
		$password = mysqli_real_escape_string($this->koneksi,strip_tags(trim($password)));

		$password = md5($password."_alva");

		#SQL
		// $sql = "SELECT * FROM tb_data_pengguna WHERE (Username = '$username' OR Email = '$username' ) AND Password = '$password' ";
		$sql = "SELECT * FROM tb_data_pengguna WHERE (Username = '$username' OR Email = '$username' ) AND Password = '$password' AND Status = 'Aktif' ";

		#FUNGSI
		$query = $this->koneksi->query($sql);
		$hitung = mysqli_num_rows($query);
		$data = mysqli_fetch_array($query);

		#HASIL
		if($hitung > 0 ){

			$result = "Sukses";	
			$password_Cookie_Alva_2 = $password;
			$organisasi_kode = $data['Organisasi_Kode'];
		}else{
			$result = "Gagal";
			$password_Cookie_Alva_2 = "";
			$organisasi_kode = "";
		}

		#RETURN
		return array($result, $password_Cookie_Alva_2, $organisasi_kode);;
	}
}
?>