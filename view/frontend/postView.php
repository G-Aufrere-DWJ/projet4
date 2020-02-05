<?php ob_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Billet simple pour l'alaska</title>
        <link href="public/css/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <h1>Mon super blog !</h1>
        <p><a href="index.php">Retour à la liste des billets</a></p>

        <div class="news">
            <h3>
            
                <?php echo $post->title; ?>
                <em>le <?= $post->creation_date ?></em>
            </h3>
            
            <p>
                <?= nl2br(htmlspecialchars($post->post)) ?>
            </p>
        </div>

        <h2>Commentaires</h2>

        <?php if (isset($_SESSION['id'])) { ?>
            <form action="index.php?action=addComment&id=<?= $post->id ?>" method="post">
                
                <div>
                    <label for="comment">Commentaire</label><br />
                    <textarea id="comment" name="comment"></textarea>
                </div>
                <div>
                    <input type="submit" />
                </div>
            </form> 
            <?php } ?>
        
        

        <?php
        while ($comment = $comments->fetch())
        {
        ?>
            <p><strong><?= htmlspecialchars($comment['id_author']) ?></strong> le <?= $comment['creation_date'] ?></p>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>

            <?php if (!empty($_SESSION['id']) && ($_SESSION['role'] == 0 )) { ?>
                <a href="index.php?action=deleteComment&id=<?= ($comment['id'])?>&post_id=<?= $_GET['id']?>">Supprimer le commentaire</a>
            <?php } ?>
            
            <?php if (!empty($_SESSION['id']) && ($_SESSION['role'] > 0 )) { ?>
            <a href="index.php?action=signalComment&id=<?= ($comment['id'])?>&post_id=<?= $_GET['id']?>">Signaler le commentaire</a>
            <?php } ?>
        <?php
        }
        ?>
    </body>
</html>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>