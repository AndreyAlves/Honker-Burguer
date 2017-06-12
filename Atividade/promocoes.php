<?php

$data = date('m/Y');

$nome = "";
$login = "";
$senha = "";
$logar = ""; 

$titulo="";

$data = explode("/",$data);
$mes = $data[0];
$ano = $data[1];

if ($mes == "01")
	$mes = "Janeiro";
else if ($mes == "02")
	$mes = "Fevereiro";
else if ($mes == "03")
	$mes = "Março";
else if ($mes == "04")
	$mes = "Abril";
else if ($mes == "05")
	$mes = "Maio";
else if ($mes == "06")
	$mes = "Junho";
else if ($mes == "07")
	$mes = "Julho";
else if ($mes == "08")
	$mes = "Agosto";
else if ($mes == "09")
	$mes = "Setembro";
else if ($mes == "10")
	$mes = "Outubro";
else if ($mes == "11")
	$mes = "Novembro";
else if ($mes == "12")
	$mes = "Dezembro";

$datafinal = $mes." ".$ano;


require_once('modulo.php');
	
	
?>

<!DOCTYPE html>

<html>
	<head>
		<title>
			HONKER BURGUER - Promoções
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
	
				$sql = "select pr.idProduto,
								pr.nome,
								pr.descricao,
								pr.preco,
								pr.imagem,
								p.titulo
								from tblprodutos as pr 
								inner join
								tblPromocoes as p
								on pr.idProduto = p.idProduto
								where status = 1
								";
				
				$select = mysql_query($sql);
				
				//echo($sql);
				
				while($rsconsulta = mysql_fetch_array($select)){
				
			?>
			
			<section id="section_p_lm">
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
				<!-- ========================================= Conteúdo das promoções ========================================= -->
				
				<div id="conteudopromocoes">
					<div id="titulopromocoes">
						<p>
							<?php echo($rsconsulta['titulo']); ?>
						</p>
					</div>
					<div id="conteudopromocoeslanches">
						<div id="titulodatapromocao">
							<p>
								<?php echo($datafinal); ?>
							</p>
						</div>
						<div id="produtopromocao">
							<div id="imagemprodutopromocao">
								<img id="hamburguerpromocao" src="CMS/<?php echo($rsconsulta['imagem']); ?>">
							</div>
							<div id="infprodutopromocao">
								<!--<div id="informacoesprodutopromocao">-->
									<div id="nomeprodutopromocao">
										<p>
											<?php echo($rsconsulta['nome']); ?>
										</p>
									</div>
									<div id="descprodutopromocao">
										<p>
											<?php echo($rsconsulta['descricao']); ?>
										</p>
										<p>
											R$ <?php echo($rsconsulta['preco']); ?> 
										</p>
									</div>
								<!--</div>-->
							</div>
							<div id="infnutricionalpromocao">
								<div id="nomeinfnutricional">
									<p>
										Inf. Nutricional
									</p>
									
								</div>
								
								<?php
	
				}
	
									$sql = "select * from tblnutricional where statusNutricional = 1";
									$select = mysql_query($sql);
									
									while($rsconsulta = mysql_fetch_array($select)){
									
								?>
								
									<div class="descinfnutricional">
										<p>
											Calorias: <?php echo($rsconsulta['calorias']); ?>kcal
										</p>
										<p>
											Proteínas: <?php echo($rsconsulta['proteinas']); ?>g
										</p>
										<p>
											Carboidratos: <?php echo($rsconsulta['carboidratos']); ?>g
										</p>
										<p>
											Gordura: <?php echo($rsconsulta['gordura']); ?>g
										</p>
									</div>
									<div class="descinfnutricional">
										<p>
											Gorduras Saturadas: <?php echo($rsconsulta['gorduras']); ?>g
										</p>
										<p>
											Gorduras Trans: <?php echo($rsconsulta['gordurat']); ?>g
										</p>
										<p>
											Sódio: <?php echo($rsconsulta['sodio']); ?>mg
										</p>
									</div>
									<?php
	
										}
									
									?>
							</div>
						</div>
					</div>
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
				setTimeout(autoSlide,2000);
			}
		</script>
	</body>
	
</html>



