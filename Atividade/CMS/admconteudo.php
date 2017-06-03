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
			<section>
				<div id="conteudosection">
					<div id="conteudoimg">
						<div class="imagemconteudoadm">
							<a href="admconteudo.php" title="Admistração da Home">
								<img id="imghomeadm" src="Imagens/iconehomeAdm.png" alt="">
							</a>
						</div>
						<div class="imagemconteudoadm">
							<a href="bandaAdm.php" title="Admistração da Banda">
								<img id="imgbandaadm" src="Imagens/iconebandaAdm.png" alt="">
							</a>
						</div>
						<div class="imagemconteudoadm">
							<a href="sobreAdm.php" title="Admistração Sobre">
								<img id="imgsobreadm" src="Imagens/iconeSobreAdm.png" alt="">
							</a>
						</div>
					</div>
					
					<div id="conteudotext">
						<div class="textconteudoadm">
							Administre a página "Home"
						</div>
						<div class="textconteudoadm">
							Administre a página "Banda em destaque"
						</div>
						<div class="textconteudoadm">
							Administre a página "Sobre a hamburgueria"
						</div>
					</div>
					
					<div id="conteudoimg2">
						<div class="imagemconteudoadm2">
							<a href="promocoesAdm.php" title="Admistração das Promoções">
								<img id="imgpromocoesadm" src="Imagens/iconepromocoesAdm.png" alt="">
							</a>
						</div>
						<div class="imagemconteudoadm2">
							<a href="ambientesAdm.php" title="Admistração dos Ambientes">
								<img id="imgambientesadm" src="Imagens/iconeambientesAdm.png" alt="">
							</a>
						</div>
						<div class="imagemconteudoadm2">
							<a href="lanchedomesAdm.php" title="Admistração do Lanche do mês">
								<img id="imglanchedomesadm" src="Imagens/iconelanchedomesAdm.png" alt="">
							</a>
						</div>
					</div>
					
					<div id="conteudotext2">
						<div class="textconteudoadm">
							Administre a página "Promoções"
						</div>
						<div class="textconteudoadm">
							Administre a página "Nossos Ambientes"
						</div>
						<div class="textconteudoadm">
							Administre a página "Lanche do mês"
						</div>
					</div>
					
					<!--
					<div id="imagemsobreadm">
						<img id="imgbandaadm" src="Imagens/.jpg" alt="">
					</div>
					<div id="imagempromocoesadm">
						<img id="imgbandaadm" src="Imagens/.jpg" alt="">
					</div>
					<div id="imagemambientesadm">
						<img id="imgbandaadm" src="Imagens/.jpg" alt="">
					</div>
					<div id="imagemlanchedomesadm">
						<img id="imgbandaadm" src="Imagens/.jpg" alt="">
					</div>
					<div id="imagemfaleconoscoadm">
						
					</div> -->
				</div>
			</section>
			<!-- ========================================= Rodapé ========================================= -->
			<?php include('rodapeAdm.php'); ?>
		</div>
	</body>
</html>