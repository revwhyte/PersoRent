<!DOCTYPE html>
<html>
	<?php session_start(); ?>
	<head>
		<?php include 'include/head.php'; ?>
	</head>
	<body>
		<div class="container">
		<?php include 'include/header.php'; ?>
			<div id="content">
				<?php include 'include/contentScreens/welcome.php';
					//echo '<button id="voltar" value="voltar">voltar</button>';
					/*include welcomeScreen 
					tela inicial onde será escolhida a função a esr realizada
					mudar conteudo de content a partir da função escolhida e evitar reload
				*/
				?>
			</div>
		</div>
		<?php include 'include/footer.php'; ?>
	</body>
	<?php include 'js/scripts.php' ?>
</html>