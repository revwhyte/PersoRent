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
			<div class="row">
				<br>
				<div class="col-lg-2">
					<input type="button" class="btn btn-default" id="voltar" value="Voltar">	
				</div>
			</div>
		</fieldset>
	</div>

	<div id="delBuscar">
		<legend>Excluir Cliente</legend>
		<div id="resultBuscar"></div>		
	</div>
	<div id="result"></div>
	<script>
		$(document).ready(function() { 
			$('#delBuscar').hide();
		});
		$('#cpfSearch').on('keyup',function(){
			$('#nomeSearch').val("");
			$('#delBuscar').fadeOut("slow");
			$.post('../controller/clienteController.php', {acao:'buscarCpf', cpf:$('#cpfSearch').val()},function(e){
				if (e=='') {
					$('#delBuscar').fadeOut("slow");
				}
				else{					
					$('#delBuscar').fadeIn("slow");					
					var aux = e.split('=>');
					/*var well = '<div class="row"><div class="well well-sm col-lg-12" onclick="escolha(\''+aux[2]+'\')" id="\''+aux[2]+'\'"><div class="col-lg-12"><div class="col-lg-9"><h3>'.'Nome: '+aux[2]+'</h3>CPF: '+aux[2]+'</div><div class="col-lg-3" id="div'+aux[2]+'" hidden><input type="button" class="btn btn-default cancelar" onclick="esconder(\''+aux[2]+'\')" id="canc'+aux[2]+'" value="Cancelar"><input type="button" class="btn btn-danger confirmar" id="conf'+aux[2]+'" value="Confirmar" onclick="deletar(\''+aux[2]+'\')"></div></div></div></div>';*/
					var well = '<div class="row"><div class="well well-sm col-lg-12" onclick="escolha(\''+aux[2]+'\')" id="\''+aux[2]+'\'"><div class="col-lg-12"><div class="col-lg-9"><h3>Nome: '+aux[0]+'</h3>CPF: '+aux[2]+'</div><div class="col-lg-3" id="div'+aux[2]+'" hidden><input type="button" class="btn btn-default cancelar" onclick="esconder(\''+aux[2]+'\')" id="canc'+aux[2]+'" value="Cancelar"><input type="button" class="btn btn-danger confirmar" id="conf'+aux[2]+'" value="Confirmar" onclick="deletar(\''+aux[2]+'\')"></div></div></div></div>';
					$('#resultBuscar').html(well);
				}
				//$('#result').html(e);
			});
		});
		$('#nomeSearch').on('keyup',function(){
			$('#cpfSearch').val("");
			$.post('../controller/clienteController.php', {acao:'buscaNome', nome:$('#nomeSearch').val()},function(e){
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
		function escolha(cpf){
			$('#div'+cpf).fadeIn("slow");
		};			
		function esconder(cpf){
			$('#div'+cpf).fadeOut("slow").click(function(e) {
		        e.stopPropagation();
		   	});
		};
		function deletar(cpf){
			$.post('../controller/clienteController.php', {acao:'remover', cpf:cpf},function(e){								
				$('#result').html(e);
				if(e.indexOf('success')>0){									
					$('#delBuscar').fadeOut("slow");
				}
			});
	   	};	
   	$('#voltar').on('click',function(){
		$.post('../controller/redireciona.php', {page:this.value},function(e){
			$('#content').html(e);
		});
	});	
	</script>
</div>