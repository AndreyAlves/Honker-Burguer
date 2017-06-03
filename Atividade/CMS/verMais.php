<?php

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
			<header id="headerVermais">
				<div id="conteudoheaderVermais">
					<div id="titulocmsVermais">
						<p>
							DETALHES DO CADASTRO
						</p>
					</div>
					<div>
						<a href="admfaleconosco.php">
							<input id="botaovoltar" type="submit" name="btnBack" value="<">
						</a>
					</div>
				</div>
			</header>
			<!-- ========================================= Conteúdo ========================================= -->
			<section id="sectionVermais">
				<div id="conteudosectionVermais">
				<?php
				
						$idFaleconosco = $_GET['codigo'];
						
						$sql="select * from tblCadastro where idFaleconosco = ".$idFaleconosco;

						$select=mysql_query($sql);
						
						//echo($sql);
						
						while($rsconsulta=mysql_fetch_array($select)){
					
					?>
				
					<div id="conteudoAreadetexto">
						<div class="areadetextoVermais">
							<p>
								Nome:
							</p>
						</div>
						<div class="areadetextoVermais">
							<p>
								Tel:
							</p>
						</div>
						<div class="areadetextoVermais">
							<p>
								Cel:
							</p>
						</div>
						<div class="areadetextoVermais">
							<p>
								E-mail:
							</p>
						</div>
						<div class="areadetextoVermais">
							<p>
								Profissão:
							</p>
						</div>
						<div class="areadetextoVermais">
							<p>
								Sexo:
							</p>
						</div>
					</div>
					
					<div id="conteudoAreainfo">
						<div class="areainfoVermais">
							<p>
								<?php echo($rsconsulta['nome']); ?>
							</p>
						</div>
						<div class="areainfoVermais">
							<p>
								<?php echo($rsconsulta['telefone']); ?>
							</p>
						</div>
						<div class="areainfoVermais">
							<p>
								<?php echo($rsconsulta['celular']); ?>
							</p>
						</div>
						<div class="areainfoVermais">
							<p>
								<?php echo($rsconsulta['email']); ?>
							</p>
						</div>
						<div class="areainfoVermais">
							<p>
								<?php echo($rsconsulta['profissao']); ?>
							</p>
						</div>
						<div class="areainfoVermais">
							<p>
								<?php
									if($rsconsulta['sexo'] == "M"){
										echo("Masculino");
									} else if($rsconsulta['sexo'] == "F") {
										echo("Feminino");
									}
								?> 
							</p>
						</div>
					</div>
					
					<div id="conteudoArea_obs">
						<div id="areadetextoVermais_obs">
							<p>
								Observações:
							</p>
						</div>
						<div id="areainfoVermais_obs">
							<p>
								<?php echo($rsconsulta['obs']); ?>
							</p>
						</div>
					</div>
					<?php
					
						}
					
					?>
					
				</div>
			</section>
			
			<!-- ========================================= Conteúdo ========================================= -->
			<footer id="footerVermais">
				
			</footer>
		</div>
	</body>
</html>