<?php
class a_aktivasi_akun extends a_database_jmp{
	private $username;
	private $password;


	public function aktivasi_akun($username, $password){

		$username = $username;
		$password = $password;

		
		#INPUTAN
		$username = mysqli_real_escape_string($this->koneksi,strip_tags(trim($username)));
		$password = mysqli_real_escape_string($this->koneksi,strip_tags(trim($password)));

		$password = md5($password."_alva");

		#SQL
		$sql = "SELECT * FROM tb_data_pengguna WHERE Username = '$username' AND Password = '$password' AND Status = 'Belum Aktivasi Email'";

		#FUNGSI
		$query = $this->koneksi->query($sql);
		$hitung = mysqli_num_rows($query);
		$data = mysqli_fetch_array($query);

		#HASIL
		if($hitung > 0 ){
			#SQL
			$sql = "UPDATE tb_data_pengguna SET Status = 'Aktif' WHERE Username = '$username' AND Password = '$password'";

			#FUNGSI
			$query = $this->koneksi->query($sql);

			#SQL
			$sql = "UPDATE tb_data_organisasi SET Status = 'Aktif' WHERE Organisasi_Kode = '$data[Organisasi_Kode]'";

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