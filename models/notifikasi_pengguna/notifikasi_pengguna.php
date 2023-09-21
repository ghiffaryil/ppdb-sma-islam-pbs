<?php
class a_notifikasi_pengguna extends a_database_jmp{
	private $Nama_Table = "tb_notifikasi_pengguna";
	private $Primary_Key = "Id_Notifikasi_Pengguna";
	
#---------------------------------------------
#FUNGSI CREATE
#---------------------------------------------
	###CREATE DATA
	function create($field = array(),$value = array()){

		#INPUTAN
		$isi_field = "";
		$sql_isi_field = "";
		$isi_value = "";
		$sql_isi_value = "";
		$nomor = 0;
		foreach ($field as $fieldloop) {
			$isi_field = mysqli_real_escape_string($this->koneksi,strip_tags(trim($field[$nomor])));
			$sql_isi_field = $sql_isi_field."".$isi_field."".",";
			$nomor++;
		}
		$sql_isi_field = substr($sql_isi_field, 0, -1);

		$nomor = 0;
		foreach ($value as $valueloop) {
			if(isset($value[$nomor])){
				$isi_value = mysqli_real_escape_string($this->koneksi,strip_tags(trim($value[$nomor])));
				$sql_isi_value = $sql_isi_value."'".$isi_value."'".",";
			}else{
				$sql_isi_value = $sql_isi_value."NULL".",";
			}
			$nomor++;
		}
		$sql_isi_value = substr($sql_isi_value, 0, -1);

		#SQL
		$sql = "INSERT INTO $this->Nama_Table (";
		$sql = $sql.$sql_isi_field;
		$sql = $sql.") VALUES (";
		$sql = $sql.$sql_isi_value;
		$sql = $sql.")";


		#FUNGSI
		$query = $this->koneksi->query($sql);

		#HASIL
		if($query){
			$result = "Sukses";				
		}else{
			$result = "Gagal";
		}

		#RETURN
		return $result;
	}


#---------------------------------------------
#FUNGSI READ
#---------------------------------------------
	###READ DATA BERDASARKAN ID
	function read_id($id_value){

		#INPUTAN
		$id_value = mysqli_real_escape_string($this->koneksi,(trim($id_value)));
		
		#SQL
		$sql = "SELECT * FROM $this->Nama_Table WHERE $this->Primary_Key = '$id_value'";

		#FUNGSI
		$query = $this->koneksi->query($sql);
		$hasil = array();

		#HASIL
		if($query){
			$hitung = mysqli_num_rows($query);
			if($hitung > 0){
				$result = "Sukses";

				$hasil = mysqli_fetch_assoc($query);
			}else{
				$result = "Tidak Ada Data";
				$hasil[] = "";
			}
		}else{
			$result = "Gagal";
			$hasil[] = "";
		}

		#RETURN
		return array($result, $hasil);;
	}

	###READ DATA ID PERTAMA
	function read_id_first(){
		
		#SQL
		$sql = "SELECT $this->Primary_Key FROM $this->Nama_Table ORDER BY $this->Primary_Key ASC LIMIT 1";

		#FUNGSI
		$query = $this->koneksi->query($sql);
		$hasil = array();

		#HASIL
		if($query){
			$hitung = mysqli_num_rows($query);
			if($hitung > 0){
				$result = "Sukses";

				while($data = mysqli_fetch_assoc($query)){
					$hasil[] = $data;
				}
			}else{
				$result = "Tidak Ada Data";
				$hasil[] = "";
			}
		}else{
			$result = "Gagal";
			$hasil[] = "";
		}

		#RETURN
		return array($result, $hasil);;
	}

	###READ DATA ID TERAKHIR
	function read_id_last(){
		
		#SQL
		$sql = "SELECT $this->Primary_Key FROM $this->Nama_Table ORDER BY $this->Primary_Key DESC LIMIT 1";

		#FUNGSI
		$query = $this->koneksi->query($sql);
		$hasil = array();

		#HASIL
		if($query){
			$hitung = mysqli_num_rows($query);
			if($hitung > 0){
				$result = "Sukses";

				while($data = mysqli_fetch_assoc($query)){
					$hasil[] = $data;
				}
			}else{
				$result = "Tidak Ada Data";
				$hasil[] = "";
			}
		}else{
			$result = "Gagal";
			$hasil[] = "";
		}

		#RETURN
		return array($result, $hasil);;
	}


