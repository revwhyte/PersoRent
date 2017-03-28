<div id="addRent">
	<form id="formAddAluguel">
		<div class="form-horizontal">
			<fieldset>
				<legend>Adicionar Aluguel</legend>
				<h4>Escolha o cliente</h4>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label class="control-label col-lg-3" for="cliente">Cliente: </label>
							<div class="col-lg-9">
								<select class="form-control" name="cliente" id="cliente" required>
									
								</select>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group" id="clientResult" hidden="">
							<!--label class="control-label col-lg-3" for="cliente">Cliente: </label>
							<div class="col-lg-9">
								<select class="form-control" name="cliente" id="cliente" required>
									
								</select>
							</div-->
						</div>
					</div>
				</div>	
				<h4>Escolha o veículo</h4>			
				<div class="row">
					<div class="col-lg-4">
						<div class="form-group">
							<label class="control-label col-lg-3" for="marca">Marca: </label>
							<div class="col-lg-9">
								<select class="form-control" name="marca" id="marca" required>
									
								</select>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label class="control-label col-lg-3" for="modelo">Modelo: </label>
							<div class="col-lg-9">
								<select class="form-control" name="modelo" id="modelo" required>
									
								</select>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label class="control-label col-lg-3" for="portas">Qtd. Portas: </label>
							<div class="col-lg-9">
								<select class="form-control" name="portas" id="portas" required>
									
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="row" id="resultCarro"></div>
				<h4>Dados aluguel</h4>
				<div class="row">
					<div class="col-lg-4">
						<div class="form-group">
							<label class="control-label col-lg-3" for="data_saida">Data Saída: </label>
							<div class="col-lg-9">
								<input type="date" class="form-control valor" name="data_saida" id="data_saida" required>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label class="control-label col-lg-3" for="data_devolucao">Data Devolução: </label>
							<div class="col-lg-9">
								<input type="date" class="form-control valor" name="data_devolucao" id="data_devolucao" required>
							</div>
						</div>
					</div>					
					<div class="col-lg-4">
						<div class="form-group">
							<label class="control-label col-lg-3" for="valor">Valor: </label>
							<div class="col-lg-9">
								<input type="text" class="form-control" name="valor" id="valor" required>
							</div>
						</div>
					</div>
				</div>					
				<div class="row">
					<div class="col-lg-2">
						<input type="button" class="btn btn-default" id="voltar" value="Voltar">	
					</div>
					<div class="col-lg-offset-8 col-lg-2">
						<input type="button" class="btn btn-success pull-right" id="alugarVeiculo" value="Alugar">
					</div>
				</div>	
			</fieldset>
		</div>	
	</form>
	<div id="result"></div>
	<script>
	$('#cliente').change(function(){
		$.post('../controller/clienteController.php', {acao:'buscarCpf',cpf:$('#cliente').val()},function(e){
			var aux = e.split('=>');
			$('#clientResult').show();
			$('#clientResult').html('<div class="well well-sm col-lg-12">Nome: '+aux[0]+' Cpf: '+aux[2]+'</div>');
		});
	});	
	$(document).ready(function(){
		$.post('../controller/clienteController.php', {acao:'buscarTodosCpf'},function(e){
			$('#cliente').html(e);
			$('#cliente').change();
		});
	});	
	$('#marca').change(function(){
		$.post('../controller/veiculoController.php', {acao:'buscarTodosModelo',marca:$('#marca').val()},function(e){
			$('#modelo').html(e);
			$('#modelo').change();
		});
	});	
	$(document).ready(function(){
		$.post('../controller/veiculoController.php', {acao:'buscarTodosMarca'},function(e){
			$('#marca').html(e);
			$('#marca').change();
		});
	});	
	$('#modelo').change(function(){
		$.post('../controller/veiculoController.php', {acao:'buscarTodosPorta',marca:$('#marca').val(), modelo:$('#modelo').val()},function(e){
			$('#portas').html(e);
			$('#portas').change();
		});
	});	
	$('#portas').change(function(){
		$.post('../controller/veiculoController.php', {acao:'buscarTodosFiltro',marca:$('#marca').val(), modelo:$('#modelo').val(), portas:$('#portas').val()},function(e){
			$('#resultCarro').html(e);
		});
	});
	$('.valor').on('change',function(){
		if($('#data_saida').val()!='' && $('#data_devolucao').val()!=''){
			var date2 = $('#data_devolucao').val().split('-');
			var date1 = $('#data_saida').val().split('-');
			var date2 = new Date(date2[0], date2[1], date2[2]);
			var date1 = new Date(date1[0], date1[1], date1[2]);
			var diff = ((date2-date1) / 1000 / 60 / 60 / 24);
			if(diff>0){
				var chassi = $('input[name=chassi]:checked', '#formAddAluguel').val();
				var pot = $('#pot'+chassi).val();
				var ar = 1+(0.2*$('#ar'+chassi).val());
				var direcao = 1+(0.15*$('#dir'+chassi).val());
				var numero = (50*pot*ar*direcao)*diff;
				$('#valor').val( (Math.round(numero * 100)/100).toFixed(2) );
			}
		}
	});
	$('#alugarVeiculo').on('click',function(){
		$.post('../controller/aluguelController.php', {
			acao:'adicionar',
			cliente_cpf:$('#cliente').val(),
			veiculo_chassi:$('input[name=chassi]:checked', '#formAddAluguel').val(),
			data_saida:$('#data_saida').val(),
			data_devolucao:$('#data_devolucao').val(),
			valor:$('#valor').val()
		},function(e){
			$('#result').html(e);
				if(e.indexOf('success')>0)
					$('#formAddAluguel')[0].reset();
		});
	});
	$('#voltar').on('click',function(){
		$.post('../controller/redireciona.php', {page:this.value},function(e){
			$('#content').html(e);
		});
	});
	</script>
</div>