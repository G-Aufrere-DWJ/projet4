<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?= $title ?></title>
        <link rel="stylesheet" href="public/style.css"/> 
        <link rel="stylesheet" href="public/reset.css"/> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
        
    <body>
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <ul class="navbar-nav">
    <?php if (!isset($_SESSION['id'])) { ?>
        <li class="nav-item">
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
        </ul>
    </nav>
        <?= $content ?>
    </body>
</html>