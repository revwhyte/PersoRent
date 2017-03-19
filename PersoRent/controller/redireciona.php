<?php 
	session_start();
	if(isset($_POST['page'])){
		switch ($_POST['page']) {
			case 'addClient':				
				readfile('../view/include/contentScreens/addClient.php');
				break;
			case 'editClient':				
				readfile('../view/include/contentScreens/editClient.php');
				break;
			case 'delClient':				
				readfile('../view/include/contentScreens/delClient.php');
				break;
			case 'addVehicle':				
				readfile('../view/include/contentScreens/addVehicle.php');
				break;
			case 'editVehicle':				
				readfile('../view/include/contentScreens/editVehicle.php');
				break;
			case 'delVehicle':				
				readfile('../view/include/contentScreens/delVehicle.php');
				break;
			case 'addRent':				
				readfile('../view/include/contentScreens/addRent.php');
				break;
			case 'editRent':				
				readfile('../view/include/contentScreens/editRent.php');
				break;
			case 'delRent':				
				readfile('../view/include/contentScreens/delRent.php');
				break;
			case 'voltar':
				readfile('../view/include/contentScreens/welcome.php');
				break;
			default:
				# code...
				break;
		}
		unset($_POST['page']);
	}
?>