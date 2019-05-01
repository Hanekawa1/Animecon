<?php
	include "template/header.php";
	require_once $_SERVER["DOCUMENT_ROOT"] . "/animecon/model/AnimeModel.php";
  $Anime = new AnimeModel();
  $res = $Anime->listaTodos();
?>


<ul class="collection">
  <?php foreach($res as $dado){ ?>
    <li class="collection-item avatar">
      <img src="" alt="" class="circle">
	  <span class="title"><?php echo $dado['nomeAnime'] ?></span>
	  <p>Gêneros: <?php echo $dado['generoAnime'] ?></p>
      <p>Descrição: <?php echo $dado['descricaoAnime'] ?><br>Nota: <?php echo $dado['notaMedia']?><br></p>	 
      <a href="seguro.php" class="btn-floating btn-large waves-effect waves-light pink accent-3 secondary-content"><i class="material-icons">add</i></a>
    </li>
    <?php } ?>
  </ul>


<?php
	include "template/footer.php";
?>