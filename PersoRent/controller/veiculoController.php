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

		public static function readMarcaVeiculo(){
			$db = new Database();
			$dbh = $db->conectar();
			$result = VeiculoModel::retornaTodosVeiculos($dbh);
			$db->desconectar();
			/*echo '<pre>';
				var_dump($result[0]);
			echo '</pre>';*/
			if($result){
				$saida = '';
				foreach ($result as $veiculo) {
					if(strpos($saida,$veiculo['marca'])===false)
						$saida.= '<option value="'.$veiculo['marca'].'">'.$veiculo['marca'].'</option>';
				}
				echo $saida;
			}
			else
				echo '';
		}

		public static function readModeloVeiculo($post){
			$db = new Database();
			$dbh = $db->conectar();
			$result = VeiculoModel::buscaVeiculoFiltros($dbh,$post);
			$db->desconectar();
			if($result){
				foreach ($result as $veiculo) {
					echo '<option value="'.$veiculo['modelo'].'">'.$veiculo['modelo'].'</option>';
				}
			}
			else
				echo '';
		}

		public static function readPortasVeiculo($post){
			$db = new Database();
			$dbh = $db->conectar();
			$result = VeiculoModel::buscaVeiculoFiltros($dbh,$post);
			$db->desconectar();
			if($result){
				foreach ($result as $veiculo) {
					echo '<option value="'.$veiculo['portas'].'">'.$veiculo['portas'].'</option>';
				}
			}
			else
				echo '';
		}

		public static function readVeiculoFiltro($post){
			$db = new Database();
			$dbh = $db->conectar();
			$result = VeiculoModel::buscaVeiculoFiltros($dbh,$post);
			$db->desconectar();
			if($result){
				foreach ($result as $veiculo) {
					echo '<div class="row">
						<div class="well well-sm col-lg-12" onclick="mostrar(\''.$veiculo['chassi'].'\')" id="\''.$veiculo['chassi'].'\'">											
							<div class="col-lg-1" id="div'.$veiculo['chassi'].'" style="margin-top: auto;margin-bottom: auto;">
								<input type="radio" name="chassi" value="'.$veiculo['chassi'].'">
							</div>
							<div class="col-lg-9">
								Chassi: '.$veiculo['chassi'].
								' / Marca: '.$veiculo['marca'].
								' / Modelo: '.$veiculo['modelo'].
								' / ano: '.$veiculo['ano'].
								' / placa: '.$veiculo['placa'].
								' / odometro: '.$veiculo['odometro'].
								' / cor: '.$veiculo['cor'].
								' / chassi: '.$veiculo['chassi'].
								' / portas: '.$veiculo['portas'].
								' / potencia: '.$veiculo['potencia'].
								' / combustivel: '.$veiculo['combustivel'].
								' / arCondicionado: '.$veiculo['arCondicionado'].
								' / direcao: '.$veiculo['direcao'].'
							</div>
						</div>
					</div>';
				}
			}
			else
				echo '';
		}

		public static function editVeiculo($post){
			$db = new Database();
			$marca = $post['marca'];
			$modelo = $post['modelo'];
			$ano = $post['ano'];
			$placa = $post['placa'];
			$odometro = $post['odometro'];
			$cor = $post['cor'];
			$chassi = $post['chassi'];
			$portas = $post['portas'];
			$potencia = $post['potencia'];
			$combustivel = $post['combustivel'];
			$arCondicionado = $post['arCondicionado'];
			$direcao = $post['direcao'];
			$avarias = $post['avarias'];		
			$dbv = new VeiculoModel($post);
			$dbh = $db->conectar();
			$result = $dbv->atualizaVeiculo($dbh, $marca, $modelo, $ano, $placa, $odometro, $cor, $portas, $arCondicionado, $direcao, $combustivel, $potencia, $avarias, $chassi);
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
								Marca: '.$result['marca'].' Modelo: '.$result['modelo'].'
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
			case 'buscarTodosMarca':
				VeiculoController::readMarcaVeiculo();
			case 'buscarTodosModelo':
				VeiculoController::readModeloVeiculo($_POST);
				break;
			case 'buscarTodosPorta':
				VeiculoController::readPortasVeiculo($_POST);
				break;
			case 'buscarTodosFiltro':
				VeiculoController::readVeiculoFiltro($_POST);
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