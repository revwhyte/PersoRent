<div id="editClient">
	<div class="form-horizontal" id="buscarCliente">
		<fieldset>
			<legend>Buscar Cliente</legend>
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label class="control-label col-lg-3" for="nome">Nome: </label>
						<div class="col-lg-9">
							<input class="form-control" type="text" name="nomeSearch" id="nomeSearch" placeholder="Nome completo">
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label class="control-label col-lg-3" for="cpf">CPF: </label>
						<div class="col-lg-9">
							<input class="form-control" type="text" name="cpfSearch" id="cpfSearch">
						</div>
					</div>
				</div>				
				<div class="row">
					<br>
					<div class="col-lg-2">						
						<input type="button" class="btn btn-default" id="voltar" value="Voltar">
					</div>
				</div>
			</div>
		</fieldset>
	</div>
	<div class="form-horizontal" id="editarCliente" hidden>
		<form id="formEditCliente">
			<div class="form-horizontal">
				<fieldset>
					<legend>Editar Cliente</legend>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label class="control-label col-lg-3" for="nome">Nome: </label>
								<div class="col-lg-9">
									<input class="form-control" type="text" name="nome" id="nome" placeholder="Nome completo">
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label class="control-label col-lg-3" for="rg">RG: </label>
								<div class="col-lg-9">
									<input class="form-control" type="text" name="rg" id="rg">
								</div>
							</div>
						</div>
					</div>				
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label class="control-label col-lg-3" for="cpf">CPF:</label>
								<div class="col-lg-9">
									<input class="form-control" type="text" name="cpf" id="cpf" placeholder="###.###.###-##" readonly="">
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label class="control-label col-lg-3" for="cep">CEP: </label>						
								<div class="col-lg-9">
									<input class="form-control" type="text" name="cep" id="cep" placeholder="##.###-##">
								</div>
							</div>
						</div>
					</div>								
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label class="control-label col-lg-2" for="endereco">Endereco: </label>					
								<div class="col-lg-10">							
									<textarea class="form-control" name="endereco" id="endereco" placeholder="ruas shurimenses" style="resize: none; width: 100%;"></textarea>
								</div>
							</div>
						</div>
					</div>
					<h4>Informações da Habilitação</h4>
					<hr>
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<label class="control-label col-lg-3" for="numero">Numero de Serie: </label>
								<div class="col-lg-9">							
									<input class="form-control" type="text" name="numero" id="numero" readonly="">
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label class="control-label col-lg-3" for="categoria">Categoria: </label>
								<div class="col-lg-9">							
									<input class="form-control" type="text" name="categoria" id="categoria">
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label class="control-label col-lg-3" for="validade">Validade: </label>						
								<div class="col-lg-9">
									<input class="form-control" type="date" name="validade" id="validade">
								</div>
							</div>
						</div>
					</div>
					<h4>Informações Bancárias</h4>
					<hr>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label class="control-label col-lg-3" for="agencia">Agencia: </label>				
								<div class="col-lg-9">
									<input class="form-control" type="text" name="agencia" id="agencia" readonly="">
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label class="control-label col-lg-3" for="conta">Conta: </label>				
								<div class="col-lg-7">
									<input class="form-control" type="text" name="conta" id="conta" readonly="">
								</div>				
								<div class="col-lg-2">
									<input class="form-control" type="text" name="digito" id="digito" maxlength="1" readonly="">
								</div>
							</div>
						</div>
					</div>								
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label class="control-label col-lg-2" for="enderecoAgencia">Endereco da Agencia: </label>					
								<div class="col-lg-10">							
									<textarea class="form-control" name="enderecoBanco" id="enderecoAgencia" placeholder="Salvador" style="resize: none; width: 100%;"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-2">						
							<input type="button" class="btn btn-default" id="cancelar" value="Cancelar">
						</div>
						<div class="col-lg-offset-8 col-lg-2">
							<input type="button" class="btn btn-success pull-right" id="botaoEditarCliente" value="Editar">
						</div>						
					</div>			
				</fieldset>
			</div>	
		</form>
	</div>
	<div class="form-horizontal" id="resultBuscar"></div>
	<div id="result"></div>
	<script>
	$(document).ready(function() { 
		$('#editarCliente').hide(); 
		$('#resultBuscar').hide();
	});
	$('#cancelar').on('click',function(){		
		$('#editarCliente').fadeOut("slow",function(){			
			$('#buscarCliente').fadeIn("slow");
		});
	});
	$('#cpfSearch').on('keyup',function(){
		$('#nomeSearch').val("");
		$('#resultBuscar').fadeOut("slow");
		$.post('../controller/clienteController.php', {acao:'buscarCpf', cpf:$('#cpfSearch').val()},function(e){
			if (e=='') {
				$('#editarCliente').fadeOut("slow");
			}
			else{
				$('#buscarCliente').fadeOut("slow",function(){
					$('#editarCliente').fadeIn("slow");
					var aux = e.split('=>');
					$('#nome').val(aux[0]);
					$('#rg').val(aux[1]);
					$('#cpf').val(aux[2]);
					$('#cep').val(aux[3]);
					$('#endereco').val(aux[4]);
					$('#numero').val(aux[5]);
					$('#categoria').val(aux[6]);
					$('#validade').val(aux[7]);
					$('#agencia').val(aux[8]);
					$('#conta').val(aux[9]);
					$('#digito').val(aux[10]);
					$('#enderecoAgencia').val(aux[11]);
				});
			}
			//$('#result').html(e);
		});
	});
	$('#nomeSearch').on('keyup',function(){
		$('#cpfSearch').val("");
		$.post('../controller/clienteController.php', {acao:'buscaNome', nome:$('#nomeSearch').val()},function(e){
			if (e=='') {
				$('#editarCliente').fadeOut("slow");
				$('#resultBuscar').fadeOut("slow");
			}
			else{
				$('#resultBuscar').fadeIn("slow");				
				$('#resultBuscar').html(e);
			}
			//$('#result').html(e);
		});
	});	
	function escolha(cpf){
		$('#nomeSearch').val("");
		$('#resultBuscar').fadeOut("slow");//alert(cpf);
		$.post('../controller/clienteController.php', {acao:'buscarCpf',cpf:cpf},function(e){
			if (e=='') {
				$('#editarCliente').fadeOut("slow");
			}
			else{
				$('#buscarCliente').fadeOut("slow",function(){
					$('#editarCliente').fadeIn("slow");
					var aux = e.split('=>');
					$('#nome').val(aux[0]);
					$('#rg').val(aux[1]);
					$('#cpf').val(aux[2]);
					$('#cep').val(aux[3]);
					$('#endereco').val(aux[4]);
					$('#numero').val(aux[5]);
					$('#categoria').val(aux[6]);
					$('#validade').val(aux[7]);
					$('#agencia').val(aux[8]);
					$('#conta').val(aux[9]);
					$('#digito').val(aux[10]);
					$('#enderecoAgencia').val(aux[11]);
				});
			}
			//$('#result').hide();
		});
	};	
	$('#botaoEditarCliente').on('click',function(){
		$.post('../controller/clienteController.php', {
			acao:'editar',
			nome:$('#nome').val(),
			rg:$('#rg').val(),
			cpf:$('#cpf').val(),
			cep:$('#cep').val(),
			endereco:$('#endereco').val(),
			numero:$('#numero').val(),
			categoria:$('#categoria').val(),
			validade:$('#validade').val(),
			agencia:$('#agencia').val(),
			conta:$('#conta').val(),
			digito:$('#digito').val(),
			enderecoAgencia:$('#enderecoAgencia').val()
		},function(e){
			$('#result').html(e);
			if(e.indexOf('success')>0)
				$('#cancelar').click();
		});
	});
	$('#voltar').on('click',function(){
		$.post('../controller/redireciona.php', {page:this.value},function(e){
			$('#content').html(e);
		});
	});
	</script>
</div>