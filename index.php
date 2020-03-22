<?php
require('controller/frontend.php');

try {
    session_start();
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if ((isset($_GET['id'])) && ($_GET['id'] > 0 )) {
                if ((!empty($_SESSION['id'])) && (!empty($_POST['comment']))) {
                    addComment($_GET['id'], $_SESSION['id'], $_POST['comment']);
                }
                else {
                    throw new Exception('Aucun auteur ou commentaire');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'deleteComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_SESSION['id']) && ($_SESSION['role'] == 0 )) {
                    removeComment($_GET['id'], $_GET['post_id']);
                }
                else {
                    throw new Exception('Vous n\'avez pas l\'autorisation requise');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'signalComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_SESSION['id']) && ($_SESSION['role'] > 0 ))
                {
                    reportComment($_GET['id'],  $_GET['post_id']);
                }
                else
                {
                    throw new Exception('Vous n\'avez pas l\'autorisation requise');
                }
            }
        }
        elseif ($_GET['action'] == 'registration') {
            if (!empty($_POST['pseudo']) && !empty($_POST['mdp']))
            {
                addUser($_POST['pseudo'], $_POST['mdp']);
            }
            else
            {
                throw new Exception('Veuillez remplir les informations requises pour l\'inscription');
            }
        }
        elseif ($_GET['action'] == 'formInscription') {
                afficheInscription();
            }
        elseif ($_GET['action'] == 'connect') {
            if (!empty($_POST['pseudo']) && !empty($_POST['mdp']))
            {
                connection($_POST['pseudo'], $_POST['mdp']);
            }
            else
            {
                throw new Exception('Merci de renseigner un pseudo et un mot de passe valide.');
            }
        }
        elseif ($_GET['action'] == 'formConnection') {
            if (empty($_SESSION['id']))
            {
                afficheConnexion();
            }
            else 
            {
                throw new Exception ('Vous êtes déjà connecté');
            }
        }
        elseif ($_GET['action'] == 'disconnect') {
            if (!empty($_SESSION['id']))
            {
                disconnect();
            }
            else 
            {
                throw new Exception('Vous n\'êtes pas connecté');
            }
        }
        elseif ($_GET['action'] == 'admin') {
            if(isset($_SESSION['role'])){
            if ($_SESSION['role'] == 0) {
                afficheAdmin();
            }
            else {
                throw new Exception('Vous n\'avez pas l\'autorisation requise');
            }
        }
        else {
            throw new Exception('Vous n\'avez pas l\'autorisation requise');
        }
            
        }
        elseif ($_GET['action'] == 'listSignalComments') {
            if(isset($_SESSION['role'])){
                if ($_SESSION['role'] == 0) {
                    afficheCommentaires();
                }
                else {
                    throw new Exception('Vous n\'avez pas l\'autorisation requise');
                }
            }
            else {
                throw new Exception('Vous n\'avez pas l\'autorisation requise');
            }
        }
        elseif ($_GET['action'] == 'takeOffComment') {
            if(isset($_SESSION['role'])){
                if ($_SESSION['role'] == 0) {
                    pullOutComment($_GET['id'], $_GET['post_id']);
                }
                else {
                    throw new Exception('Vous n\'avez pas l\'autorisation requise');
                }
            }
        }
        elseif ($_GET['action'] == 'gestionArticles') {
            if(isset($_SESSION['role'])){
                if ($_SESSION['role'] == 0) {
                    adminPosts();
                }
                else {
                    throw new Exception('Vous n\'avez pas l\'autorisation requise');
                }
            }
        }
        elseif ($_GET['action'] == 'deletePost') {
            if(isset($_SESSION['role'])){
                if ($_SESSION['role'] == 0) {
                    removePost($_GET['id']);
                }
                else {
                    throw new Exception('Vous n\'avez pas l\'autorisation requise');
                }
            }
        }
        elseif ($_GET['action'] == 'modifyPost') {
            if(isset($_SESSION['role'])){
                if ($_SESSION['role'] == 0) {
                    updatePost($_GET['id'], $_POST['title'], $_POST['post']);
                }
                else {
                    throw new Exception('Vous n\'avez pas l\'autorisation requise');
                }
            }
        }
        elseif ($_GET['action'] == 'ajoutePost') {
            if(isset($_SESSION['role'])){
                if ($_SESSION['role'] == 0) {
                    newPost($_POST['title'], $_POST['post']);
                }
                else {
                    throw new Exception('Vous n\'avez pas l\'autorisation requise');
                }
            }
        }
        elseif ($_GET['action'] == 'writeArticle') {
            if(isset($_SESSION['role'])){
                if ($_SESSION['role'] == 0) {
                    writeArticle();
                }
                else {
                    throw new Exception('Vous n\'avez pas l\'autorisation requise');
                }
            }
        }
        elseif ($_GET['action'] == 'displayGestionArticle') {
            if(isset($_SESSION['role'])){
                if ($_SESSION['role'] == 0) {
                    displayModifyPost();
                }
                else {
                    throw new Exception('Vous n\'avez pas l\'autorisation requise');
                }
            }
        }
    }
    else { //si il il n'y a pas d'action
        listPosts();
    }
    } // fin du try
catch(Exception $e) { // S'il y a eu une erreur, alors...
    $errorMessage = $e->getMessage();
    require('view/frontend/errorView.php');
}

