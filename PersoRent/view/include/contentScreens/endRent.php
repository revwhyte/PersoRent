<div id="endRent">
	<div class="form-horizontal" id="finalizarAluguel">
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
	<div id="endBuscar">
		<legend>Finalizar Aluguel</legend>
		<div id="resultBuscar"></div>		
	</div>
	<div class="form-horizontal" id="dadosFinalizacao">
		<fieldset>
			<legend>Finalizar Aluguel</legend>
			<h4>Dados aluguel</h4>
			<div class="row">
				<div class="col-lg-4">
					<div class="form-group">
						<label class="control-label col-lg-3" for="data_saida">Data Saída: </label>
						<div class="col-lg-9">
							<input type="date" class="form-control" name="data_saida" id="data_saida" readonly>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label class="control-label col-lg-3" for="data_devolucao">Data Devolução: </label>
						<div class="col-lg-9">
							<input type="date" class="form-control" name="data_devolucao" id="data_devolucao" readonly>
						</div>
					</div>
				</div>					
				<div class="col-lg-4">
					<div class="form-group">
						<label class="control-label col-lg-3" for="valor">Valor: </label>
						<div class="col-lg-9">
							<input type="text" class="form-control" name="valor" id="valor" readonly>
						</div>
					</div>
				</div>
			</div>	
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label class="control-label col-lg-3" for="veiculo_chassi">Chassi: </label>
						<div class="col-lg-9">
							<input type="text" class="form-control" name="veiculo_chassi" id="veiculo_chassi" readonly>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label class="control-label col-lg-3" for="cliente_cpf">CPF: </label>
						<div class="col-lg-9">
							<input type="text" class="form-control" name="cliente_cpf" id="cliente_cpf" readonly>
						</div>
					</div>
				</div>	
				<div class="col-lg-12" hidden>
					<div class="form-group">
						<label class="control-label col-lg-3" for="id">Id: </label>
						<div class="col-lg-9">
							<input type="text" class="form-control" name="id" id="id" readonly>
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
						  	<label><input type="checkbox" name="status" id="status">Status</label>
						</div>
				</div>
			<div class="row">	
				<div class="col-lg-12">
					<div class="form-group">
						<label class="control-label col-lg-2" for="novas_avarias">Novas Avarias: </label>					
							<div class="col-lg-10">							
								<textarea class="form-control" name="novas_avarias" id="novas_avarias" placeholder="ruas shurimenses" style="resize: none; width: 100%;"></textarea>
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
	<div id="result"></div>
	<script>	
	$(document).ready(function() { 
		$('#endBuscar').hide(); 
		$('#dadosFinalizacao').hide();
	});
	$('#cancelar').on('click',function(){		
		$('#dadosFinalizacao').fadeOut("slow",function(){			
			$('#finalizarAluguel').fadeIn("slow");
		});
	});
	$('#dataFinal').on('keyup',function(){
		$('#endBuscar').fadeOut("slow");
		$.post('../controller/aluguelController.php', {acao:'buscaFinalizar', data_devolucao:$('#dataFinal').val()},function(e){
			if (e=='') {
				$('#endBuscar').fadeOut("slow");
			}
			else{					
				$('#endBuscar').fadeIn("slow");					
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
				$('#dadosFinalizacao').fadeOut("slow");
			}
			else{
				$('#finalizarAluguel').fadeOut("slow",function(){
					$('#endBuscar').hide();
					$('#dadosFinalizacao').fadeIn("slow");
					var aux = e.split('=>');
					$('#data_saida').val(aux[0]);
					$('#data_devolucao').val(aux[1]);
					$('#valor').val(aux[2]);
					$('#multa').val(aux[3]);
					$('#novas_avarias').val(aux[4]);
					$('#status').val(aux[5]);
					$('#veiculo_chassi').val(aux[6]);
					$('#cliente_cpf').val(aux[7]);
					$('#id').val(aux[8]);
				});
			}
			//$('#result').html(e);
		});
	};
   	$('#voltar').on('click',function(){
		$.post('../controller/redireciona.php', {page:this.value},function(e){
			$('#content').html(e);
		});
	});	
	</script>
</div>