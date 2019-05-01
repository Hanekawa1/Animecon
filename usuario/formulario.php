<?php
	
	#require_once $_SERVER["DOCUMENT_ROOT"] . "/animecon/model/UsuarioModel.php";

	$acao 	= "create";

?>

<div class="card-panel" id="div-card-panel" style="
												background-image: url('../imgs/img01.png'); 
												background-repeat: no-repeat !important;
												background-position: right;">

	<!-- conteudo do formulario -->
	<h4>Cadastro de Usuários</h4>
	<div class="row">
	<div class="col-sm-s10" >

		<form method="post" id="formusuario" method="POST" action="/animecon/controller/UsuarioController.php?acao=<?=$acao?>">	
				<div class="row" style="display: none;">
					<div class="input-field col s1">
						<input id="codigo" type="text" name="codigo" readonly>
						<label for="codigo">Código</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s6">
						<input id="nomeUsuario" type="text" name="nomeUsuario" required >
						<label for="nomeUsuario">Nome:</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s6">
						<input id="apelido" type="text" name="apelido" required >
						<label for="apelido">Apelido (nickname):</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s6">
						<input id="password" type="password" name="senha" required >
						<label for="password">Senha:</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s6">
						<input id="email" type="email" name="email" required >
						<label for="email">E-mail:</label>
					</div>
				</div>
				
				<button class="btn waves-effect waves-light" type="submit">
					Salvar
				</button>
			<div id="mensagem"></div>
		</form>
	</div>
	</div>
</div>
	<script type="text/javascript">
		
		$("#formusuario").on("submit", function(event){
			event.preventDefault();

			$.ajax({
				url: $("#formusuario").attr("action"),
				method: $("#formusuario").attr("method"),
				data: $("#formusuario").serialize(),
				success: function(data){
					$("#mensagem").html(data);
				}
			})
		});


	</script>
	
<?php
	include "../template/footer.php";
?>