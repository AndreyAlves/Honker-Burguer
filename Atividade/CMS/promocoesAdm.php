<?php

	$titulo="";
	$nome="";
	$desc="";
	$preco="";
	$botao="Salvar";

	$desconto="";
	
	$produto="";
	
	$calorias="";
	$proteinas="";
	$carboidratos="";
	$gordura="";
	$gorduras="";
	$gordurat="";
	$acucar="";
	$sodio="";
	
	require_once('moduloAdm.php');
	

if(isset($_POST["btnSalvar"])){
	
	$titulo = $_POST['txtTitulo'];
	$desconto = $_POST['txtDesconto'];
	$produto = $_POST['optnome'];

	if($_POST['btnSalvar'] == 'Salvar'){

		$sql = "insert into tblPromocoes(titulo, desconto, idProduto) values('".$titulo."','".$desconto."', '".$produto."')";
		
		mysql_query($sql);
		
		header('location:promocoesAdm.php');
		
		//echo($sql);
	
	}elseif($_POST['btnSalvar']=='Alterar'){
		
		$sql="update tblPromocoes set titulo='".$titulo."',desconto='".$desconto."', idProduto='".$produto."' where idPromocoes =".$_SESSION['codigo'];                         
		
		mysql_query($sql);
	
		header('location:promocoesAdm.php');
        
		//echo($sql);
		
	}
}
		
if(isset($_POST["btnSalvarNutricao"])){

	$calorias = $_POST['txtCalorias'];
	$proteinas = $_POST['txtProteinas'];
	$carboidratos = $_POST['txtCarboidratos'];
	$gordura = $_POST['txtGordura'];
	$gorduras = $_POST['txtGorduraS'];
	$gordurat = $_POST['txtGorduraT'];
	$sodio = $_POST['txtSodio'];
	
	$produto_nutricional = $_POST['optnome_nutricional'];
	
	if($_POST['btnSalvarNutricao'] == 'Salvar'){
	
		$sqln = "insert into tblNutricional(calorias, proteinas, carboidratos, gordura, gorduras, gordurat, sodio, idProduto) values('".$calorias."','".$proteinas."','".$carboidratos."','".$gordura."','".$gorduras."','".$gordurat."','".$sodio."','".$produto_nutricional."')";
			
		mysql_query($sqln);
			
		header('location:promocoesAdm.php');
		
		//echo($sql);
		
	}else if($_POST['btnSalvarNutricao'] == 'Alterar'){

	$sqln = "update tblNutricional set calorias='".$calorias."', proteinas='".$proteinas."', carboidratos='".$carboidratos."', gordura='".$gordura."', gorduras='".$gordurat."', sodio='".$sodio."', idProduto='".$produto_nutricional."' where idNutricional=".$_SESSION['codigo']; 

	mysql_query($sqln);

	header('location:promocoesAdm.php');

	//echo($sql);
	}

}

