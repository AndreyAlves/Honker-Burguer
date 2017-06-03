<?php

	$nome_banda="";
	
	$imagem="";
	$titulo1="";
	$texto1="";
	$titulo2="";
	$nome_arq = "";
	
	$integrante="";
	$funcao="";
	
	$botao="Salvar";
	
	require_once('moduloAdm.php');

if(isset($_POST["btnSalvar"])){
	
	$nome_banda = $_POST['txtNome'];
	$titulo1 = $_POST['txtTitulo1'];
	$texto1 = $_POST['txtTexto1'];
	$titulo2 = $_POST['txtTitulo2'];
	
	$uploaddir = "arquivos/";
	
	$nome_banda = $_POST['txtNome'];
	
	$nome_arq = basename($_FILES['flefotos']['name']);
	$uploadfile = $uploaddir .$nome_arq;
	
	
	$upload_ext = strtolower(substr($nome_arq, strlen($nome_arq)-3, 3));
	
	
	if($_POST['btnSalvar'] == 'Salvar'){
	
		if($upload_ext == 'jpg' || $upload_ext == 'png'){

			if(move_uploaded_file($_FILES['flefotos']['tmp_name'], $uploadfile)){

				$sql = "insert into tblBanda(imagem, titulo1, texto1, titulo2, nome) values('".$uploadfile."','".$titulo1."','".$texto1."','".$titulo2."','".$nome_banda."')";
				//$sqli = "insert into tblintegrantes(integrante, funcao) values('".$integrante."', '".$funcao."')";
				
				//$sql = "insert into tblNomeBanda(banda, idBanda) values('".$nome_banda."', '".$idBanda."')";
				
				mysql_query($sql);
				//mysql_query($sqli);
				
				//mysql_query($sqlb);
				
				header('location:bandaAdm.php');

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
  
	}else if($_POST['btnSalvar']=='Alterar'){

	   if($upload_ext == 'jpg' || $upload_ext == 'png'){

			if(move_uploaded_file($_FILES['flefotos']['tmp_name'], $uploadfile)){

				$sql = "update tblBanda set nome='".$nome_banda."', imagem='".$uploadfile."', titulo1='".$titulo1."', texto1='".$texto1."', titulo2='".$titulo2."' where idBanda=".$_SESSION['codigo']; 

				mysql_query($sql);

				header('location:bandaAdm.php');

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

if(isset($_POST['btnSalvarIntegrante'])){
	
	$integrante = $_POST['txtIntegrante'];
	$funcao = $_POST['txtFuncao'];
	
	$banda = $_POST['optbanda'];
	
	if($_POST['btnSalvarIntegrante'] == 'Salvar'){
	
		$sqli = "insert into tblintegrantes(integrante, funcao, idBanda) values('".$integrante."', '".$funcao."', '".$banda."')";

		mysql_query($sqli);
		
		header('location:bandaAdm.php');

		//echo($sqli);
	
	}else if($_POST['btnSalvarIntegrante']=='Alterar'){

	$sqli = "update tblintegrantes set integrante='".$integrante."', funcao='".$funcao."', idBanda='".$banda."' where idintegrante=".$_SESSION['codigo']; 

	mysql_query($sqli);

	header('location:bandaAdm.php');

	//echo($sql);
	}
}

      
/******************* Código para opções da Banda Cadastrada *******************/	
if(isset($_GET['modo'])){

	if($_GET['modo']=='excluir'){
	
		$idBanda = $_GET['codigo'];
		$sql="delete from tblBanda where idBanda=".$idBanda;
		$sqli = "delete from tblintegrantes where idBanda=".$idBanda;
		
		mysql_query($sql);
		mysql_query($sqli);
		header('location:bandaAdm.php');
		
		//echo($sql);
		
	}else if($_GET['modo']=='editar'){
	
		$idBanda = $_GET['codigo'];
		$_SESSION['codigo']=$idBanda;
		$sqlb = "select * from tblBanda where idBanda=".$idBanda;
		//$sql = "select * from tblintegrantes where idintegrante=".$idintegrante;
		
		$select = mysql_query($sqlb);
		
	
		if($rsconsulta=mysql_fetch_array($select)){
			$nome_banda=$rsconsulta['nome'];
			$imagem=$rsconsulta['imagem'];
			$titulo1=$rsconsulta['titulo1'];
			$texto1=$rsconsulta['texto1'];
			$titulo2=$rsconsulta['titulo2'];
			
			$botao="Alterar";
		}
	
		//mysql_query($sql); 
			
		//header('location:bandaAdm.php');
		
		//echo($sql);
		
	}else if($_GET['modo'] == 'status'){
		
		$idBanda = $_GET['codigo'];
		$sql = "update tblBanda set status = 0";
		$sqli = "update tblintegrantes set statusIntegrante = 0";
		
		mysql_query($sql);
		mysql_query($sqli);
		header('location:bandaAdm.php');
		
		$sql ="update tblBanda set status = 1 where idBanda =".$idBanda;
		$sqli ="update tblintegrantes set statusIntegrante = 1 where idBanda =".$idBanda;
		
		mysql_query($sql);
		mysql_query($sqli);
		header('location:bandaAdm.php');
		
	}
	
	if($_GET['modo']=='excluirIntegrante'){
	
		$idintegrante = $_GET['codigo'];
		$sql="delete from tblintegrantes where idintegrante=".$idintegrante;
		
		mysql_query($sql);
		header('location:bandaAdm.php');
		
		//echo($sql);
		
	}else if($_GET['modo']=='editarIntegrante'){
	
		$idintegrante = $_GET['codigo'];
		$_SESSION['codigo']=$idintegrante;
		$sql = "select * from tblintegrantes where idintegrante=".$idintegrante;
		//$sql = "select * from tblintegrantes where idintegrante=".$idintegrante;
		
		$select = mysql_query($sql);
		
	
		if($rsconsulta=mysql_fetch_array($select)){
			$integrante=$rsconsulta['integrante'];
			$funcao=$rsconsulta['funcao'];
			
			$botao="Alterar";
		}
		
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
					<div id="conteudosection_bandaAdm">
						<div id="tituloinformacoes">
							<p>
								Informações da Banda
							</p>
						</div>
						<div class="areadetexto">
							<p>
								Nome da Banda
							</p>
						</div>
						<div class="areadoinput">
							<input class="inputBanda" type="Text" name="txtNome" value="<?php echo($nome_banda); ?>">
						</div>
						<div class="areadetexto">
							<p>
								Imagem da Banda
							</p>
						</div>
						<div class="areadoinput">
							<input type="file" name="flefotos">
						</div>
						<div class="areadetexto">
							<p>
								Primeiro Título
							</p>
						</div>
						<div class="areadoinput">
							<input class="inputBanda" type="Text" name="txtTitulo1" value="<?php echo($titulo1); ?>">
						</div>
						<div class="areadetexto">
							<p>
								Primeiro Texto
							</p>
						</div>
						<div class="areadoinput">
							<textarea class="inputBanda" type="Text" name="txtTexto1" value=""><?php echo($texto1); ?></textarea>
						</div>
						<div class="areadetexto">
							<p>
								Segundo Título
							</p>
						</div>
						<div class="areadoinput">
							<input class="inputBanda" type="Text" name="txtTitulo2" value="<?php echo($titulo2); ?>">
						</div>
					</div>
					<div>
						<input id="salvarBanda" value="<?php echo($botao); ?>" type="submit" name="btnSalvar">
					</div>
					
					<!-- ========================================= Cadastro de Integrantes ========================================= -->
					
					<div id="tituloinformacoes">
							<p>
								Integrantes
							</p>
						</div>
						<div class="areadetexto_integrantes">
							<p>
								Integrante
							</p>
						</div>
						<div class="areadoinput_integrantes">
							<input class="inputBanda" type="Text" name="txtIntegrante" value="<?php echo($integrante); ?>">
						</div>
						<div class="areadetexto_integrantes">
							<p>
								Função/Ano
							</p>
						</div>
						<div class="areadoinput_integrantes">
							<input class="inputBanda" type="Text" name="txtFuncao" value="<?php echo($funcao); ?>">
						</div>
						<div class="areadetexto_integrantes">
							<p>Banda:</p>
						</div>
						<div class="areadoinput_integrantes">
							<select class="inputBanda" name="optbanda">
								<?php
								
									$sql = "select * from tblBanda";
									
									$select=mysql_query($sql);
					
									while($rsconsulta=mysql_fetch_array($select)){
								
								?>
									<option value="<?php echo($rsconsulta['idBanda']); ?>"> 
										<?php
											
											echo($rsconsulta['nome']);
										
										?>
									</option>
								
								<?php
								
									}
								
								?>
							</select>
						</div>
						
						<div>
							<input id="salvarBanda" value="<?php echo($botao); ?>" type="submit" name="btnSalvarIntegrante">
						</div>
				</form>
				<!-- ========================================= Bandas Cadastradas ========================================= -->
					<div id = "consulta">
						<table id="tblconsulta">
							<tr> 
								<td colspan="8" class="titulo_tabela_consulta">Bandas Cadastradas</td>
							 </tr>
							<tr>
								<td class="tblconsulta_td">Nome</td>
								<td class="tblconsulta_td">Imagem</td>
								<td class="tblconsulta_td">Título1</td>
								<td class="tblconsulta_td">Texto</td>
								<td class="tblconsulta_td">Título2</td>
								<td class="tblconsulta_td">Configurações</td>

							</tr>
							
							
							<?php
											
								$sql = "select * from vw_consulta_banda";

								$select=mysql_query($sql);
								
								while($rsconsulta=mysql_fetch_array($select)){
								
								
							?>
							
							<tr class="tblconsulta_tr">
								<td rowspan="1"><?php echo($rsconsulta['nome']); ?></td>
								<td rowspan="1"><img class="imagem_consulta" src="<?php echo($rsconsulta['imagem']);?>"/> </td>
								<td rowspan="1"><?php echo($rsconsulta['titulo1']); ?></td>
								<td rowspan="1"><?php echo($rsconsulta['texto1']); ?>...</td>
								<td rowspan="1"><?php echo($rsconsulta['titulo2']); ?></td>
								
								<!-- ------------ Configurações  ------------ -->
								<td rowspan="1">
									<?php
										if($rsconsulta['status'] == 0){
											?>
											<a href="bandaAdm.php?modo=status&codigo=<?php echo($rsconsulta['idBanda']);?>"> 
												<img class="iconesAdm" src="icones/StatusD.png"> 
											</a>
											<?php
										}else {
											?>
											<a href="bandaAdm.php?modo=status&codigo=<?php echo($rsconsulta['idBanda']);?>"> 
												<img class="iconesAdm" src="icones/StatusA.png"> 
											</a>
											<?php
										}
									?>
									<a href="bandaAdm.php?modo=editar&codigo=<?php echo($rsconsulta['idBanda']);?>"> 
										<img class="iconesAdm" src="icones/Modify16.png"> 
									</a>
									<a href = "bandaAdm.php?modo=excluir&codigo=<?php echo($rsconsulta['idBanda']);?>">
										<img id="iconesAdmDelete" src="icones/error.png"> 
									</a>
								</td>
							</tr>
							
							
							
							<?php
								}
							?>
							
						</table>
					</div> 
					<!-- ========================================= Integrantes Cadastrados ========================================= -->
					<div id = "consulta">
						<table id="tblconsulta">
							<tr> 
								<td colspan="8" class="titulo_tabela_consulta">Integrantes</td>
							 </tr>
							<tr>
								
								<td class="tblconsulta_td">Integrante</td>
								<td class="tblconsulta_td">Função/Ano</td>
								<td class="tblconsulta_td">Banda</td>
								<td class="tblconsulta_td">Configurações</td>

							</tr>
							
							
							<?php
								
								$sql = "select * from vw_consulta_integrantes";

								/*$sql = "select * from tblBanda";*/
								
								//echo($sql);
								$select=mysql_query($sql);
								
								while($rsconsulta=mysql_fetch_array($select)){
								
								
							?>
							
							<tr class="tblconsulta_tr">
								<td rowspan="1"><?php echo($rsconsulta['integrante']); ?></td>
								<td rowspan="1"><?php echo($rsconsulta['funcao']); ?>...</td>
								<td rowspan="1"><?php echo($rsconsulta['nome']); ?></td>
								<!-- ------------ Botao Excluir ------------ -->
								<td rowspan="1">
									<?php
										if($rsconsulta['statusIntegrante'] == 0){
											?>
											<a href="bandaAdm.php?modo=statusIntegrante&codigo=<?php echo($rsconsulta['idintegrante']);?>"> 
												<img class="iconesAdm" src="icones/StatusD.png"> 
											</a>
											<?php
										}else {
											?>
											<a href="bandaAdm.php?modo=statusIntegrante&codigo=<?php echo($rsconsulta['idintegrante']);?>"> 
												<img class="iconesAdm" src="icones/StatusA.png"> 
											</a>
											<?php
										}
									?>
									<a href="bandaAdm.php?modo=editarIntegrante&codigo=<?php echo($rsconsulta['idintegrante']);?>"> 
										<img class="iconesAdm" src="icones/Modify16.png"> 
									</a>
									<a href = "bandaAdm.php?modo=excluirIntegrante&codigo=<?php echo($rsconsulta['idintegrante']);?>">
										<img id="iconesAdmDelete" src="icones/error.png"> 
									</a>
								</td>
							</tr>
							
							<?php
								}
							?>
							
						</table>
					</div> 
					
					<!-- <div id="consultaBanda">
						<div id="titulo_consultaBanda">
							<p>
								Bandas Cadastradas
							</p>
						</div>
						<div class="areadetexto_consultaBanda">
							<p>
								Imagem
							</p>
						</div>
						<div class="informacao_consultaBanda">
							
						</div>
						<div class="areadetexto_consultaBanda">
							<p>
								Título
							</p>
						</div>
						<div class="informacao_consultaBanda">
							
						</div>
						<div class="areadetexto_consultaBanda">
							<p>
								Texto
							</p>
						</div>
						<div class="informacao_consultaBanda">
							
						</div>
						<div class="areadetexto_consultaBanda">
							<p>
								Título
							</p>
						</div>
						<div class="informacao_consultaBanda">
							
						</div>
						<div class="areadetexto_consultaBanda">
							<p>
								Texto
							</p>
						</div>
						<div class="informacao_consultaBanda">
							
						</div>
					</div>-->
				
			</section>
			
			<!-- ========================================= Rodapé ========================================= -->
			<?php include('rodapeAdm.php'); ?>
		</div>
	</body>
</html>