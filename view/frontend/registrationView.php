<?php ob_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset ="utf-8">
        <title>Inscription</title>
        <link href="public/css/style.css" rel="stylesheet" /> 
    </head>

<body>
    <div id="registration" class="container bg-dark">
        <div class="row">
            <div class="px-sm-5 px-lg-0 col-lg-10 offset-lg-1 mb-5 mt-5">

                <h2 class="text-center mt-5 mb-5 text-white">Inscription</h2>
                <br /><br />

                <form action="index.php?action=registration" method="post" id="registration_form">
                    <div class="row">
                        <div class="col">
                        <input type="text" placeholder="votre pseudo" id="pseudo" name="pseudo" required="required" />
                    </div>
                    <div class="row">
                        <div class="col">
                        <input type="password" placeholder="votre mot de passe" id="mdp" name="mdp" required="required" />
                    </div>
                    <div class="col">
                        <button type="submit" name="formInscription" class="btn btn-primary mb-2">Je m'inscris</button>
                    </div>
                </form>

               <!-- <table>
                    <tr>
                        <td>
                            <label for="pseudo">Pseudo :</label>
                        </td>

                        <td>
                            <input type="text" placeholder="votre pseudo" id="pseudo" name="pseudo" required="required" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="mdp">Mot de passe :</label>
                        </td>

                        <td>
                            <input type="password" placeholder="votre mot de passe" id="mdp" name="mdp" required="required" />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                        <br />
                            <input type="submit" name="formInscription" value="Je m'inscris"/>
                        </td>
                    </tr>
                </table>

                </form>-->
            </div>
        </div>
    </div>
</body>
</html>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>