<?php

#MEMANGGIL MODELS

// MODEL PERMISSION
$permission_modul = $a_role_permission->read_permission($u_Id_Role,"Alva_Influencer_Dispute");
$check_permission = $permission_modul[1];

// MODEL CRUD CHAT
$a_ai_chat = new a_ai_chat();

// MODEL CRUD TRANSAKSI
$a_ai_transaksi_master = new a_ai_transaksi_master();
$a_ai_pembayaran = new a_ai_pembayaran();

// MODEL CRUD DATA PENGGUNA
$a_data_pengguna = new a_data_pengguna();
$a_ai_influencer_pengguna = new a_ai_influencer_pengguna();

// MODEL CRUD NEWS FEED
$a_news_feed = new a_news_feed();
$a_news_feed_comment = new a_news_feed_comment();


if(!($check_permission['Create'] == "Iya")){
	if(isset($_GET['tambah'])){
		echo "<script>alert('Anda Tidak Diberikan Akses Untuk Menambahkan Data');document.location.href='?menu=dashboard'</script>";
		exit();
	}
}

if(!($check_permission['Read'] == "Iya")){
	echo "<script>alert('Anda Tidak Diberikan Akses Untuk Melihat Halaman Ini');document.location.href='?menu=dashboard'</script>";
	exit();
}

if(!($check_permission['Delete'] == "Iya")){
	if((isset($_GET['hapus'])) OR (isset($_GET['hapus_permanent']))){
		echo "<script>alert('Anda Tidak Diberikan Akses Untuk Menghapus Data');document.location.href='?menu=dashboard'</script>";
		exit();
	}
}

if(!($check_permission['Update'] == "Iya")){
	if((isset($_POST['submit_update']))){
		echo "<script>alert('Anda Tidak Diberikan Akses Untuk Mengedit/Mengupdate Data');document.location.href='?menu=dashboard'</script>";
		exit();
	}
}

#-----------------------------------------------------------------------------------
//CEK INPUTAN REQUIRED
if((isset($_POST['submit_chat'])) OR (isset($_POST['submit_update']))){

	$_POST['Pesan'] = trim($_POST['Pesan']);
	
	if((($_POST['Pesan'] == ""))){

		echo "<script>alert('Harap Isi Field Yang Di Butuhkan Dengan Benar')</script>";

		$cek_required = "Gagal";
	}else{
		$cek_required = "Sukses";
	}
}

#-----------------------------------------------------------------------------------
#FUNGSI EDIT DATA (READ)
if(isset($_GET['edit'])){
	$result = $a_ai_chat->read_id($Get_Id_Primary);
	if($result[0] == "Sukses"){
		$edit = $result[1];
	}else{
		echo "<script>alert('Terjadi Kesalahan Saat Membaca Data');document.location.href='$kehalaman'</script>";
	}

}


#-----------------------------------------------------------------------------------
#FUNGSI SIMPAN DATA (CREATE)
if(isset($_POST['submit_chat'])){
	if($cek_required == "Sukses"){

		$Id_Pengguna_Influencer_Chat = $_POST['Id_Pengguna_Influencer_Chat'];
		$Organisasi_Kode_Influencer_Chat = $_POST['Organisasi_Kode_Influencer_Chat'];

		$Id_Pengguna_Sponsor_Chat = $_POST['Id_Pengguna_Sponsor_Chat'];
		$Organisasi_Kode_Sponsor_Chat = $_POST['Organisasi_Kode_Sponsor_Chat'];

		$form_field = array("Id_Chat","Id_Pengguna_Influencer","Organisasi_Kode_Influencer","Id_Pengguna_Sponsor","Organisasi_Kode_Sponsor","Chat_Sebagai","Pesan","Waktu_Simpan_Data","Status");
		$form_value = array(NULL,"$Id_Pengguna_Influencer_Chat","$Organisasi_Kode_Influencer_Chat","$Id_Pengguna_Sponsor_Chat","$Organisasi_Kode_Sponsor_Chat","Alva Influencer Admin","$_POST[Pesan]","$Waktu_Simpan_Data","Aktif");

		$result = $a_ai_chat->create($form_field,$form_value);

		if($result == "Sukses"){
			echo "<script>document.location.href='$kehalaman&edit&id=$_GET[id]'</script>";
		}else{
			echo "<script>alert('Terjadi Kesalahan Saat Menyimpan Data');document.location.href='$kehalaman'</script>";
		}

	}
}


#-----------------------------------------------------------------------------------
#FUNGSI DELETE DATA (DELETE)
if(isset($_GET['hapus'])){

	$result = $a_ai_chat->delete_trash($Get_Id_Primary);

	if($result == "Sukses"){
		echo "<script>alert('Data Terhapus');document.location.href='$kehalaman'</script>";
	}else{
		echo "<script>alert('Terjadi Kesalahan Saat Menghapus Data');document.location.href='$kehalaman'</script>";
	}

}


#-----------------------------------------------------------------------------------
#FUNGSI ARSIP DATA (ARSIP)
if(isset($_GET['arsip'])){

	$result = $a_ai_chat->archive($Get_Id_Primary);

	if($result == "Sukses"){
		echo "<script>alert('Data Terarsip');document.location.href='$kehalaman'</script>";
	}else{
		echo "<script>alert('Terjadi Kesalahan Saat Menghapus Data');document.location.href='$kehalaman'</script>";
	}

}


#-----------------------------------------------------------------------------------
#FUNGSI RESTORE DATA (RESTORE)
if(isset($_GET['aktif'])){

	$result = $a_ai_chat->unarchive($Get_Id_Primary);

	if($result == "Sukses"){
		echo "<script>alert('Data di Tampilkan Ke Aktif');document.location.href='$kehalaman'</script>";
	}else{
		echo "<script>alert('Terjadi Kesalahan Saat Menghapus Data');document.location.href='$kehalaman'</script>";
	}

}


#-----------------------------------------------------------------------------------
#FUNGSI DELETE PERMANENT DATA (DELETE PERMANENT)
if(isset($_GET['hapus_permanent'])){

	$result = $a_ai_chat->delete_permanent($Get_Id_Primary);

	if($result == "Sukses")
	{

		echo "<script>alert('Data Terhapus');document.location.href='$kehalaman'</script>";
	}else{
		echo "<script>alert('Terjadi Kesalahan Saat Menghapus Data');document.location.href='$kehalaman'</script>";
	}

}

?>