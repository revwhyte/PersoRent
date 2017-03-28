<div id="editRent">
	<div class="form-horizontal" id="buscarAluguel">
		<fieldset>
			<legend>Buscar Aluguel</legend>
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<label class="control-label col-lg-3" for="dataFinal">Data Devolucao: </label>
						<div class="col-lg-9">
							<input class="form-control" type="date" name="dataFinal" id="dataFinal">
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
	<div id="resultConsulta">
		<legend>Escolha Aluguel</legend>
		<div id="resultBuscar"></div>		
	</div>
	<div class="form-horizontal" id="editarAluguel">
		<fieldset>
			<legend>Editar Aluguel</legend>
			<h4>Dados aluguel</h4>
			<div class="row">
				<div class="col-lg-4">
					<div class="form-group">
						<label class="control-label col-lg-3" for="data_saida">Data Saída: </label>
						<div class="col-lg-9">
							<input type="date" class="form-control" name="data_saida" id="data_saida">
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label class="control-label col-lg-3" for="data_devolucao">Data Devolução: </label>
						<div class="col-lg-9">
							<input type="date" class="form-control" name="data_devolucao" id="data_devolucao">
						</div>
					</div>
				</div>					
				<div class="col-lg-4">
					<div class="form-group">
						<label class="control-label col-lg-3" for="valor">Valor: </label>
						<div class="col-lg-9">
							<input type="text" class="form-control" name="valor" id="valor">
						</div>
					</div>
				</div>
			</div>	
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label class="control-label col-lg-3" for="veiculo_chassi">Chassi: </label>
						<div class="col-lg-9">
							<input type="text" class="form-control" name="veiculo_chassi" id="veiculo_chassi">
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label class="control-label col-lg-3" for="cliente_cpf">CPF: </label>
						<div class="col-lg-9">
							<input type="text" class="form-control" name="cliente_cpf" id="cliente_cpf">
						</div>
					</div>
				</div>	
				<div class="col-lg-12" hidden>
					<div class="form-group">
						<label class="control-label col-lg-3" for="id">Id: </label>
						<div class="col-lg-9">
							<input type="text" class="form-control" name="id" id="id">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label class="control-label col-lg-3" for="multa">Multa: </label>
						<div class="col-lg-9">
							<input type="text" class="form-control" name="multa" id="multa">
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="checkbox">
						  	<label><input type="checkbox" name="status" id="status" disabled>Status: Não finalizado</label>
						</div>
				</div>
			<div class="row">	
				<div class="col-lg-12">
					<div class="form-group">
						<label class="control-label col-lg-2" for="novas_avarias">Novas Avarias: </label>					
							<div class="col-lg-10">							
								<textarea class="form-control" name="novas_avarias" id="novas_avarias" placeholder="" style="resize: none; width: 100%;"></textarea>
							</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-lg-2">						
					<input type="button" class="btn btn-default" id="cancelar" value="Cancelar">
				</div>
				<div class="col-lg-offset-8 col-lg-2">
					<input type="button" class="btn btn-success pull-right" id="editar" value="Editar">
				</div>						
			</div>
		</fieldset>
	</div>
	<div id="result"></div>
	<script>	
	$(document).ready(function() { 
		$('#resultConsulta').hide(); 
		$('#editarAluguel').hide();
	});
	$('#cancelar').on('click',function(){		
		$('#editarAluguel').fadeOut("slow",function(){			
			$('#buscarAluguel').fadeIn("slow");			
			$('#resultConsulta').hide();
		});
	});
	$('#dataFinal').on('change',function(){
		$('#resultConsulta').fadeOut("slow");
		$.post('../controller/aluguelController.php', {acao:'buscaFinalizar', data_devolucao:$('#dataFinal').val()},function(e){
			if (e=='') {
				$('#resultConsulta').fadeOut("slow");
			}
			else{					
				$('#resultConsulta').fadeIn("slow");					
				$('#resultBuscar').fadeIn("slow");
				$('#resultBuscar').html(e);
			}
			//$('#result').html(e);
		});
	});
		
	function escolha(id){
		$('#resultBuscar').fadeOut("slow");//alert(cpf);
		$.post('../controller/aluguelController.php', {acao:'buscaId', id:id},function(e){
			if (e=='') {
				$('#editarAluguel').fadeOut("slow");
			}
			else{
				$('#buscarAluguel').fadeOut("slow",function(){
					$('#resultConsulta').hide();
					$('#editarAluguel').fadeIn("slow");
					var aux = e.split('=>');
					$('#data_saida').val(aux[0]);
					$('#data_devolucao').val(aux[1]);
					$('#valor').val(aux[2]);
					/*$('#multa').val(aux[3]);
					$('#novas_avarias').val(aux[4]);
					$('#status').val(aux[5]);*/
					$('#veiculo_chassi').val(aux[6]);
					$('#cliente_cpf').val(aux[7]);
					$('#id').val(aux[8]);
				});
			}
			//$('#result').html(e);
		});
	};
	$('#editar').on('click', function (){
		$.post('../controller/aluguelController.php', {
			acao:'editaAluguel',
			data_saida:$('#data_saida').val(),
			data_devolucao:$('#data_devolucao').val(),
			valor:$('#valor').val(),
			multa:$('#multa').val(),
			novas_avarias:$('#novas_avarias').val(),
			status:$('#status').val(),
			veiculo_chassi:$('#veiculo_chassi').val(),
			cliente_cpf:$('#cliente_cpf').val(),
			id:$('#id').val()
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