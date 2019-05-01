<?php
	include "template/header.php";
?>

	<div class="card-panel" style=" background-image: url('imgs/img02.png'); 
									background-repeat: no-repeat !important;
									background-position: left;">		
		<h4 class="center-align">Login</h4>

		<form id="formlogin" method="POST" action="/animecon/controller/UsuarioController.php?acao=autenticar">
			<div class="row">
				<div class="input-field col s6" style="float: right;">
					<input type="email" id="email" name="email" required>
					<label for="email">E-mail:</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s6" style="float: right;">
					<input type="password" id="password" name="senha" required>
					<label for="password">Senha:</label>
				</div>
			</div>
			<div class="row">
				<div>
				<button class="btn waves-effect waves-light botao-cor" type="submit" style="float: right;">Entrar</button>
				</div>
			</div>	
		</form>
		
	</div>

<?php
	include "template/footer.php";
?>