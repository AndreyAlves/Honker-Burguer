<?php 

$nome="";
$telefone="";
$celular="";
$email="";
$sexo="";
$profissao="";
$obs="";
$botao="Salvar";

require_once('modulo.php');

if(isset($_POST['btnsalvar'])){
	
	$nome=$_POST['txtnome'];
	$telefone=$_POST['txttelefone'];
	$celular=$_POST['txtcelular'];
	$email=$_POST['txtemail'];
	$sexo=$_POST['rdosexo'];
		
	$profissao=$_POST['txtprofissao'];
	$obs=$_POST['txtobs'];
	
	$sql="insert into tblcadastro (nome, telefone, celular, email, sexo, profissao, obs)";
	$sql= $sql."values('".$nome."','".$telefone."','".$celular."','".$email."','".$sexo."','".$profissao."','".$obs."');";
	mysql_query($sql);
	header('location:faleconosco.php');
	
}
	
	
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>
			HONKER BURGUER - Fale Conosco
		</title>
		<meta charset="utf-8">
		<link rel="shortcut icon" href="Imagens/logoprincipal.jpg" />
		<link rel="stylesheet" type="text/css" href="CSS/style.css">
		<link rel="javascript" type="text/javascript" href="script.js">
	</head>
	<body>
		<div id="principal">
			<!-- ========================================= Cabeçalho ========================================= -->
			<header>
				<div id="caixaoculta">
					<div id="conteudoheader">
						<div id="logo">
							<ul id="linksl">
								<li>
									<a href="home.php" title="HONKER BURGUER" style="text-decoration:none"> <img id="logoimg" src="Imagens/logoprincipal.jpg" alt=""/> </a>	
								</li>
							</ul>
						</div>
						<!-- ========================================= Menu Principal ========================================= -->
						<div>
							<nav id="menuprincipal">
								<ul id="links">
									<li>
										<a href="banda.php" title="Banda"> Banda </a>
									</li>
									<li>
										<a href="sobre.php" title="Sobre"> Sobre </a>
									</li>
									<li>
										<a href="promocoes.php" title="Promoções"> Promoções </a>
									</li>
									<li>
										<a href="ambientes.php" title="Nossos Ambientes"> Nossos Ambientes </a>
									</li>
									<li>
										<a href="lanchedomes.php" title="Lanche do mês"> Lanche do mês </a>
									</li>
									<li>
										<a href="faleconosco.php" title="Fale Conosco"> Fale Conosco </a>
									</li>
								</ul>
							</nav>
						</div>
						<!-- ========================================= Autenticação ========================================= -->
						<!-- <form name="frmprojeto" method="post" action="home.php">
							<div id="autenticacao">
								<div id="itensautenticacao">
									<div class="usuariosenha" >
										Usuário:
									</div>
									<div>
										<input class="input" value="<?php echo($login); ?>" name="txtUsuario" type="text">
									</div>
									<div class="usuariosenha">
										Senha:
									</div>
									<div>
										<input class="input" value="<?php echo($senha); ?>" name="txtSenha" type="text">
									</div>
									<div id="btnlogar">
										<input name="btnLogar" value="<?php echo($logar); ?>" type="submit"/>
									</div>
								</div>
							</div>
						</form> -->
					</div>
				</div>
			</header>
			<!-- ========================================= Conteúdo ========================================= -->
			<section>
				<!-- ========================================= Redes Sociais ========================================= -->
			
				<div id="redessociais">
					<div id="facebook">
						<a href="" title="Visite nossa Página"> <img id="logoF" src="Imagens/logoF.png" alt=""> </a>
					</div>
					<div id="twitter">
						<a href="" title="Nosso Twitter"> <img id="logoT" src="Imagens/logoT.png" alt=""> </a>
					</div>
					<div id="instagram">
						<a href="" title="Nosso Instagram"> <img id="logoI" src="Imagens/logoI.png" alt=""> </a>
					</div>
				</div>
				<!-- ========================================= Caixa de cadastro ========================================= -->
				
				<div id="content">
					<div id="titulocadastro">
						<p>
							CRIE UM CADASTRO
						</p>
					</div>
					<div id="cadastro">        	
						<form name="frmcontatos" method="POST" action="faleconosco.php">
							<table id="tblcadastro">
							  <tr>
								<td colspan="2" class="titulo_tabela">Cadastro de Contatos</td>
							  </tr>
							  <tr>
								<td class="tblcadastro_td">Nome:</td>
								<td><input class="caixadetexto" value = "<?php echo($nome); ?>" required pattern="[a-z A-Z ã Ã õ Õ ç Ç á Á é É í Í ó Ó ú Ú]*" placeholder="Digite um Nome" name="txtnome" type="text" value="" /></td>
							  </tr>
							  <tr>
								<td class="tblcadastro_td">Telefone:</td>
								<td><input class="caixadetexto" value = "<?php echo($telefone); ?>" pattern="[0-9]{3} [0-9]{4}-[0-9]{4}" placeholder="011 4002-8922" name="txttelefone" type="text" value="" /></td>
							  </tr>
							  <tr>
								<td class="tblcadastro_td">Celular:</td>
								<td><input class="caixadetexto" value = "<?php echo($celular); ?>" placeholder="Digite um número celular" name="txtcelular" type="text" value="" /></td>
							  </tr>
							  <tr>
								<td class="tblcadastro_td">Email:</td>
								<td><input class="caixadetexto" value = "<?php echo($email); ?>" placeholder="cadastro@email.com" name="txtemail" type="email" value="" /></td>
							  </tr>
							  <tr>
								<td class="tblcadastro_td">Profissão:</td>
								<td><input class="caixadetexto" name="txtprofissao" cols="20" placeholder="Digite sua profissão atual" rows="5"><?php echo($obs); ?> </input></td>
							  </tr>
							  <tr>
								<td class="tblcadastro_td">Sexo:</td>
								<td id="tbl_sexo">
								<input checked class="selecaodesexo" type="radio" name="rdosexo" value="F"  />Feminino
								<input class="selecaodesexo" type="radio" name="rdosexo" value="M"  />Masculino
								</td>
							  </tr>
							  <tr>
								<td class="tblcadastro_td">Obs:</td>
								<td><textarea class="caixadetexto" name="txtobs" cols="20" rows="5"><?php echo($obs); ?></textarea></td>
							  </tr>
							  <tr>
							  <tr>
								<td><input class="botao" name="btnsalvar" type="submit" value="Salvar" <?php echo($botao);?> /></td>
								<td><input class="botao2" name="btnlimpar" type="reset" value="Limpar" /></td>
							  </tr>
							</table>
						</form>
					</div>
				</div>   
				<!-- <div id="sliderlanchedomes">
					<img class="slides" src="Imagens/slider1.jpg">
					<img class="slides" src="Imagens/slider2.jpg">
					<button class = "button" onClick = "plusIndex(-1)" id = "btn1">&#10094;</button>
					<button class = "button" onClick = "plusIndex(1)" id = "btn2">&#10095;</button>
				</div>-->
			</section>
			<!-- ========================================= Rodapé ========================================= -->
			
			<footer>
				<p class="p">
					Honker Burguer©2017. Todos os Direitos Reservados.
				</p>
				<p class="p">
					Endereço: Av.Bluffington - n°666 - SP
				</p>
				<p class="p">
					CEP:0767-410
				</p>
			</footer>
		</div>
		<!-- ========================================= Script Validação ========================================= -->
		
		<script type="text/javascript">
		function validar(caracter,typeblock){
			//Validação para o IE
			if(window.event){
				var letra=caracter.keyCode;
			//Validação para o chrome/firefox
			}else if(caracter.which){
					var letra=caracter.which;
			}
			if(typeblock=='n'){
				if(letra>=48 && letra<=57){
					return false;
				}
			}else if(typeblock=='c'){
				if(letra<48 || letra>57){
					if(letra !=8 && letra !=127){//Libera que o usuario dê backspace e delete
						if(letra !=32){//Libera que o usuario dê espaço 
							return false;
						}
					}
				}
			}
			
		}
	</script>
	</body>
	
</html>



