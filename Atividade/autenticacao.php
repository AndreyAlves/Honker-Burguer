<?php 

if(isset($_POST['txtUsuario']) && isset($_POST['txtSenha'])){
	$login = $_POST['txtUsuario'];
	$senha = $_POST['txtSenha'];
	
	$sql = "select * from tblLogin where login = '$login'and senha = '$senha'";
	
	$select = mysql_query($sql);

	if($rsconsulta = mysql_fetch_array($select)){
		
		$_SESSION['nome'] = $rsconsulta['nome'];
		$_SESSION['idNivel'] = $rsconsulta['idNivel'];

		header('location:CMS/cms.php');
        
	}else {
		
?>
		<script>
			alert("USUÁRIO OU SENHA INVÁLIDOS!");
		</script>
			
<?php
		}
		
	}
	

?>

<!-- ========================================= Autenticação ========================================= -->

<form name="frmprojeto" method="post" action="index.php">
	<div id="autenticacao">
		<div id="itensautenticacao">
			<div id="textlogin" >
				Login - Apenas Gerenciadores
			</div>
			<div>
				<input class="input" placeholder="Usuário" value="<?php echo($login); ?>" name="txtUsuario" type="text">
			</div>
			<div>
				<input class="input" placeholder="Senha" value="<?php echo($senha); ?>" name="txtSenha" type="password">
			</div>
			<div id="btnlogar">
				<input id="botaologar" name="btnLogar" value="Entrar" type="submit"/>
			</div>
		</div>
	</div>
</form>