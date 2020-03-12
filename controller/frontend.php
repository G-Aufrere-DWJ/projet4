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

function reportComment($id, $post_id)
{
    $commentManager = new Guillaume\projet4\model\CommentManager();
    $affectedLines = $commentManager->signalComment($id);

    if ($affectedLines == false)
    {
        throw new Exception ('Impossible de signaler le commentaire');
    }

    else {
        header('Location: index.php?action=post&id=' . $post_id);
    }
}

function afficheBiographie()
{
    require('view/frontend/bioView.php');
}

function afficheAdmin()
{
    require('view/frontend/adminView.php');
}

function afficheCommentaires()
{
    $commentManager = new Guillaume\projet4\model\CommentManager();
    $comments = $commentManager->getSignalComments();
    
    require('view/frontend/listSignalCommentsView.php');
}

function pullOutComment($id, $post_id)
{
    $commentManager = new Guillaume\projet4\model\CommentManager();
    $affectedLines = $commentManager->ignoreComment($id);

    if ($affectedLines == false)
    {
        throw new Exception ('Impossible de retirer le signalement');
    }
    
}

function updatePost($id, $title, $post)
{
    $postManager = new Guillaume\projet4\model\PostManager();
    $affectedLines = $postManager->modifyPost($id, $title, $post);
    

    if ($affectedLines == false)
    {
        throw new Exception ('Impossible de modifier le contenu');
    }
    else {
        header('Location: index.php?action=post&id=' . $id);
    }
}

function adminPosts()
{
    $postManager = new Guillaume\projet4\model\PostManager();
    $posts = $postManager->getPosts();

    require('view/frontend/gestionPostsView.php');
}

function removePost($id)
{
    $postManager = new Guillaume\projet4\model\PostManager();
    $affectedLines = $postManager->deletePost($id);

    if ($affectedLines == false)
    {
        throw new Exception ('Impossible de supprimer cet article');
    }
    else {
        header('Location: index.php?action=post&id=' . $id);
    }
}

function newPost($title, $post)
{
    $postManager = new Guillaume\projet4\model\PostManager();
    $affectedLines = $postManager->addPost($title, $post);

    if ($affectedLines == false) {
        throw new Exception('Impossible d\'ajouter l\'article !');
    }
    else {
        header('Location: index.php?action=post&id=' . $id);
    }
}

function writeArticle()
{
    require('view/frontend/newPostView.php');
}