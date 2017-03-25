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
				return 'true';
			else
				return 'false';
		}
	}
	if (isset($_POST)&&isset($_POST['acao'])) {
		switch ($_POST['acao']) {
			case 'adicionar':
				VeiculoController::addVeiculo($_POST);
				break;
			case 'editar':
				VeiculoController::editVeiculo($_POST);
				break;
			case 'remover':
				VeiculoController::delVeiculo($_POST);
				break;
			
			default:
				
				break;
		}
	}

?>