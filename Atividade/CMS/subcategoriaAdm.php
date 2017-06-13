<?php
	
	$botao="Salvar";
	$subcat="";
	$categoria="";
	
	require_once('moduloAdm.php');
	
if(isset($_POST["btnSalvar"])){

	
	if($_POST['btnSalvar'] == 'Salvar'){
	
		$subcat = $_POST['txtSubCat'];
		$categoria = $_POST['optcategoria'];
	
		$sql = "insert into tblsubcat(idCategoria, subcat) values('".$categoria."','".$subcat."')";
		mysql_query($sql);
		header('location:subcategoriaAdm.php');
	
		//echo($sql);
		
	}else if($_POST['btnSalvar']=='Alterar'){
	
		$subcat = $_POST['txtSubCat'];
		$categoria = $_POST['optcategoria'];
		
		$sql_update="update tblsubcat set subcat='".$subcat."', idCategoria='".$categoria."' where idSubCat =".$_SESSION['codigo'];                         
		
		mysql_query($sql_update);
	
		header('location:subcategoriaAdm.php');
        
		//echo($sql_update);
		
	}
}

/*************** Modos *******************/

if(isset($_GET['modo'])){

	if($_GET['modo']=='excluir'){

		$idSubCat = $_GET['codigo'];
		$sql="delete from tblsubcat where idSubCat=".$idSubCat;
		mysql_query($sql); 
		
		header('location:subcategoriaAdm.php');
		
	}else if($_GET['modo']=='editar'){
		
		$idSubCat = $_GET['codigo'];
		$_SESSION['codigo']=$idSubCat;
		$sql = "select * from tblsubcat where idSubCat=".$idSubCat;
		
		$select = mysql_query($sql);
	
		if($rsconsulta=mysql_fetch_array($select)){
			$subcat=$rsconsulta['subcat'];
			$categoria=$rsconsulta['optcategoria'];

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
				<form name="frmsubcategorias" method="post" action="subcategoriaAdm.php">
					<div id="conteudoProduto">
						<div id="tituloinformacoes">
							<p>
								Cadastro de Sub.Categorias
							</p>
						</div>
						<div class="areadetexto_produtos">
							<p>
								Sub.Categoria:
							</p>
						</div>
						<div class="areadoinput_produtos">
							<input class="inputProduto" type="Text" name="txtSubCat" value="<?php echo($subcat); ?>">
						</div>
						<div class="areadetexto_integrantes">
							<p>Categoria:</p>
						</div>
						<div class="areadoinput_integrantes">
							<select class="inputBanda" name="optcategoria">
								<?php
								
									$sql = "select * from tblcategorias";
									
									$select=mysql_query($sql);
					
									while($rsconsulta=mysql_fetch_array($select)){
								
								?>
									<option value="<?php echo($rsconsulta['idCategoria']); ?>"> 
										<?php
											
											echo($rsconsulta['categoria']);
										
										?>
									</option>
								
								<?php
								
									}
								
								?>
							</select>
						</div>
						<div>
							<input id="salvar" value="<?php echo($botao); ?>" type="submit" name="btnSalvar">
						</div>
					</div>
				</form>
				<!-- ========================================= Bandas Cadastradas ========================================= -->
					<div id="consulta">
						<table id="tblconsulta">
							<tr> 
								<td colspan="8" class="titulo_tabela_consulta">Sub.Categorias Cadastradas</td>
							 </tr>
							<tr>
								<td class="tblconsulta_td">Sub.Categorias</td>
								<td class="tblconsulta_td">Categoria</td>
								<td class="tblconsulta_td">Configurações</td>
							</tr>
							<?php
								
								$sql = "select * from tblsubcat as s
												inner join
												tblcategorias as c
												on s.idCategoria = c.idCategoria";

								$select = mysql_query($sql);
								
								while($rsconsulta = mysql_fetch_array($select)){
									
							?>
							<tr class="tblconsulta_tr">
								<td rowspan="1"><?php echo($rsconsulta['subcat']); ?></td>
								<td rowspan="1"><?php echo($rsconsulta['categoria']); ?></td>
								
								<!-- ------------ Configurações  ------------ -->
								<td rowspan="1">
									<a href="subcategoriaAdm.php?modo=editar&codigo=<?php echo($rsconsulta['idSubCat']);?>"> 
										<img class="iconesAdm" src="icones/Modify16.png"> 
									</a>
									<a href="subcategoriaAdm.php?modo=excluir&codigo=<?php echo($rsconsulta['idSubCat']);?>">
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