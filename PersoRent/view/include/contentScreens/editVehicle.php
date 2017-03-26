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
				<legend>Editar Veículo</legend>
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
									<input class="form-control" type="text" name="chassi" id="chassi" readonly>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label class="control-label col-lg-3" for="portas">Qtd. Portas: </label>				
								<div class="col-lg-9">
									<input class="form-control" type="number" name="portas" id="portas" max="4" min="0">
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
							  	<label><input type="checkbox" name="arCondicionado" id="arCondicionado">Ar Condicionado</label>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="checkbox">
							  	<label><input type="checkbox" name="direcao" id="direcao">Direção Hidraulica</label>
							  	<input type="checkbox" name="status" id="status" hidden>
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
		$.post('../controller/veiculoController.php', {acao:'buscar', chassi:$('#chassiSearch').val()},function(e){
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
					$('#portas').val(aux[7]);
					$('#potencia').val(aux[8]);
					$('#combustivel').val(aux[9]);
					$('#arCondicionado').prop('checked', aux[10]);
					$('#direcao').prop('checked', aux[11]);
					$('#avarias').val(aux[12]);
					$('#status').prop('checked', aux[13]);
				});
			}
			$('#result').html(e);
		});
	});
	function camposPreenchidos(){
		if($('#marca').val().length==0){
			alert('wtf');
		}
		else{
			alert('nope');
		}
	}
	$('#botaoEditarVeiculo').on('click',function(){
		if(camposPreenchidos){		
			$.post('../controller/veiculoController.php', {
				acao: 'editar',
				marca:$('#marca').val(),
				modelo:$('#modelo').val(),
				ano:$('#ano').val(),
				placa:$('#placa').val(),
				odometro:$('#odometro').val(),
				cor:$('#cor').val(),
				chassi:$('#chassi').val(),
				portas:$('#portas').val(),
				potencia:$('#potencia').val(),
				combustivel:$('#combustivel').val(),
				arCondicionado:$('#arCondicionado').prop('checked'),
				direcao:$('#direcao').prop('checked'),
				avarias:$('#avarias').val(),
				status:$('#status').prop('checked')
			},function(e){
				$('#result').html(e);
				if(e.indexOf('success')>0)
					$('#formAddVehicle')[0].reset();
			});
		}
		else{
			$('#result').html('<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Erro!</strong> Preencha os campos.</div>');
		}
	});
	$('#voltar').on('click',function(){
		$.post('../controller/redireciona.php', {page:this.value},function(e){
			$('#content').html(e);
		});
	});
	</script>
</div>