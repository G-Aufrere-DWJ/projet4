<?php ob_start(); ?>

<h1>Partie Admin</h1>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>