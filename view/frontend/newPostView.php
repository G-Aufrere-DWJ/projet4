<?php ob_start(); ?>

<div class="container">
    <div id="ajout_post">
        <form action="index.php?action=ajoutePost" method="post" id="tiny_form" class="text-center">
            <div class="form-group">
                <label for="title" class="text-white">Titre</label><br />
                <input type="text" id="title" name="title" class="form-control" />
            </div>
            <div class="form-group">
                <label for="post" class="text-white">Article</label><br />
                <input type="text" id="post" name="post" class="form-control" />
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </form>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>