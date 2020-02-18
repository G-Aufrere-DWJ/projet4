<?php ob_start(); ?>

<h1>Partie Admin</h1>
    <form method="post">
        <textarea id="content">Hello, World!</textarea>
    </form>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>

