<div id="addVehicle">
	<form>
		<div class="form-horizontal">
			<fieldset>
				<legend>Adicionar Veículo</legend>
				<div class="col-lg-4">
					<div class="form-group">
						<label class="control-label col-lg-3" for="marca">Marca: </label>
						<div class="col-lg-9">
							<input class="form-control" type="text" name="marca" placeholder="Marca">
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label class="control-label col-lg-3" for="modelo">Modelo: </label>
						<div class="col-lg-9">
							<input class="form-control" type="text" name="modelo" placeholder="Modelo">
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label class="control-label col-lg-3" for="ano">Ano:</label>
						<div class="col-lg-9">
							<input class="form-control" type="date" name="ano" id="ano" placeholder="2017">
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label class="control-label col-lg-3" for="placa">Placa: </label>						
						<div class="col-lg-9">
							<input class="form-control" type="text" name="placa" placeholder="xyz1234">
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label class="control-label col-lg-3" for="odometro">Odometro: </label>
						<div class="col-lg-9">							
							<input class="form-control" type="number" name="odometro" placeholder="1234">
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label class="control-label col-lg-3" for="cor">Cor: </label>
						<div class="col-lg-9">							
							<input class="form-control" type="text" name="cor">
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label class="control-label col-lg-3" for="chassi">Chassi: </label>						
						<div class="col-lg-9">
							<input class="form-control" type="text" name="chassi">
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label class="control-label col-lg-3" for="qtdPorta">Qtd. Portas: </label>				
						<div class="col-lg-9">
							<input class="form-control" type="number" name="qtdPorta" max="4" min="0">
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label class="control-label col-lg-3" for="combustivel">Combustível: </label>
						<div class="col-lg-9">
							<select class="form-control" name="combustivel">
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
					<div class="form-group">
						<label class="control-label col-lg-3" for="potencia">Potencia: </label>				
						<div class="col-lg-9">
							<input class="form-control" type="number" name="potencia" max="8" min="0" step="0.1">
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="checkbox">
					  	<label><input type="checkbox" name="ar">Ar Condicionado</label>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="checkbox">
					  	<label><input type="checkbox" name="direcao">Direção Hidraulica</label>
					</div>
				</div>				
				<!--div class="col-lg-4">
					<div class="form-group">
						<div class="checkbox">
							<label class="control-label" for="ar">Ar Condicionado: <input class="form-control" type="checkbox" name="ar"></label>
						</div>
					</div>
				</div>
				<div class="col-lg-4" >
					<div class="form-group">
						<div class="checkbox">
							<label class="control-label" for="direcao">Direção Hidraulica: <input class="form-control" type="checkbox" name="direcao"></label>
						</div>
					</div>
				</div-->

				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label class="control-label col-lg-2" for="avarias">Avarias: </label>					
							<div class="col-lg-10">							
								<textarea class="form-control" name="avarias" placeholder="motô pifado" style="resize: none; width: 100%;"></textarea>
							</div>
						</div>
					</div>
				</div>
			</fieldset>
		</div>
		<button class="btn btn-default" id="voltar" value="voltar">Voltar</button>		
	</form>
</div>