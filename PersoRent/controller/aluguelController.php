<?php
	session_start();
	require_once '../model/Database.php';
	require_once '../model/AluguelModel.php';


	class AluguelController
	{
		
		public static function addAluguel($post){
			$db = new Database();
			$dados['cliente_cpf'] = $post['cliente_cpf'];
			$dados['veiculo_chassi'] = $post['veiculo_chassi'];
			$dados['data_saida'] = $post['data_saida'];
			$dados['data_devolucao'] = $post['data_devolucao'];
			$dados['valor'] = $post['valor'];
			$dados['multa'] = '';
			$dados['novas_avarias'] = '';
			$dados['status'] = false;
			$dba = new AluguelModel($dados);
			$dbh = $db->conectar();
			$result = $dba->criarAluguel($dbh);
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

		public static function buscaAluguel($post){
			$db = new Database();
			$dados['data_devolucao'] = $post['data_devolucao'];
			$dbh = $db->conectar();
			$result = AluguelModel::buscarAluguelDataDevolucao($dbh,$dados['data_devolucao']);
			$db->desconectar();
			if($result){
				foreach ($result as $aluguel) {
					echo '
					<div class="row">
						<div class="well well-sm aluguel" onclick="escolha(\''.$aluguel['id'].'\')">					
							Data Saida: '.$aluguel['data_saida'].
							' / Data Devolucao: '.$aluguel['data_devolucao'].
							' / Valor: '.$aluguel['valor'].
							' / Multa: '.$aluguel['multa'].
							' / Novas Avarias: '.$aluguel['novas_avarias'].
							' / Status: '.$aluguel['status'].
							' / Veiculo Chassi: '.$aluguel['veiculo_chassi'].
							' / Cliente CPF: '.$aluguel['cliente_cpf'].'
						</div>
					</div>';
				}
			}
			else
				echo '';
		}
		public static function buscaAluguelId($post){
			$db = new Database();
			$dados['id'] = $post['id'];
			$dbh = $db->conectar();
			$result = AluguelModel::buscarAluguelId($dbh,$dados['id']);
			$db->desconectar();
			if($result){
				$result=$result[0];
				echo 
					$result['data_saida'].'=>'.
					$result['data_devolucao'].'=>'.
					$result['valor'].'=>'.
					$result['multa'].'=>'.
					$result['novas_avarias'].'=>'.
					$result['status'].'=>'.
					$result['veiculo_chassi'].'=>'.
					$result['cliente_cpf'].'=>'.
					$result['id'];
			}
			else
				echo '';
		}
		public static function finalizaAluguel($post){
			$db = new Database();
			$post['status'] = true;			
			$dba = new AluguelModel($post);
			$dbh = $db->conectar();
			$result = $dba->atualizaAluguel($dbh,$post['id']);
			$db->desconectar();			
			if($result)
				echo '<div class="alert alert-success alert-dismissable">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  Dados atualizados com <strong>sucesso</strong>.
						</div>';
			else
				echo '<div class="alert alert-danger alert-dismissable">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <strong>Erro!</strong> Dados nao puderam ser atualizados. Favor verificar se o banco está funcionando.
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
			case 'buscaFinalizar':
				AluguelController::buscaAluguel($_POST);
				break;
			case 'buscaId':
				AluguelController::buscaAluguelId($_POST);
				break;
			case 'finalizaAluguel':
				AluguelController::finalizaAluguel($_POST);
				break;

			default:
				
				break;
		}
	}





?>