<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Mon blog</h1>
<p>Derniers billets du blog :</p>


<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['creation_date'] ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($data['post'])) ?>
            <br />
            <em><a href="index.php?action=post&id=<?= $data['id'] ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>