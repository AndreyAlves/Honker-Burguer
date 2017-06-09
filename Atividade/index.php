<?php

	$nome = "";
	$login = "";
	$senha = "";
	
    $categoria = "";

	require_once('modulo.php');
	
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
				<!-- ========================================= Slider ========================================= -->
				
				<?php include('slider.php'); ?>
                
                <!-- ========================================= Pesquisa========================================= -->
                <div id="pesquisa">
                    <input id="pesquisa_input" type="text" placeholder="Pesquise aqui o lanche desejado">
                    <div id="pesquisa_botao" type="submit" value="">
                        <img id="icone_busca" src="icones/busca.png"/>
                    </div>
                </div>
                
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
                    
                        $sql_cat = "select * from tblcategorias";
                    

                        $select = mysql_query($sql_cat);


                        while($categoria_cat = mysql_fetch_array($select)){

                    ?>
                   
                        <ul id="links2">
                            <li>
                                <?php echo($categoria_cat['categoria']); ?>
                                
                                 <?php

                                    $sql_sub = "select * from tblsubcat where idCategoria=".$categoria_cat['idCategoria'];

                                    $select1 = mysql_query($sql_sub);

                                    while($categoria_sub = mysql_fetch_array($select1)){

                                ?>

                                <ul id="submenu">
                                    <li>
                                        <a href="index.php">
                                            <?php echo($categoria_sub['subcat']); ?>
                                        </a>
                                    </li>
                                </ul>

                                <?php

                                    }

                                ?>
                            </li>
                        </ul>
                           
					
                    <?php
                        }
                    ?>
				</nav>
                
				<!-- ========================================= Conteúdo do produto ========================================= -->
				
				
				
				<div id="conteudoproduto">
                    
                    <?php
					
                        $sql = "select * from tblProdutos";

                        $select = mysql_query($sql);
                    
                        while($rsconsulta = mysql_fetch_array($select)){

                    ?>
                    
					<div class="produto">
						<div class="imagemproduto">
							<img class="hamburguer" src="CMS/<?php echo($rsconsulta['imagem']); ?>" alt="">
						</div>
						<div class="infproduto">
							<div class="informacoesproduto">
								<p class="nome">
									<?php echo($rsconsulta['nome']); ?>
								</p>
								<p>
									<?php echo($rsconsulta['descricao']); ?>
								</p>
								<p>
									R$ <?php echo($rsconsulta['preco']); ?>
								</p>
							</div>
							<!--<div class="detalhes">
								<a href="" title="Veja mais informações"> Detalhes </a>
							</div>-->
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



