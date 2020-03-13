<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>

<header id="posts_header">
    <h1>Billet simple pour l'Alaska</h1>
    <p>Les derniers chapitres</p>
</header>

<?php
while ($data = $posts->fetch())
{
?>
<div id="articles_blog" class="container bg-white">
    <div class="row">
        <div id="news" class="col-lg-8">
            <h3>
                <?= $data['title'] ?>
                <em>publié le <?= $data['creation_date'] ?></em>
            </h3>
            
            <p>
                <?= $data['post'] ?>
                <? echo substr($data['post'], 0, 50).'...'; ?>
            </p>
                <br />
                <a href="index.php?action=post&id=<?= $data['id'] ?>" class="btn btn-primary" role="button">Lire la suite</a>
        </div>
    </div>
</div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>