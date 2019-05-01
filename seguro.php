<?php
	 include "template/header.php";
	 require_once $_SERVER["DOCUMENT_ROOT"] . "/animecon/model/AnimeModel.php";
	 $Anime = new AnimeModel();
	 $res = $Anime->listaTodos();

 	if(!isset($_SESSION["sessIdTime"])){

 		$_SESSION["sessIdTime"] = time();

 	}elseif(time() - $_SESSION["sessIdTime"] > 15){

 		$_SESSION = [];
 		session_destroy();

 	}else{
 		$_SESSION["sessIdTime"] = time();
 	}


 	if(!isset($_SESSION["logado"])){
 		header("Location: login.php");
 		exit();
 	}
?>
<h2 class="titulo">Área administrativa</h2>
<h4 class="titulo">Seja bem-vindo!</h4>

<!-- Cadastrar Anime -->
<div class="card-panel">
	<h4 class="center-align">Cadastrar um novo Anime</h4>
	<div class="row">
	<div class="col s6">
	<form id="formcreate" method="POST" action="/animecon/controller/AnimeController.php?acao=create">
		<div class="row">
			<div class="input-field col s12">
				<input type="text" id="nomeAnime" name="nomeAnime" required>
				<label for="nomeAnime">Nome:</label>
			</div>
		</div>

		<div class="row">
			<div class="input-field col s12">
				<input type="text" id="descricaoAnime" name="descricaoAnime" required>
				<label for="descricaoAnime">Descrição:</label>
			</div>
		</div>

		<div class="row">
			<div class="input-field col s12">
				<input type="text" id="generoAnime" name="generoAnime" required>
				<label for="generoAnime">Gêneros (Separar por ','):</label>
			</div>
		</div>
        <div class="row">
			<div class="input-field col s12">
				<input type="number" step="0.01" id="notaMedia" name="notaMedia" required>
				<label for="notaMedia">Nota Média:</label>
			</div>
		</div>

		<button class="btn waves-effect waves-light" type="submit">Cadastrar Anime</button>
	</div>
	 	<div class="col s6" > <img style="float: right; width: 80%;"src="imgs/07.jpg" alt=""> </div>
	</div>
	</form>
</div>
<div id="mensagem"></div>

<!-- Deletar Anime -->
<div class="card-panel">
	<h4 class="center-align">Deletar um Anime</h4>
	<div class="row">
	<div class="col s6">
	<form id="formdelete" method="POST" action="/animecon/controller/AnimeController.php?acao=delete">
		<div class="row">
			<div class="input-field col s3">
				<input type="text" id="idAnime" name="idAnime" required>
				<label for="idAnime">Id Anime:</label>
			</div>
		</div>

		<button class="btn waves-effect waves-light" type="submit">Deletar Anime</button>
	</div>
		<div class="col s6" > <img style="float: right; width: 50%;"src="imgs/06.png" alt=""> </div>
	</div>
	</form>
</div>
<div id="mensagem1"></div>
<!-- Atualizar Animes -->
<div class="card-panel">
	<h4 class="center-align">Atualizar um Anime</h4>
	<div class="row">
	<div class="col s6">
	<form id="formupdate" method="POST" action="/animecon/controller/AnimeController.php?acao=update">
	
	<div class="row">
			<div class="input-field col s3">
				<input type="text" id="idAnime" name="idAnime" required>
				<label for="idAnime">Id Anime:</label>
			</div>
		</div>

		<div class="row">
			<div class="input-field col s12">
				<input type="text" id="nomeAnime" name="nomeAnime" required>
				<label for="nomeAnime">Nome:</label>
			</div>
		</div>

		<div class="row">
			<div class="input-field col s12">
				<input type="text" id="descricaoAnime" name="descricaoAnime" required>
				<label for="descricaoAnime">Descrição:</label>
			</div>
		</div>

		<div class="row">
			<div class="input-field col s12">
				<input type="text" id="generoAnime" name="generoAnime" required>
				<label for="generoAnime">Gêneros (Separar por ','):</label>
			</div>
		</div>	

        <div class="row">
			<div class="input-field col s12">
				<input type="number" step="0.01" id="notaMedia" name="notaMedia" required>
				<label for="notaMedia">Nota Média:</label>
			</div>
		</div>

		<button class="btn waves-effect waves-light" type="submit">Atualizar Anime</button>
	</div>
	<div class="col s6" > <img style="float: right; width: 90%;"src="imgs/05.png" alt=""> </div>
	</div>
	</form>
</div>
<div id="mensagem2"></div>
<!-- Lista Animes -->
<div class="card-panel" id="listaAnimes"  action="/animecon/controller/AnimeController.php?acao=read">
	<h4 class="center-align">Lista de Animes</h4>
	<table class="highlight">

	<thead>
	<tr>
		<th style="padding-right: 30px;">#</th>
        <th style="padding-right: 30px;">Nome do Anime</th>
        <th>Descrição</th> 
        <th>Gêneros</th>  
        <th>Nota Média</th>  
	</tr>
	</thead>
	<tbody id="tabela">
	<?php foreach($res as $dado){ ?>
		<td> <?php echo $dado['idAnime']; ?> </td>
		<td> <?php echo $dado['nomeAnime']; ?> </td>
		<td> <?php echo $dado['descricaoAnime']; ?> </td>
		<td> <?php echo $dado['generoAnime']; ?> </td>
        <td> <?php echo $dado['notaMedia']; ?> </td>
	</tbody>
	<?php }?>
	</table>
	

</div>



<script type="text/javascript">
		
		$("#formcreate").on("submit", function(event){
			event.preventDefault();

			$.ajax({
				url: $("#formcreate").attr("action"),
				method: $("#formcreate").attr("method"),
				data: $("#formcreate").serialize(),
				success: function(data){
					$("#mensagem").html(data);
				}
			})
		});

		$("#formdelete").on("submit", function(event){
			event.preventDefault();

			$.ajax({
				url: $("#formdelete").attr("action"),
				method: $("#formdelete").attr("method"),
				data: $("#formdelete").serialize(),
				success: function(data){
					$("#mensagem1").html(data);
				}
			})
		});

		$("#formupdate").on("submit", function(event){
			event.preventDefault();

			$.ajax({
				url: $("#formupdate").attr("action"),
				method: $("#formupdate").attr("method"),
				data: $("#formupdate").serialize(),
				success: function(data){
					$("#mensagem2").html(data);
				}
			})
		});

</script>
<?php
 	include "template/footer.php";
?>