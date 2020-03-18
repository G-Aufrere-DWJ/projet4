<?php ob_start(); ?>


        <section id="login-form">
            <div class="container">
                <div class="row">
                    <div id="registration" class="col-md-8 offset-md-2 col-lg-6 offset-lg-3 pb-5 px-5">
                                <h2 class="text-white">Inscription</h2>
                                <form action="index.php?action=registration" method="post" id="registration_form">
                                    <div class="form-group">
                                        <label for="pseudo" class="text-white">Votre pseudo</label>
                                        <input type="text" class="form-control" placeholder="veuillez entrer votre pseudo" id="pseudo" name="pseudo" required="required" />
                                    </div>
                                    <div class="form-group">
                                    <label for="mdp" class="text-white">Votre mot de passe</label>
                                        <input type="password" class="form-control" placeholder="veuillez entrer votre mot de passe" id="mdp" name="mdp" required="required" />
                                    </div>
                                        <button type="submit" name="formInscription" class="btn btn-primary">Je m'inscris</button>
                                </form>
                    </div>
                </div>
            </div>
        </section>


<?php $content = ob_get_clean(); ?>

<?php $title = 'Inscription' ?>

<?php require('view/frontend/template.php'); ?>