<?php

	$titulo1="";
	$texto1="";
	$titulo2="";
	$texto2="";
	$nome_arq = "";
	$nome_arq2 = "";
	$nome_arq3 = "";
	
	$botao="Salvar";
	
	require_once('moduloAdm.php');

if(isset($_POST["btnSalvar"])){
	
	$titulo1 = $_POST['txtTitulo1'];
	$texto1 = $_POST['txtTexto1'];
	$titulo2 = $_POST['txtTitulo2'];
	$texto2 = $_POST['txtTexto2'];

	$uploaddir = "arquivos/";
	
	$nome_arq = basename($_FILES['flefotos']['name']);
	$uploadfile = $uploaddir .$nome_arq;
	
	$nome_arq2 = basename($_FILES['flefotos2']['name']);
	$uploadfile2 = $uploaddir .$nome_arq2;
	
	$nome_arq3 = basename($_FILES['flefotos3']['name']);
	$uploadfile3 = $uploaddir .$nome_arq3;
	
	
	$upload_ext = strtolower(substr($nome_arq, strlen($nome_arq)-3, 3));
	$upload_ext2 = strtolower(substr($nome_arq, strlen($nome_arq)-3, 3));
	$upload_ext3 = strtolower(substr($nome_arq, strlen($nome_arq)-3, 3));
	
	if($_POST['btnSalvar'] == 'Salvar'){
	
		if($upload_ext == 'jpg' || $upload_ext == 'png' && $upload_ext2 == 'jpg' || $upload_ext2 == 'png' && $upload_ext3 == 'jpg' || $upload_ext3 == 'png'){
		
			if(move_uploaded_file($_FILES['flefotos']['tmp_name'], $uploadfile)){
				if(move_uploaded_file($_FILES['flefotos2']['tmp_name'], $uploadfile2)){
					if(move_uploaded_file($_FILES['flefotos3']['tmp_name'], $uploadfile3)){
						
				
				$sql = "insert into tblSobre(titulo1, texto1, titulo2, texto2, imagem1, imagem2, imagem3) values('".$titulo1."','".$texto1."','".$titulo2."','".$texto2."', '".$uploadfile."', '".$uploadfile2."', '".$uploadfile3."')";
				
				mysql_query($sql);
				
				header('location:sobreAdm.php');
				
			
					}
				}
			}else {
				echo("Erro ao enviar o arquivo!");
			}
		}
	}elseif($_POST['btnSalvar']=='Alterar'){
	
		 if($upload_ext == 'jpg' || $upload_ext == 'png'){

			if(move_uploaded_file($_FILES['flefotos']['tmp_name'], $uploadfile)){
		
				$sql="update tblSobre set titulo1='".$titulo1."',texto1='".$texto1."',titulo2='".$titulo2."', texto2='".$texto2."', imagem1='".$uploadfile."', imagem2='".$uploadfile2."', imagem3='".$uploadfile3."' where idSobre =".$_SESSION['codigo'];                         
				
				mysql_query($sql);
			
				header('location:sobreAdm.php');
				
				//echo($sql);
				
			}else {

				echo("Erro ao enviar o arquivo!");

			}    
			
		}else{
				
			?>
				<script>
					alert("Extensão Inválida!!!");
				</script>
				
			<?php
		}                    

	}
}

