<?php ob_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset ="utf-8">
        <title>A propos de moi</title>
        <link href="public/css/style.css" rel="stylesheet" /> 
    </head>

    <body>
        <header class="masthead" style="background-image: url('public/img/book.jpg')">
            <div class="overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-10 mx-auto">
                            <div class="page-heading">
                                <h1>Qui suis-je</h1>
                            </div>
                        </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <img src="public/img/portrait.jpg" alt="portrait auteur" id="manPicture">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe nostrum ullam eveniet pariatur voluptates odit, fuga atque ea nobis sit soluta odio, adipisci quas excepturi maxime quae totam ducimus consectetur?</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius praesentium recusandae illo eaque architecto error, repellendus iusto reprehenderit, doloribus, minus sunt. Numquam at quae voluptatum in officia voluptas voluptatibus, minus!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut consequuntur magnam, excepturi aliquid ex itaque esse est vero natus quae optio aperiam soluta voluptatibus corporis atque iste neque sit tempora!</p>
            </div>
        </div>
    </div>

    </body>
</html>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>