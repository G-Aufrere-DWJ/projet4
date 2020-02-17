<?php ob_start(); ?>

<section id="connect-form">
            <div class="container">
                <div class="row">
                    <div id="connect" class="col-md-8 offset-md-2 col-lg-6 offset-lg-3 pb-5 px-5">
                                <h2>Connexion</h2>
                                <form action="index.php?action=connect" method="post" id="connect_form">
                                    <div class="form-group">
                                        <label for="pseudo">Votre pseudo</label>
                                        <input type="text" class="form-control" placeholder="veuillez entrer votre pseudo" id="pseudo" name="pseudo" required="required" />
                                    </div>
                                    <div class="form-group">
                                    <label for="mdp">Votre mot de passe</label>
                                        <input type="password" class="form-control" placeholder="veuillez entrer votre mot de passe" id="mdp" name="mdp" required="required" />
                                    </div>
                                        <button type="submit" name="formConnection" class="btn btn-primary">Je me connecte</button>
                                </form>
                    </div>
                </div>
            </div>
        </section>

<?php $content = ob_get_clean(); ?>

<?php $title = 'Connexion' ?>

<?php require('view/frontend/template.php'); ?>