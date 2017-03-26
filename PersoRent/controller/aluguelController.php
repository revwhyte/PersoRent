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
						<div class="well well-sm aluguel" onclick="escolha(\''.$i.'2345678\')">					
							  / Data Saida: '.$veiculo['data_saida'].
							' / Data Devolucao: '.$veiculo['data_devolucao'].
							' / Valor: '.$veiculo['valor'].
							' / Multa: '.$veiculo['multa'].
							' / Novas Avarias: '.$veiculo['novas_avarias'].
							' / Status: '.$veiculo['status'].
							' / Veiculo Chassi: '.$veiculo['veiculo_chassi'].
							' / Cliente CPF: '.$veiculo['cliente_cpf'].'
						</div>
					</div>';
				}
			}
			else
				echo '';
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
			
			default:
				
				break;
		}
	}





?>