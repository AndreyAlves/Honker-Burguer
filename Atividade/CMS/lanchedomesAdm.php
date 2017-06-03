<?php

	$titulo="";
	$nome="";
	$desc="";
	$preco="";
	$botao="Salvar";

	require_once('moduloAdm.php');
	

if(isset($_POST["btnSalvar"])){
	
	$produto = $_POST['optnome'];

	if($_POST['btnSalvar'] == 'Salvar'){

		$sql = "insert into tblLanchedomes (idProduto) values('".$produto."')";
		
		mysql_query($sql);
		
		header('location:lanchedomesAdm.php');
		
		//echo($sql);
	
	}elseif($_POST['btnSalvar']=='Alterar'){
		
		$sql="update tblLanchedomes set idProduto='".$produto."' where idLanchedomes =".$_SESSION['codigo'];                         
		mysql_query($sql);
	
		header('location:lanchedomesAdm.php');
        
		//echo($sql);
		
	}
	
}

/******************* Código para Excluir Cadastro *******************/	
if(isset($_GET['modo'])){

	if($_GET['modo']=='excluir'){
	
		$idLanchedomes = $_GET['codigo'];
		$sql="delete from tblLanchedomes where idLanchedomes=".$idLanchedomes;
		
		mysql_query($sql); 
		
		header('location:lanchedomesAdm.php');
	
		//echo($sql);
		
	}else if($_GET['modo']=='editar'){
		
		$idLanchedomes = $_GET['codigo'];
		$_SESSION['codigo']=$idLanchedomes;
		$sql = "select * from tblLanchedomes where idLanchedomes=".$idLanchedomes;
		
		$select = mysql_query($sql);
	
		if($rsconsulta=mysql_fetch_array($select)){
            $produto=$rsconsulta['idProduto'];
	
			$botao="Alterar";
			
		}
		
	}else if($_GET['modo'] == 'status'){
		
		$idLanchedomes = $_GET['codigo'];
		$sql = "update tblLanchedomes set status = 0";
		
		mysql_query($sql);
		header('location:lanchedomesAdm.php');
		
		$sql ="update tblLanchedomes set status = 1 where idLanchedomes =".$idLanchedomes;
		
		mysql_query($sql);
		header('location:lanchedomesAdm.php');
		
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
					<div id="conteudosection_lanchedomesAdm">
						<div id="tituloinformacoes_lanchedomes">
							<p>
								Informações do Lanche
							</p>
						</div>
						<div class="areadetexto">
							<p>
								Lanche
							</p>
						</div>
						<div class="areadoinput_Promocao">
							<select id="caixadetexto_lanchedomes" name="optnome">
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
							<input id="salvarLanchedomes" value="<?php echo($botao); ?>" type="submit" name="btnSalvar">
						</div>
					</div>
				</form>
					<!-- ========================================= Lanches cadastradas ========================================= -->
					<div id = "consulta">
						<table id="tblconsulta">
							<tr> 
								<td colspan="8" class="titulo_tabela_consulta">Lanches Cadastrados</td>
							 </tr>
							<tr>
								<td class="tblconsulta_td">Imagem</td>
								<td class="tblconsulta_td">Nome</td>
								<td class="tblconsulta_td">Descrição</td>
								<td class="tblconsulta_td">Preço</td>
								<td class="tblconsulta_td">Configurações</td>

							</tr>
							
							<?php
								
								$sql="select * from vw_consulta_lanche_mes";

								$select=mysql_query($sql);
								
								while($rsconsulta=mysql_fetch_array($select)){
									
							?>
							
							<tr class="tblconsulta_tr">
								<td rowspan="1"><img class="imagem_consulta" src="<?php echo($rsconsulta['imagem']);?>"/> </td>
								<td rowspan="1"><?php echo($rsconsulta['nome']); ?></td>
								<td rowspan="1"><?php echo($rsconsulta['descricao']); ?>...</td>
								<td rowspan="1">R$<?php echo($rsconsulta['preco']); ?></td>
								
								<!-- ------------ Configurações  ------------ -->
								<td rowspan="1">
									<?php
										if($rsconsulta['status'] == 0){
											?>
											<a href="lanchedomesAdm.php?modo=status&codigo=<?php echo($rsconsulta['idLanchedomes']);?>"> 
												<img class="iconesAdm" src="icones/StatusD.png"> 
											</a>
											<?php
										}else {
											?>
											<a href="lanchedomesAdm.php?modo=status&codigo=<?php echo($rsconsulta['idLanchedomes']);?>"> 
												<img class="iconesAdm" src="icones/StatusA.png"> 
											</a>
											<?php
										}
									?>
									<a href="lanchedomesAdm.php?modo=editar&codigo=<?php echo($rsconsulta['idLanchedomes']);?>"> 
										<img class="iconesAdm" src="icones/Modify16.png"> 
									</a>
									<a href = "lanchedomesAdm.php?modo=excluir&codigo=<?php echo($rsconsulta['idLanchedomes']);?>">
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