<?php

$botao="Salvar";
$new_nivel="";

require_once('moduloAdm.php');
	

if(isset($_POST['btnSalvarNivel'])){
	
	$new_nivel=$_POST['txtNivel'];

	if($_POST['btnSalvarNivel'] == 'Salvar'){
	
		$sql="insert into tblNivel (nivel) values('".$new_nivel."')";
		
		mysql_query($sql);
	
		header('location:nivelAdm.php');
		
		//echo($sql);
	
	}else if($_POST['btnSalvarNivel']=='Alterar'){
		
		$sql="update tblNivel set nivel='".$new_nivel."' where idNivel =".$_SESSION['codigo'];                         
		
		mysql_query($sql);
	
		header('location:nivelAdm.php');
        
		//echo($sql);
		
	}
	
}

/************************* MODOS *************************/

if(isset($_GET['modo'])){

	if($_GET['modo']=='excluirNivel'){

		$idNivel = $_GET['codigo'];
		$sql="delete from tblNivel where idNivel=".$idNivel;
		
		mysql_query($sql); 
		
		header('location:nivelAdm.php');
		
		//echo($sql);
		
	}else if($_GET['modo']=='editarNivel'){
		
		$idNivel = $_GET['codigo'];
		$_SESSION['codigo']=$idNivel;
		$sql = "select * from tblNivel where idNivel=".$idNivel;
		
		$select = mysql_query($sql);
	
		if($rsconsulta=mysql_fetch_array($select)){
			$new_nivel=$rsconsulta['nivel'];

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
				<!-- ========================================= Cadastro do nível ========================================= -->
				<div id="conteudoNiveis">
					<div id="cadastro_nivel">        	
						<form name="frmusuarios" method="post" action="nivelAdm.php">
							<table id="tbllogin_nivel">
							  <tr>
								<td colspan="2" class="titulo_tabela">Cadastro de Nível</td>
							  </tr>
							  <tr>
								<td class="tbllogin_td">Nível:</td>
								<td><input class="caixadetexto" required pattern="[a-z A-Z ã Ã õ Õ ç Ç á Á é É í Í ó Ó ú Ú]*" placeholder="Digite o nível" name="txtNivel" type="text" value="<?php echo($new_nivel); ?>" /></td>
							  </tr>
							  <tr>
								<td>
									<input class="botao" name="btnSalvarNivel" type="submit" value="<?php echo($botao);?>"  />
								</td>
							  </tr>
							</table>
						</form>
					</div>
					<!-- ========================================= Consulta de nível ========================================= -->
					
					<div id = "consulta_nivel">
						<table id="tblconsulta_nivel">
							<tr> 
								<td colspan="2" class="titulo_tabela_consulta">Níveis</td>
							 </tr>
							<tr>
								<td class="tblconsulta_td">Nível</td>
								<td class="tblconsulta_td">Configurações</td>
							</tr>
							<?php
								
								$sql = "select * from tblNivel";

								$select = mysql_query($sql);
								
								while($rsconsulta = mysql_fetch_array($select)){
									
							?>
							<tr class="tblconsulta_tr">
								<td rowspan="1"><?php echo($rsconsulta['nivel']); ?></td>
								
								<!-- ------------ Configurações  ------------ -->
								<td rowspan="1">
									<a href="nivelAdm.php?modo=editarNivel&codigo=<?php echo($rsconsulta['idNivel']);?>"> 
										<img class="iconesAdm" src="icones/Modify16.png"> 
									</a>
									<a href = "nivelAdm.php?modo=excluirNivel&codigo=<?php echo($rsconsulta['idNivel']);?>">
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