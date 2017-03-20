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
						<button class="btn btn-default" id="voltar" value="voltar">Voltar</button>	
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
	$('#cadastrarVehicle').on('click',function(){
		$.post('../controller/teste.php', {
			marca:$('#marca').val(),
			modelo:$('#modelo').val(),
			ano:$('#ano').val(),
			placa:$('#placa').val(),
			odometro:$('#odometro').val(),
			cor:$('#cor').val(),
			chassi:$('#chassi').val(),
			qtdPorta:$('#qtdPorta').val(),
			potencia:$('#potencia').val(),
			combustivel:$('#combustivel').val(),
			ar:$('#ar').prop('checked'),
			direcao:$('#direcao').prop('checked'),
			avarias:$('#avarias').val(),
		},function(e){
			$('#result').html(e);
			$('#formAddVehicle')[0].reset();
		});
	});
	</script>
</div>