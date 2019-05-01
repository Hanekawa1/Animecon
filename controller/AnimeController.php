<?php
    require_once $_SERVER["DOCUMENT_ROOT"]	. "/animecon/model/AnimeModel.php";

    $animeModel = new AnimeModel();

    $acao = $_GET["acao"];

    if($acao == "create"){
        $nomeAnime = $_POST["nomeAnime"];
        $descricaoAnime = $_POST["descricaoAnime"];
        $generoAnime = $_POST["generoAnime"];
        $notaMedia = $_POST["notaMedia"];

        $animeModel->inserir($nomeAnime, $descricaoAnime, $generoAnime, $notaMedia);

        echo "<div class='card-panel teal lighten-2'>Anime cadastrado com sucesso</div>";
    }

    if($acao == "update"){
        $idAnime = $_POST["idAnime"];
        $nomeAnime = $_POST["nomeAnime"];
        $descricaoAnime = $_POST["descricaoAnime"];
        $generoAnime = $_POST["generoAnime"];
        $notaMedia = $_POST["notaMedia"]; 

        $animeModel->atualizar($idAnime, $nomeAnime, $descricaoAnime, $generoAnime, $notaMedia);

        echo "<div class='card-panel teal lighten-2'>Anime atualizado com sucesso</div>";
    }

    if($acao == "delete"){
        $idAnime = $_POST["idAnime"];

        $animeModel->excluir($idAnime);

        echo "<div class='card-panel teal lighten-2'>Anime deletado com sucesso</div>";
    }

?>