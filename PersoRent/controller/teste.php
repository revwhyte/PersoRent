<?php 
	session_start();
	if(isset($_POST)){
		echo '<pre>';
			var_dump($_POST);
		echo '</pre>';
	}
?>