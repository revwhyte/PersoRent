<div id="addClient">
	<form id="formAddCliente">
		<div class="form-horizontal">
			<fieldset>
				<legend>Adicionar Cliente</legend>
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
								<input class="form-control" type="text" name="cpf" id="cpf" placeholder="000.000.000-00">
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label class="control-label col-lg-3" for="cep">CEP: </label>						
							<div class="col-lg-9">
								<input class="form-control" type="text" name="cep" id="cep" placeholder="00.000-00">
							</div>
						</div>
					</div>
				</div>								
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label class="control-label col-lg-2" for="endereco">Endereço: </label>					
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
							<label class="control-label col-lg-3" for="numero">Número de Serie: </label>
							<div class="col-lg-9">							
								<input class="form-control" type="text" name="numero" id="numero" placeholder="Digite apenas números">
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label class="control-label col-lg-3" for="categoria">Categoria: </label>
							<div class="col-lg-9">							
								<input class="form-control" type="text" name="categoria" id="categoria" placeholder="A, B, AB, ...">
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
							<label class="control-label col-lg-3" for="agencia">Agência: </label>				
							<div class="col-lg-9">
								<input class="form-control" type="text" name="agencia" id="agencia">
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label class="control-label col-lg-3" for="conta">Conta: </label>				
							<div class="col-lg-7">
								<input class="form-control" type="text" name="conta" id="conta">
							</div>				
							<div class="col-lg-2">
								<input class="form-control" type="text" name="digito" id="digito" maxlength="1">
							</div>
						</div>
					</div>
				</div>								
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label class="control-label col-lg-2" for="enderecoAgencia">Endereço da Agência: </label>					
							<div class="col-lg-10">							
								<textarea class="form-control" name="enderecoBanco" id="enderecoAgencia" placeholder="ruas shurimenses" style="resize: none; width: 100%;"></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-2">
						<input type="button" class="btn btn-default" id="voltar" value="Voltar">	
					</div>
					<div class="col-lg-offset-8 col-lg-2">
						<input type="button" class="btn btn-success pull-right" id="cadastrarCliente" value="Cadastrar">
					</div>
				</div>			
			</fieldset>
		</div>	
	</form>
	<div id="result"></div>
	<script>	
	$('#cadastrarCliente').on('click',function(){
		$.post('../controller/clienteController.php', {
			acao:'adicionar',
			nome:$('#nome').val(),
			rg:$('#rg').val(),
			cpf:$('#cpf').cleanVal(),
			cep:$('#cep').cleanVal(),
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
					$('#formAddCliente')[0].reset();
		});
	});
	$('#voltar').on('click',function(){
		$.post('../controller/redireciona.php', {page:this.value},function(e){
			$('#content').html(e);
		});
	});
	</script>
</div>