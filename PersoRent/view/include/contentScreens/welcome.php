<div id="welcome">
	<div class="col-lg-6">
		<div class="panel panel-default" height="50%">
			<div class="panel-heading">
				<center><h3>Cliente <span class="glyphicon glyphicon-user"</h3></center>
			</div>
			<div class="panel-body">
				<center>
					<button class="botaoWelcome btn btn-success" value="addClient">Adicionar <span class="glyphicon glyphicon-plus"></button>
					<button class="botaoWelcome btn btn-default" value="editClient">Editar <span class="glyphicon glyphicon-edit"></button>
					<button class="botaoWelcome btn btn-danger" value="delClient">Deletar <span class="glyphicon glyphicon-remove-circle"></button>
				</center>
			</div>
		</div>
	</div>
	<div class="col-lg-6">		
		<div class="panel panel-default">
			<div class="panel-heading">
				<center><h3>Veículo <span class="glyphicon glyphicon-road"></h3></center>
			</div>
			<div class="panel-body">
				<center>				
					<button class="botaoWelcome btn btn-success" value="addVehicle">Adicionar <span class="glyphicon glyphicon-plus"></button>
					<button class="botaoWelcome btn btn-default" value="editVehicle">Editar <span class="glyphicon glyphicon-edit"></button>
					<button class="botaoWelcome btn btn-danger" value="delVehicle">Deletar <span class="glyphicon glyphicon-remove-circle"></button>
				</center>
			</div>
		</div>
	</div>
	<div class="col-lg-12">		
		<div class="panel panel-default">
			<div class="panel-heading">
				<center><h3>Aluguel <span class="glyphicon glyphicon-transfer"></h3></center>
			</div>
			<div class="panel-body">
				<center>				
					<button class="botaoWelcome btn btn-info" value="addRent">Aluguel <span class="glyphicon glyphicon-piggy-bank"></button>
					<button class="botaoWelcome btn btn-primary" value="editRent">Editar <span class="glyphicon glyphicon-edit"></button>
					<button class="botaoWelcome btn btn-warning" value="delRent">Devolução <span class="glyphicon glyphicon-ok-circle"></button>
				</center>
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