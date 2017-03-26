<?php
	session_start();
	require_once '../model/Database.php';
	require_once '../model/AluguelModel.php';


	class AluguelController
	{
		
		public static function addAluguel($post){
			$db = new Database();
			$dados['cpf'] = $post['cpf'];
			$dados['chassi'] = $post['chassi'];
			$dados['data_saida'] = $post['data_saida'];
			$dados['data_devolucao'] = $post['data_devolucao'];
			$dados['valor'] = $post['valor'];
			$dados['multa'] = '';
			$dados['novas_avarias'] = '';
			$dados['status'] = false;
			$dba = new AluguelModel($dados);
			$dbh = $db->conectar();
			$result = $dba->criaAluguel($dbh);
			$db->desconectar();
			if($result)
				echo '<div class="alert alert-success alert-dismissable">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  Dados inseridos com <strong>sucesso</strong>.
						</div>';
			else
				echo '<div class="alert alert-danger alert-dismissable">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <strong>Erro!</strong> Dados nao puderam ser inseridos. Favor verificar se o chassi é único ou o banco está funcionando.
						</div>';
		}
	}

	if (isset($_POST)&&isset($_POST['acao'])) {
		switch ($_POST['acao']) {
			case 'adicionar':
				AluguelController::addAluguel($_POST);
				break;
			case 'editar':
				AluguelController::editAluguel($_POST);
				break;
			case 'remover':
				AluguelController::delAluguel($_POST);
				break;
			
			default:
				
				break;
		}
	}





?>