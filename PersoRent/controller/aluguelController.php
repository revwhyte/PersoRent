<?php
	session_start();
	require_once '../model/Database.php';
	require_once '../model/AluguelModel.php';


	class AluguelController
	{
		
		public static function addAluguel($post){
			$db = new Database();
			$dadosPessoa['dadosCliente'] = '';
			if(isset($post['cpf'])){
				$dadosPessoa['cpf'] = $post['cpf'];
				$dadosPessoa['rg'] = $post['rg'];
				$dadosPessoa['nome'] = $post['nome'];
				$dadosPessoa['endereco'] = $post['endereco'];
				$dadosPessoa['cep'] = $post['cep'];
				$dadosPessoa['id_cnh'] = $post['id_cnh'];

				$dbp = new ClienteModel($dadosPessoa);
				$db->conectar();
				$result = $dbp->criaCliente($db)
				$db->desconectar();
				if($result)
					$dadosAluguel['dadosCliente'] = $result;
				else
					return 'false';
			}
			$dadosVeiculo['dadosVeiculo'];	
			if(isset($post['chassi'])){
				$dadosVeiculo['marca'] = $post['marca'];
				$dadosVeiculo['modelo'] = $post['modelo'];
				$dadosVeiculo['ano'] = $post['ano'];
				$dadosVeiculo['placa'] = $post['placa'];
				$dadosVeiculo['odometro'] = $post['odometro'];
				$dadosVeiculo['cor'] = $post['cor'];
				$dadosVeiculo['chassi'] = $post['chassi'];
				$dadosVeiculo['portas'] = $post['portas'];
				$dadosVeiculo['potencia'] = $post['potencia'];
				$dadosVeiculo['combustivel'] = $post['combustivel'];
				$dadosVeiculo['arCondicionado'] = $post['arCondicionado'];
				$dadosVeiculo['direcao'] = $post['direcao'];
				$dadosVeiculo['avarias'] = $post['avarias'];
				$dadosVeiculo['status'] = true;	

				$dbc = new ClienteModel($dadosPessoa);
				$db->conectar();
				$result = $dbc->criaCliente($db)
				$db->desconectar();
				if($result)
					$dadosAluguel['dadosVeiculo'] = $result;
				else
					return 'false';	
			}


			$dadosAluguel['data_saida'] = $post['data_saida'];
			$dadosAluguel['data_devolucao'] = $post['data_devolucao'];
			$dadosAluguel['valor'] = $post['valor'];
			$dadosAluguel['multa'] = $post['multa'];
			$dadosAluguel['novas_avarias'] = $post['novas_avarias'];
			$dadosAluguel['status'] = $post['status'];
	
			$dba = new AluguelModel($dadosAluguel);
			$dbh = $db->conectar();
			$result = $dba->criarAluguel($dbh);
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