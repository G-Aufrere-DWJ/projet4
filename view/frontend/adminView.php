<?php ob_start(); ?>

    <form method="post" id="tiny_form" class="col-6 offset-5">
        <textarea id="content">Hello, World!</textarea>
    </form>

    <form action="index.php?action=gestionArticles" method="post" id="admin_posts_form">
        <button class="btn btn-primary" id="show_posts_admin">Gérer les articles</button>
    </form>

    <form action="index.php?action=listSignalComments" method="post" id="admin_comments_form">
        <button class="btn btn-primary" id="show_signalComments_admin">Gérer les commentaires</button>
    </form>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>