/******************* Código para Excluir Cadastro *******************/	
if(isset($_GET['modo'])){

	if($_GET['modo']=='excluir'){
	
		$idPromocoes = $_GET['codigo'];
		$sql="delete from tblPromocoes where idPromocoes=".$idPromocoes;
		mysql_query($sql); 
		
		header('location:promocoesAdm.php');
	}else if($_GET['modo']=='editar'){
		
		$idPromocoes = $_GET['codigo'];
		$_SESSION['codigo']=$idPromocoes;
		$sql = "select * from tblPromocoes where idPromocoes=".$idPromocoes;
		
		$select = mysql_query($sql);
	
		if($rsconsulta=mysql_fetch_array($select)){
			$titulo=$rsconsulta['titulo'];
			$desconto=$rsconsulta['desconto'];;
            $produto=$rsconsulta['idProduto'];
	
			$botao="Alterar";
		}
	
	}else if($_GET['modo'] == 'status'){
			
		$idPromocoes = $_GET['codigo'];
		$sql = "update tblPromocoes set status = 0";
		//$sqln = "update tblNutricional set statusNutricional = 0";
		
		mysql_query($sql);
		//mysql_query($sqln);
		header('location:promocoesAdm.php');
		
		$sql ="update tblPromocoes set status = 1 where idPromocoes =".$idPromocoes;
		//$sqli ="update tblNutricional set statusNutricional = 1 where idProduto =".$idProduto;*/
		
		mysql_query($sql);
		//mysql_query($sqln);
		header('location:promocoesAdm.php');
			
	}
	
//**************************************** Modos Nutricional **************************************** 
	
	if($_GET['modo']=='excluirNutricional'){
	
		$idNutricional = $_GET['codigo'];
		$sql="delete from tblNutricional where idNutricional=".$idNutricional;
		
		mysql_query($sql);
		header('location:promocoesAdm.php');
		
		//echo($sql);
		
	}else if($_GET['modo']=='editarNutricional'){
	
		$idNutricional = $_GET['codigo'];
		$_SESSION['codigo']=$idNutricional;
		$sql = "select * from tblNutricional where idNutricional=".$idNutricional;
		
		$select = mysql_query($sql);
		
	
		if($rsconsulta=mysql_fetch_array($select)){
			$calorias =$rsconsulta['calorias'];
			$proteinas = $rsconsulta['proteinas'];
			$carboidratos = $rsconsulta['carboidratos'];
			$gordura = $rsconsulta['gordura'];
			$gorduras =$rsconsulta['gorduras'];
			$gordurat = $rsconsulta['gordurat'];
			$sodio =$rsconsulta['sodio'];
			
			$botao="Alterar";
		}
		
	}else if($_GET['modo'] == 'statusNutricional'){
		
		$idNutricional = $_GET['codigo'];
		$sqln = "update tblNutricional set statusNutricional = 0";
		
		mysql_query($sqln);
		header('location:promocoesAdm.php');
		
		$sqln ="update tblNutricional set statusNutricional = 1 where idNutricional =".$idNutricional;
		
		mysql_query($sqln);
		header('location:promocoesAdm.php');

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
			<section id="section_promocoesAdm">
				<form name="frmupload" method="post" enctype="multipart/form-data">
					<div id="conteudosection_promocaoAdm">
						<div id="tituloinformacoes_promocao">
							<p>
								Informações da Promoção
							</p>
						</div>
					</div>
					<div class="areadetexto_Promocao">
						<p>
							Título
						</p>
					</div>
					<div class="areadoinput_integrantes">
						<input class="inputPromocao" type="Text" name="txtTitulo" value="<?php echo($titulo) ?>">
					</div>
					<div class="areadetexto_Promocao">
						<p>
							Desconto em Porcentagem
						</p>
					</div>
					<div class="areadoinput_integrantes">
						<input class="inputPromocao" type="Text" name="txtDesconto" value="<?php echo($desconto) ?>">
					</div>
					<div class="areadetexto_Promocao">
						<p>
							Lanche
						</p>
					</div>
					<div class="areadoinput_Promocao">
						<select class="caixadetexto" name="optnome">
							<?php
							
								$sql = "select * from tblProdutos";
								
								$select=mysql_query($sql);
				
								while($rsconsulta=mysql_fetch_array($select)){
							
							?>
								<option value="<?php echo($rsconsulta['idProduto']); ?>"> 
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
						<input id="salvarPromocao" value="<?php echo($botao); ?>" type="submit" name="btnSalvar">
					</div>
				<!-- ========================================= Tabela Nutricional ========================================= -->

					<div id="conteudoinfNutricional_promocao">
						<div id="tituloinfNutricional_promocao">
							<p>
								Informação Nutricional do Lanche
							</p>
						</div>
						<div class="infNutricionalValores">
							<div class="areadetexto_nutricional">
								<p>
									Calorias:
								</p>
							</div>
							<div>
								<input class="inputtextosPromocao_nutricional" placeholder="kcal" type="Text" name="txtCalorias" value="<?php echo($calorias) ?>">
							</div>
							<div class="areadetexto_nutricional">
								<p>
									Proteínas:
								</p>
							</div>
							<div>
								<input class="inputtextosPromocao_nutricional" placeholder="g" type="Text" name="txtProteinas" value="<?php echo($proteinas) ?>">
							</div>
							<div class="areadetexto_nutricional">
								<p>
									Carboidratos:
								</p>
							</div>
							<div>
								<input class="inputtextosPromocao_nutricional" placeholder="g" type="Text" name="txtCarboidratos" value="<?php echo($carboidratos) ?>">
							</div>
							<div class="areadetexto_nutricional">
								<p>
									Gordura:
								</p>
							</div>
							<div>
								<input class="inputtextosPromocao_nutricional" placeholder="g" type="Text" name="txtGordura" value="<?php echo($gordura) ?>">
							</div>
						</div>
						<div class="infNutricionalValores2">
							<div class="areadetexto_nutricional">
								<p>
									Gorduras Saturadas:
								</p>
							</div>
							<div>
								<input class="inputtextosPromocao_nutricional" placeholder="g" type="Text" name="txtGorduraS" value="<?php echo($gorduras) ?>">
							</div>
							<div class="areadetexto_nutricional">
								<p>
									Gorduras Trans:
								</p>
							</div>
							<div>
								<input class="inputtextosPromocao_nutricional" placeholder="g" type="Text" name="txtGorduraT" value="<?php echo($gordurat) ?>">
							</div>
							<div class="areadetexto_nutricional">
								<p>
									Sódio:
								</p>
							</div>
							<div>
								<input class="inputtextosPromocao_nutricional" placeholder="mg" type="Text" name="txtSodio" value="<?php echo($sodio) ?>">
							</div>
							<div class="areadetexto_nutricional">
								<p>
									Lanche
								</p>
							</div>
							<div class="inputtextosPromocao_nutricional">
								<select class="caixadetexto_nutricional" name="optnome_nutricional">
									<?php
									
										$sql = "select * from tblProdutos";
										
										$select=mysql_query($sql);
						
										while($rsconsulta=mysql_fetch_array($select)){
									
									?>
										<option value="<?php echo($rsconsulta['idProduto']); ?>"> 
											<?php
												
												echo($rsconsulta['nome']);
											
											?>
										</option>
									
									<?php
									
										}
									
									?>
								</select>
							</div>
						</div>
						<div>
							<input id="salvarPromocao_nutricional" value="<?php echo($botao); ?>" type="submit" name="btnSalvarNutricao">
						</div>
					</div>
				</form>
				<!-- ========================================= Promoções cadastradas ========================================= -->
				<div id = "consulta">
					<table id="tblconsulta">
						<tr> 
							<td colspan="8" class="titulo_tabela_consulta">Promoções Cadastradas</td>
						 </tr>
						<tr>
							<td class="tblconsulta_td">Título</td>
							<td class="tblconsulta_td">Imagem</td>
							<td class="tblconsulta_td">Desconto</td>
							<td class="tblconsulta_td">nome</td>
							<td class="tblconsulta_td">Preço</td>
							<td class="tblconsulta_td">Configurações</td>

						</tr>
						
						<?php
							
							$sql="select * from vw_consulta_promocao";

							$select=mysql_query($sql);
							
							//echo($sql);
							
							while($rsconsulta=mysql_fetch_array($select)){
								
						?>
						
						<tr class="tblconsulta_tr">
							<td rowspan="1"><?php echo($rsconsulta['titulo']); ?></td>
							<td rowspan="1"><img class="imagem_consulta" src="<?php echo($rsconsulta['imagem']);?>"/> </td>
							<td rowspan="1"><?php echo($rsconsulta['desconto']); ?></td>
							<td rowspan="1"><?php echo($rsconsulta['nome']); ?></td>
							<td rowspan="1">R$<?php echo($rsconsulta['preco']); ?></td>
							
							<!-- ------------ Configurações  ------------ -->
							<td rowspan="1">
								<?php
									if($rsconsulta['status'] == 0){
										?>
										<a href="promocoesAdm.php?modo=status&codigo=<?php echo($rsconsulta['idPromocoes']);?>"> 
											<img class="iconesAdm" src="icones/StatusD.png"> 
										</a>
										<?php
									}else {
										?>
										<a href="promocoesAdm.php?modo=status&codigo=<?php echo($rsconsulta['idPromocoes']);?>"> 
											<img class="iconesAdm" src="icones/StatusA.png"> 
										</a>
										<?php
									}
								?>
								<a href="promocoesAdm.php?modo=editar&codigo=<?php echo($rsconsulta['idPromocoes']);?>"> 
									<img class="iconesAdm" src="icones/Modify16.png"> 
								</a>
								<a href = "promocoesAdm.php?modo=excluir&codigo=<?php echo($rsconsulta['idPromocoes']);?>">
									<img id="iconesAdmDelete" src="icones/error.png"> 
								</a>
							</td>
						</tr>
						
						<?php
						
							}
						
						?>
						
					</table>
				</div>
				<!-- ========================================= Inf. Nutricional Cadastradas ========================================= -->
				<div id="consulta">
					<table id="tblconsulta">
						<tr> 
							<td colspan="9" class="titulo_tabela_consulta">Inf. Nutricional</td>
						</tr>
						<tr>
							<td class="tblconsulta_td">Calorias</td>
							<td class="tblconsulta_td">Proteínas</td>
							<td class="tblconsulta_td">Carboidratos</td>
							<td class="tblconsulta_td">Gordura</td>
							<td class="tblconsulta_td">Gorduras S</td>
							<td class="tblconsulta_td">Gorduras T</td>
							<td class="tblconsulta_td">Sódio</td>
							<td class="tblconsulta_td">Lanche</td>
							<td class="tblconsulta_td">Configurações</td>
						</tr>
						
						<?php
							
							$sql = "select * from vw_consulta_nutricional";
							
							$select=mysql_query($sql);
							
							while($rsconsulta=mysql_fetch_array($select)){
							
						?>
						
						<tr class="tblconsulta_tr">
							<td rowspan="1"><?php echo($rsconsulta['calorias']); ?>kcal</td>
							<td rowspan="1"><?php echo($rsconsulta['proteinas']); ?>g</td>
							<td rowspan="1"><?php echo($rsconsulta['carboidratos']); ?>g</td>
							<td rowspan="1"><?php echo($rsconsulta['gordura']); ?>g</td>
							<td rowspan="1"><?php echo($rsconsulta['gorduras']); ?>g</td>
							<td rowspan="1"><?php echo($rsconsulta['gordurat']); ?>g</td>
							<td rowspan="1"><?php echo($rsconsulta['sodio']); ?>mg</td>
							<td rowspan="1"><?php echo($rsconsulta['nome']); ?></td>
							<!-- ------------ Botao Excluir ------------ -->
							<td rowspan="1">
								<?php
									if($rsconsulta['statusNutricional'] == 0){
										?>
										<a href="promocoesAdm.php?modo=statusNutricional&codigo=<?php echo($rsconsulta['idNutricional']);?>"> 
											<img class="iconesAdm" src="icones/StatusD.png"> 
										</a>
										<?php
									}else {
										?>
										<a href="promocoesAdm.php?modo=statusNutricional&codigo=<?php echo($rsconsulta['idNutricional']);?>"> 
											<img class="iconesAdm" src="icones/StatusA.png"> 
										</a>
										<?php
									}
								?>
								<a href="promocoesAdm.php?modo=editarNutricional&codigo=<?php echo($rsconsulta['idNutricional']);?>"> 
									<img class="iconesAdm" src="icones/Modify16.png"> 
								</a>
								<a href="promocoesAdm.php?modo=excluirNutricional&codigo=<?php echo($rsconsulta['idNutricional']);?>">
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