<script src="../external/js/bootstrap.min.js"></script>
<script>
	$('#voltar').on('click',function(){
		$.post('../controller/redireciona.php', {page:this.value},function(e){
			$('#content').html(e);
		});
	});
</script>