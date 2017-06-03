
<?php

	$endereco="";
	$texto2="";
	$nome_arq = "";
	$nome_arq2="";
	
	$botao="Salvar";
	
	require_once('moduloAdm.php');

if(isset($_POST["btnSalvar"])){
	
	$endereco = $_POST['txtEndereco'];

	$uploaddir = "arquivos/";
	
	$nome_arq = basename($_FILES['flefotos']['name']);
	$uploadfile = $uploaddir .$nome_arq;
	
	$nome_arq2 = basename($_FILES['flefotos2']['name']);
	$uploadfile2 = $uploaddir .$nome_arq2;
	
	$upload_ext = strtolower(substr($nome_arq, strlen($nome_arq)-3, 3));
	$upload_ext2 = strtolower(substr($nome_arq, strlen($nome_arq)-3, 3));
	
	if($_POST['btnSalvar'] == 'Salvar'){
	
		if($upload_ext == 'jpg' || $upload_ext == 'png' && $upload_ext2 == 'jpg' || $upload_ext2 == 'png'){
		
			if(move_uploaded_file($_FILES['flefotos']['tmp_name'], $uploadfile)){
				if(move_uploaded_file($_FILES['flefotos2']['tmp_name'], $uploadfile2)){
				
				$sql = "insert into tblAmbientes(ambiente, endereco, imagem) values('".$uploadfile."','".$endereco."','".$uploadfile2."')";
				//$sqla = "update tblAmbientes set status = 1 where idAmbientes=".$idAmbientes;
				
				mysql_query($sql);
				//mysql_query($sqla);
				
				header('location:ambientesAdm.php');
				
				//echo($sql);
				}
				
			}
			
		}
	}elseif($_POST['btnSalvar']=='Alterar'){
	
		 if($upload_ext == 'jpg' || $upload_ext == 'png'){

			if(move_uploaded_file($_FILES['flefotos']['tmp_name'], $uploadfile)){

				$sql="update tblAmbientes set ambiente='".$uploadfile."', endereco='".$endereco."', imagem='".$uploadfile2."' where idAmbientes =".$_SESSION['codigo'];                         
				
				mysql_query($sql);
			
				header('location:ambientesAdm.php');
				
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

/******************* Código para Excluir Cadastro *******************/	
if(isset($_GET['modo'])){

	if($_GET['modo']=='excluir'){
	
		$idAmbientes = $_GET['codigo'];
		$sql="delete from tblAmbientes where idAmbientes=".$idAmbientes;
		
		mysql_query($sql); 
		
		header('location:ambientesAdm.php');
	
		//echo($sql);
		
	}else if($_GET['modo']=='editar'){
	
		$idAmbientes = $_GET['codigo'];
		$_SESSION['codigo']=$idAmbientes;
		$sql = "select * from tblAmbientes where idAmbientes=".$idAmbientes;
		
		$select = mysql_query($sql);
	
		if($rsconsulta=mysql_fetch_array($select)){
			$ambiente=$rsconsulta['ambiente'];
			$endereco=$rsconsulta['endereco'];
			$imagem=$rsconsulta['imagem'];
			
			$botao="Alterar";
		}
	
		//mysql_query($sql); 
			
		//header('location:ambientesAdm.php');
		
		//echo($sql);
		
	}else if($_GET['modo'] == 'status'){
		
		$idAmbientes = $_GET['codigo'];

		$sql = "update tblAmbientes set status = 1 where idAmbientes=".$idAmbientes;
	
		mysql_query($sql);
		header('location:ambientesAdm.php');
		
		//$sql = "update tblAmbientes set status = 1 where idAmbientes=".$idAmbientes;

		//$sql = "update tblAmbientes set status = 0 where idAmbientes=".$idAmbientes;
		
		//mysql_query($sql);
		//header('location:ambientesAdm.php');
		
		//$sql = "update tblAmbientes set status = 1";
		
		//$sql = "update tblAmbientes set status = 0 where idAmbientes =".$sql;
		
		//mysql_query($sql);
		//header('location:ambientesAdm.php');

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
					<div id="conteudosection_ambientesAdm">
						<div id="tituloinformacoes_ambientes">
							<p>
								Informações dos Ambientes
							</p>
						</div>
						<div class="areadetexto">
							<p>
								Ambiente
							</p>
						</div>
						<div class="areadoinput">
							<input type="file" name="flefotos">
						</div>	
						<div class="areadetexto">
							<p>
								Endereço
							</p>
						</div>
						<div class="areadoinput">
							<textarea class="inputAmbientes" type="Text" name="txtEndereco"><?php echo($endereco) ?></textarea>
						</div>
						<div class="areadetexto">
							<p>
								Imagem
							</p>
						</div>
						<div class="areadoinput">
							<input type="file" name="flefotos2">
						</div>	
						
						<div>
							<input id="salvarAmbientes" value="<?php echo($botao) ?>" type="submit" name="btnSalvar">
						</div>
						
					</div>
				</form>
				<!-- ========================================= Ambientes cadastrados ========================================= -->
					<div id = "consulta">
						<table id="tblconsulta">
							<tr> 
								<td colspan="8" class="titulo_tabela_consulta">Ambientes Cadastrados</td>
							 </tr>
							<tr>
								<td class="tblconsulta_td">Ambiente</td>
								<td class="tblconsulta_td">Endereço</td>
								<td class="tblconsulta_td">Imagem</td>
								<td class="tblconsulta_td">Opções</td>
							</tr>
							
							<?php
								
								$sql="select idAmbientes, ambiente, endereco, imagem, status from tblAmbientes";

								$select=mysql_query($sql);
								
								while($rsconsulta=mysql_fetch_array($select)){
									
							?>
							
							<tr class="tblconsulta_tr">
								<td rowspan="1"><img class="imagem_consulta" src="<?php echo($rsconsulta['ambiente']);?>"></td>
								<td rowspan="1"><?php echo($rsconsulta['endereco']); ?></td>
								<td rowspan="1"><img class="imagem_consulta" src="<?php echo($rsconsulta['imagem']);?>"/> </td>		
								
								<!-- ------------ Configurações  ------------ -->
								<td rowspan="1">
									<?php
										if($rsconsulta['status'] == 0){
											?>
											<a href="ambientesAdm.php?modo=status&codigo=<?php echo($rsconsulta['idAmbientes']);?>"> 
												<img class="iconesAdm" src="icones/StatusD.png"> 
											</a>
											<?php
										}else {
											?>
											<a name="statusA" href="ambientesAdm.php?modo=status&codigo=<?php echo($rsconsulta['idAmbientes']);?>"> 
												<img class="iconesAdm" src="icones/StatusA.png"> 
											</a>
											<?php
										}
									?>
									<a href="ambientesAdm.php?modo=editar&codigo=<?php echo($rsconsulta['idAmbientes']);?>"> 
										<img class="iconesAdm" src="icones/Modify16.png"> 
									</a>
									<a href = "ambientesAdm.php?modo=excluir&codigo=<?php echo($rsconsulta['idAmbientes']);?>">
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