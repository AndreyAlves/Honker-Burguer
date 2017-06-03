<?php
	

	$nome = "";
	$login = "";
	$senha = "";
	$logar = ""; 
	
	require_once('modulo.php');
	
	/* Fazendo a autenticação 
	include('autenticacaoPhp.php');*/
	
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>
			HONKER BURGUER - Banda do mês
		</title>
		<meta charset="utf-8">
		<link rel="shortcut icon" href="Imagens/logoprincipal.jpg" />
		<link rel="stylesheet" type="text/css" href="CSS/style.css">
		<link rel="javascript" type="text/javascript" href="script.js">
	</head>
	<body>
		<div id="principal">
			<!-- ========================================= Cabeçalho ========================================= -->
			<header>
				<div id="caixaoculta">
					<div id="conteudoheader">
						<div id="logo">
							<ul id="linksl">
								<li>
									<a href="home.php" title="HONKER BURGUER" style="text-decoration:none"> <img id="logoimg" src="Imagens/logoprincipal.jpg" alt=""/> </a>	
								</li>
							</ul>
						</div>
						<!-- ========================================= Menu Principal ========================================= -->
						<div>
							<nav id="menuprincipal">
								<ul id="links">
									<li>
										<a href="banda.php" title="Banda"> Banda </a>
									</li>
									<li>
										<a href="sobre.php" title="Sobre"> Sobre </a>
									</li>
									<li>
										<a href="promocoes.php" title="Promoções"> Promoções </a>
									</li>
									<li>
										<a href="ambientes.php" title="Nossos Ambientes"> Nossos Ambientes </a>
									</li>
									<li>
										<a href="lanchedomes.php" title="Lanche do mês"> Lanche do mês </a>
									</li>
									<li>
										<a href="faleconosco.php" title="Fale Conosco"> Fale Conosco </a>
									</li>
								</ul>
							</nav>
						</div>
						<!-- ========================================= Autenticação ========================================= -->
						<?php include('autenticacao.php'); ?>
					</div>
				</div>
			</header>
			<!-- ========================================= Conteúdo ========================================= -->
			
			<?php
			
				$sql = "select * from tblBanda where status = 1";
				$select = mysql_query($sql);
				
				while($rsconsulta = mysql_fetch_array($select)){
				
			?>
			
			<!-- <form name="frmupload" method="post" enctype="multipart/form-data"> -->
			
				<section id="sectionbanda">
					<!-- ========================================= Slider ========================================= -->
				
					<div id="sliderN">
						<img class="slides" src="Imagens/BannerN.jpg" alt=""/>
						<img class="slides" src="Imagens/BannerN2.jpg" alt=""/>
						<img class="slides" src="Imagens/bannerN3.png" alt=""/>
						<button class = "button" onClick = "plusIndex(-1)" id = "btn1">&#10094;</button>
						<button class = "button" onClick = "plusIndex(1)" id = "btn2">&#10095;</button>
					</div>
					<!-- ========================================= Redes Sociais ========================================= -->
					
					<div id="redessociais">
						<div id="facebook">
							<a href="" title="Visite nossa Página"> <img id="logoF" src="Imagens/logoF.png" alt=""> </a>
						</div>
						<div id="twitter">
							<a href="" title="Nosso Twitter"> <img id="logoT" src="Imagens/logoT.png" alt=""> </a>
						</div>
						<div id="instagram">
							<a href="" title="Nosso Instagram"> <img id="logoI" src="Imagens/logoI.png" alt=""> </a>
						</div>
					</div>
					<!-- ========================================= Conteúdo da banda ========================================= -->
					
					<div id="conteudoimagem">
						<div id="imagemBanda">
							<img id="imgBanda2" src="CMS/<?php echo($rsconsulta['imagem']);?>" alt="Imagem Banda">
						</div>
					</div>
					<div id="conteudosobre">
						<div id="titulosobre">
							<p>
								<?php echo($rsconsulta['titulo1']); ?>
							</p>
						</div>
						<div id="sobreabanda">
							<div id="textbanda">
								<p>
									<?php echo($rsconsulta['texto1']); ?>
								</p>
							<div>
						</div>
					</div>
					<div id="conteudoinformacoes">
						<div id="tituloinformacoes">
							<p>
								<?php echo($rsconsulta['titulo2']); ?>
							</p>
						</div>
						
						<?php
			
				}
			
							$sqli = "select * from tblintegrantes where statusIntegrante = 1";
							$select = mysql_query($sqli);
							
							while($rsconsulta = mysql_fetch_array($select)){
							
						?>
						
						<div id="informacoesbanda">
							<div id="integrantes">
								<div class="infintegrantes">
									<p>
										<?php echo($rsconsulta['integrante']); ?>
									</p>
									<p>
										<?php echo($rsconsulta['funcao']); ?>
									</p>
								</div>
								<!--<div class="infintegrantes">
									<p>
										Dave Grohl
									</p>
									<p>
										Bateria. 1990 - 1994
									</p>
								</div>
								<div class="infintegrantes">
									<p>
										Krist Novoselic
									</p>
									<p>
										Baixista. 1987 - 1994
									</p>
								</div>
								<div class="infintegrantes">
									<p>
										Pat Smear
									</p>
									<p>
										1993 - 1994
									</p>
								</div>
								<div class="infintegrantes">
									<p>
										Chad Channing
									</p>
									<p>
										Bateria. 1988 - 1990
									</p>
								</div>
							</div>
							<div id="integrantes">
								<div class="infintegrantes">
									<p>
										Jason Everman
									</p>
									<p>
										1989 - 1989
									</p>
								</div>
								<div class="infintegrantes">
									<p>
										Aaron Burckhard
									</p>
									<p>
										Bateria. 1987 - 1987
									</p>
								</div>
								<div class="infintegrantes">
									<p>
										Dale Crover
									</p>
									<p>
										1988 - 1988
									</p>
								</div>
								<div class="infintegrantes">
									<p>
										Dave Foster
									</p>
									<p>
										Bateria. 1988 - 1988
									</p>
								</div>
								<div class="infintegrantes">
									<p>
										Dan Peters
									</p>
									<p>
										Bateria. 1990 - 1990
									</p>
								</div>
							</div>-->
						</div>
					</div>
					
				<?php
					
					}
				
				?>
					
				</section>
				
		<!--</form> -->
			<!-- ========================================= Rodapé ========================================= -->
			
			<footer>
				<p class="p">
					Honker Burguer©2017. Todos os Direitos Reservados.
				</p>
				<p class="p">
					Endereço: Av.Bluffington - n°666 - SP
				</p>
				<p class="p">
					CEP:0767-410
				</p>
			</footer>
		</div>
		<!-- ========================================= Script para o slider ========================================= -->
		<script>
			var index = 1;
			
			function plusIndex(n){
				index = index + n;
				showImage(index);
			}
			
			showImage(1);
			
			function showImage(n){
				var i;
				var x = document.getElementsByClassName("slides");
				if(n > x.length){index = 1};
				if(n < 1){index = x.length};
				for(i=0;i<x.length;i++)
					{
						x[i].style.display = "none";
					}
				x[index-1].style.display = "block";
			}
			
			/* Passar automaticamente as imagens */
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
				setTimeout(autoSlide,3000);
			}
		</script>
	</body>
	
</html>



