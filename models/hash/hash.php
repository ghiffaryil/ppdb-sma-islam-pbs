<?php 
class a_hash {
	public function encode($string){
		$encode = base64_encode(base64_encode(base64_encode(base64_encode(base64_encode("alva_".$string)))));
		return $encode;
	}	

	public function decode($string){
		$decode = base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($string)))));
		$decode = str_replace("alva_", "", $decode);
		return $decode;
	}



	public function encode_link_kembali($string){
		$encode = base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($string)))));
		return $encode;
	}	

	public function decode_link_kembali($string){
		$decode = base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($string)))));
		return $decode;
	}
}
?>