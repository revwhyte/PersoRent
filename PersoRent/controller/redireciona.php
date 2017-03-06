<?php 
	session_start();
	if(isset($_POST['page'])){
		switch ($_POST['page']) {
			case 'addClient':				
				readfile('../view/include/contentScreens/addClient.php');
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