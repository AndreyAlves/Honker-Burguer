<?php 

	require_once('moduloAdm.php');
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			CMS
		</title>
		<meta charset="utf-8">
		<link rel="shortcut icon" href="Imagens/iconeAdm.png" />
		<link rel="stylesheet" type="text/css" href="CSS/styleAdm.css">
	</head>
	<body>
		<div id="principal">
		<!-- ========================================= Cabeçalho ========================================= -->
			<header>
				<div id="conteudoheader">
					<div id="titulocms">
						<p>
							<a href="CMS.php" title="Voltar"> CMS - Sistema de Gerenciamento do Site </a>
						</p>
					</div>
					<div id="logo">
						<div>
							<img id="logoimg" src="Imagens/logoprincipal.jpg" alt=""/>
						</div>
					</div>
				</div>
			</header>
			<!-- ========================================= Menu ========================================= -->
			<?php include('menuAdm.php'); ?>
			<!-- ========================================= Conteúdo ========================================= -->
			<section id="section_verificacaoPCS">
				<div id="conteudoVerificacao">
					<div id="escolha">
						<a href="admprodutos.php">
							<p>
								Adm. Produtos
							</p>
						</a>
					</div>
					<div id="escolha2">
						<a href="categoriaAdm.php">
							<p>
								Adm. Categorias
							</p>
						</a>
					</div>
					<div id="escolha3">
						<a href="subcategoriaAdm.php">
							<p>
								Adm. Sub.Categorias
							</p>
						</a>
					</div>
				</div>
			</section>
			<!-- ========================================= Rodapé ========================================= -->
			<?php include('rodapeAdm.php'); ?>
		</div>
	</body>
</html>