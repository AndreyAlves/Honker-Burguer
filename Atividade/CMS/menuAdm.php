<?php 

	require_once('moduloAdm.php');
	
	if(isset($_POST['btnlogout'])){
		
		include('botaoLogout.php');
		
	}

?>

<!-- ========================================= Menu CMS ========================================= -->

<nav>
    <?php
	
		$nivel = $_SESSION['idNivel'];
        if($nivel == 1){
	
    ?>
	<div id="conteudonav">
		<!-- <ul> -->
			<div class="adm">
				<div class="imgadm">
					<a href="admconteudo.php" title="Admistração do Conteúdo"> <img class="iconesmenu" src="Imagens/iconeconteudo.png" alt="" /> </a>
				</div>
				<div class="textadm">
					<p>
						<a href="admconteudo.php" title="Admistração do Conteúdo"> Adm. Conteúdo </a>
					</p>
				</div>
			</div>
			<div class="adm">
				<div class="imgadm">
					<a href="admfaleconosco.php" title="Admistração do Fale Conosco"> <img class="iconesmenu" src="Imagens/iconefaleconosco.png" alt="" /> </a>
				</div>
				<div class="textadm">
					<p>
						<a href="admfaleconosco.php" title="Admistração do Fale Conosco"> Adm. Fale Conosco </a>
					</p>
				</div>
			</div>
			<div class="adm">
				<div class="imgadm">
					<a href="verificacaoPCS.php" title="Admistração dos Produtos"> <img class="iconesmenu" src="Imagens/iconeprodutos.png" alt="" /> </a>
				</div>
				<div class="textadm">
					<p>
						<a href="verificacaoPCS.php" title="Admistração dos Produtos"> Adm. Produtos </a>
					</p>
				</div>
			</div>
			<div class="adm">
				<div class="imgadm">
					<a href="verificacaoUN.php" title="Admistração do Usuário"> <img class="iconesmenu" src="Imagens/iconeusuario.png" alt="" /> </a>
				</div>
				<div class="textadm">
					<p>
						<a href="verificacaoUN.php" title="Admistração do Usuário"> Adm. Usuário </a>
					</p>
				</div>
			</div>
        
        <?php
            }else if($nivel == 2){
            
    ?>
	<div id="conteudonav">
		<!-- <ul> -->
			<div class="adm">
				<div class="imgadm">
					<a href="admconteudo.php" title="Admistração do Conteúdo"> <img class="iconesmenu" src="Imagens/iconeconteudo.png" alt="" /> </a>
				</div>
				<div class="textadm">
					<p>
						<a href="admconteudo.php" title="Admistração do Conteúdo"> Adm. Conteúdo </a>
					</p>
				</div>
			</div>
			<div class="adm">
				<div class="imgadm">
					<a href="#" title="Admistração do Fale Conosco"> <img class="iconesmenu2" src="Imagens/iconefaleconosco.png" alt="" /></a>
				</div>
				<div class="textadm2">
					<p>
						<a href="#" title="Admistração do Fale Conosco"> Adm. Fale Conosco </a>
					</p>
				</div>
			</div>
			<div class="adm">
				<div class="imgadm">
					<a href="verificacaoPCS.php" title="Admistração dos Produtos"> <img class="iconesmenu" src="Imagens/iconeprodutos.png" alt="" /> </a>
				</div>
				<div class="textadm">
					<p>
						<a href="verificacaoPCS.php" title="Admistração dos Produtos"> Adm. Produtos </a>
					</p>
				</div>
			</div>
			<div class="adm">
				<div class="imgadm">
					<a href="#" title="Admistração do Usuário"> <img class="iconesmenu2" src="Imagens/iconeusuario.png" alt="" /> </a>
				</div>
				<div class="textadm2">
					<p>
						<a href="#" title="Admistração do Usuário"> Adm. Usuário </a>
					</p>
				</div>
			</div>
        
        <?php
            }else if($nivel == 3){
            
    ?>
	<div id="conteudonav">
		<!-- <ul> -->
			<div class="adm">
				<div class="imgadm">
					<a href="admconteudo.php" title="Admistração do Conteúdo"> <img class="iconesmenu" src="Imagens/iconeconteudo.png" alt="" /> </a>
				</div>
				<div class="textadm">
					<p>
						<a href="admconteudo.php" title="Admistração do Conteúdo"> Adm. Conteúdo </a>
					</p>
				</div>
			</div>
			<div class="adm">
				<div class="imgadm">
					<a href="#" title="Admistração do Fale Conosco"> <img class="iconesmenu3" src="Imagens/iconefaleconosco.png" alt="" /> </a>
				</div>
				<div class="textadm3">
					<p>
						<a href="#" title="Admistração do Fale Conosco"> Adm. Fale Conosco </a>
					</p>
				</div>
			</div>
			<div class="adm">
				<div class="imgadm">
					<a href="#" title="Admistração dos Produtos"> <img class="iconesmenu3" src="Imagens/iconeprodutos.png" alt="" /> </a>
				</div>
				<div class="textadm3">
					<p>
						<a href="#" title="Admistração dos Produtos"> Adm. Produtos </a>
					</p>
				</div>
			</div>
			<div class="adm">
				<div class="imgadm">
					<a href="#" title="Admistração do Usuário"> <img class="iconesmenu3" src="Imagens/iconeusuario.png" alt="" /> </a>
				</div>
				<div class="textadm3">
					<p>
						<a href="#" title="Admistração do Usuário"> Adm. Usuário </a>
					</p>
				</div>
			</div>
        
        <?php
            }
        ?>
			<!-- ========================================= Área Bem Vindo ========================================= -->

			<div id="login">
				<div id="bemvindo">
					<p>
						Bem Vindo(a),
					</p>
				</div>
				<div id="nomeusuario">
					<!-- ========================================= Chamando o nome do Usuário ========================================= -->
					<p>
						<?php
							if(isset($_SESSION['nome'])){
								echo($_SESSION['nome']); 
							} else {
								echo("ERRO");
							}
						?>
					</p>
				</div>
				<div id="btnlogout">
				<form name="frmSair" method="post" action="menuAdm.php">
					<input id="botaologout" type="submit" name="btnlogout" value="Sair">
				</form>
				</div>
			</div>
	<!--</ul> -->
	</div>
</nav>