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
			HONKER BURGUER - Nossos ambientes
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

			<section id="sectionAmbientes">
			
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
				<!-- ========================================= Conteúdo sobre os Ambientes ========================================= -->
				
				<div id="conteudoambientes">
				
					<div id="tituloambientes">
						<p>
							NOSSOS AMBIENTES
						</p>
					</div>
	
					<div id="ambientes">
					
						<?php
			
							$sql = "select * from tblambientes where status = 1 limit 2";
							$select = mysql_query($sql);
							
							while($rsconsulta = mysql_fetch_array($select)){
							
						?>
						
						<div class="infambientes1">
							<div class="imgambientes">
								<img class="imgloja" src="CMS/<?php echo($rsconsulta['ambiente']); ?>">
							</div>
							<div class="informacoesambientes">
								<div class="enderecoambientes">
									<p>
										<?php echo($rsconsulta['endereco']); ?>
									</p>
								</div>
								<div class="logonossosambientes">
									<img title="Nosso Logotipo" class="imglogonossosambientes" src="CMS/<?php echo($rsconsulta['imagem']);?>">
								</div>
							</div>
						</div>
						
						<?php
			
							}
						
						?>
					</div>
				</div>
			</section>
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



