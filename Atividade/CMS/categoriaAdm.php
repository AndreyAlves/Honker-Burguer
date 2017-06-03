<?php
	
	$botao="Salvar";
	
	$categoria="";
	
	require_once('moduloAdm.php');
	
if(isset($_POST["btnSalvar"])){

	$categoria = $_POST['txtCategoria'];
	
	if($_POST['btnSalvar'] == 'Salvar'){
	
		$sql = "insert into tblCategorias(categoria) values('".$categoria."')";
		mysql_query($sql);
		header('location:categoriaAdm.php');
	
		//echo($sql);
		
	}else if($_POST['btnSalvar']=='Alterar'){
		
		$sql="update tblCategorias set categoria='".$categoria."' where idCategoria =".$_SESSION['codigo'];                         
		
		mysql_query($sql);
	
		header('location:categoriaAdm.php');
        
		//echo($sql);
		
	}
}

/*************** Modos *******************/

if(isset($_GET['modo'])){

	if($_GET['modo']=='excluir'){

		$idCategoria = $_GET['codigo'];
		$sql="delete from tblCategorias where idCategoria=".$idCategoria;
		mysql_query($sql); 
		
		header('location:categoriaAdm.php');
		
	}else if($_GET['modo']=='editar'){
		
		$idCategoria = $_GET['codigo'];
		$_SESSION['codigo']=$idCategoria;
		$sql = "select * from tblCategorias where idCategoria=".$idCategoria;
		
		$select = mysql_query($sql);
	
		if($rsconsulta=mysql_fetch_array($select)){
			$categoria=$rsconsulta['categoria'];

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
				<form name="frmcategorias" method="post" action="categoriaAdm.php">
					<div id="conteudoProduto">
						<div id="tituloinformacoes">
							<p>
								Cadastro de Categorias
							</p>
						</div>
						<div class="areadetexto_produtos">
							<p>
								Categoria:
							</p>
						</div>
						<div class="areadoinput_produtos">
							<input class="inputProduto" type="Text" name="txtCategoria" value="<?php echo($categoria); ?>">
						</div>
						<div>
							<input id="salvar" value="<?php echo($botao); ?>" type="submit" name="btnSalvar">
						</div>
					</div>
				</form>
				<!-- ========================================= Categorias Cadastradas ========================================= -->
					<div id="consulta">
						<table id="tblconsulta">
							<tr> 
								<td colspan="8" class="titulo_tabela_consulta">Categorias Cadastradas</td>
							 </tr>
							<tr>
								<td class="tblconsulta_td">Categorias</td>
								<td class="tblconsulta_td">Configurações</td>
							</tr>
							<?php
								
								$sql = "select * from tblCategorias";

								$select = mysql_query($sql);
								
								while($rsconsulta = mysql_fetch_array($select)){
									
							?>
							<tr class="tblconsulta_tr">
								<td rowspan="1"><?php echo($rsconsulta['categoria']); ?></td>
								
								<!-- ------------ Configurações  ------------ -->
								<td rowspan="1">
									<a href="categoriaAdm.php?modo=editar&codigo=<?php echo($rsconsulta['idCategoria']);?>"> 
										<img class="iconesAdm" src="icones/Modify16.png"> 
									</a>
									<a href="categoriaAdm.php?modo=excluir&codigo=<?php echo($rsconsulta['idCategoria']);?>">
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