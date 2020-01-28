<?php $title = 'Supprimer un commentaire' ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p><a href="index.php">Retour au billet</a></p>



<h2>Supprimer un commentaire</h2>

<?php if (isset($_SESSION['id'])) { ?>
<form action="index.php?action=deleteComment&id=<?= $comment['id'] ?>" method="post">
    <div>
        <p>Auteur : <?= $comment['id_author'] ?></p>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"><?= $comment['comment'] ?></textarea>
    </div>
    <div>
        <input type="submit" value="Supprimer" />
    </div>
</form>
<?php } ?>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>