	###READ DATA DENGAN FILTER WHERE
	function read_where($field_where = array(),$criteria_where = array(),$value_where = array(),$connector_where = array()){

		#INPUTAN
		$isi_field_where = "";
		$isi_criteria_where = "";
		$isi_value_where = "";
		$isi_connector_where = "";
		$wherenya = "";
		$nomor = 0;
		foreach ($field_where as $field_whereloop) {
			$isi_field_where = mysqli_real_escape_string($this->koneksi,(trim($field_where[$nomor])));
			$isi_criteria_where = mysqli_real_escape_string($this->koneksi,(trim($criteria_where[$nomor])));
			$isi_value_where = mysqli_real_escape_string($this->koneksi,(trim($value_where[$nomor])));
			$isi_connector_where = mysqli_real_escape_string($this->koneksi,(trim($connector_where[$nomor])));


			$wherenya = $wherenya." ".$isi_field_where." ".$isi_criteria_where." '".$isi_value_where."' ".$isi_connector_where."";
			$nomor++;
		}

		#SQL
		$sql = "SELECT * FROM $this->Nama_Table WHERE ";
		$sql = $sql.$wherenya;

		#FUNGSI
		$query = $this->koneksi->query($sql);
		$hasil = array();


		#HASIL
		if($query){
			$hitung = mysqli_num_rows($query);
			if($hitung > 0){
				$result = "Sukses";

				while($data = mysqli_fetch_assoc($query)){
					$hasil[] = $data;
				}
			}else{
				$result = "Tidak Ada Data";
				$hasil[] = "";
			}
		}else{
			$result = "Gagal";
			$hasil[] = "";
		}

		#RETURN
		return array($result, $hasil);;
	}


#---------------------------------------------
#FUNGSI UPDATE
#---------------------------------------------
	###UPDATE DATA
	function update($field = array(),$value = array(),$field_where = array(),$criteria_where = array(),$value_where = array(),$connector_where = array()){

		#INPUTAN
		$isi_field = "";
		$isi_value = "";
		$sql_isi_field_dan_value = "";
		$nomor = 0;
		foreach ($field as $fieldloop) {
			$isi_field = mysqli_real_escape_string($this->koneksi,strip_tags(trim($field[$nomor])));
			if(isset($value[$nomor])){
				$isi_value = mysqli_real_escape_string($this->koneksi,strip_tags(trim($value[$nomor])));
				$sql_isi_field_dan_value = $sql_isi_field_dan_value."".$isi_field.""." = "."'".$isi_value."'".",";
			}else{
				$sql_isi_field_dan_value = $sql_isi_field_dan_value."".$isi_field.""." = "."NULL".",";
			}
			$nomor++;
		}
		$sql_isi_field_dan_value = substr($sql_isi_field_dan_value, 0, -1);


		$isi_field_where = "";
		$isi_criteria_where = "";
		$isi_value_where = "";
		$isi_connector_where = "";
		$wherenya = "";
		$nomor = 0;
		foreach ($field_where as $field_whereloop) {
			$isi_field_where = mysqli_real_escape_string($this->koneksi,(trim($field_where[$nomor])));
			$isi_criteria_where = mysqli_real_escape_string($this->koneksi,(trim($criteria_where[$nomor])));
			$isi_value_where = mysqli_real_escape_string($this->koneksi,(trim($value_where[$nomor])));
			$isi_connector_where = mysqli_real_escape_string($this->koneksi,(trim($connector_where[$nomor])));


			$wherenya = $wherenya." ".$isi_field_where." ".$isi_criteria_where." '".$isi_value_where."' ".$isi_connector_where."";
			$nomor++;
		}


		#SQL
		$sql = "UPDATE $this->Nama_Table SET ";
		$sql = $sql.$sql_isi_field_dan_value;
		$sql = $sql." WHERE ";
		$sql = $sql.$wherenya;

		

		#FUNGSI
		$query = $this->koneksi->query($sql);

		#HASIL
		if($query){
			$result = "Sukses";				
		}else{
			$result = "Gagal";
		}

		#RETURN
		return $result;
	}


#---------------------------------------------
#FUNGSI DELETE
#---------------------------------------------
	###DATA MENJADI TERHAPUS/SAMPAH (TRASH)
	function delete_trash($id_value){

		#INPUTAN
		$id_value = mysqli_real_escape_string($this->koneksi,strip_tags(trim($id_value)));
		

		#SQL
		$sql = "UPDATE $this->Nama_Table SET Status = 'Terhapus'
		WHERE 
		$this->Primary_Key = '$id_value'
		";

		#FUNGSI
		$query = $this->koneksi->query($sql);

		#HASIL
		if($query){
			$result = "Sukses";				
		}else{
			$result = "Gagal";
		}

		#RETURN
		return $result;
	}

