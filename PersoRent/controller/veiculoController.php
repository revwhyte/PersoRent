<?php 
	session_start();
	require_once '../model/Database.php';
	require_once '../model/VeiculoModel.php';

	class VeiculoController
	{
		
		public static function addVeiculo($post){
			$db = new Database();
			$dados['marca'] = $post['marca'];
			$dados['modelo'] = $post['modelo'];
			$dados['ano'] = $post['ano'];
			$dados['placa'] = $post['placa'];
			$dados['odometro'] = $post['odometro'];
			$dados['cor'] = $post['cor'];
			$dados['chassi'] = $post['chassi'];
			$dados['portas'] = $post['portas'];
			$dados['potencia'] = $post['potencia'];
			$dados['combustivel'] = $post['combustivel'];
			$dados['arCondicionado'] = $post['arCondicionado'];
			$dados['direcao'] = $post['direcao'];
			$dados['avarias'] = $post['avarias'];
			$dados['status'] = true;			
			$dbv = new VeiculoModel($dados);
			$dbh = $db->conectar();
			$result = $dbv->criaVeiculo($dbh);
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

		public static function readVeiculo($post){
			$db = new Database();
			$dados['chassi'] = $post['chassi'];
			$dbh = $db->conectar();
			$result = VeiculoModel::buscaVeiculoChassi($dbh,$dados['chassi']);
			$db->desconectar();
			/*echo '<pre>';
				var_dump($result[0]);
			echo '</pre>';*/
			if($result){
				$result=$result[0];
				echo 
					$result['marca'].'=>'.
					$result['modelo'].'=>'.
					$result['ano'].'=>'.
					$result['placa'].'=>'.
					$result['odometro'].'=>'.
					$result['cor'].'=>'.
					$result['chassi'].'=>'.
					$result['portas'].'=>'.
					$result['potencia'].'=>'.
					$result['combustivel'].'=>'.
					$result['arCondicionado'].'=>'.
					$result['direcao'].'=>'.
					$result['avarias'].'=>'.
					$result['status'];
			}
			else
				echo '';
		}

		public static function editVeiculo($post){
			$db = new Database();
			$dados['marca'] = $post['marca'];
			$dados['modelo'] = $post['modelo'];
			$dados['ano'] = $post['ano'];
			$dados['placa'] = $post['placa'];
			$dados['odometro'] = $post['odometro'];
			$dados['cor'] = $post['cor'];
			$dados['chassi'] = $post['chassi'];
			$dados['portas'] = $post['portas'];
			$dados['potencia'] = $post['potencia'];
			$dados['combustivel'] = $post['combustivel'];
			$dados['arCondicionado'] = $post['arCondicionado'];
			$dados['direcao'] = $post['direcao'];
			$dados['avarias'] = $post['avarias'];
			$dados['status'] = $post['status'];			
			$dbv = new VeiculoModel($dados);
			$dbh = $db->conectar();
			$result = $dbv->atualizaVeiculo($dbh);
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

		public static function readDelVeiculo($post){
			$db = new Database();
			$dados['chassi'] = $post['chassi'];
			$dbh = $db->conectar();
			$result = VeiculoModel::buscaVeiculoChassi($dbh,$dados['chassi']);
			$db->desconectar();
			/*echo '<pre>';
				var_dump($result[0]);
			echo '</pre>';*/
			if($result){
				$result=$result[0];
				echo '<div class="row">
						<div class="well well-sm col-lg-12" onclick="mostrar(\''.$result['chassi'].'\')" id="\''.$result['chassi'].'\'">
							<div class="col-lg-9">
								<h3>Chassi: '.$result['chassi'].'</h3>
								Modelo: '.$result['modelo'].' Modelo: '.$result['modelo'].'
							</div>
							<div class="col-lg-3" id="div'.$result['chassi'].'" hidden style="margin-top: auto;margin-bottom: auto;">
								<input type="button" class="btn btn-default cancelar" onclick="esconder(\''.$result['chassi'].'\')" id="canc'.$result['chassi'].'" value="Cancelar">
								<input type="button" class="btn btn-danger confirmar" id="conf'.$result['chassi'].'" value="Confirmar" onclick="deletar(\''.$result['chassi'].'\')">
							</div>
						</div>
					</div>';					
			}
			else
				echo '';
		}

		public static function delVeiculo($post){
			$db = new Database();
			$dados['chassi'] = $post['chassi'];
			$dbh = $db->conectar();
			$result = VeiculoModel::removeVeiculo($dbh, $dados['chassi']);
			$db->desconectar();
			if($result)
				echo '<div class="alert alert-success alert-dismissable">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  Dados excluídos com <strong>sucesso</strong>.
						</div>';
			else
				echo '<div class="alert alert-danger alert-dismissable">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <strong>Erro!</strong> Dados nao puderam ser excluídos. Favor verificar se o banco está funcionando.
						</div>';
		}
	}
	if (isset($_POST)&&isset($_POST['acao'])) {
		switch ($_POST['acao']) {
			case 'adicionar':
				VeiculoController::addVeiculo($_POST);
				break;
			case 'buscar':
				VeiculoController::readVeiculo($_POST);
				break;
			case 'editar':
				VeiculoController::editVeiculo($_POST);
				break;
			case 'buscaRemover':
				VeiculoController::readDelVeiculo($_POST);
				break;
			case 'remover':
				VeiculoController::delVeiculo($_POST);
				break;
			
			default:
				
				break;
		}
	}

?>