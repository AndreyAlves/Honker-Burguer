<?php

$nome="";
$login="";
$senha="";
$botao="Salvar";

$new_nivel="";


require_once('moduloAdm.php');
	
	
if(isset($_POST['btnSalvar'])){
	
	$nome=$_POST['txtNome'];
	$login=$_POST['txtLogin'];
	$senha=$_POST['txtSenha'];
	$nivel=$_POST['optnivel'];
	
	if($_POST['btnSalvar'] == 'Salvar'){
	
		$sql="insert into tblLogin (nome, login, senha, idNivel) values('".$nome."','".$login."','".$senha."','".$nivel."')";
		
		mysql_query($sql);
	
		header('location:admusuario.php');
		
		//echo($sql);
	
	}elseif($_POST['btnSalvar']=='Alterar'){
		
		$sql="update tblLogin set nome='".$nome."',login='".$login."',senha='".$senha."', idNivel='".$nivel."' where idUsuario =".$_SESSION['codigo'];                         
		/*$sql="update tblNivel set idNivel='".$idNivel."' where idUsuario =".$_SESSION['codigo'];*/
		
		mysql_query($sql);
	
		header('location:admusuario.php');
        
		//echo($sql);
		
	}
	
}

/************************* MODOS *************************/

if(isset($_GET['modo'])){

	if($_GET['modo']=='excluir'){

		$idUsuario = $_GET['codigo'];
		$sql="delete from tblLogin where idUsuario=".$idUsuario;
		
		mysql_query($sql); 
		
		header('location:admusuario.php');
		
		//echo($sql);
		
	}else if($_GET['modo']=='editar'){
		
		$idUsuario = $_GET['codigo'];
		$_SESSION['codigo']=$idUsuario;
		$sql = "select * from tblLogin where idUsuario=".$idUsuario;
		
		$select = mysql_query($sql);
	
		if($rsconsulta=mysql_fetch_array($select)){
			$nome=$rsconsulta['nome'];
			$login=$rsconsulta['login'];
			$senha=$rsconsulta['senha'];
            $idNivel=$rsconsulta['idNivel'];
	
			$botao="Alterar";
		}
	
		//mysql_query($sql); 
			
		//header('location:admusuario.php');
        
        //echo($sql);
		
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
				<div id="conteudosectionadmusuario">
				<!-- ========================================= Cadastro ========================================= -->
				
					<div id="content">
						<div id="cadastro">        	
							<form name="frmusuarios" method="post" action="admusuario.php">
								<table id="tbllogin">
								  <tr>
									<td colspan="2" class="titulo_tabela">Cadastro de Usuário</td>
								  </tr>
								  <tr>
									<td class="tbllogin_td">Nome:</td>
									<td><input class="caixadetexto" value = "<?php echo($nome); ?>" required pattern="[a-z A-Z ã Ã õ Õ ç Ç á Á é É í Í ó Ó ú Ú]*" placeholder="Digite um Nome" name="txtNome" type="text" value="<?php echo($nome); ?>" /></td>
								  </tr>
								  <tr>
									<td class="tbllogin_td">Login:</td>
									<td><input class="caixadetexto" value = "<?php echo($login); ?>"  placeholder="Digite seu login" name="txtLogin" type="text" value="<?php echo($login); ?>" /></td>
								  </tr>
								  <tr>
									<td class="tbllogin_td">Senha:</td>
									<td><input class="caixadetexto" value = "<?php echo($senha); ?>" placeholder="Digite sua senha" name="txtSenha" type="password" value="<?php echo($senha); ?>" /></td>
								  </tr>
                                  <tr>
									<td class="tbllogin_td">Nível:</td>
									<td>
										<select class="caixadetexto" name="optnivel">
											<?php
											
												$sql = "select * from tblNivel";
												
												$select=mysql_query($sql);
								
												while($rsconsulta=mysql_fetch_array($select)){
											
											?>
												<option value="<?php echo($rsconsulta['idNivel']); ?>"> 
													<?php
														
														echo($rsconsulta['nivel']);
													
													?>
												</option>
											
											<?php
											
												}
											
											?>
										</select>
									</td>
								  </tr>
								  <tr>
									<td><input class="botao" name="btnSalvar" type="submit" value="<?php echo($botao);?>"  /></td>
								  </tr>
								</table>
							</form>
						</div>
					</div>
					<!-- ========================================= Consulta ========================================= -->
					
					<div id = "consulta_usuarios">
						<table id="tblconsulta_usuarios">
							<tr> 
								<td colspan="8" class="titulo_tabela_consulta">Usuários</td>
							 </tr>
							<tr>
								<td class="tblconsulta_td">Nome</td>	
								<td class="tblconsulta_td">Login</td>
								<td class="tblconsulta_td">Senha</td>
								<td class="tblconsulta_td">Nível</td>
								<td class="tblconsulta_td">Configurações</td>
							</tr>
							<?php
								
								$sql = "select * from vw_consulta_usuarios";

								$select = mysql_query($sql);
								
								while($rsconsulta = mysql_fetch_array($select)){
									
							?>
							<tr class="tblconsulta_tr">
								<td><?php echo($rsconsulta['nome']); ?></td>
								<td rowspan="1"><?php echo($rsconsulta['login']); ?></td>
								<td rowspan="1"><?php echo($rsconsulta['senha']); ?></td>
								<td rowspan="1"><?php echo($rsconsulta['nivel']); ?></td>
								
								<!-- ------------ Configurações  ------------ -->
								<td rowspan="1">
									<a href="admusuario.php?modo=editar&codigo=<?php echo($rsconsulta['idUsuario']);?>"> 
										<img class="iconesAdm" src="icones/Modify16.png"> 
									</a>
									<a href = "admusuario.php?modo=excluir&codigo=<?php echo($rsconsulta['idUsuario']);?>">
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