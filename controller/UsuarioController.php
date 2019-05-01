<?php
	
	require_once $_SERVER["DOCUMENT_ROOT"]	. "/animecon/model/UsuarioModel.php";


	$usuarioModel = new UsuarioModel();

	$acao = $_GET["acao"];


	if($acao == "create"){
        $nomeUsuario 	= $_POST["nomeUsuario"];
        $apelido = $_POST["apelido"];
		$email 	= $_POST["email"];
		$senha 	= $_POST["senha"];

		$usuarioModel->inserir($nomeUsuario, $apelido, $email, $senha);

		echo "<div class='card-panel teal lighten-2'>Usuário cadastrado com sucesso</div>";

	}
	if($acao == "update"){
        $id 	= $_POST["codigo"];
        $apelido = $_POST["apelido"];
		$nomeUsuario 	= $_POST["nomeUsuario"];
		$email 	= $_POST["email"];
		$senha 	= $_POST["senha"];
		$usuarioModel->atualizar($id, $nomeUsuario, $apelido, $email, $senha);
		echo "<div class='card-panel teal lighten-2'>Usuário atualizado com sucesso</div>";
	}

	if($acao == "delete"){

		$idUsuario = $_GET["id"];
		$usuarioModel->excluir($idUsuario);

        echo "<div class='card-panel teal lighten-2'>Usuário excluído com sucesso</div>";

	}

	if($acao == "autenticar"){
		$email 		= $_POST["email"];
		$senha 		= $_POST["senha"];
		$usuario 	= $usuarioModel->autenticacao($email, $senha);

		if($usuario == false){
			echo "<script>alert('Usuário ou senha inválidos'); location.href='/animecon/usuario/index.php';</script>";
		}else{

			session_start();
			$_SESSION["nomeUsuario"] = $usuario["nomeUsuario"];
			$_SESSION["idUsuario"] = $usuario["idUsuario"];

			$_SESSION["logado"] = true;
			$_SESSION["email"] = $_POST["email"];

			echo "<script>location.href='/animecon/seguro.php'</script>";

		}

	}
	



	



?>