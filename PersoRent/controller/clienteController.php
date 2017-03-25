<?php 
	session_start();
	require_once '../model/Database.php';
	require_once '../model/ClienteModel.php';
	/*require_once 'DadosBancariosController.php';
	require_once 'DadosCarteiraController.php';*/

	class ClienteController
	{
		
		public function addCliente($post){
			$db = new Database();
			$dadosPessoa['dadosBanco'] = '';
			if(isset($post['agencia'])){
				$dadosBanco['agencia'] = $post['agencia'];
				$dadosBanco['conta'] = $post['conta'];
				$dadosBanco['digito'] = $post['digito'];
				$dadosBanco['endereco'] = $post['enderecoAgencia'];
				$dbm = new DadosBancariosModel($dadosBanco);
				$db->conectar();
				$result = $dbm->criaDadosBancarios($db)
				$db->desconectar();
				if($result)
					$dadosPessoa['dadosBanco'] = $result;
				else
					return 'false';
			}	
			
			$dadosCarteira['numero'] = $post['numero'];
			$dadosCarteira['categoria'] = $post['categoria'];
			$dadosCarteira['validade'] = $post['validade'];
			$dbc = new DadosCarteiraModel($dadosCarteira);
			$db->conectar();
			$result = $dbc->criaDadosCarteira($db);
			$db->desconectar();
			if($result)
				$dadosPessoa['dadosCarteira'] = $result;
			else
				return 'false';

			$dadosPessoa['nome'] = $post['nome'];
			$dadosPessoa['rg'] = $post['rg'];
			$dadosPessoa['cpf'] = $post['cpf'];
			$dadosPessoa['cep'] = $post['cep'];
			$dadosPessoa['endereco'] = $post['endereco'];
			$dbp = new ClienteModel($dadosPessoa);
			$db->conectar();
			$result = $dbp->criaCliente($db);
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
				ClienteController::addCliente($_POST);
				break;
			case 'editar':
				ClienteController::editCliente($_POST);
				break;
			case 'remover':
				ClienteController::delCliente($_POST);
				break;
			
			default:
				
				break;
		}
	}

?>