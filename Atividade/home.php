<?php

	$nome = "";
	$login = "";
	$senha = "";
	
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
				<div id="caixaoculta">
					<div id="conteudoheader">
                        <!-- ========================================= Menu Principal Responsivo ========================================= -->
						<div>
							<nav id="nav_cel">
                                <ul class="menu_cel">
                                    <li>
                                        <img class="img_menu" src="Imagens/imgmenu.png"/>
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
                                    </li>
                                </ul>
							</nav>
						</div>
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
                                <li>
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
                                </li>
							</nav>
						</div>
						
						<!-- ========================================= Autenticação ========================================= -->
						<?php include('autenticacao.php'); ?>
					</div>
				</div>
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
					<ul id="links2">
						<li>
							<a href="" title="Hambúrguer"> Hambúrguer </a>
						</li>
						<li>
							<a href="" title="Hambúrguer"> Hambúrguer </a>
						</li>
						<li>
							<a href="" title="Hambúrguer"> Hambúrguer </a>
						</li>
						<li>
							<a href="" title="Hambúrguer"> Hambúrguer </a>
						</li>
						<li>
							<a href="" title="Hambúrguer"> Hambúrguer </a>
						</li>
						<li>
							<a href="" title="Hambúrguer"> Hambúrguer </a>
						</li>
						<li>
							<a href="" title="Hambúrguer"> Hambúrguer </a>
						</li>
						<li>
							<a href="" title="Hambúrguer"> Hambúrguer </a>
						</li>
						<li>
							<a href="" title="Hambúrguer"> Hambúrguer </a>
						</li>
					</ul>
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



