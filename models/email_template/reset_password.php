<?php if((isset($_GET['activation_code_1'])) AND (isset($_GET['activation_code_2']))){ ?>
<?php 

require_once "../../../../master/init_master.php";

$link_aktivasi = $Link_Website."login.php?menu=update_password&activation_code_1=".$_GET['activation_code_1']."&activation_code_2=".$_GET['activation_code_2'];

?>
<div style="padding-top: 30px;padding-bottom: 30px;background-color: #f2f4f6">
<center><img src="../../../../media/core/dashboard/logo/logo-alva-crm-panjang.png"></center>
</div>

<div style="padding-left:  20%; padding-right: 20%;">
	<div style="text-align: justify;">
		<p>
			Ingin merubah password akun Anda?
		</p>
		<p>
			Silakan klik tombol di bawah ini untuk melanjutkan
		</p>
		<p>
			<center>
				<a style="font-family:Arial,'Helvetica Neue',Helvetica,sans-serif;box-sizing:border-box;color:#fff;background-color:#3869d4;border-top:10px solid #3869d4;border-right:18px solid #3869d4;border-bottom:10px solid #3869d4;border-left:18px solid #3869d4;display:inline-block;text-decoration:none;border-radius:3px" href="<?php echo $link_aktivasi ?>">Ubah Password Anda</a>
			</center>
		</p>
		<p>
			Jika email ini bukan atas kehendak Anda, silakan abaikan email ini
		</p>
		<p>Jika Anda memiliki pertanyaan, jangan ragu untuk melihat FAQ kami. Anda juga dapat mengirimkan tiket dukungan. Kami akan membalasnya dalam waktu 24 jam.
		</p>
		<br>
		<p>Terimakasih</p>
		<p>Team ALVA CRM</p>
		<hr>
		<p>
			Jika Anda mengalami masalah dengan tombol di atas, salin dan tempel URL di bawah ini ke browser web Anda.
		</p>
		<p>
			<a href="<?php echo $link_aktivasi ?>"><?php echo $link_aktivasi ?></a>
		</p>
	</div>
</div>
<?php } ?>