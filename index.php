<?php include 'template/header.php'; ?>


<div class="titulo">
    <h2>Seja bem-vindo ao Animecon!, seu site de animes favorito.</h2>
</div>

<script>
    $(document).ready(function(){
        $('.carousel').carousel();
    
        setInterval(function(){
        $('.carousel').carousel('next');
        }, 5000);
    });
</script>
<style> .carousel{ height: 500px !important; }</style>

<div class="carousel carousel-slider" data-indicators="true">
    <a href="#one!" class="carousel-item"><img src="./imgs/car01.jpg" alt="Primeira Imagem"></a>
    <a href="#two!" class="carousel-item"><img src="./imgs/car02.jpg" alt="Segunda Imagem"></a>
    <a href="#three!" class="carousel-item"><img src="./imgs/car03.png" alt="Terceira Imagem"></a>
    <a href="#four!" class="carousel-item"><img src="./imgs/car04.jpg" alt="Quarta Imagem"></a>
    <a href="#five!" class="carousel-item"><img src="./imgs/car05.png" alt="Quinta Imagem"></a>
    <a href="#six!" class="carousel-item"><img src="./imgs/car06.jpg" alt="Sexta Imagem"></a>
    <a href="#seven!" class="carousel-item"><img src="./imgs/car07.jpg" alt="Sétima Imagem"></a>

</div>


<div class="card-panel">
    <div class="row">
        <div class="col s5"><img src="imgs/02.jpg" alt="" style="float: left; width: 90%;"></div>
        <div class="col s7" style="float: right;">
            <h4>Um mundo à sua espera</h4>
            <p style="font-size: 1.2em;">Curte animes? Mangás? Então esse é o seu lugar! Aqui você tem acesso a lista completa de animes existentes!</p>
            <div class="col s6" style="padding-top: 30px;">
                <a href="animes.php"><button class="btn waves-effect waves-light">Checar Lista!</button></a>
            </div>
            <div class="col s6">
                <img src="imgs/04alt.png" alt="" style="width: 90%;">
            </div>
        </div>
    </div>

</div>

<div class="card-panel">
    <div class="row">
        
        <div class="col s6" style="float: left;">
            <h4>Quer ajudar?</h4>
            <p style="font-size: 1.2em;">Cadastre-se já no site e nos ajude a manter a lista de animes sempre atualizada e em dia para que outras 
                pessoas possam acessar e ter a melhor experiência nesse mundo incrível!</p>
            <a href="usuario/index.php"><button class="btn waves-effect waves-light">Cadastrar!</button></a>
        </div>
        <div class="col s6"><img src="imgs/03.jpg" alt="" style="width: 70%; float: right;"></div>
    </div>

</div>

<?php
	include "template/footer.php";
?>