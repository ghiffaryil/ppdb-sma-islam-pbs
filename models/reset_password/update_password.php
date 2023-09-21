<?php
class a_update_password extends a_database_jmp{
	private $username;


	public function update_password($username,$password_lama,$password_baru){

		
		#INPUTAN
		$username = mysqli_real_escape_string($this->koneksi,strip_tags(trim($username)));
		$password_lama = mysqli_real_escape_string($this->koneksi,strip_tags(trim($password_lama)));
		$password_baru = mysqli_real_escape_string($this->koneksi,strip_tags(trim($password_baru)));

		$password_baru = md5($password_baru."_alva");
		
		#SQL
		$sql = "SELECT Username, Password FROM tb_data_pengguna WHERE Username = '$username' AND Password = '$password_lama'";

		#FUNGSI
		$query = $this->koneksi->query($sql);
		$hitung = mysqli_num_rows($query);

		#HASIL
		if($hitung > 0 ){
		#SQL
		$sql = "UPDATE tb_data_pengguna SET Password = '$password_baru' WHERE Username = '$username' AND Password = '$password_lama'";

		#FUNGSI
		$query = $this->koneksi->query($sql);


			$result = "Sukses";	
		}else{
			$result = "Gagal";
		}

		#RETURN
		return array($result);
	}
}
?>