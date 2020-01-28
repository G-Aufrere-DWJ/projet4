<?php ob_start(); ?>

<div id="registration">

<h2>Inscription</h2>
<br /><br />

<form action="index.php?action=registration" method="post">

<table>
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

</form>

</div>


<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>