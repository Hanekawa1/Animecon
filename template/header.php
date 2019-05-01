<?php
    
    session_start();

    if(isset($_GET['acao']) && $_GET['acao'] == 'logout'){

      session_destroy();

      header("Location: /animecon/login.php");

    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Animecon!</title>

  <!-- CSS  -->
  <link href="/animecon/css/meucss.css" type="text/css" rel="stylesheet">
  <link href="/animecon/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="/animecon/css/fonts.css" rel="stylesheet">
  <link href="/animecon/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  
  

  <!--  Scripts-->
  <script src="/animecon/js/jquery-3.2.1.min.js"></script>
  <script src="/animecon/js/materialize.js"></script>
  <script src="/animecon/js/init.js"></script>



</head>
<body style="background-image: url('/animecon/imgs/01.jpg'); background-repeat: no-repeat; background-attachment: fixed;">
  <nav class="menu-cor light pink accent-3" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="navbar-left"><img src="imgs/logot.png" class="img-responsive" style="width: 20%;
  padding-top: 10px;"></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="/animecon/index.php">Home</a></li>
        <li><a href="/animecon/animes.php">Animes</a></li>
        <li><a href="/animecon/usuario/index.php">Cadastre-se</a></li>
        <li><a href="/animecon/sobre.php">Sobre</a></li>
        <li><a href="/animecon/login.php">Login</a></li>
        
        <?php if(isset($_SESSION["nomeUsuario"])): ?>
          <li>Olá <?php echo $_SESSION["nomeUsuario"] ?></li>
          <li><a href="?acao=logout">Logout (sair)</a></li>
        <?php endif; ?>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="/animecon/index.php">Home</a></li>
        <li><a href="/animecon/animes.php">Animes</a></li>
        <li><a href="/animecon/usuario/index.php">Cadastre-se</a></li>     
        <li><a href="/animecon/login.php">Login</a></li>
        <li><a href="/animecon/sobre.php">Sobre</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div style=""><img src="/animecon/imgs/gif.gif" style="position: fixed; right: 0; width: 15%; bottom: 0;"></div>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
     