<?php

if(isset($_GET['menu'])){
	switch ($_GET['menu']) {

		case 'home':
		include "../../views/admin/home/home.php";
		break;

		default:
		break;
	}
}else{
	include "../../views/admin/home/home.php";
}

?>