	###DATA MENJADI TERARSIP (ARSIP/DISEMBUNYIKAN)
	function archive($id_value){

		#INPUTAN
		$id_value = mysqli_real_escape_string($this->koneksi,strip_tags(trim($id_value)));
		

		#SQL
		$sql = "UPDATE $this->Nama_Table SET Status = 'Terarsip'
		WHERE 
		$this->Primary_Key = '$id_value'
		";

		#FUNGSI
		$query = $this->koneksi->query($sql);

		#HASIL
		if($query){
			$result = "Sukses";				
		}else{
			$result = "Gagal";
		}

		#RETURN
		return $result;
	}

	###DATA MENJADI TIDAK TERARSIP/AKTIF KEMBALI (RESTORE DARI ARSIP KE AKTIF)
	function unarchive($id_value){

		#INPUTAN
		$id_value = mysqli_real_escape_string($this->koneksi,strip_tags(trim($id_value)));
		

		#SQL
		$sql = "UPDATE $this->Nama_Table SET Status = 'Aktif'
		WHERE 
		$this->Primary_Key = '$id_value'
		";

		#FUNGSI
		$query = $this->koneksi->query($sql);

		#HASIL
		if($query){
			$result = "Sukses";				
		}else{
			$result = "Gagal";
		}

		#RETURN
		return $result;
	}

	###DATA MENJADI RESTORE/AKTIF KEMBALI (RESTORE DARI SAMPAH KE AKTIF)
	function restore($id_value){

		#INPUTAN
		$id_value = mysqli_real_escape_string($this->koneksi,strip_tags(trim($id_value)));
		

		#SQL
		$sql = "UPDATE $this->Nama_Table SET Status = 'Aktif'
		WHERE 
		$this->Primary_Key = '$id_value'
		";

		#FUNGSI
		$query = $this->koneksi->query($sql);

		#HASIL
		if($query){
			$result = "Sukses";				
		}else{
			$result = "Gagal";
		}

		#RETURN
		return $result;
	}

	###DATA MENJADI HAPUS PERMANEN
	function delete_permanent($id_value){

		#INPUTAN
		$id_value = mysqli_real_escape_string($this->koneksi,strip_tags(trim($id_value)));
		

		#SQL
		$sql = "DELETE FROM $this->Nama_Table
		WHERE 
		$this->Primary_Key = '$id_value'
		";

		#FUNGSI
		$query = $this->koneksi->query($sql);

		#HASIL
		if($query){
			$result = "Sukses";				
		}else{
			$result = "Gagal";
		}

		#RETURN
		return $result;
	}


#---------------------------------------------
#FUNGSI COUNT DATA
#---------------------------------------------
	###COUNT DATA DENGAN FILTER WHERE
	function count_where($field_where = array(),$criteria_where = array(),$value_where = array(),$connector_where = array()){

		#INPUTAN
		$isi_field_where = "";
		$isi_criteria_where = "";
		$isi_value_where = "";
		$isi_connector_where = "";
		$wherenya = "";
		$nomor = 0;
		foreach ($field_where as $field_whereloop) {
			$isi_field_where = mysqli_real_escape_string($this->koneksi,(trim($field_where[$nomor])));
			$isi_criteria_where = mysqli_real_escape_string($this->koneksi,(trim($criteria_where[$nomor])));
			$isi_value_where = mysqli_real_escape_string($this->koneksi,(trim($value_where[$nomor])));
			$isi_connector_where = mysqli_real_escape_string($this->koneksi,(trim($connector_where[$nomor])));


			$wherenya = $wherenya." ".$isi_field_where." ".$isi_criteria_where." '".$isi_value_where."' ".$isi_connector_where."";
			$nomor++;
		}

		#SQL
		$sql = "SELECT * FROM $this->Nama_Table WHERE ";
		$sql = $sql.$wherenya;

		#FUNGSI
		$query = $this->koneksi->query($sql);
		$hasil = array();


		#HASIL
		if($query){
			$hitung = mysqli_num_rows($query);
			if($hitung > 0){
				$result = "Sukses";
				$jumlah = mysqli_num_rows($query);
			}else{
				$result = "Tidak Ada Data";
				$jumlah = "0";
			}
		}else{
			$result = "Gagal";
			$jumlah = "0";
		}

		#RETURN
		return array($result, $jumlah);;
	}

}
?>