<script src="../external/js/bootstrap.min.js"></script>
<script>
	$('#voltar').on('click',function(){
		$.post('../controller/redireciona.php', {page:this.value},function(e){
			$('#content').html(e);
		});
	});
</script>
<script type="text/javascript">
    // Mascaras usando jQuery
    $(document).ready(function() {
        $('#cep').mask('00.000-000');
    });

    $(document).ready(function() {
        $('#cpf').mask('000.000.000-00');
    });

    $(document).ready(function() {
        $('#placa').mask('AAA-0000');
    });
</script>