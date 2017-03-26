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
					echo '<div class="alert alert-danger alert-dismissable">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <strong>Erro!</strong> Dados nao puderam ser inseridos. Favor verificar se esta conta é única ou o banco está funcionando.
						</div>';
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
				echo '<div class="alert alert-danger alert-dismissable">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <strong>Erro!</strong> Dados nao puderam ser inseridos. Favor verificar se o cnh é único ou o banco está funcionando.
						</div>';

			$dadosPessoa['nome'] = $post['nome'];
			$dadosPessoa['rg'] = $post['rg'];
			$dadosPessoa['cpf'] = $post['cpf'];
			$dadosPessoa['cep'] = $post['cep'];
			$dadosPessoa['endereco'] = $post['endereco'];
			/*echo '<pre>';
			var_dump($dadosPessoa);
			echo '</pre>';*/
			$dbp = new ClienteModel($dadosPessoa);
			$dbh = $db->conectar();
			$result = $dbp->criaCliente($dbh);
			$db->desconectar();			
			if($result)
				echo '<div class="alert alert-success alert-dismissable">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  Dados inseridos com <strong>sucesso</strong>.
						</div>';
			else
				echo '<div class="alert alert-danger alert-dismissable">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <strong>Erro!</strong> Dados nao puderam ser inseridos. Favor verificar se o cpf é único ou o banco está funcionando.
						</div>';
		}
		public static function readClienteCpf($post){
			$db = new Database();
			$dados['cpf'] = $post['cpf'];
			$dbh = $db->conectar();
			$result = ClienteModel::buscaClienteCpf($dbh,$dados['cpf']);
			$db->desconectar();
			/*echo '<pre>';
				var_dump($result[0]);
			echo '</pre>';*/			
			if($result){
				$result=$result[0];
				echo 
					$result['nome'].'=>'.
					$result['rg'].'=>'.
					$result['cpf'].'=>'.
					$result['cep'].'=>'.
					$result['endereco'];
				$dbh = $db->conectar();
				$resultCnh = CNHModel::buscaCnh($dbh,$result['id_cnh']);
				$db->desconectar();
				if($resultCnh){
					$resultCnh=$resultCnh[0];
					echo 
						'=>'.$resultCnh['numero'].'=>'.
						$resultCnh['categoria'].'=>'.
						$resultCnh['validade'];
				}
				else
					echo 'erro';
				$dados['agencia'] = $result['dados_bancarios_agencia'];
				$dados['conta'] = $result['dados_bancarios_conta'];
				$dados['digito'] = $result['dados_bancarios_digito'];
				$dbh = $db->conectar();
				$resultConta = DadosBancariosModel::buscaDadosBancarios($dbh,$dados);
				$db->desconectar();
				if($resultConta){
					$resultConta=$resultConta[0];
					echo 
						'=>'.$resultConta['agencia'].'=>'.
						$resultConta['conta'].'=>'.
						$resultConta['digito'].'=>'.
						$resultConta['endereco'];
				}
				else
					echo 'erro';
			}
			else
				echo '';
		}
		public static function readAllClienteCpf(){
			$db = new Database();
			$dbh = $db->conectar();
			$result = ClienteModel::retornaTodosClientes($dbh);
			$db->desconectar();
			/*echo '<pre>';
				var_dump($result[0]);
			echo '</pre>';*/			
			if($result){
				foreach ($result as $cliente) {
					echo '<option value="'.$cliente['cpf'].'">'.$cliente['cpf'].'</option>';
				}
			}
			else
				echo '';
		}
	}
	if (isset($_POST)&&isset($_POST['acao'])) {
		switch ($_POST['acao']) {
			case 'adicionar':
				ClienteController::addCliente($_POST);
				break;
			case 'buscarCpf':
				ClienteController::readClienteCpf($_POST);
				break;
			case 'buscarTodosCpf':
				ClienteController::readAllClienteCpf();
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