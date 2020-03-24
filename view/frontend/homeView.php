<?php ob_start(); ?>

<header id="header_home">
    <h2 class="text-uppercase text-center text-white">Bienvenue sur mon blog</h2>
    <hr class='una col-5' />
</header>

<div class="container col-12">
    <div id="paragraphe_presentation" class="text-center text-white col-lg-5 col-md-7">
        <p>Billet simple pour l'Alaska était un projet de longue date. Il me semblait judicieux de partager ma passion, mon travail avec vous, lecteurs afin d'avoir des retours de votre part directement en ligne et ainsi établir une vraie communauté autour de ce blog.</p>
    </div>
    <div id="img_home_book">
        <img src="public/img/book.svg" alt="image_livre">
    </div>
    <div id="btn_home" class="text-center col-12 mt-5">
        <a href="index.php?action=listPosts" class="btn btn-primary">Découvrir les articles</a>
    </div>
</div>



<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>