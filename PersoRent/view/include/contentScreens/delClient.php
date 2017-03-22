<div id="delClient">
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
				</div>	
		</fieldset>
	</div>

	<div id="result"></div>
	<div id="delBuscar">
		<legend>Excluir Cliente</legend>
		<div id="resultBuscar"></div>		
	</div>
	<script>
		$(document).ready(function() { 
			$('#delBuscar').hide();
		});
		$('#cpfSearch').on('keyup',function(){
			$('#nomeSearch').val("");
			$('#delBuscar').fadeOut("slow");
			$.post('../controller/teste.php', {cpf:$('#cpfSearch').val()},function(e){
				if (e=='') {
					$('#delBuscar').fadeOut("slow");
				}
				else{					
					$('#delBuscar').fadeIn("slow");				
					$('#resultBuscar').html(e);
				}
				//$('#result').html(e);
			});
		});
		$('#nomeSearch').on('keyup',function(){
			$('#cpfSearch').val("");
			$.post('../controller/teste.php', {nome:$('#nomeSearch').val()},function(e){
				if (e=='') {
					$('#delBuscar').fadeOut("slow");
				}
				else{
					$('#delBuscar').fadeIn("slow");				
					$('#resultBuscar').html(e);
				}
				//$('#result').html(e);
			});
		});	
		function mostrar(cpf){
			$('#div'+cpf).fadeIn("slow");
		}
		$(".botoesExclusao").click(function(e) {
	        e.stopPropagation();
	   	});
		function deletar(cpf){
			$.post('../controller/teste.php', {cpf:cpf},function(e){								
				$('#result').html(e);
			});
	   	};		
	</script>
</div>