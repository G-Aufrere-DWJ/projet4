<?php ob_start(); ?>

<?php
while ($data = $posts->fetch())
{
?>

<div class="container">
    <div id="gestion_articles">
        <div id="titre_gestion_article" class="text-white text-center">
            <?= ($data['title']) ?>
        </div>
            <form action="index.php?action=modifyPost&id=<?= ($data['id'])?>" method="post" id="tiny_form" class="col-10 offset-1">
                <div class="form-group">
                    <label for="title" class="text-white">Titre</label><br />
                    <input type="text" id="title" name="title" value="<?= ($data['title']) ?>" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="post" class="text-white">Article</label><br />
                    <textarea id="post" name="post" class="form-control"><?= ($data['post']) ?></textarea>
                </div>
                <div class="row">
                    <div class="form-group col text-center">
                        <button type="submit" class="btn btn-success">Modifier</button>
                    </div>
                    <div class="form-group col text-center">
                        <a href="index.php?action=deletePost&id=<?= ($data['id'])?>" class="btn btn-danger">Supprimer l'article</a>
                    </div>
                </div>
            </form>
            <hr class="limite_admin">
    </div>
</div>


<?php
}
?>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>