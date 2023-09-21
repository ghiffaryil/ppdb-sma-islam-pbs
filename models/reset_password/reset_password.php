<?php
class a_reset_password extends a_database_jmp{
	private $email;


	public function reset_password($email){


		
		#INPUTAN
		$email = mysqli_real_escape_string($this->koneksi,strip_tags(trim($email)));
		
		#SQL
		$sql = "SELECT Nama_Depan, Nama_Belakang, Username, Password, Email FROM tb_data_pengguna WHERE Email = '$email'";

		#FUNGSI
		$query = $this->koneksi->query($sql);
		$hitung = mysqli_num_rows($query);

		#HASIL
		if($hitung > 0 ){
			$result = "Sukses";	
			$data = mysqli_fetch_assoc($query);
		}else{
			$result = "Gagal";
			$data = "";
		}

		#RETURN
		return array($result,$data);
	}
}
?>