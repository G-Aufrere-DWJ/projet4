<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title><?= $title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.tiny.cloud/1/p4xaubzszlb7dcui82iad2a4gfyb5ksvykd3kqvgs6ot6ryo/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
        tinymce.init({
            language : "fr_FR",
            selector: '#post'
        });
        </script>
        
    
        <!-- Bootstrap core CSS -->
        <link href="public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

        <!-- Custom styles for this template -->
        <link href="public/css/clean-blog.min.css" rel="stylesheet">

        <link rel="stylesheet" href="public/css/style.css"/> 
    </head>
        
    <body style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.6) 50%, rgba(0, 0, 0, 0.3) 100%), url('public/img/aurore.jpg');">
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark fixed-top" id="mainNav">
    <div class="container">
    <a class="navbar-brand" href="index.php?action=home">Jean Forteroche</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="index.php?action=home">Accueil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?action=listPosts">Blog</a>
        </li>
        <li class="nav-item">
        <?php if (!isset($_SESSION['id'])) { ?>
            <a class="nav-link" href="index.php?action=formInscription">Inscription</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="index.php?action=formConnection">Connexion</a>
        </li>
        <?php } 
                else { ?>
        <li class="nav-item">
        <a class="nav-link" href="index.php?action=disconnect">Deconnexion</a>
        </li>
        <?php } ?>
        <?php if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] == 0) { ?>
                <li class="nav-item">
                <a class="nav-link" href="index.php?action=admin">Admin</a>
                </li>
                <?php } ?>
        <?php } ?>
        </ul>
    </div>
    </div>
</nav>

        <?= $content ?>
                
        <footer class="page-footer font-small blue">
            <div id="paragraphe_footer" class="footer-copyright text-white text-center">
                © 2020 Copyright: Guillaume Aufrere. Tous droit réservés.
            </div>
        </footer>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
    
</html>