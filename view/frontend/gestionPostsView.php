<?php ob_start(); ?>

<?php
while ($data = $posts->fetch())
{
?>

<div id="gestion_articles">
    <?= htmlspecialchars($data['title']) ?>
    <a href="index.php?action=deletePost&id=<?= ($data['id'])?>">Supprimer l'article</a>
</div>

<?php
}
?>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>