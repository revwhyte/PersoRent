<div id="addVehicle">
	<form id="formAddVehicle">
		<div class="form-horizontal">
			<fieldset>
				<legend>Adicionar Veículo</legend>
				<div class="row">
					<div class="col-lg-4">
						<div class="form-group">
							<label class="control-label col-lg-3" for="marca">Marca: </label>
							<div class="col-lg-9">
								<input class="form-control requerido" type="text" name="marca" id="marca" placeholder="Marca" required>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label class="control-label col-lg-3" for="modelo">Modelo: </label>
							<div class="col-lg-9">
								<input class="form-control requerido" type="text" name="modelo" id="modelo" placeholder="Modelo" required>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label class="control-label col-lg-3" for="ano">Ano:</label>
							<div class="col-lg-9">
								<input class="form-control requerido" type="number" name="ano" id="ano" placeholder="2017" min="1920" value="2017" required>
							</div>
						</div>
					</div>
				</div>				
				<div class="row">
					<div class="col-lg-4">
						<div class="form-group">
							<label class="control-label col-lg-3" for="placa">Placa: </label>						
							<div class="col-lg-9">
								<input class="form-control requerido" type="text" name="placa" id="placa" placeholder="AAA-0000" required>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label class="control-label col-lg-3" for="odometro">Odômetro: </label>
							<div class="col-lg-9">							
								<input class="form-control requerido" type="number" name="odometro" id="odometro" min="0" required>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label class="control-label col-lg-3" for="cor">Cor: </label>
							<div class="col-lg-9">							
								<input class="form-control requerido" type="text" name="cor" id="cor" required>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4">
						<div class="form-group">
							<label class="control-label col-lg-3" for="chassi">Chassi: </label>						
							<div class="col-lg-9">
								<input class="form-control requerido" type="text" name="chassi" id="chassi" placeholder="Digite apenas caracteres" required>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label class="control-label col-lg-3" for="portas">Qtd. Portas: </label>				
							<div class="col-lg-9">
								<input class="form-control requerido" type="number" name="portas" id="portas" max="4" min="0" required>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label class="control-label col-lg-3" for="potencia">Potência: </label>				
							<div class="col-lg-9">
								<input class="form-control requerido" type="number" name="potencia" id="potencia" max="8" min="1" step="0.1" required>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4">
						<div class="form-group">
							<label class="control-label col-lg-3" for="combustivel">Combustível: </label>
							<div class="col-lg-9">
								<select class="form-control" name="combustivel" id="combustivel" required>
									<option value="0" selected>Gasolina</option>
									<option value="1">Etanol</option>
									<option value="2">Flex(Gasolina/Etanol)</option>
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
						  	<label><input type="checkbox" name="direcao" id="direcao">Direção Hidráulica</label>
						</div>
					</div>
				</div>				
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label class="control-label col-lg-2" for="avarias">Avarias: </label>					
							<div class="col-lg-10">							
								<textarea class="form-control" name="avarias" id="avarias" placeholder="Ex: Arranhões e amassados na porta direita" style="resize: none; width: 100%;"></textarea>
							</div>
						</div>
					</div>
				</div>	
				<div class="row">
					<div class="col-lg-2">
						<input type="button" class="btn btn-default" id="voltar" value="Voltar">	
					</div>
					<div class="col-lg-offset-8 col-lg-2">
						<input type="button" class="btn btn-success pull-right" id="cadastrarVehicle" value="Cadastrar">
					</div>
				</div>			
			</fieldset>
		</div>	
	</form>
	<div id="result"></div>
	<script>
	function camposPreenchidos(){
		if($('#marca').val().length==0){
			alert('wtf');
		}
		else{
			alert('nope');
		}
	}

	$('#cadastrarVehicle').on('click',function(){
		if(camposPreenchidos){		
			$.post('../controller/veiculoController.php', {
				acao: 'adicionar',
				marca:$('#marca').val(),
				modelo:$('#modelo').val(),
				ano:$('#ano').val(),
				placa:$('#placa').cleanVal(),
				odometro:$('#odometro').val(),
				cor:$('#cor').val(),
				chassi:$('#chassi').val(),
				portas:$('#portas').val(),
				potencia:$('#potencia').val(),
				combustivel:$('#combustivel').val(),
				arCondicionado:$('#arCondicionado').prop('checked'),
				direcao:$('#direcao').prop('checked'),
				avarias:$('#avarias').val(),
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