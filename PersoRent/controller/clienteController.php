<?php 
	session_start();
	require_once '../model/Database.php';
	require_once '../model/ClienteModel.php';
	require_once '../model/CNHModel.php';
	require_once '../model/DadosBancariosModel.php';
	/*require_once 'DadosBancariosController.php';
	require_once 'DadosCarteiraController.php';*/

	class ClienteController
	{
		
		public function addCliente($post){
			$db = new Database();
			$dadosPessoa['dados_bancarios_agencia'] = '';
			$dadosPessoa['dados_bancarios_conta'] = '';
			$dadosPessoa['dados_bancarios_digito'] = '';
			if(isset($post['agencia'])){
				$dadosBanco['agencia'] = $post['agencia'];
				$dadosBanco['conta'] = $post['conta'];
				$dadosBanco['digito'] = $post['digito'];
				$dadosBanco['endereco'] = $post['enderecoAgencia'];
				$dbm = new DadosBancariosModel($dadosBanco);
				$dbh = $db->conectar();
				$result = $dbm->criaDadosBancarios($dbh);
				$db->desconectar();
				if($result){					
					$dadosPessoa['dados_bancarios_agencia'] = $post['agencia'];
					$dadosPessoa['dados_bancarios_conta'] = $post['conta'];
					$dadosPessoa['dados_bancarios_digito'] = $post['digito'];
				}
				else
					echo 'erroDadosBancarios';
			}	
			
			$dadosCarteira['numero'] = $post['numero'];
			$dadosCarteira['categoria'] = $post['categoria'];
			$dadosCarteira['validade'] = $post['validade'];
			$dbc = new CNHModel($dadosCarteira);
			$dbh = $db->conectar();
			$result = $dbc->criaCNH($dbh);
			$db->desconectar();
			if($result)
				$dadosPessoa['id_cnh'] = $post['numero'];
			else
				echo 'erroCarteira'.$result;

			$dadosPessoa['nome'] = $post['nome'];
			$dadosPessoa['rg'] = $post['rg'];
			$dadosPessoa['cpf'] = $post['cpf'];
			$dadosPessoa['cep'] = $post['cep'];
			$dadosPessoa['endereco'] = $post['endereco'];
			echo '<pre>';
			var_dump($dadosPessoa);
			echo '</pre>';
			$dbp = new ClienteModel($dadosPessoa);
			$dbh = $db->conectar();
			$result = $dbp->criaCliente($dbh);
			$db->desconectar();
			if($result)
				echo 'acerto';
			else
				echo 'erro';
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