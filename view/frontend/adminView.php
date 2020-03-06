<?php ob_start(); ?>

    <form action="index.php?action=gestionArticles" method="post" id="admin_posts_form">
        <button class="btn btn-primary" id="show_posts_admin">Gérer les articles</button>
    </form>

    <form action="index.php?action=listSignalComments" method="post" id="admin_comments_form">
        <button class="btn btn-primary" id="show_signalComments_admin">Gérer les commentaires</button>
    </form>

    <form action="index.php?action=writeArticle" method="post" id="new_post_form">
        <button class="btn btn-primary" id="show_posts_admin">Nouvel article</button>
    </form>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>

