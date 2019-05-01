<?php
	require_once $_SERVER["DOCUMENT_ROOT"] . "/animecon/config/BD.php";


	class UsuarioModel{

		private $bd;

		 function __construct(){

		 	$this->bd = BancoDados::obterConexao();

		 }

		 public function inserir($nomeUsuario, $apelido, $email, $senha){

		 	$insercao = $this->bd->prepare(

                 "INSERT INTO usuarios(nomeUsuario, apelido, email, senha) 
                 VALUES (:nomeUsuario, :apelido, :email, :senha)"

                 );

		 	$senhaCriptografada = sha1($senha);
            $insercao->bindParam(":nomeUsuario", $nomeUsuario);
            $insercao->bindParam(":apelido", $apelido);
		 	$insercao->bindParam(":email", $email);
		 	$insercao->bindParam(":senha", $senhaCriptografada);
		 	$insercao->execute();

		 }

		 public function atualizar($nomeUsuario, $apelido, $email, $senha, $idUsuario){
		 	$atualiza = $this->bd->prepare(

                 "UPDATE usuarios set nomeUsuario = :nomeUsuario, apelido = :apelido, email = :email, senha = :senha 
                 where idUsuario = :idUsuario"
                
                );
		 	$senhaCriptografada = sha1($senha);
            $atualiza->bindParam(":nomeUsuario", $nomeUsuario);
            $atualiza->bindParam(":apelido", $apelido);
		 	$atualiza->bindParam(":email", $email);
		 	$atualiza->bindParam(":senha", $senhaCriptografada);
		 	$atualiza->bindParam(":idUsuario", $idUsuario);
		 	$atualiza->execute();
		 }

		 public function excluir($idUsuario){
		 	$excluir = $this->bd->prepare(

                 "DELETE from usuarios where idUsuario = :idUsuario"

                );
		 	$excluir->bindParam(":idUsuario", $idUsuario);
		 	$excluir->execute();
		 }

		 public function listarTodos(){
		 	$listar = $this->bd->query(

                "SELECT * from usuarios"
            
            );
		 	$res = $listar->fetchAll(PDO::FETCH_ASSOC);
		 	return $res;
		 }

		 public function listarPorId($idUsuario){
		 	$listarUm = $this->bd->prepare(

                "SELECT * from usuario where idUsuario = :idUsuario"
            
            );
		 	$listarUm->bindParam(":idUsuario", $idUsuario);
		 	$listarUm->execute();

		 	$res = $listarUm->fetch();
		 	return $res;
		 }

		 public function autenticacao($email, $senha){

		 	$login = $this->bd->prepare("SELECT * FROM usuarios where email = :email and senha = :senha");
		 	$login->bindParam(":senha", $senha);
		 	$login->bindParam(":email", $email);

		 	$login->execute();
		 	$res = $login->fetch();

		 	return $res;

		 }
	}
?>