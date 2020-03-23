<?php ob_start(); ?>

<?php
    while ($data = $posts->fetch())
{
?>

<div id="container_articles" class="container col-4">
    <div class="row">
        
            <div id="titre_article_seul" class="col text-white text-center">
                <?= ($data['title']) ?>
            </div>
            <form action="index.php?action=displayGestionArticle&id=<?= ($data['id'])?>" method="post" class="col text-center">
                <button class="btn btn-success" id="btn_gestion_article">Modifier l'article</button>
            </form>
            <div id="btn_suppress_post">
                <a href="index.php?action=deletePost&id=<?= ($data['id'])?>" class="btn btn-danger">Supprimer l'article</a>
            </div>
    </div>
</div>

<?php
}
?>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>