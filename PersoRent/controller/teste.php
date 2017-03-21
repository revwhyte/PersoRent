<?php 
	session_start();
	if(isset($_POST)){
		//Trecho teste add client
		/*echo '<pre>';
			var_dump($_POST);
		echo '</pre>';*/
		//trecho teste edit;
		if (isset($_POST['nome'])&&$_POST['nome']=='dld') {
			for($i=0;$i<5;$i++){
				echo '
					<div class="row pessoa">
						<div class="well well-sm" id="'.$i.'"><h3>'.'Nome'.$i.'</h3>CPF: '.$i.'</div>
					</div>';
			}
		}
		else
			echo '';
		if (isset($_POST['cpf'])&&$_POST['cpf']=='12345678') {
			echo "1=>2=>3=>4=>5=>6=>7=>2002-02-02=>9=>10=>11=>12=>13";
		}
		else
			echo '';
	}
?>