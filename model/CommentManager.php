<?php 
namespace Guillaume\projet4\model;

require_once('Manager.php');

class CommentManager extends Manager
{
    //FONCTION QUI PERMET D'AJOUTER UN COMMENTAIRE
public function postComment($post_id, $id_author, $comment)
{
    $db = $this->dbConnect();
    $comments = $db->prepare('INSERT INTO comments (post_id, id_author, comment, creation_date) VALUES (?, ?, ?, NOW())');
    
    $affectedLines = $comments->execute(array($post_id, $id_author, $comment));
    return $affectedLines;
}

//FONCTION QUI AFFICHE LES COMMENTAIRES
public function getComments($post_id)
{
    $db = $this->dbConnect();

    $comments = $db->prepare('SELECT id, id_author, comment, creation_date FROM comments WHERE post_id = ? ORDER BY creation_date DESC');
    $comments->execute(array($post_id));

    return $comments;
}

public function getComment($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, id_author, comment, creation_date FROM comments WHERE id = ?');
        $req->execute(array($id));
        $comment = $req->fetch();

        return $comment;
    }

public function deleteComment($id)
{
    $db = $this->dbConnect();
    $req = $db->prepare('DELETE FROM comments WHERE id = :id');
    $deleted = $req->execute(array('id' => $_GET['id']));

    return $deleted;
}

public function signalComment($id)
{
    $db = $this->dbConnect();
    $req = $db->prepare('UPDATE comments set signal_comments = 1 WHERE id = ?');
    $signal = $req->execute(array($id));

    return $signal;
}

public function getSignalComments()
{
    $db = $this->dbConnect();
    $req = $db->query('SELECT * FROM comments WHERE signal_comments = 1');
    return $req;
}

}