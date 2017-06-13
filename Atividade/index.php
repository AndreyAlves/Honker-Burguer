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
                <form name="frmBusca" method="post" action="index.php">
                    
                    <div id="pesquisa">
                        <input id="pesquisa_input" type="text" placeholder="Pesquise aqui o produto desejado" name="txtPesquisar">
                        <input id="pesquisa_botao" type="submit" value="" name="pesquisar" value="Enviar">
                            <!--<img id="icone_busca" src="icones/busca.png"/>
                        </div>-->
                    </div>
                </form>
                
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
                                <a href="index.php?categoria=<?php echo($categoria_cat['idCategoria']); ?>"><p><?php echo($categoria_cat['categoria']); ?></p></a>

                                 <?php

                                    $sql_sub = "select * from tblsubcat where idCategoria=".$categoria_cat['idCategoria'];

                                    $select1 = mysql_query($sql_sub);

                                    while($categoria_sub = mysql_fetch_array($select1)){

                                ?>

                                <ul id="submenu">
                                    <li>
                                        <a href="index.php?subcategoria=<?php echo($categoria_sub['idSubCat']); ?>"><p><?php echo($categoria_sub['subcat']); ?></p></a>
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
                    <div id="linkextra">
                        <a href="index.php?aleatorios=">
                            <p>
                                MAIS OPÇÕES
                            </p>
                        </a>
                    </div>
                    
                </nav>

                <!-- ========================================= Conteúdo do produto ========================================= -->

                <div id="conteudoproduto">

                    <?php

                        $sql_produtos = "select * from tblprodutos order by rand() limit 6";
                        
                        if(isset($_GET['categoria'])){
                            $sql_produtos = "select p.idProdutos,
                            p.nome,
                            p.descricao,
                            p.preco,
                            p.imagem from tblprodutos as p inner join tblsubcat as s
                            on p.idsubcat = s.idsubcat
                            inner join tblcategorias as c
                            on s.idcategoria = c.idcategoria where c.idcategoria=".$_GET['categoria']."order by rand() limit 6";
                        }
                    
                        if(isset($_GET['subcategoria'])){
                            $sql_produtos = "select idProduto,
                            nome,
                            descricao,
                            preco,
                            imagem,
                            idSubCat
                            from tblprodutos where idSubCat =".$_GET['subcategoria'];
                        }
                    
                        if(isset($_GET['aleatorios'])){
                             $sql_produtos = "select * from tblprodutos order by rand() limit 6";
                        }

                        
                        if(isset($_POST['pesquisar'])){
                            $pesquisar = $_POST['txtPesquisar'];
                            $sql_produtos = "select * from tblprodutos where nome like '%$pesquisar%'";
                        }
                    
                        $select = mysql_query($sql_produtos);
                        
                        //echo($sql_produtos);
                        
                        while($rsprodutos = mysql_fetch_array($select)){

                    ?>

                    <div class="produto">
                        <div class="imagemproduto">
                            <img class="hamburguer" src="CMS/<?php echo($rsprodutos['imagem']); ?>" alt="">
                        </div>
                        <div class="infproduto">
                            <div id="nome">
                                <p>
                                    <?php echo($rsprodutos['nome']); ?>
                                </p>
                            </div>
                            <div class="informacoesproduto">
                                <p>
                                    <?php echo($rsprodutos['descricao']); ?>
                                </p>
                                <p>
                                    R$ <?php echo($rsprodutos['preco']); ?>
                                </p>
                            </div>
                            <!--<div class="detalhes">
                                <a href="" title="Veja mais informações"> Detalhes </a>
                            </div>-->
                        </div>
					</div>
					
					<?php
                          }
                       ?>
					
				</div>
				
				
			</section>
			<!-- ========================================= Rodapé ========================================= -->
			<?php include('rodape.php'); ?>
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



