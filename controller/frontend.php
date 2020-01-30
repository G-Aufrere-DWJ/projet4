<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');

function listPosts()
{
    $postManager = new Guillaume\projet4\model\PostManager();
    $posts = $postManager->getPosts();

    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new Guillaume\projet4\model\PostManager();
    $commentManager = new Guillaume\projet4\model\CommentManager();
    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    require('view/frontend/postView.php');
}

function addComment($post_id, $id_author, $comment)
{
    $commentManager = new Guillaume\projet4\model\CommentManager();
    $affectedLines = $commentManager->postComment($post_id, $_SESSION['id'], $comment);

    if ($affectedLines == false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $post_id);
    }
}

function addUser($pseudo, $motdepasse)
{
    $userManager = new Guillaume\projet4\model\UserManager();

    if ($userManager->checkPseudo($pseudo))
    {
        $success = $userManager->insertUser($pseudo, $motdepasse);
        if ($success == false) {
            throw new Exception ('Erreur');
        }
        else {
            header('Location: index.php');
        }
    }
    else {
        throw new Exception ('Ce pseudo est déjà utilisé, veuillez en choisir un nouveau');
    }
}

function afficheInscription()
{
    require('view/frontend/registrationView.php');
}

function connection($pseudo, $motdepasse)
{   
    $userManager = new Guillaume\projet4\model\UserManager();
    $req = $userManager->userExists($pseudo);
    
    if ($req === false) {
        throw new Exception('Mauvais identifiant ou mot de passe 2');
    }
    else {
        $user = $req->fetch();
        $correctPassword = password_verify($motdepasse, $user['motdepasse']);

            if ($correctPassword) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['pseudo'] = $user['pseudo'];
            $_SESSION['role'] = $user['role'];
            header('Location: index.php');
        }
        else {
            throw new Exception('Mauvais identifiant ou mot de passe');
        }
    }
}

function afficheConnexion()
{
    require('view/frontend/connectView.php');
}

function disconnect()
{
    $_SESSION = array();
    session_destroy();
    header('Location: index.php');
}

function removeComment($id, $post_id)
{
    $commentManager = new Guillaume\projet4\model\CommentManager();
    $affectedLines = $commentManager->deleteComment($id);

    if ($affectedLines == false)
    {
        throw new Exception ('Impossible de supprimer le commentaire');
    }

    else {
        header('Location: index.php?action=post&id=' . $post_id);
    }
}

function reportComment($id)
{
    $commentManager = new Guillaume\projet4\model\CommentManager();
    $affectedLines = $commentManager->signalComment($id);

    if ($affectedLines === false)
    {
        throw new Exception ('Impossible de signaler le commentaire');
    }

    /*else {
        header('Location: index.php?action=post&id=' . $post_id);
    }*/
}