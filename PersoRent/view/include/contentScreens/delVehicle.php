<div id="delVehicle">
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

	<div id="delBuscar">
		<legend>Excluir Veículo</legend>
		<div id="resultBuscar"></div>		
	</div>
	<div id="result"></div>
	<script>
		$(document).ready(function() { 
			$('#delBuscar').hide();
		});
		$('#chassiSearch').on('keyup',function(){
			$('#delBuscar').fadeOut("slow");
			$.post('../controller/teste.php', {chassi:$('#chassiSearch').val()},function(e){
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
		
		function mostrar(chassi){
			$('#div'+chassi).fadeIn("slow");
		};			
		function esconder(chassi){
			$('#div'+chassi).fadeOut("slow").click(function(e) {
		        e.stopPropagation();
		   	});
		};
		function deletar(chassi){
			$.post('../controller/teste.php', {chassi:chassi},function(e){								
				$('#result').html(e);
			});
	   	};	
   	$('#voltar').on('click',function(){
		$.post('../controller/redireciona.php', {page:this.value},function(e){
			$('#content').html(e);
		});
	});	
	</script>
</div>