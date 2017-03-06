<div id="welcome">
	<div class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Cliente</h3>
			</div>
			<div class="panel-body">
				<button class="botaoWelcome btn btn-success" value="addClient">Adicionar</button>
				<button class="botaoWelcome btn btn-default" value="editClient">Editar</button>
				<button class="botaoWelcome btn btn-danger" value="delClient">Deletar</button>
			</div>
		</div>
	</div>
	<div class="col-lg-6">		
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Veículo</h3>
			</div>
			<div class="panel-body">				
				<button class="botaoWelcome btn btn-success" value="addVehicle">Adicionar</button>
				<button class="botaoWelcome btn btn-default" value="editVehicle">Editar</button>
				<button class="botaoWelcome btn btn-danger" value="delVehicle">Deletar</button>
			</div>
		</div>
	</div>
	<div class="col-lg-12">		
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Aluguel</h3>
			</div>
			<div class="panel-body">				
				<button class="botaoWelcome btn btn-success" value="addRent">Adicionar</button>
				<button class="botaoWelcome btn btn-default" value="editRent">Editar</button>
				<button class="botaoWelcome btn btn-danger" value="delRent">Deletar</button>
			</div>
		</div>
	</div>
	<script>
		$('.botaoWelcome').on('click', function(){
			$.post('../controller/redireciona.php', {page:this.value},function(e){
				$('#content').html(e);
			});
		});
	</script>
</div>