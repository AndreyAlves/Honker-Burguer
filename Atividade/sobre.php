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
			HONKER BURGUER - Sobre nossa empresa
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
				<?php
                    include('menu.php');
                ?>
			</header>
			<!-- ========================================= Conteúdo ========================================= -->
			
			<?php
			
				$sql = "select * from tblsobre where status = 1";
				$select = mysql_query($sql);
				
				while($rsconsulta = mysql_fetch_array($select)){
				
			?>
			
			<section>
				<!-- ========================================= Slider ========================================= -->
				
				<div id="slider">
					<img class="slides" title="HONKER BURGUER" src="Imagens/slider3.jpg" alt=""/>
					<img class="slides" title="HONKER BURGUER" src="Imagens/slider5.jpg" alt=""/>
					<img class="slides" title="CONFIRA" src="Imagens/slider1.jpg" alt=""/>
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
				<!-- ========================================= Conteúdo Sobre a empresa ========================================= -->
				
				<div id="conteudohistoria">
					<div id="titulohistoria">
						<p>
							<?php echo($rsconsulta['titulo1']) ?><!--HISTÓRIA DA EMPRESA-->
						</p>
					</div>
					<div id="historia">
						<p>
							<?php echo($rsconsulta['texto1']) ?>
						</p>
					</div>
				</div>
				<div id="conteudoconquistas">
					<div id="tituloconquistas">
						<p>
							<?php echo($rsconsulta['titulo2']) ?>
						</p>
					</div>
					<div id="conquistas">
						<div class="conquistastext">
							<p>
								<?php echo($rsconsulta['texto2']) ?>
							</p>
						</div>
						<!--<div class="conquistastext">
							<p>
								CONCURSO LOCAL - Preparo mais rápido de um sanduíche. 1960
							</p>
						</div>
						<div class="conquistastext">
							<p>
								CONCURSO LOCAL - Melhor hamburguer vegetariano. 1961
							</p>
						</div>
						<div class="conquistastext">
							<p>
								CONCURSO ESTUDUAL - Sanduíche mais saboroso. 1954 
							</p>
						</div>
						<div class="conquistastext">
							<p>
								CONCURSO NACIONAL - Melhor combinação de lanches. 1954 
							</p>
						</div>-->
					</div>
				</div>
				<!-- ========================================= Endereços ========================================= -->
				
				<div id="conteudoimgssobre">
					<div class="imgsobre">
						<img title="SÉDE - SÃO PAULO" class="honkers" src="CMS/<?php echo($rsconsulta['imagem1']) ?>" alt=""/>
					</div>
					<div class="imgsobre">
						<img title="SÉDE - BARUERI" class="honkers" src="CMS/<?php echo($rsconsulta['imagem2']) ?>" alt=""/>
					</div>
					<div class="imgsobre">
						<img title="SÉDE - JANDIRA" class="honkers" src="CMS/<?php echo($rsconsulta['imagem3']) ?>" alt=""/>
					</div>
				</div>
			</section>
			
			<?php } ?>
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



