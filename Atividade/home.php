<?php

	$nome = "";
	$login = "";
	$senha = "";
	
    $categoria = "";

	require_once('modulo.php');
	
	/* Fazendo a autenticação 
	include('autenticacaoPhp.php');*/
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			HONKER BURGUER
		</title>
		<link rel="shortcut icon" href="Imagens/logoprincipal.jpg" />
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="CSS/style.css">
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
			<section>
				<!-- <img id="fundosection" src="Imagens/fundo4.jpg" alt=""/> -->
				
				<!-- ========================================= Slider ========================================= -->
				
				<?php include('slider.php'); ?>
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
				<!-- ========================================= Menu Secundário ========================================= -->
                
				<nav class="menusecundario">
                    <?php
                    
                        $sql = "select s.subcat,
                                        c.categoria
                                    from tblsubcat as s
                                    inner join tblcategorias as c
                                    limit 4
                                    ";

                        $select = mysql_query($sql);

                        //echo($sql);

                        while($rsconsulta = mysql_fetch_array($select)){

                    ?>
					<ul id="links2">
						<li>
							<?php echo($rsconsulta['categoria']); ?><a href="" >  </a>
						</li>
						<!--
						<li>
							<a href="" title="Hambúrguer"> Hambúrguer </a>
						</li>
                        -->
					</ul>
                    <?php
                        }
                    ?>
				</nav>
                
				<!-- ========================================= Conteúdo do produto ========================================= -->
				
				<div id="conteudoproduto">
					<div class="produto">
						<div class="imagemproduto">
							<img class="hamburguer" src="Imagens/hamburguer.jpg" alt="">
						</div>
						<div class="infproduto">
							<div class="informacoesproduto">
								<p class="nome">
									Cheddar
								</p>
								<p>
									Descrição: Pão com cheddar.
								</p>
								<p>
									Preço: R$ 25,99
								</p>
							</div>
							<div class="detalhes">
								<a href="" title="Veja mais informações"> Detalhes </a>
							</div>
						</div>
					</div>
					<div class="produto">
						<div class="imagemproduto">
							<img class="hamburguer" src="Imagens/hamburguer.jpg" alt="">
						</div>
						<div class="infproduto">
							<div class="informacoesproduto">
								<p class="nome">
									Cheddar
								</p>
								<p>
									Descrição: Pão com cheddar.
								</p>
								<p>
									Preço: R$ 25,99
								</p>
							</div>
							<div class="detalhes">
								<a href="" title="Veja mais informações"> Detalhes </a>
							</div>
						</div>
					</div>
					<div class="produto">
						<div class="imagemproduto">
							<img class="hamburguer" src="Imagens/hamburguer.jpg" alt="">
						</div>
						<div class="infproduto">
							<div class="informacoesproduto">
								<p class="nome">
									Cheddar
								</p>
								<p>
									Descrição: Pão com cheddar.
								</p>
								<p>
									Preço: R$ 25,99
								</p>
							</div>
							<div class="detalhes">
								<a href="" title="Veja mais informações"> Detalhes </a>
							</div>
						</div>
					</div>
					<div class="produto">
						<div class="imagemproduto">
							<img class="hamburguer" src="Imagens/hamburguer.jpg" alt="">
						</div>
						<div class="infproduto">
							<div class="informacoesproduto">
								<p class="nome">
									Cheddar
								</p>
								<p>
									Descrição: Pão com cheddar.
								</p>
								<p>
									Preço: R$ 25,99
								</p>
							</div>
							<div class="detalhes">
								<a href="" title="Veja mais informações"> Detalhes </a>
							</div>
						</div>
					</div>
					<div class="produto">
						<div class="imagemproduto">
							<img class="hamburguer" src="Imagens/hamburguer.jpg" alt="">
						</div>
						<div class="infproduto">
							<div class="informacoesproduto">
								<p class="nome">
									Cheddar
								</p>
								<p>
									Descrição: Pão com cheddar.
								</p>
								<p>
									Preço: R$ 25,99
								</p>
							</div>
							<div class="detalhes">
								<a href="" title="Veja mais informações"> Detalhes </a>
							</div>
						</div>
					</div>
					<div class="produto">
						<div class="imagemproduto">
							<img class="hamburguer" src="Imagens/hamburguer.jpg" alt="">
						</div>
						<div class="infproduto">
							<div class="informacoesproduto">
								<p class="nome">
									Cheddar
								</p>
								<p>
									Descrição: Pão com cheddar.
								</p>
								<p>
									Preço: R$ 25,99
								</p>
							</div>
							<div class="detalhes">
								<a href="" title="Veja mais informações"> Detalhes </a>
							</div>
						</div>
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
				setTimeout(autoSlide, 3000);
			}
		</script>
	</body>
</html>



