<?php

	require_once('moduloAdm.php');

	
/******************* Código para Excluir Cadastro *******************/	
	if(isset($_GET['modo'])){
	
		if($_GET['modo']=='excluir'){
		
			$idFaleconosco = $_GET['codigo'];
			$sql="delete from tblCadastro where idFaleconosco=".$idFaleconosco;
			mysql_query($sql); 
			
			header('location:admfaleconosco.php');
		
		}
		if($_GET['modo']=='vermais'){
			
			$idFaleconosco=$_GET['codigo'];
			
			header('location:verMais.php');
			
		}
	}	
	
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
			<header>
				<div id="conteudoheader">
					<div id="titulocms">
						<p>
							<a href="CMS.php" title="Voltar"> CMS - Sistema de Gerenciamento do Site </a>
						</p>
					</div>
					<div id="logo">
						<div>
							<img id="logoimg" src="Imagens/logoprincipal.jpg" alt=""/>
						</div>
					</div>
				</div>
			</header>
			<!-- ========================================= Menu ========================================= -->
			<?php include('menuAdm.php'); ?>
			<!-- ========================================= Conteúdo ========================================= -->
			<section>
				<!-- ========================================= Consulta ========================================= -->
				
				<div id="conteudosection">
					<div id = "consulta">
						<table id="tblconsulta">
							<tr> 
								<td colspan="8" class="titulo_tabela_consulta">Consulta de Contatos</td>
							 </tr>
							<tr>
								<td class="tblconsulta_td">Nome</td>	
								<td class="tblconsulta_td">Telefone</td>
								<td class="tblconsulta_td">Celular</td>
								<td class="tblconsulta_td">Email</td>
								<td class="tblconsulta_td">Profissão</td>
								<td class="tblconsulta_td">sexo</td>
								<td class="tblconsulta_td">Observação</td>
								<td class="tblconsulta_td">Configurações</td>
							</tr>
							
							<?php
								
								/* Comando para ajustar o espaço do campo Observação */
								$sql="select *, substring(obs, 1, 20) as obsFormat from tblCadastro";

								$select=mysql_query($sql);
								
								while($rsconsulta=mysql_fetch_array($select)){
									
							?>
							
							<tr class="tblconsulta_tr">
								<td><?php echo($rsconsulta['nome']); ?></td>
								<td rowspan="1"><?php echo($rsconsulta['telefone']); ?></td>
								<td rowspan="1"><?php echo($rsconsulta['celular']); ?></td>
								<td rowspan="1"> <?php echo($rsconsulta['email']); ?></td>
								<td rowspan="1"><?php echo($rsconsulta['profissao']); ?></td>
								<td rowspan="1">
									<?php echo($rsconsulta['sexo']) ?>
								</td>
								<td rowspan="1"><?php echo($rsconsulta['obsFormat']); ?>...</td>
								
								<!-- ------------ Botao Excluir ------------ -->
								<td rowspan="1">
									<a  href = "verMais.php?modo=vermais&codigo=<?php echo($rsconsulta['idFaleconosco']);?>">
										<img class="iconesAdm" src="icones/vermaisD.png">
									</a>
									<a href = "admfaleconosco.php?modo=excluir&codigo=<?php echo($rsconsulta['idFaleconosco']);?>">
										<img id="iconesAdmDelete" src="icones/error.png"> 
									</a>
								</td>
							</tr>
							
							<?php
								}
							?>
							
						</table>
					</div>  
				</div>
			</section>
			<!-- ========================================= Rodapé ========================================= -->
			<?php include('rodapeAdm.php'); ?>
		</div>
	</body>
</html>