/******************* Código para modos Cadastro *******************/	
if(isset($_GET['modo'])){

	if($_GET['modo']=='excluir'){

		$idSobre = $_GET['codigo'];
		$sql="delete from tblSobre where idSobre=".$idSobre;
		mysql_query($sql); 
		
		header('location:sobreAdm.php');
		
	}else if($_GET['modo']=='editar'){
	
		$idSobre = $_GET['codigo'];
		$_SESSION['codigo']=$idSobre;
		$sql = "select * from tblSobre where idSobre=".$idSobre;
		
		$select = mysql_query($sql);
	
		if($rsconsulta=mysql_fetch_array($select)){
			$titulo1=$rsconsulta['titulo1'];
			$texto1=$rsconsulta['texto1'];
			$titulo2=$rsconsulta['titulo2'];
			$texto2=$rsconsulta['texto2'];
			$imagem1=$rsconsulta['imagem1'];
			$imagem2=$rsconsulta['imagem2'];
			$imagem3=$rsconsulta['imagem3'];
	
			$botao="Alterar";
		}
	
		//mysql_query($sql); 
			
		//header('location:sobreAdm.php');
		
		//echo($sql);
		
	}else if($_GET['modo'] == 'status'){
		
		$idSobre = $_GET['codigo'];
		$sql = "update tblSobre set status = 0";
		
		mysql_query($sql);
		header('location:sobreAdm.php');
		
		$sql ="update tblSobre set status = 1 where idSobre =".$idSobre;
		
		mysql_query($sql);
		header('location:sobreAdm.php');
		
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
				<form name="frmupload" method="post" enctype="multipart/form-data">
					<div id="conteudosection_sobreAdm">
						<div id="tituloinformacoes_sobre">
							<p>
								Informações Sobre a Hamburgueria
							</p>
						</div>	
						<div class="areadetexto">
							<p>
								Primeiro Título
							</p>
						</div>
						<div class="areadoinput">
							<input class="inputSobre" type="Text" name="txtTitulo1" value="<?php echo($titulo1); ?>">
						</div>
						<div class="areadetexto">
							<p>
								Primeiro Texto
							</p>
						</div>
						<div class="areadoinput">
							<textarea class="inputSobre" type="Text" name="txtTexto1"><?php echo($texto1); ?></textarea>
						</div>
						<div class="areadetexto">
							<p>
								Segundo Título
							</p>
						</div>
						<div class="areadoinput">
							<input class="inputSobre"" type="Text" name="txtTitulo2" value="<?php echo($titulo2); ?>">
						</div>
						<div class="areadetexto">
							<p>
								Segundo Texto
							</p>
						</div>
						<div class="areadoinput">
							<textarea class="inputSobre" type="Text" name="txtTexto2"><?php echo($texto2); ?></textarea>
						</div>
						<div class="areadetexto_sobre">
							<p>
								Imagem da Hamburgueria
							</p>
						</div>
						<div class="areadoinput">
							<input class="inputSobre" type="file" name="flefotos">
						</div>
						<div class="areadetexto_sobre">
							<p>
								Outra imagem da Hamburgueria
							</p>
						</div>
						<div class="areadoinput">
							<input type="file" name="flefotos2">
						</div>
						<div class="areadetexto_sobre">
							<p>
								Outra imagem da Hamburgueria
							</p>
						</div>
						<div class="areadoinput">
							<input type="file" name="flefotos3">
						</div>
						
						<div>
							<input id="salvarBanda" value="<?php echo($botao) ?>" type="submit" name="btnSalvar">
						</div>
						
					</div>
				</form>
				<!-- ========================================= Bandas Cadastradas ========================================= -->
					<div id = "consulta">
						<table id="tblconsulta">
							<tr> 
								<td colspan="8" class="titulo_tabela_consulta">Cadastro Pág. Sobre </td>
							 </tr>
							<tr>
								<td class="tblconsulta_td">Título1</td>
								<td class="tblconsulta_td">Texto1</td>
								<td class="tblconsulta_td">Título2</td>
								<td class="tblconsulta_td">Texto2</td>
								<td class="tblconsulta_td">Imagem1</td>
								<td class="tblconsulta_td">Imagem2</td>
								<td class="tblconsulta_td">Imagem3</td>
								<td class="tblconsulta_td">Configurações</td>
					
							</tr>
							
							<?php

								$sql="select * from vw_consulta_sobre";

								$select=mysql_query($sql);
									
								while($rsconsulta=mysql_fetch_array($select)){
									
							?>
							
							<tr class="tblconsulta_tr">
								<td rowspan="1"><?php echo($rsconsulta['titulo1']); ?></td>
								<td rowspan="1"><?php echo($rsconsulta['texto1']); ?>...</td>
								<td rowspan="1"><?php echo($rsconsulta['titulo2']); ?></td>
								<td rowspan="1"><?php echo($rsconsulta['texto2']); ?>...</td>
								<td rowspan="1"><img class="imagem_consulta" src="<?php echo($rsconsulta['imagem1']);?>"/> </td>
								<td rowspan="1"><img class="imagem_consulta" src="<?php echo($rsconsulta['imagem2']);?>"/> </td>
								<td rowspan="1"><img class="imagem_consulta" src="<?php echo($rsconsulta['imagem3']);?>"/> </td>
								
								<!-- ------------ Configurações  ------------ -->
								<td rowspan="1">
									<?php
										if($rsconsulta['status'] == 0){
											?>
											<a href="sobreAdm.php?modo=status&codigo=<?php echo($rsconsulta['idSobre']);?>"> 
												<img class="iconesAdm" src="icones/StatusD.png"> 
											</a>
											<?php
										}else {
											?>
											<a href="sobreAdm.php?modo=status&codigo=<?php echo($rsconsulta['idSobre']);?>"> 
												<img class="iconesAdm" src="icones/StatusA.png"> 
											</a>
											<?php
										}
									?>
									<a href="sobreAdm.php?modo=editar&codigo=<?php echo($rsconsulta['idSobre']);?>"> 
										<img class="iconesAdm" src="icones/Modify16.png"> 
									</a>
									<a href = "SobreAdm.php?modo=excluir&codigo=<?php echo($rsconsulta['idSobre']);?>">
										<img id="iconesAdmDelete" src="icones/error.png"> 
									</a>
								</td>
							</tr>
							
							<?php
								}
							?>
							
						</table>
					</div>  
			</section>
			<!-- ========================================= Rodapé ========================================= -->
			<?php include('rodapeAdm.php'); ?>
		</div>
	</body>
</html>