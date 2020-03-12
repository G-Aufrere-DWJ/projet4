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
    $post = $req->fetch(\PDO::FETCH_OBJ);
    
    return $post;
}

public function deletePost($id) 
{
    $db = $this->dbConnect();
    $req = $db->prepare('DELETE FROM posts WHERE id = ?');
    $deleted = $req->execute(array($id));

    return $deleted;
}

public function modifyPost($id, $title, $post)
{
    $db = $this->dbConnect();
    $req = $db->prepare('UPDATE posts SET title = ?, post = ? WHERE id = ?');
    $modifiedPost = $req->execute(array($title, $post, $id));

    return $modifiedPost;
}

public function addPost($title, $post)
{
    $db = $this->dbConnect();
    $req = $db->prepare('INSERT INTO posts (title, post, creation_date) VALUES (?, ?, NOW())');
    $affectedLines = $req->execute(array($title, $post));
    
    return $affectedLines;
}

}