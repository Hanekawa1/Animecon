<?php
    require_once $_SERVER["DOCUMENT_ROOT"] . "/animecon/config/BD.php";

    class AnimeModel{
        private $bd;

		function __construct(){

		    $this->bd = BancoDados::obterConexao();

        }
        
        public function inserir($nomeAnime, $descricaoAnime, $generoAnime, $notaMedia){
            $insercao = $this->bd->prepare(

                "INSERT INTO animes(nomeAnime, descricaoAnime, generoAnime, notaMedia)
                values(:nomeAnime, :descricaoAnime, :generoAnime, :notaMedia)

                ");
            $insercao->bindParam(":nomeAnime", $nomeAnime);
            $insercao->bindParam(":descricaoAnime", $descricaoAnime);
            $insercao->bindParam(":generoAnime", $generoAnime);
            $insercao->bindParam(":notaMedia", $notaMedia);
            $insercao->execute();
        }

        public function atualizar($idAnime, $nomeAnime, $descricaoAnime, $generoAnime, $notaMedia){
            $atualiza = $this->bd->prepare(

                "UPDATE animes SET nomeAnime = :nomeAnime, descricaoAnime = :descricaoAnime, generoAnime = :generoAnime, 
                notaMedia = :notaMedia WHERE idAnime = :idAnime 
                
                ");
            $atualiza->bindParam(":idAnime", $idAnime);
            $atualiza->bindParam(":nomeAnime", $nomeAnime);
            $atualiza->bindParam(":descricaoAnime", $descricaoAnime);
            $atualiza->bindParam(":generoAnime", $generoAnime);
            $atualiza->bindParam(":notaMedia", $notaMedia);  
            $atualiza->execute();       
        }

        public function excluir($idAnime){
            $excluir = $this->bd->prepare(

                "DELETE FROM animes WHERE idAnime = :idAnime"

            );
            $excluir->bindParam(':idAnime', $idAnime);
            $excluir->execute();
        }

        public function listaTodos(){
            $listar = $this->bd->query(
                
                "SELECT * FROM animes ORDER BY nomeAnime"

            );
            $res = $listar->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }

        public function listarPorID($idAnime){
            $listarUm = $this->bd->prepare(

                "SELECT * from animes where idAnime = :idAnime"
            
            );
		 	$listarUm->bindParam(":idAnime", $idAnime);
		 	$listarUm->execute();

		 	$res = $listarUm->fetch();
		 	return $res;
        }
    }
?>