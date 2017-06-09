<?php
	

$nome = "";
$login = "";
$senha = "";
$logar = ""; 

require_once('modulo.php');
	
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>
			HONKER BURGUER - Lanche do mês
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
			
				$sql = "select l.idLanchedomes,
								pr.imagem,
								pr.nome,
								pr.preco,
								l.status,
								substring(descricao, 1, 315) as descricao
								from tbllanchedomes as l
								inner join
								tblProdutos as pr
								on l.idProduto = pr.idProduto where status = 1";
				$select = mysql_query($sql);
				
				while($rsconsulta = mysql_fetch_array($select)){
				
			?>
			
			<section>
				<!-- ========================================= Redes Socias ========================================= -->
				
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
				<div id="conteudolanchedomes">
					<div id="titulolanchedomes">
						<p>
							LANCHE DO MÊS
						</p>
					</div>
					<!--<div id="conteudolanche">
						<div id="imagemLanche">
							
						</div>
						<div id="infLanche">
							<div>
							
							</div>
							<div>
							
							</div>
							<div>
							
							</div>
						</div>
					</div>-->
					<div id="produtolanchedomes">
						<div id="imagemprodutolanchedomes">
							<img id="hamburguerlanchedomes" src="CMS/<?php echo($rsconsulta['imagem']); ?>">
						</div>
						<div id="infprodutolanchedomes">
							<div id="informacoesprodutolanchedomes">
								<div id="nomelanchedomes">
									<p>
										<?php echo($rsconsulta['nome']); ?>
									</p>
								</div>
								<div id="desclanchedomes">
									<p>
										<?php echo($rsconsulta['descricao']); ?>...
									</p>
								</div>
								<div id="precolanchedomes">
									<p>
										R$ <?php echo($rsconsulta['preco']); ?> 
									</p>
								</div>
								<!--<div id="linkinfnutricional">
									<a href="" title="Veja mais informações"> INF. NUTRICIONAL </a>
								</div>-->
							</div>
						</div>	
					</div>
					<div id="conteudolanchedomesslider">
						<div id="titulolanchedomesslider">
							<p>
								MAIS OPÇÕES DE LANCHES
							</p>
						</div>
						<!-- ========================================= Slider ========================================= -->
						
						<div id="sliderlanchedomes">
							<img class="slides" title="CONFIRA" src="Imagens/slider1.jpg" alt=""/>
							<img class="slides" title="CONFIRA" src="Imagens/slider2.jpg" alt=""/>
							<img class="slides" title="CONFIRA" src="Imagens/slider4.jpg" alt=""/>
							<button class = "button" onClick = "plusIndex(-1)" id = "btn1">&#10094;</button>
							<button class = "button" onClick = "plusIndex(1)" id = "btn2">&#10095;</button>
						</div>
					</div>
				</div>
			</section>
			
			<?php
			
				}
			
			?>
			
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
			autoSlide();/*********Passa as imagens automaticamente**********/
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



