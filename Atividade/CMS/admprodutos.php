<?php
	
	$nome="";
	$descricao="";
	$preco="";
	$nome_arq="";
	
	$botao="Salvar";
	
	require_once('moduloAdm.php');
	
if(isset($_POST["btnSalvar"])){
	
	$nome = $_POST['txtNome'];
	$descricao = $_POST['txtDesc'];
	$preco = $_POST['txtPreco'];
    $subcategoria=$_POST['optsubcategoria'];
    
	$uploaddir = "arquivos/";
	
	$nome_arq = basename($_FILES['flefotos']['name']);
	$uploadfile = $uploaddir .$nome_arq;
	
	$upload_ext = strtolower(substr($nome_arq, strlen($nome_arq)-3, 3));
	
	if($_POST['btnSalvar'] == 'Salvar'){
	
		if($upload_ext == 'jpg' || $upload_ext == 'png'){
		
			if(move_uploaded_file($_FILES['flefotos']['tmp_name'], $uploadfile)){
				
				$sql = "insert into tblprodutos(nome, descricao, preco, imagem, idSubCat) values('".$nome."','".$descricao."','".$preco."','".$uploadfile."','".$subcategoria."')";
				
				mysql_query($sql);				
				header('location:admprodutos.php');
				
				//echo($sql);
				
			}else {
				echo("Erro ao enviar o arquivo!");
			}
		}
	}elseif($_POST['btnSalvar']=='Alterar'){
	
		 if($upload_ext == 'jpg' || $upload_ext == 'png'){

			if(move_uploaded_file($_FILES['flefotos']['tmp_name'], $uploadfile)){
		
				$sql="update tblprodutos set nome='".$nome."',descricao='".$descricao."',preco='".$preco."', imagem='".$uploadfile."' where idProduto =".$_SESSION['codigo'];                         
				
				mysql_query($sql);
			
				header('location:admprodutos.php');
				
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

/*************** Modos *******************/

if(isset($_GET['modo'])){

	if($_GET['modo']=='excluir'){

		$idProduto = $_GET['codigo'];
		$sql="delete from tblprodutos where idProduto=".$idProduto;
        mysql_query($sql); 
		header('location:admprodutos.php');
		
	}else if($_GET['modo']=='editar'){
		
		$idProduto = $_GET['codigo'];
		$_SESSION['codigo']=$idProduto;
		$sql = "select * from tblprodutos where idProduto=".$idProduto;
		
		$select = mysql_query($sql);
	
		if($rsconsulta=mysql_fetch_array($select)){
			$nome=$rsconsulta['nome'];
            $descricao=$rsconsulta['descricao'];
            $preco=$rsconsulta['preco'];
            $imagem=$rsconsulta['imagem'];
            
			$botao="Alterar";
		}
	
	}else if($_GET['modo'] == 'status'){
		
		$idSobre = $_GET['codigo'];
		$sql = "update tblsobre set status = 0";
		
		mysql_query($sql);
		header('location:sobreAdm.php');
		
		$sql ="update tblsobre set status = 1 where idSobre =".$idSobre;
		
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
					<div id="conteudoProduto">
						<div id="tituloinformacoes">
							<p>
								Cadastro de Produtos
							</p>
						</div>
						<!--<div class="areadetexto_produtos">
							<p>
								Titulo
							</p>
						</div>
						<div class="areadoinput_produtos">
							<input class="inputProduto" type="Text" name="txtTitulo">
						</div>-->

						<div class="areadetexto_produtos">
							<p>
								Imagem Lanche
							</p>
						</div>
						<div class="areadoinput_produtos">
							<input class="inputProduto" type="file" name="flefotos">
						</div>	
						<div class="areadetexto_produtos">
							<p>
								Nome do Lanche
							</p>
						</div>
						<div class="areadoinput_produtos">
							<input class="inputProduto" type="Text" name="txtNome" value="<?php echo($nome); ?>">
						</div>
						<div class="areadetexto_produtos">
							<p>
								Descrição do Lanche
							</p>
						</div>
						<div class="areadoinput_produtos">
							<textarea class="inputProduto" type="Text" name="txtDesc"><?php echo($descricao); ?></textarea>
						</div>
						<div class="areadetexto_produtos">
							<p>
								Preço
							</p>
						</div>
						<div class="areadoinput_produtos">
							<input class="inputProduto" type="Text" name="txtPreco" value="<?php echo($preco); ?>">
						</div>
                        <div class="areadetexto_produtos">
                            <p>
								Sub.Categoria
							</p>
						</div>
						<div class="areadoinput">
							<select class="caixadetexto" name="optsubcategoria">
								<?php

									$sql = "select * from tblsubcat";

									$select=mysql_query($sql);

									while($rsconsulta=mysql_fetch_array($select)){

								?>
									<option value="<?php echo($rsconsulta['idSubCat']); ?>"> 
										<?php

											echo($rsconsulta['subcat']);

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
				<!-- ========================================= Produtos Cadastrados ========================================= -->
					<div id="consulta">
						<table id="tblconsulta">
							<tr> 
								<td colspan="8" class="titulo_tabela_consulta">Produtos Cadastrados</td>
							 </tr>
							<tr>
								<td class="tblconsulta_td">Nome</td>
								<td class="tblconsulta_td">Descrição</td>
								<td class="tblconsulta_td">Preço</td>
								<td class="tblconsulta_td">Imagem</td>
                                <td class="tblconsulta_td">Sub.Categoria</td>
                                <td class="tblconsulta_td">Categoria</td>
								<td class="tblconsulta_td">Configurações</td>
							</tr>
							<?php
								
								$sql = "select * from tblprodutos as p
                                                    inner join
                                                    tblsubcat as sc
                                                    on p.idSubCat = sc.idSubCat
                                                    
                                                    inner join 
                                                    tblcategorias as c
                                                    on sc.idCategoria = c.idCategoria
                                                    ";

								$select = mysql_query($sql);
								
								while($rsconsulta = mysql_fetch_array($select)){
									
							?>
							<tr class="tblconsulta_tr">
								<td rowspan="1"><?php echo($rsconsulta['nome']); ?></td>
								<td rowspan="1"><?php echo($rsconsulta['descricao']); ?></td>
								<td rowspan="1">R$<?php echo($rsconsulta['preco']); ?></td>
								<td rowspan="1"><img class="imagem_consulta" src="<?php echo($rsconsulta['imagem']);?>"/> </td>
                                <td rowspan="1"><?php echo($rsconsulta['subcat']); ?></td>
                                <td rowspan="1"><?php echo($rsconsulta['categoria']); ?></td>
								<!-- ------------ Configurações  ------------ -->
								<td rowspan="1">
									<a href="admprodutos.php?modo=editar&codigo=<?php echo($rsconsulta['idProduto']);?>"> 
										<img class="iconesAdm" src="icones/Modify16.png"> 
									</a>
									<a href="admprodutos.php?modo=excluir&codigo=<?php echo($rsconsulta['idProduto']);?>">
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