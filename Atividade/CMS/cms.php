<?php

	$nome = "";
	$login = "";
	$senha = "";
	$btnlogout = false;
	
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
			<section id="sectionsaudacoes">
				<div id="conteudosectionsaudacoes">
					<div id="saudacoes">
						<p>
							Bem Vindo
						</p>
						<div id="contsaudacoes">
							<p>
								ao CMS
							</p>
						</div>
					</div>
					<div id="titulositecms">
						<img id="imgtitulositecms" src="Imagens/titulositecms.jpg" /> 
					</div>
					<!--<div id="contsaudacoes">
						<p>
							Ao CMS
						</p>
					</div>-->
				</div>
			</section>
			<!-- ========================================= Rodapé ========================================= -->
			<?php include('rodapeAdm.php'); ?>
			<!-- ========================================= Script para animção ========================================= -->
			<script>
				var index = 1;
				
				autoSlide();
				function autoSlide(){
					var i;
					var x = document.getElementsByClassName("slides");
					for(i=0;i<x.length;i++)
						{
							x[i].style.display = "none";
						}
					if(index > x.length){ index = 1}
					x[index-1].style.display = "block";
					index++;
					setTimeout(autoSlide,1000);
				}
			</script>
		</div>
	</body>
</html>