<div id="editVehicle">
	<div class="form-horizontal" id="buscarVeiculo">
		<fieldset>
			<legend>Buscar Veículo</legend>
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<label class="control-label col-lg-3" for="chassiSearch">Chassi: </label>
						<div class="col-lg-9">
							<input class="form-control" type="text" name="chassiSearch" id="chassiSearch" placeholder="Nº Chassi">
						</div>
					</div>
				</div>
			</div>		
			<div class="row">
				<div class="col-lg-2">
					<input type="button" class="btn btn-default" id="voltar" value="Voltar">	
				</div>
			</div>
		</fieldset>
	</div>
	<div class="form-horizontal" id="editarVeiculo" hidden>
		<form id="formEditVeiculo">
			<div class="form-horizontal">
			<fieldset>
				<legend>Adicionar Veículo</legend>
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<label class="control-label col-lg-3" for="marca">Marca: </label>
								<div class="col-lg-9">
									<input class="form-control" type="text" name="marca" id="marca" placeholder="Marca">
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label class="control-label col-lg-3" for="modelo">Modelo: </label>
								<div class="col-lg-9">
									<input class="form-control" type="text" name="modelo" id="modelo" placeholder="Modelo">
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label class="control-label col-lg-3" for="ano">Ano:</label>
								<div class="col-lg-9">
									<input class="form-control" type="date" name="ano" id="ano" placeholder="2017" min="1920">
								</div>
							</div>
						</div>
					</div>				
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<label class="control-label col-lg-3" for="placa">Placa: </label>						
								<div class="col-lg-9">
									<input class="form-control" type="text" name="placa" id="placa" placeholder="xyz1234">
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label class="control-label col-lg-3" for="odometro">Odometro: </label>
								<div class="col-lg-9">							
									<input class="form-control" type="number" name="odometro" id="odometro" placeholder="1234" min="0">
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label class="control-label col-lg-3" for="cor">Cor: </label>
								<div class="col-lg-9">							
									<input class="form-control" type="text" name="cor" id="cor">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<label class="control-label col-lg-3" for="chassi">Chassi: </label>						
								<div class="col-lg-9">
									<input class="form-control" type="text" name="chassi" id="chassi">
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label class="control-label col-lg-3" for="qtdPorta">Qtd. Portas: </label>				
								<div class="col-lg-9">
									<input class="form-control" type="number" name="qtdPorta" id="qtdPorta" max="4" min="0">
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label class="control-label col-lg-3" for="potencia">Potencia: </label>				
								<div class="col-lg-9">
									<input class="form-control" type="number" name="potencia" id="potencia" max="8" min="0" step="0.1">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<label class="control-label col-lg-3" for="combustivel">Combustível: </label>
								<div class="col-lg-9">
									<select class="form-control" name="combustivel" id="combustivel">
										<option value="0">Gasolina</option>
										<option value="1">Etanol</option>
										<option value="2">Flex(Gaso/Etan)</option>
										<option value="3">Diesel</option>
										<option value="4">Gás Natural</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="checkbox">
							  	<label><input type="checkbox" name="ar" id="ar">Ar Condicionado</label>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="checkbox">
							  	<label><input type="checkbox" name="direcao" id="direcao">Direção Hidraulica</label>
							</div>
						</div>
					</div>				
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label class="control-label col-lg-2" for="avarias">Avarias: </label>					
								<div class="col-lg-10">							
									<textarea class="form-control" name="avarias" id="avarias" placeholder="ex: Arranhões e amassados na porta direita" style="resize: none; width: 100%;"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-2">						
							<input type="button" class="btn btn-default" id="cancelar" value="Cancelar">
						</div>
						<div class="col-lg-offset-8 col-lg-2">
							<input type="button" class="btn btn-success pull-right" id="botaoEditarVeiculo" value="Editar">
						</div>						
					</div>		
				</fieldset>
			</div>	
		</form>
		<div id="result"></div>
	</div>
	<div class="form-horizontal" id="resultBuscar"></div>
	<script>
	$(document).ready(function() { 
		$('#editarVeiculo').hide(); 
		$('#resultBuscar').hide();
	});
	$('#cancelar').on('click',function(){		
		$('#editarVeiculo').fadeOut("slow",function(){			
			$('#buscarVeiculo').fadeIn("slow");
		});
	});
	
	$('#chassiSearch').on('keyup',function(){
		//$('#nomeSearch').val("");
		$('#resultBuscar').fadeOut("slow");
		$.post('../controller/teste.php', {chassi:$('#chassiSearch').val()},function(e){
			if (e=='') {
				$('#editarVeiculo').fadeOut("slow");
			}
			else{
				$('#buscarVeiculo').fadeOut("slow",function(){
					$('#editarVeiculo').fadeIn("slow");
					var aux = e.split('=>');
					$('#marca').val(aux[0]);
					$('#modelo').val(aux[1]);
					$('#ano').val(aux[2]);
					$('#placa').val(aux[3]);
					$('#odometro').val(aux[4]);
					$('#cor').val(aux[5]);
					$('#chassi').val(aux[6]);
					$('#qtdPorta').val(aux[7]);
					$('#potencia').val(aux[8]);
					$('#combustivel').val(aux[9]);
					$('#ar').val(aux[10]);
					$('#direcao').val(aux[11]);
					$('#avarias').val(aux[12]);
				});
			}
			//$('#result').html(e);
		});
	});
	/*
	$('#nomeSearch').on('keyup',function(){
		$('#cpfSearch').val("");
		$.post('../controller/teste.php', {nome:$('#nomeSearch').val()},function(e){
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
		$.post('../controller/teste.php', {cpf:cpf},function(e){
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
					$('#nSerie').val(aux[5]);
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
	};	
	$('#editarCliente').on('click',function(){
		$.post('../controller/teste.php', {
			nome:$('#nome').val(),
			rg:$('#rg').val(),
			cpf:$('#cpf').val(),
			cep:$('#cep').val(),
			endereco:$('#endereco').val(),
			nSerie:$('#nSerie').val(),
			categoria:$('#categoria').val(),
			validade:$('#validade').val(),
			agencia:$('#agencia').val(),
			conta:$('#conta').val(),
			digito:$('#digito').val(),
			enderecoAgencia:$('#enderecoAgencia').val()
		},function(e){
			$('#result').html(e);
			//$('#formEditCliente')[0].reset();
		});
	});*/
	$('#voltar').on('click',function(){
		$.post('../controller/redireciona.php', {page:this.value},function(e){
			$('#content').html(e);
		});
	});
	</script>
</div>