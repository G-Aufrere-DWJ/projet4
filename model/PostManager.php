<?php 

namespace Guillaume\projet4\model;

require_once('Manager.php');

class PostManager extends Manager
{
    //FONCTION QUI RECUPERE LES ARTICLES
public function getPosts()
{
    $db = $this->dbConnect();
    $req = $db->query('SELECT id, title, post, creation_date FROM posts');
    return $req;
}

//FONCTION QUI RECUPERE L'ARTICLE
public function getPost($id) 
{
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT * FROM posts WHERE id = ?');
    $req->execute(array($id));
    if($req->rowCount() == 1)
    {
        $post = $req->fetch(\PDO::FETCH_OBJ);
        return $post;
    }
    else 
        header('Location: index.php');
}

public function deletePost($id) 
{
    $db = $this->dbConnect();
    $req = $db->prepare('DELETE FROM posts WHERE id = ?');
    $deleted = $req->execute(array($id));

    return $deleted;
}

}