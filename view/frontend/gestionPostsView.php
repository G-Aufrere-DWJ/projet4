<?php ob_start(); ?>

<?php
while ($data = $posts->fetch())
{
?>

<div id="gestion_articles">
    <?= ($data['title']) ?>
    <a href="index.php?action=deletePost&id=<?= ($data['id'])?>">Supprimer l'article</a>

        <form action="index.php?action=modifyPost&id=<?= ($data['id'])?>" method="post" id="tiny_form" class="col-6 offset-5">
            <div class="form-group">
                <label for="title">Titre</label><br />
                <input type="text" id="title" name="title" value="<?= ($data['title']) ?>" class="form-control" />
            </div>
            <div class="form-group">
                <label for="post">Article</label><br />
                <textarea id="post" name="post" class="form-control"><?= ($data['post']) ?></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
        </form>
</div>

<?php
}
?>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>