<?php 
	session_start();
	if(isset($_POST)){
		//Trecho teste add client
		/*echo '<pre>';
			var_dump($_POST);
		echo '</pre>';*/
		//trecho teste edit;
		/*if (isset($_POST['nome'])&&$_POST['nome']=='dld') {
			for($i=0;$i<5;$i++){
				echo '
					<div class="row">
						<div class="well well-sm pessoa" onclick="escolha(\''.$i.'2345678\')"><h3>'.'Nome'.$i.'</h3>CPF: '.$i.'</div>
					</div>';
			}
			unset($_POST['nome']);
		}
		else
			echo '';
		if (isset($_POST['cpf'])&&$_POST['cpf']=='12345678') {
			echo "1=>2=>3=>4=>5=>6=>7=>2002-02-02=>9=>10=>11=>12=>13";			
			unset($_POST['cpf']);
		}
		else
			echo '';*/
		//trech teste delete
		/*if (isset($_POST['nome'])&&$_POST['nome']=='dld') {
			for($i=0;$i<5;$i++){
				echo '
					<div class="row">
						<div class="well well-sm col-lg-12" onclick="mostrar(\''.$i.'2345678\')" id="\''.$i.'2345678\'">
							<div class="col-lg-9">
								<h3>'.'Nome'.$i.'</h3>
								CPF: '.$i.'2345678
							</div>
							<div class="col-lg-3" id="div'.$i.'2345678" hidden>
								<input type="button" class="btn btn-default cancelar" onclick="esconder(\''.$i.'2345678\')" id="canc'.$i.'2345678" value="Cancelar">
								<input type="button" class="btn btn-danger confirmar" id="conf'.$i.'2345678" value="Confirmar" onclick="deletar(\''.$i.'2345678\')">
							</div>
						</div>
					</div>';
			}
			unset($_POST['nome']);
		}
		else
			echo '';
		if (isset($_POST['cpf'])&&$_POST['cpf']=='12345678') {
			echo '
					<div class="row">
						<div class="well well-sm col-lg-12" onclick="mostrar(\'12345678\')" id="\'12345678\'">
							<div class="col-lg-9">
								<h3>'.'Nome1</h3>
								CPF: 12345678
							</div>
							<div class="col-lg-3" id="div12345678" hidden style="margin-top: auto;margin-bottom: auto;">
								<input type="button" class="btn btn-default cancelar" onclick="esconder(\'12345678\')" id="canc12345678" value="Cancelar">
								<input type="button" class="btn btn-danger confirmar" id="conf12345678" value="Confirmar" onclick="deletar(\'12345678\')">
							</div>
						</div>
					</div>';			
			unset($_POST['cpf']);
		}
		else
			echo '';*/
		if (isset($_POST['chassi'])&&$_POST['chassi']=='12345678') {
			echo "1=>2=>3=>4=>5=>6=>7=>2002-02-02=>9=>10=>11=>12=>13";			
			unset($_POST['chassi']);
		}
		else
			echo '';
	}
?>