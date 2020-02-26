<?php ob_start(); ?>

<?php
        while ($comment = $comments->fetch())
        {
        ?>
        <div id="signal_comments">
            <p><strong><?= htmlspecialchars($comment['id_author']) ?></strong> le <?= $comment['creation_date'] ?></p>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>

            <?php if (!empty($_SESSION['id']) && ($_SESSION['role'] == 0 )) { ?>
                <a href="index.php?action=deleteComment&id=<?= ($comment['id'])?>&post_id=<?= $comment['post_id']?>">Supprimer le commentaire</a>
            <?php } ?>
        <?php } ?>
        </div>
        
            

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>